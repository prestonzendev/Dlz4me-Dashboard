<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\DashboardViewRequest;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;
use App\Models\Preference\Preference;
use App\Models\Preferencesoption\Preferencesoption;
use App\Models\Subscriptionplan\Subscriptionplan;
use App\Models\Settings\Setting;
use Laravel\Cashier\Cashier;
use Braintree_Transaction;
use DB;
use Mail;
use Laravel\Cashier\Billable;
/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->user->updateProfile(access()->id(), $request->all());

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            access()->logout();

            return redirect()->route('frontend.auth.login')->withFlashInfo(trans('strings.frontend.user.email_changed_notice'));
        }

        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    /**
     * @param createProfileRequest $request
     *
     * @return mixed
     */
    public function create(Request $request)
    {

        $output = $this->user->createProfile(access()->id(), $request->all());

        
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }


    /**
     * @param DashboardViewRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewprofile(DashboardViewRequest $request)
    {
        $profile = UserRepository::getProfileDetails(access()->id());
        $profile['title'] = 'Create Your Profile';
        return view('frontend.user.profile')->with(
            $profile
        );
    }

    

    /**
     * @param DashboardViewRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showprofile(DashboardViewRequest $request)
    {
        $userinfo = DB::table('users')
            ->where('users.status', 1)
            ->where('users.confirmed', 1)
            ->where('users.id', access()->id())->first();

        return view('frontend.user.viewprofile')->with(
            [
                'title' => 'View Profile',
                'userinfo' => $userinfo,
            ]
        );
    }

    /**
     * @param DashboardViewRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subscriptionplans(DashboardViewRequest $request)
    {
        $plans = Subscriptionplan::where('status', 1)->whereNull('deleted_at')->get()->keyBy('id')->toArray();
        $planids = array_keys($plans);
        $userplans = UserRepository::getUserPlans();
        //dd($userplans);
        $features = DB::table('subscription_plan_features')->wherein('subscription_plan_id', $planids)->get()->keyBy('id')->toArray();
        return view('frontend.user.subscriptionplans')->with(
            [
                'title' => 'Subscription',
                'plans' => $plans,
                'userplans' => $userplans,
                'features' => $features,
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upgrade(Request $request) {

        $planId = $this->user->addsubscribedplan(access()->id(), $request->all());
        
        return redirect()->route('frontend.user.payment')->withFlashSuccess('Thanks for choosing a Subscription plan, please proceed for payment.');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentproceed() {

        $plan = DB::table('user_subscription_plans')->where('user_id', access()->id())->where('paystatus', 'initiated')->orderBy('id', 'DESC')->first();
        if(!$plan) {
            return redirect()->route('frontend.user.dashboard')->withFlashDanger('No plan subscribed for payment.');
        }
        $features = DB::table('user_subscription_plan_features')->where('subscription_plan_id', $plan->id)->get()->keyBy('id')->toArray();
        return view('frontend.user.stripepayment')->with([
            'title'=>'payment',
            'plan'=> $plan,
            'features' => $features,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function process(Request $request)
    {

        /*

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $strip = \Stripe\Subscription::create([
          "customer" => $user->stripe_id,
          "items" => [
            [
              "plan" => $plan->stripe_product_id,
            ],
          ]
        ]);

        */

        $user = access()->user();
        $plan = DB::table('user_subscription_plans')->where('user_id', $user->id)->where('paystatus', 'initiated')->orderBy('id', 'DESC')->first();
        if(!$plan) {
            return redirect()->route('frontend.user.dashboard')->withFlashDanger('No plan subscribed for payment.');
        } else {
            DB::table('user_subscription_plans')
            ->where('user_id', $user->id)
            ->where('paystatus', 'initiated')
            ->where('id', '<>', $plan->id)->update(
                [
                    'paystatus' => null,
                ]
            );
        }

        $stripeToken = $request->input('stripeToken', false);
        try {
            $stripe = $user->newSubscription('main', $plan->stripe_product_id)->create($stripeToken);
        } catch(Exception $e) {
            return redirect()->route('frontend.user.dashboard')->withFlashDanger('Unable to process, there is some issue with transaction.');
        }

        if(isset($stripe->stripe_id)) {
            $userplans = UserRepository::getUserPlans();
            $expire = mktime(date('h'), date('i'), date('s'), (date('m') + $plan->duration),date('d'),date('Y'));

            if ($userplans) {
                $sn = 0;
                foreach ($userplans as $oldplan) {
                    if (!$sn) {
                        $previousDate = strtotime($oldplan->expiry_date);
                        $expire = mktime(date('h', $previousDate), date('i', $previousDate), date('s', $previousDate), (date('m', $previousDate) + $plan->duration),date('d', $previousDate),date('Y', $previousDate));
                    }
                    $sn++;
                }
            }

            DB::table('user_subscription_plans')
            ->where('stripe_product_id', $stripe->stripe_plan)
            ->where('id', $plan->id)
            ->update([
                'paid' => 1,
                'transactionid' => $stripe->stripe_id,
                'paystatus' => 'Completed',
                'expiry_date' => date("Y-m-d h:i:s", $expire),
            ]);


            $settingData = Setting::first();
            $admin_email = $settingData->company_email;

            $message = env('APP_NAME') . ' subscription plan is upgraded by ' . $user->first_name . ' ' . $user->last_name . ',<br /><br />Please review the transaction details as bellow:<br /><br />';

            $messageDetails = 'Name: ' . $user->first_name . ' ' . $user->last_name . '<br />';
            $messageDetails .= 'Email: ' . $user->email . '<br />';
            $messageDetails .= 'Phone: ' . $user->phone . '<br /><br />';
            $messageDetails .= 'Term: ' . $plan->title . '<br />';
            $messageDetails .= "Amount: " . $settingData->currency_symbol . $plan->price . "<br />";
            $messageDetails .= 'Ending: ' . date("Y-m-d", $expire) . '<br />';
            $messageDetails .= 'Duration: ' . $plan->duration . ' Month<br />';
            $messageDetails .= 'Payment Status: ' . $plan->paystatus . '<br />';
            $messageDetails .= 'Token ID: ' . $stripe->stripe_id . '<br />';

            $message .= $messageDetails;
            
            $data = array(
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'phone' => ($user->phone) ? $user->phone : 0,
                'body' => $message,
            );

            Mail::send('emails.contact_email', $data, function ($message) use ($user, $admin_email)
            {
                /* Config ********** */
                $to_email = $admin_email;
                $to_name  = "Administrator";
                $subject  = $user->first_name . ' ' . $user->last_name . " | Subscription Plan Upgraded";
                $message->subject($subject);
                $message->from($user->email, $user->first_name . ' ' . $user->last_name);
                $message->to($to_email, $to_name);
            });

            $message = $messageDetails;

            $suggestedValues = [
                'user_name' => $user->first_name . ' ' . $user->last_name,
                'message_body' => $message,
            ];

            $emailmessage = UserRepository::getReplacedEmailPlaceHolders(1, $suggestedValues);
            $message = ($emailmessage) ? $emailmessage : $message;
            
            $data = array(
                'body' => $message,
            );

            Mail::send('emails.custom_email', $data, function ($message) use ($user, $admin_email)
            {
                /* Config ********** */
                $to_email = $user->email;
                $to_name  = $user->first_name . ' ' . $user->last_name;
                $subject  = $user->first_name . ' ' . $user->last_name . " | " . env('APP_NAME') . " Subscription Plan Upgraded";
                $message->subject($subject);
                $message->from($admin_email, env('APP_NAME'));
                $message->to($to_email, $to_name);
            });

        }

        if ($settingData->live_pay_mode == 0) {
            DB::table('users')->where('id', $user->id)->update([
                'stripe_id' => null,
            ]);
        }

        return redirect()->route('frontend.user.dashboard')->withFlashSuccess('Thank you for subscribing, you can now use all features on the site!');
    }

    public function getFinalSearchAttributes($lookfor) {
        $finallook = [];
        $ignore = [
            '_token',
            'Submit Query',
            'Submit',
            'Search',
            'keywords',
            'loaction_key',
            'preferences',
            'latitude',
            'longitude',
        ];
        foreach ($lookfor as $key => $val) {
            if (in_array($key, $ignore)) continue;
            if (is_array($val) && !empty($val[0])) {
                $finallook[$key] = $val;
            } elseif (!is_array($val) && !empty($val) && $val !== null) {
                $finallook[$key] = $val;
            }
        }
        
        return $finallook;
    }

    public function getUsersFilledProfile($lookfor, $distUser) {
        $lookkeys = implode(',', array_keys($lookfor));
        $filter = ' AND ((';
        foreach ($lookfor as $key => $args) {
            if ($key == 'age') continue;
            $vals = [];
            if (is_array($args)) {
                foreach ($args  as $ag) {
                    $vals[] = addslashes($ag);
                }
            } else {
                $vals[] = addslashes($args);
            }
            if ($vals) {
                $filter .= " (up.option_name = '" . $key . "' AND up.option_value IN ('" . implode("','", $vals) . "')) OR ";
            }
        }

        $filter .= ' 2 < 3 ) OR up.multiple_options = 1 )';

        $sql = "SELECT u.id, up.multiple_options, up.option_name, IF(up.option_value = '', pv.option_value, up.option_value) as optiontxt FROM users u INNER JOIN user_profiles up ON u.id = up.user_id LEFT JOIN user_profile_option_values pv ON pv.profile_id = up.id WHERE u.id IN ('" . implode("','", $distUser) . "') AND up.prefrenceof = 'me' $filter";
        $distUser = [0];
        $userDistances = DB::select($sql);
        if ($userDistances) {
            foreach ($userDistances as $usr) {
                if ($usr->multiple_options) 
                    $distUser[$usr->id][$usr->multiple_options][$usr->option_name][] = $usr->optiontxt; 
                else 
                    $distUser[$usr->id][$usr->multiple_options][$usr->option_name] = $usr->optiontxt;
            }
        }

        return $distUser;
    }

    public function getUsersInRadious($lookfor, $userid) {
       
        $latitude = $lookfor['latitude'];
        $longitude = $lookfor['longitude']; 
        $filter = ' AND id <> ' . $userid;
        if (!empty($lookfor['keywords'])) {
            $keyword = $lookfor['keywords'];
            $filter .= " AND (first_name LIKE('%" . $keyword . "%')";
            $filter .= " OR last_name LIKE('%" . $keyword . "%')";
            $filter .= " OR email LIKE('%" . $keyword . "%')";
            $filter .= " OR phone LIKE('%" . $keyword . "%')";
            $filter .= " OR address LIKE('%" . $keyword . "%')";
            $filter .= " OR address_2 LIKE('%" . $keyword . "%')";
            $filter .= " OR city LIKE('%" . $keyword . "%')";
            $filter .= " OR state LIKE('%" . $keyword . "%')";
            $filter .= " OR country LIKE('%" . $keyword . "%')";
            $filter .= " OR zip LIKE('%" . $keyword . "%')";
            $filter .= " OR aboutme LIKE('%" . $keyword . "%'))";
        }
        if (isset($lookfor['age']) && !empty($lookfor['age'])) {
            //dd($lookfor['age']);
            $filter .= " AND age IN ('" . implode("','", $lookfor['age']) . "')";
            
        }

        $distUser = [0];
        if (!empty($latitude) && !empty($longitude)) {
           $sql = 'SELECT id, search_radius, (((acos(sin((' . $latitude . '*pi()/180)) * 
sin((latitude*pi()/180))+cos((' . $latitude . '*pi()/180)) * 
cos((latitude*pi()/180)) * cos(((' . $longitude . ' - longitude)* 
pi()/180))))*180/pi())*60*1.1515 ) AS distance FROM users WHERE status = 1 AND confirmed = 1 AND deleted_at IS NULL ' . $filter . ' HAVING distance < search_radius';
            $userDistances = DB::select($sql);

            if ($userDistances) {
                foreach ($userDistances as $usr) {
                    $distUser[] = $usr->id;
                }
            }
        }

        return $distUser;
    }


    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $user = \Auth::guard('user')->user();
        $userid = ($user) ? $user->id : 0;

        $inputs = $request->all();
        if (count($inputs) > 4 && $userid) {
            $userlooksfor = DB::table('user_looks_for')->where('user_id', $userid)->first();
            if ($userlooksfor) {
                DB::table('user_looks_for')
                ->where('user_id', $userid)
                ->update(['searchfor' => serialize($inputs)]);
            } else {
                DB::table('user_looks_for')->insert(
                    [
                        'user_id' => $userid,
                        'searchfor' => serialize($inputs),
                    ]
                );
            }
        }

        $preferences = Preference::where('is_active', 1)->get()->keyBy('id')->toArray();
        $prekeys = array_keys($preferences);
        $fieldtypes = DB::table('option_fields')->get()->keyBy('id')->toArray();
        $preferencesoption = Preferencesoption::where('status', 1)->wherein('preference_id', $prekeys)->get()->keyBy('id')->toArray();
        $optionkeys = array_keys($preferencesoption);
        $optionvalues = DB::table('preferences_options_values')->select('id', 'preferences_option_id', 'title')->wherein('preferences_option_id', $optionkeys)->get()->keyBy('id')->toArray();
        $lookfor = [];
        $searchfor = [];
        if ($userid) {
            $userlookfor = DB::table('user_looks_for')->where('user_id', $userid)->first();
            if (!empty($userlookfor->looksfor) || !empty($userlookfor->searchfor)) {
                $lookfor = ($userlookfor->searchfor) ? unserialize($userlookfor->searchfor) : unserialize($userlookfor->looksfor);
                $searchfor = ($userlookfor->searchfor) ? unserialize($userlookfor->searchfor) : [];
            }
        } else {
            $lookfor = $inputs;
        }

        if (isset($inputs['keywords'])) {
            $lookfor['keywords'] = $inputs['keywords'];
        };
        if (isset($inputs['loaction_key'])) {
            $lookfor['loaction_key'] = $inputs['loaction_key'];
        };

        if (empty($lookfor['latitude']) || empty($lookfor['longitude'])) {
            $lookfor['latitude'] = $user->latitude;
            $lookfor['longitude'] = $user->longitude;
        }

        $finallook = $this->getFinalSearchAttributes($lookfor);
        $distUser = $this->getUsersInRadious($lookfor, $userid);
        if ($finallook) {
            if ($distUser) {
                $OptionUsers = $this->getUsersFilledProfile($finallook, $distUser);
                $distUser = [];
                if ($OptionUsers) {
                    foreach ($OptionUsers as $uid => $values) {
                        $singleValues = [];
                        $multiValues = [];
                        if (isset($values[0])) $singleValues = $values[0];
                        if (isset($values[1])) $multiValues = $values[1];
                        $isvalid = 1;
                        foreach ($finallook as $key => $searchVal) {
                            if ($key == 'age') continue;
                            if (isset($singleValues[$key])) {
                                if (!in_array($singleValues[$key], $searchVal)) {
                                    $isvalid = 0;
                                }
                            }

                            if ($isvalid && isset($multiValues[$key])) {
                                $found = 0;
                                foreach ($multiValues[$key] as $txt) {
                                    if (in_array($txt, $searchVal)) {
                                        $found = 1;
                                    }
                                }
                                $isvalid = $found;
                            }
                        }

                        if ($isvalid) {
                            $distUser[] = $uid;
                        }
                    }
                }
            }
        }

       // dd($distUser);
        

        $searchSQL = DB::table('users')
            ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->leftjoin('user_profile_option_values', 'user_profiles.id', '=', 'user_profile_option_values.profile_id')
            ->wherein('users.id', $distUser);

        $searchResult = $searchSQL->select('users.*');

        //dd($searchSQL->toSQL());
        $result = [];
        $searchResult = $searchSQL->groupBy('users.id')->paginate(50);

        $flash_warning = '';
        if ($searchResult && !empty($searchResult->total())) {
            foreach ($searchResult as $row) {
                $result[] = [
                    'user' => $row,
                    'prefrences' => DB::table('user_profiles')->where('user_id', $row->id)->where('prefrenceof', 'me')->get()->keyBy('option_name')->toArray()
                ];
            }
        } elseif(!empty($finallook)) {
            $flash_warning = 'No matches found, according to your search criteria.';
        }

        $userRequestLogs = DB::table('requestlogs')->select('viewuserid','view_status')->where('userid', $userid)->where('contact_status', 1)->get()->keyBy('viewuserid')->toArray();
        $contactusers = array_keys($userRequestLogs);

        $userplans = UserRepository::getUserPlans();

        //dd($result);

        //->get()->keyBy('option_name')->toArray()
        //dd($finallook);
        return view('frontend.searchresults')->with([
            'title' => 'Search',
            'preferences' => $preferences,
            'preferencesoption' => $preferencesoption,
            'optionvalues' => $optionvalues,
            'fieldtypes' => $fieldtypes,
            'lookfor' => $lookfor,
            'result' => $result,
            'searchResult' => $searchResult,
            'userid' => $user,
            'contactusers' => $contactusers,
            'userRequestLogs' => $userRequestLogs,
            'userplans' => $userplans,
            'flash_warning' => $flash_warning,
            'finallook' => $finallook,
            'searchfor' => $searchfor,
        ]);
    }

}
