<?php

namespace App\Repositories\Frontend\Access\User;

use App\Events\Frontend\Auth\UserConfirmed;
use App\Exceptions\GeneralException;
use App\Models\Access\User\SocialLogin;
use App\Models\Access\User\User;
use App\Notifications\Frontend\Auth\UserChangedPassword;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Miscellaneous\Profiledetail;
use App\Models\Miscellaneous\Address;
use Illuminate\Support\Facades\Storage;
use App\Models\Preference\Preference;
use App\Models\Preferencesoption\Preferencesoption;
use App\Models\Subscriptionplan\Subscriptionplan;
use App\Models\Settings\Setting;

use App\Models\Access\Role\Role;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = User::class;

    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * Profile Pic path.
     *
     * @var string
     */
    protected $profilepic_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    /**
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
        $this->profilepic_path = 'img'.DIRECTORY_SEPARATOR.'profilepic'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * @param $email
     *
     * @return bool
     */
    public function findByEmail($email)
    {
        return $this->query()->where('email', $email)->first();
    }

    /**
     * @param $token
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function findByToken($token)
    {
        return $this->query()->where('confirmation_code', $token)->first();
    }

    /**
     * @param $token
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function getEmailForPasswordToken($token)
    {
        $rows = DB::table(config('auth.passwords.users.table'))->get();

        foreach ($rows as $row) {
            if (password_verify($token, $row->token)) {
                return $row->email;
            }
        }

        throw new GeneralException(trans('auth.unknown'));
    }

    /**
     * Create User.
     *
     * @param array $data
     * @param bool  $provider
     *
     * @return static
     */
    public function create(array $data, $provider = false)
    {
        $user = self::MODEL;
        $user = new $user();

        // Build the input for validation
        $fileArray = array('image' => (isset($data['profilepic'])) ? $data['profilepic'] : null);

        // Tell the validator that this file should be an image
        $rules = array(
          'image' => 'required|mimes:jpeg,jpg,png|max:30000|dimensions:min_width=450,min_height=530' // max 10000kb
        );

        // Now pass the input and rules into the validator
        $validator = \Validator::make($fileArray, $rules);

        // Check to see if validation fails or passes
        if ($validator->fails())
        {
              // Redirect or return json to frontend with a helpful message to inform the user 
              // that the provided file was not an adequate type
            // $msg = $validator->errors()->getMessages();
            // throw new GeneralException($msg['image'][0]);
        } else {
            $zip = trim($data['zip']);
            if (empty($zip)) {
                throw new GeneralException('Postcode is required.');
            }
            if (empty($data['country'])) {
                throw new GeneralException('Select your country is required.');
            }
        }

        $data = $this->uploadprofilepic($data);

        

        $user->accountname = $data['first_name'] . '_' . $data['last_name'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->address_2 = $data['address_2'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->zip = $data['zip'];
        $user->latitude = $data['latitude'];
        $user->longitude = $data['longitude'];
        $user->country = $data['country'];
        //$user->profilepic = $data['profilepic'];

        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->status = 1;
        $user->password = $provider ? null : bcrypt($data['password']);
        $user->is_term_accept = $data['is_term_accept'];

        // If users require approval, confirmed is false regardless of account type
        if (config('access.users.requires_approval')) {
            $user->confirmed = 0; // No confirm e-mail sent, that defeats the purpose of manual approval
        } elseif (config('access.users.confirm_email')) { // If user must confirm email
            // If user is from social, already confirmed
            if ($provider) {
                $user->confirmed = 1; // E-mails are validated through the social platform
            } else {
                // Otherwise needs confirmation
                $user->confirmed = 0;
                $confirm = true;
            }
        } else {
            // Otherwise both are off and confirmed is default
            $user->confirmed = 1;
        }

        DB::transaction(function () use ($user, $provider,$data) {

            if ($user->save()) {
                
                if ($provider === false) {
                    
                    $get_Role = Role::findOrFail($data['role']);
                    $user->attachRole($get_Role);
                } else {
                    $user->attachRole($this->role->getDefaultUserRole());
                }

                /*
                 * Add the default site role to the new user
                 */
                // $user->attachRole($this->role->getDefaultUserRole());
                /*
                 * Fetch the permissions of role attached to this user
                */
                $permissions = $user->roles->first()->permissions->pluck('id');
                /*
                 * Assigned permissions to user
                */
                $user->permissions()->sync($permissions);

                /*
                 * If users have to confirm their email and this is not a social account,
                 * send the confirmation email
                 *
                 * If this is a social account they are confirmed through the social provider by default
                 */
                if (config('access.users.confirm_email') && $provider === false) {
                    $user->notify(new UserNeedsConfirmation($user->confirmation_code));
                }
            }
        });

        /*
         * Return the user object
         */
        return $user;
    }


    /**
     * Upload Profile Image.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadprofilepic($input)
    {
        if (isset($input['profilepic']) && !empty($input['profilepic'])) {

            // Build the input for validation
            $fileArray = array('image' => (isset($input['profilepic'])) ? $input['profilepic'] : null);

            // Tell the validator that this file should be an image
            $rules = array(
              'image' => 'required|mimes:jpeg,jpg,png|max:30000|dimensions:min_width=450,min_height=530' // max 10000kb
            );

            // Now pass the input and rules into the validator
            $validator = \Validator::make($fileArray, $rules);

            // Check to see if validation fails or passes
            if ($validator->fails())
            {
                  // Redirect or return json to frontend with a helpful message to inform the user 
                  // that the provided file was not an adequate type
                $msg = $validator->errors()->getMessages();
                throw new GeneralException($msg['image'][0]);
            }

            $avatar = $input['profilepic'];

            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->profilepic_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['profilepic' => $fileName]);
        } else {
            $input = array_merge($input, ['profilepic' => '']);
        }

        return $input;
    }

    /**
     * @param $data
     * @param $provider
     *
     * @throws GeneralException
     *
     * @return UserRepository|bool
     */
    public function findOrCreateSocial($data, $provider)
    {
        // User email may not provided.
        $user_email = $data->email ?: "{$data->id}@{$provider}.com";

        // Check to see if there is a user with this email first.
        $user = $this->findByEmail($user_email);

        /*
         * If the user does not exist create them
         * The true flag indicate that it is a social account
         * Which triggers the script to use some default values in the create method
         */
        if (!$user) {
            // Registration is not enabled
            if (!config('access.users.registration')) {
                throw new GeneralException(trans('exceptions.frontend.auth.registration_disabled'));
            }

            $user = $this->create([
                'name'  => $data->name,
                'email' => $user_email,
            ], true);
        }

        // See if the user has logged in with this social account before
        if (!$user->hasProvider($provider)) {
            // Gather the provider data for saving and associate it with the user
            $user->providers()->save(new SocialLogin([
                'provider'    => $provider,
                'provider_id' => $data->id,
                'token'       => $data->token,
                'avatar'      => $data->avatar,
            ]));
        } else {
            // Update the users information, token and avatar can be updated.
            $user->providers()->update([
                'token'  => $data->token,
                'avatar' => $data->avatar,
            ]);
        }

        // Return the user object
        return $user;
    }

    /**
     * @param $token
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function confirmAccount($token)
    {
        $user = $this->findByToken($token);

        if ($user->confirmed == 1) {
           return redirect()->route('frontend.auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.already_confirmed'));
            //throw new GeneralException(trans('exceptions.frontend.auth.confirmation.already_confirmed'));
        }

        if ($user->confirmation_code == $token) {
            $user->confirmed = 1;
            $user->status = 1;

            event(new UserConfirmed($user));

            return $user->save();
        }

        throw new GeneralException(trans('exceptions.frontend.auth.confirmation.mismatch'));
    }

    public static function getVendorProfileDetails($id) {
        $user = User::find($id);
        $countries = DB::table('apps_countries')->select('country_name')->orderBy('country_name','Asc')->get()->keyBy('country_name')->toArray();
        $country = [
            '' => 'Select Country',
        ];
        if ($countries) {
            foreach($countries as $name => $coun) {
                $country[$name] = $name;
            }
        }
        return [
                'userinfo' => $user,
                'countries' => $country
            ];
    }
    public function editVendorProfile($id, $input)
    {
        $user = $this->find($id);

        $zip = trim($input['zip']);
        if (empty($zip)) {
            throw new GeneralException('Postcode is required.');
        }
        if (empty($input['country'])) {
            throw new GeneralException('Select your country is required.');
        }
        
        /*if ($this->findByAccountName($id, $input['accountname'])) {
            throw new GeneralException('Account name already taken.');
        }*/
        
        $user = $this->createUserStub($user, $input);
        $save = $user->save();

        return $save;
    }
    /*public function findByAccountName($id, $accname)
    {
        return $this->query()->where('accountname', $accname)->whereNull('deleted_at')->where('id', '<>', $id)->first();
    }*/

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createUserStub($user, $input)
    {
        $userlooksfor = DB::table('users')->where('id', $user->id)->first();

        //$user->accountname = $input['accountname'];
        //$user->dob = date("d/m/Y", mktime(0,0,0,$dob[1],$dob[0],$dob[2]));
        //$user->age = $age;
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->phone = $input['phone'];
        $user->address = $input['address'];
        $user->address_2 = $input['address_2'];
        $user->city = $input['city'];
        $user->state = $input['state'];
        $user->country = $input['country'];
        $user->zip = $input['zip'];
        $user->latitude = $input['latitude'];
        $user->longitude = $input['longitude'];
        //$user->aboutme = $input['aboutme'];
        //$user->search_radius = $input['search_radius'];
        //$user->profilepic = (!empty($input['profilepic'])) ? $input['profilepic'] :  $userlooksfor->profilepic;
        //$user->picapproved = (!empty($input['profilepic'])) ? 0 :  $userlooksfor->picapproved;
        $user->updated_by = access()->user()->id;

        return $user;
    }

    /**
     * @param $id
     * @param $input
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function createProfile($id, $input)
    {
        $user = $this->find($id);

        /*$dtvalid = checkdate($input['month'],$input['day'],$input['year']);
        if ($dtvalid) {
            $input['dob'] = $input['day'].'/'.$input['month'].'/'.$input['year'];
            $age = $this->validateAge($input['dob']);
            if ($age < 18) {
                throw new GeneralException('You must be over 18 to register your profile.');
            }
        } else {
            throw new GeneralException('Please select a valid date of birth.');
        }*/

        $zip = trim($input['zip']);
        if (empty($zip)) {
            throw new GeneralException('Postcode is required.');
        }
        if (empty($input['country'])) {
            throw new GeneralException('Select your country is required.');
        }
        
        if ($this->findByAccountName($id, $input['accountname'])) {
            throw new GeneralException('Account name already taken.');
        }

        $columns[] = '_token';
        $columns[] = '_method';
        foreach ($input as $field => $value) {
            if (in_array($field, $columns)) continue;
            $option = explode('-', $field);
            if ($option[0] == 'me') {
                $field = ucwords(str_replace('_', ' ', $option[1]));
                if (is_array($value)) {
                    if (!$value || $value[0] == '::') {
                        throw new GeneralException('Value of \' ' . $field . '\' is required, Please ensure all fields are filled under \'Me\' section, as all these are required.');    
                    }
                } elseif ($value == '') {
                    throw new GeneralException('Value of \' ' . $field . '\' is required, Please ensure all fields are filled under \'Me\' section, as all these are required.');
                }
            }
        }
        
        $user = $this->createUserStub($user, $input);
        $save = $user->save();
        /*if ($save) {
            $columns = \Schema::getColumnListing('users');
            $this->saveUserProfile($id, $columns, $input, $user);
        }*/
        

        return $save;
    }

    
    /**
     * @param  $input
     *
     * @return mixed
     */
    public function findByAccountName($id, $accname)
    {
        return $this->query()->where('accountname', $accname)->whereNull('deleted_at')->where('id', '<>', $id)->first();
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    public function validateAge($dateofbirth)
    {
        $age = 0;
        if (!empty($dateofbirth)) {
            $dob = explode('/', $dateofbirth);
            $dob[2] = (int) $dob[2];
            $dob[1] = (int) $dob[1];
            $dob[0] = (int) $dob[0];
            $age = date_diff(date_create(date("d-m-Y", mktime(0,0,0,$dob[1],$dob[0],$dob[2]))), date_create('today'))->y;
        }

        return $age;
    }


    /**
     * @param  $columns, $input
     *
     * @return mixed
     */
    protected function saveUserProfile($id, $columns, $input, $user)
    {
        //$id = 25;
        DB::table('user_profiles')->where('user_id', $id)->delete();
        DB::table('user_profile_option_values')->where('user_id', $id)->delete();
        $columns[] = '_token';
        $columns[] = '_method';
        $columns[] = 'day';
        $columns[] = 'month';
        $columns[] = 'year';
        foreach ($input as $field => $value) {
            if (in_array($field, $columns)) continue;
            $option = explode('-', $field);
            $prefid = $option[2];
            $optid = $option[3];
            $ismulti = 0;
            if (is_array($value)) {
                $ismulti = 1;
                $multiopt = $value;
                $value = '';
            }

            $profileId = DB::table('user_profiles')->insertGetId(
                [
                    'user_id' => $id,
                    'prefrenceof' => $option[0],
                    'permission_id' => $prefid,
                    'option_id' => $optid,
                    'option_name' => $option[1],
                    'option_value' => ($option[1] == 'age' && !empty($user->age) && $option[0] == 'me') ? $user->age : $value,
                    'multiple_options' => $ismulti
                ]
            );

            if ($profileId && $ismulti) {
                foreach ($multiopt as $val) {
                    if ($val == '::') continue;
                    DB::table('user_profile_option_values')->insert(
                        [
                            'user_id' => $id,
                            'profile_id' => $profileId,
                            'option_value' => $val
                        ]
                    );
                }
            }
        }

        $lookfor = [];
        $userprefrencesmy = DB::table('user_profiles')->where('user_id', $id)->where('prefrenceof', 'my')->get()->keyBy('option_name')->toArray();
        $opt = [];
        foreach ($userprefrencesmy as $myoption) {
            $opt[] = $myoption->id;
            if (!$myoption->multiple_options) {
                $lookfor[$myoption->option_name] = $myoption->option_value;
            }
        }
        $profileoptions = DB::table('user_profile_option_values')->where('user_id', $id)->wherein('profile_id', $opt)->get()->keyBy('id')->toArray();
        foreach ($userprefrencesmy as $myoption) {
            if ($myoption->multiple_options) {
                foreach ($profileoptions as $options) {
                    if ($options->profile_id == $myoption->id) {
                        $lookfor[$myoption->option_name][] = $options->option_value;
                    }
                }
            }
        }
        if ($lookfor) {
            $userlooksfor = DB::table('user_looks_for')->where('user_id', $id)->first();
            if ($userlooksfor) {
                DB::table('user_looks_for')
                ->where('user_id', $id)
                ->update([
                    'looksfor' => serialize($lookfor),
                    'searchfor' => '',
                ]);
            } else {
                DB::table('user_looks_for')->insert(
                    [
                        'user_id' => $id,
                        'looksfor' => serialize($lookfor),
                    ]
                );
            }
        }

        return true;
    }

    /**
     * @param $id
     * @param $input
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function updateProfile($id, $input)
    {
        $user = $this->find($id);
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->aboutme = $input['aboutme'];
        $user->updated_by = access()->user()->id;

        if ($user->canChangeEmail()) {
            //Address is not current address
            if ($user->email != $input['email']) {
                //Emails have to be unique
                if ($this->findByEmail($input['email'])) {
                    throw new GeneralException(trans('exceptions.frontend.auth.email_taken'));
                }

                // Force the user to re-verify his email address
                $user->confirmation_code = md5(uniqid(mt_rand(), true));
                $user->confirmed = 0;
                $user->email = $input['email'];
                $updated = $user->save();

                // Send the new confirmation e-mail
                $user->notify(new UserNeedsConfirmation($user->confirmation_code));

                return [
                    'success'       => $updated,
                    'email_changed' => true,
                ];
            }
        }

        return $user->save();
    }

    /**
     * @param $input
     *
     * @throws GeneralException
     *
     * @return mixed
     */
    public function changePassword($input)
    {
        $user = $this->find(access()->id());

        if (Hash::check($input['old_password'], $user->password)) {
            $user->password = bcrypt($input['password']);

            if ($user->save()) {
                $user->notify(new UserChangedPassword($input['password']));

                return true;
            }
        }

        throw new GeneralException(trans('exceptions.frontend.auth.password.change_mismatch'));
    }

    /**
     * Create a new token for the user.
     *
     * @return string
     */
    public function saveToken()
    {
        $token = hash_hmac('sha256', Str::random(40), 'hashKey');

        \DB::table('password_resets')->insert([
            'email' => request('email'),
            'token' => $token,
        ]);

        return $token;
    }

    /**
     * @param $token
     *
     * @return mixed
     */
    public function findByPasswordResetToken($token)
    {
        foreach (DB::table(config('auth.passwords.users.table'))->get() as $row) {
            if (password_verify($token, $row->token)) {
                $createdat = strtotime($row->created_at);
                $curtime = time(); 
                $diff = ($curtime - $createdat) / 3600;
                if ($diff > 24) {
                    return false;
                } else {
                    return $this->findByEmail($row->email);
                }
            }
        }

        return false;
    }


    /**
     * @param $uid
     * @param $input
     *
     * @throws GeneralException
     *
     * @return int
     */
    public function addsubscribedplan($uid, $input)
    {
        $pid = $input['pid'];
        $setting = Setting::first();
        $plan = Subscriptionplan::where('id', $pid)->where('status', 1)->whereNull('deleted_at')->first();
        $features = DB::table('subscription_plan_features')->where('subscription_plan_id', $plan->id)->get();
        if (!$plan) {
            throw new GeneralException('Subscription plan not found.');
        }

        if ($setting->live_pay_mode == 0) {
            DB::table('users')->where('id', $uid)->update([
                'stripe_id' => null,
            ]);
        }
        //DB::table('user_subscription_plan_features')->where('user_id', $uid)->where('paid', 0)->delete();

        $planId = DB::table('user_subscription_plans')->insertGetId(
            [
                'user_id' => $uid,
                'transactionid' => substr(hash('sha256', mt_rand() . microtime()), 0, 20),
                'plan_id' => $plan->id,
                'title' => $plan->title,
                'price' => $plan->price,
                'usercount' => $plan->usercount,
                'duration' => $plan->duration,
                'stripe_product_id' => ($setting->live_pay_mode) ? $plan->stripe_id : $plan->strip_test_id,
                'status' => $plan->status,
                'created_at' => date("Y-m-d h:i:s"),
            ]
        );

        if (!$planId) {
            throw new GeneralException('Oops, Something went worng, please re-try.');
        }

        if ($planId && $features) {
            foreach ($features as $feature) {
                DB::table('user_subscription_plan_features')->insert(
                    [
                        'user_id' => $uid,
                        'paid' => 0,
                        'subscription_plan_id' => $planId,
                        'description' => $feature->description,
                        'created_at' => date("Y-m-d h:i:s"),
                    ]
                );
            }
        }
    
        return $planId;
    }


    public static function getProfileDetails($id) {
        $user = User::find($id);

        $profilepic = (!empty($user->profilepic)) ? $user->profilepic : '<img src="' . url('images/placeholder-img.jpg') . '" id="uploadPreview" width="150px" height="150px" alt="placeholder-img">';
        $countries = DB::table('apps_countries')->select('country_name')->orderBy('country_name','Asc')->get()->keyBy('country_name')->toArray();
        //$fieldtypes = DB::table('option_fields')->get()->keyBy('id')->toArray();
        //$preferences = Preference::where('is_active', 1)->get()->keyBy('id')->toArray();
        //$prekeys = array_keys($preferences);
        //$preferencesoption = Preferencesoption::where('status', 1)->wherein('preference_id', $prekeys)->orderby('displayorder')->get()->keyBy('id')->toArray();
        //$optionkeys = array_keys($preferencesoption);
        //$optionvalues = DB::table('preferences_options_values')->select('id', 'preferences_option_id', 'title')->wherein('preferences_option_id', $optionkeys)->get()->keyBy('id')->toArray();
        //$userprefrencesme = DB::table('user_profiles')->where('user_id', $user->id)->where('prefrenceof', 'me')->get()->keyBy('option_name')->toArray();
        //$userprefrencesmy = DB::table('user_profiles')->where('user_id', $user->id)->where('prefrenceof', 'my')->get()->keyBy('option_name')->toArray();
        //$profileoptions = DB::table('user_profile_option_values')->where('user_id', $user->id)->get()->keyBy('id')->toArray();
        //dd($userprefrences);
        $validdob = date("d/F/Y", strtotime('-18 year'));
        $dob = explode('/', $validdob);
        $days = range(0, 31);
        $days[0] = 'Day';
        $months = ['Month'];
        for($m=1; $m<=12; ++$m) {
             $months[$m] = date('F', mktime(0, 0, 0, $m, 1));
        }
        $year = range($dob[2], ($dob[2] - 99));
        $years = ['Year'];
        foreach ($year as $yr) {
            $years[$yr] = $yr;
        }

        return [
                'validdob' => $validdob,
                'days' => $days,
                'months' => $months,
                'years' => $years,
                'countries' => $countries,
                'userinfo' => $user,
                'profilepic' => $profilepic,
                //'fieldtypes' => $fieldtypes,
                //'preferences' => $preferences,
                //'preferencesoption' => $preferencesoption,
                //'optionvalues' => $optionvalues,
                //'userprefrencesme' => $userprefrencesme,
                //'userprefrencesmy' => $userprefrencesmy,
                //'profileoptions' => $profileoptions,
            ];  
    }


    /**
     * 
     * @return mixed
     */
    public static function checkexpiredplans()
    {
        $userid = access()->id();
        $time = date('Y-m-d h:i:s');

        DB::table('user_subscription_plans')
        ->where('user_id', $userid)
        ->where('paystatus', 'Expired')
        ->where('expiry_date', '<', $time)
        ->update([
            'paystatus' => 'Expired',
        ]);
    }

    /**
     * 
     * @return Array
     */
    public static function getUserPlans()
    {
        return DB::table('user_subscription_plans')->where('user_id', access()->id())->where('paystatus', 'Completed')->where('paid', 1)->orderby('expiry_date', 'desc')->get()->keyBy('plan_id')->toArray();
    }


    public static function getReplacedEmailPlaceHolders($id, $userSuggested = []) {
        $template = DB::table('email_templates')->where('id', $id)->where('status', 1)->first();
        if (!$template) {
            return '';
        }

        $message = $template->body;

        $placeHolders = DB::table('email_template_placeholders')->get();
        $placeHolderValues = [];
        $setting = Setting::first();
        $user = access()->user();

        foreach ($placeHolders as $holder) {
            $placeholder = $holder->name;
            if (isset($userSuggested[$placeholder])) {
                $placeHolderValues[$placeholder] = $userSuggested[$placeholder]; 
            } else {
                switch ($placeholder) {
                    case 'app_name': $placeHolderValues[$placeholder] = env('APP_NAME');
                        break;
                    case 'user_name': 
                        $placeHolderValues[$placeholder] = (isset($user->first_name)) ? $user->first_name . ' ' . $user->last_name : '';
                        break;
                    case 'user_email': 
                        $placeHolderValues[$placeholder] = (isset($user->email)) ? $user->email : '';
                        break;
                    case 'contact_email': 
                        $placeHolderValues[$placeholder] = $setting->company_email;
                        break;
                    case 'contact_phone': 
                        $placeHolderValues[$placeholder] = $setting->company_contact;
                        break;
                    case 'contact_address': 
                        $placeHolderValues[$placeholder] = $setting->company_address;
                        break;
                }
            }
        }

        foreach ($placeHolderValues as $placeholder => $val) {
            $message = str_replace('[' . $placeholder . ']', $val, $message);
        }

        return $message;
    }

}
