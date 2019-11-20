<?php

namespace App\Repositories\Frontend\Access\User;

use App\Events\Frontend\Auth\UserConfirmed;
use App\Exceptions\GeneralException;
use App\Models\Access\User\SocialLogin;
use App\Models\Access\User\User;
use App\Models\Access\Role\Role;
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
    protected $storage;

    /**
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role        = $role;
        $this->upload_path = 'uploads' . DIRECTORY_SEPARATOR . 'profile_images' . DIRECTORY_SEPARATOR;
        $this->storage     = Storage::disk('public');
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

        if ($provider) {
            $user->email          = $data['email'];
            $user->first_name     = $data['first_name'];
            $user->password       = bcrypt($data['password']);
            $user->is_term_accept = 1;
        } else {
           // $user->nickname       = $data['nickname'];
            $user->email          = $data['email'];
            $user->phone          = $data['phone'];
           // $user->dob            = $data['dob'];
            $user->is_term_accept = $data['is_term_accept'];
            $user->password       = $provider ? null : bcrypt($data['password']);
        }
        $user->status            = 1;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));

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
                $confirm         = true;
            }
        } else {
            // Otherwise both are off and confirmed is default
            $user->confirmed = 1;
        }

        DB::transaction(function () use ($user, $provider, $data)
        {
            if ($user->save()) {

                /*
                 * Add the default site role to the new user
                 */
//                $user->attachRole($this->role->getDefaultUserRole());

                if ($provider === false) {
                    $get_Role = Role::where('name', $data['role'])->first();
                    $user->attachRole($get_Role);
                } else {
                    $user->attachRole($this->role->getDefaultUserRole());
                }


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

            if ($provider == 'google') {

                $user = $this->create([
                    'first_name' => $data->user['name']['givenName'],
                    'email'      => $user_email,
                    'password'   => $data->id
                ], true);
            }
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

//        if ($user->confirmed == 1) {
//            return redirect('/')->withFlashDanger('Your account is already confirmed!');
////            throw new GeneralException(trans('exceptions.frontend.auth.confirmation.already_confirmed'));
//        }

        if ($user->confirmation_code == $token) {
            $user->confirmed = 1;

            event(new UserConfirmed($user));

            return $user->save();
        }

        throw new GeneralException(trans('exceptions.frontend.auth.confirmation.mismatch'));
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
        $user             = $this->find($id);
        $user->first_name = $input['first_name'];
        $user->last_name  = $input['last_name'];
        $user->dob        = $input['dob'];
        $user->phone      = $input['phone'];
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
                $user->confirmed         = 0;
                $user->email             = $input['email'];
                $updated                 = $user->save();

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

    public function updateEscortBasicDetails($id, $input)
    {
        $user = $this->find($id);
        // Uploading Image
        if (array_key_exists('display_image', $input)) {
            $this->deleteOldFile($user);
            $input               = $this->uploadProfileImage($input);
            $user->display_image = $input['display_image'];
        }

        if ($user->hasRole('Customer')) {
            $profile_detail = Profiledetail::where('user_id', $id)->first();
            if (empty($profile_detail)) {
                $profile_detail = new Profiledetail;
            }
            $profile_detail->user_id = $id;
            $profile_detail->gender  = $input['gender'];
            $profile_detail->save();
        }

        $user->nickname   = $input['nickname'];
        $user->first_name = $input['first_name'];
        $user->last_name  = $input['last_name'];
        $user->dob        = $input['dob'];

        if (array_key_exists('phone', $input)) {
            $entries = \DB::table('sms_verifications')->where('user_id', $user->id)->where('contact_number', '!=', $user->phone)->where('status', 'verified')->delete();
            $user->phone      = $input['phone'];
        }

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
                $user->confirmed         = 0;
                $user->email             = $input['email'];
                $updated                 = $user->save();

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

    public function updateEscortProfileDetails($id, $data)
    {
        $profile_detail = Profiledetail::where('user_id', $id)->first();
        if (empty($profile_detail)) {
            $profile_detail = new Profiledetail;
        }
        $profile_detail->user_id             = $id;
        $profile_detail->profile_description = isset($data['profile_description']) ? $data['profile_description'] : '';
        $profile_detail->gender              = isset($data['gender']) ? $data['gender'] : '';
        $profile_detail->age                 = isset($data['dob']) ? \Carbon\Carbon::parse($data['dob'])->age : '';
        $profile_detail->hair_color          = isset($data['hair_color']) ? $data['hair_color'] : '';
        $profile_detail->eye_color           = isset($data['eye_color']) ? $data['eye_color'] : '';
        $profile_detail->height_ft           = isset($data['height_ft']) ? $data['height_ft'] : '';
        $profile_detail->height_in           = isset($data['height_in']) ? $data['height_in'] : '';
        $profile_detail->ethnicity           = isset($data['ethnicity']) ? $data['ethnicity'] : '';
        $profile_detail->body_type           = isset($data['body_type']) ? $data['body_type'] : '';
        $profile_detail->orientation         = isset($data['orientation']) ? $data['orientation'] : '';
        $profile_detail->bust                = isset($data['bust']) ? $data['bust'] : '';
        $profile_detail->waist               = isset($data['waist']) ? $data['waist'] : '';
        $profile_detail->hip                 = isset($data['hip']) ? $data['hip'] : '';
        $profile_detail->dress_size          = isset($data['dress_size']) ? $data['dress_size'] : '';
        $profile_detail->facebook_link       = isset($data['facebook_link']) ? $data['facebook_link'] : '';
        $profile_detail->twitter_link        = isset($data['twitter_link']) ? $data['twitter_link'] : '';
        $profile_detail->instagram_link      = isset($data['instagram_link']) ? $data['instagram_link'] : '';
        $profile_detail->google_link         = isset($data['google_link']) ? $data['google_link'] : '';
        $profile_detail->save();
    }

    public function updateEscortLocationDetails($id, $data)
    {

        $address = Address::where('user_id', $id)->first();
        if (empty($address)) {
            $address = new Address;
        }
        $address->user_id   = $id;
        $address->address   = isset($data['address']) ? $data['address'] : '';
        $address->address_2 = isset($data['address2']) ? $data['address2'] : '';
        $address->city      = isset($data['city']) ? $data['city'] : '';
        $address->state     = isset($data['state']) ? $data['state'] : '';
        $address->country   = isset($data['country']) ? $data['country'] : '';
        $address->zip       = isset($data['zip']) ? $data['zip'] : '';
        $address->latitude  = isset($data['latitude']) ? $data['latitude'] : '';
        $address->longitude = isset($data['longitude']) ? $data['longitude'] : '';
        $address->save();
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
                return $this->findByEmail($row->email);
            }
        }

        return false;
    }

    public function uploadProfileImage($input)
    {
        $avatar = isset($input['display_image']) ? $input['display_image'] : '';

        if (isset($input['display_image']) && !empty($input['display_image'])) {
            $fileName = time() . $avatar->getClientOriginalName();

            $this->storage->put($this->upload_path . $fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['display_image' => $fileName]);
        }
        return $input;
    }

    /**
     * Destroy Old Image.
     *
     * @param int $id
     */
    public function deleteOldFile($model)
    {
        if (isset($model->display_image)) {
            $fileName = $model->display_image;
            return $this->storage->delete($this->upload_path . $fileName);
        } else {
            return true;
        }
    }

}
