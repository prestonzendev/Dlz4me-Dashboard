<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Exceptions\GeneralException;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;
use App\Models\Subscriptionplan\Subscriptionplan;
use App\Models\Settings\Setting;
use App\Models\Access\User\User;
use DB;
use Mail;

/**
 * Class UserContactController.
 */
class UserContactController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * UserContactController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function makecontactrequest(Request $request)
    {
        $user = access()->user();

        $inputs = $request->all();
        if(empty($inputs)) return redirect()->route('frontend.user.dashboard');

        $actid = decrypt($inputs['refid']);

        $act = explode('_', $actid);
        $id = $act[1];
        
        if ($id == 1) {
            throw new GeneralException('Invalid request, unable to proceed.');
        }
        
        $userinfo = $this->getUserInfo($id);

        $values = [
            'userid' => $user->id,
            'viewuserid' => $id,
            'view_status' => 1,
            'contact_status' => ($act[0] == 'view') ? 0 : 1,
        ];
        
        $this->insertIgnoreLogs('requestlogs', $values);

        $this->insertUserInbox($user, $id, $act, $userinfo);
        

        $updateSql = DB::table('requestlogs');

        $fields = [
            'view_status' => 1, 
            'updated_at' => date("Y-m-d h:i:s"),
        ];

        if ($act[0] == 'contact') {
            $fields['contact_status'] = 1;
        }

        if (isset($inputs['actfor'])) {
            if($inputs['actfor'] == 'Reject') {
                $fields['accept_status'] = 2;
            } elseif ($inputs['actfor'] == 'Accept') {

                $userplans = UserRepository::getUserPlans();
                if (!$userplans) {
                    return redirect()->route('frontend.user.subscription.plans')->withFlashDanger('Please upgrade your subscription plan to connect with any requested user.');
                }

                $fields['accept_status'] = 1;
            }
            $updateSql = $updateSql->where('userid', $id);
            $updateSql = $updateSql->where('viewuserid', $user->id);
        } else {
            $updateSql = $updateSql->where('userid', $user->id);
            $updateSql = $updateSql->where('viewuserid', $id);
        }

        $updateSql = $updateSql->update($fields);

        if ($act[0] == 'view') {

            if (isset($inputs['actfor'])) {
                if($inputs['actfor'] == 'Reject' || $inputs['actfor'] == 'Accept') {
                    $viewby = (isset($inputs['viewby'])) ? $inputs['viewby'] : 0;

                    $logs = $this->getRequestsReceived($user->id, 1, 0);
                    if (empty($logs->total())) {
                        return redirect()->route('frontend.user.dashboard')->withFlashSuccess('Contact request is ' . $inputs['actfor'] . 'ed');
                    } else {
                        return redirect()->route('frontend.user.mycontacts')->withFlashSuccess('Contact request is ' . $inputs['actfor'] . 'ed');
                    }
                }
            }

            $profile = UserRepository::getProfileDetails($id);
            $profile['title'] = 'View Profile';
            $profile['userinfo'] = $userinfo;

            return view('frontend.user.viewotherprofile')->with(
                $profile
            );

        } else {
            return response()->json([
                'success'=>true,
                'pid' => $id,
            ]);
        }
    }

    /**
     * @param $user, $id, $act, $userinfo
     *
     * @return mixed
     */
    function insertUserInbox($user, $id, $act, $userinfo) {

        $userplans = UserRepository::getUserPlans();
        if (!$userplans) return;
        $message = '';
        //$message = 'Hello ' . $userinfo->first_name . ' ' . $userinfo->last_name . ', <br />';
        if ($act[0] == 'contact') {
        $subject = $user->first_name . ' ' . $user->last_name . ' is sent a ' . $act[0] . ' request to you.';
        
        $message .= 'You have received a contact request from ' . $user->first_name . ' ' . $user->last_name . ' <br />';

        } else {
            $subject = $user->first_name . ' ' . $user->last_name . ' is ' . $act[0] . 'ed your profile.';

            $message .= 'Your profile has been viewed by ' . $user->first_name . ' ' . $user->last_name . '.<br />';
        }

        $suggestedValues = [
            'user_name' => $userinfo->first_name . ' ' . $userinfo->last_name,
            'message_body' => $message,
        ];

        $emailmessage = UserRepository::getReplacedEmailPlaceHolders(2, $suggestedValues);
        $message = ($emailmessage) ? $emailmessage : $message;


        $reqId = $this->getRequestsSent($user->id, $id);
        //dd($reqId);
        $values = [
            'sentbyuser' => $user->id,
            'userid' => $id,
            'requestid' => $reqId->id,
            'acttype' => $act[0],
            'subject' => $subject,
            'message' => $message,
        ];

        $this->insertIgnoreLogs('userinbox', $values);

        if ($act[0] == 'contact') {
            $settingData = Setting::first();
            $company_email = $settingData->company_email;

            $data = array(
                'body' => $message,
            );

            Mail::send('emails.custom_email', $data, function ($message) use ($userinfo, $company_email, $user, $act)
            {
                /* Config ********** */
                $to_email = $userinfo->email;
                $to_name  = $user->first_name . ' ' . $user->last_name;
                $subject  = env('APP_NAME') . " | " . $userinfo->first_name . " " . $userinfo->last_name . ", " . ucwords($act[0]) . 'ed your profile';
                $message->subject($subject);
                $message->from($company_email, env('APP_NAME'));
                $message->to($to_email, $to_name);
            });
        }

    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function insertIgnoreLogs($table, $array) {

        $userplans = UserRepository::getUserPlans();
        if (!$userplans) return;

        $array['created_at'] = date("Y-m-d h:i:s");
        $array['updated_at'] = date("Y-m-d h:i:s");

        DB::insert('INSERT IGNORE INTO ' . $table . ' ('.implode(',',array_keys($array)).
            ') values (?'.str_repeat(',?',count($array) - 1).')',array_values($array));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myinbox(Request $request) {

        $id = access()->id();

        $userplans = UserRepository::getUserPlans();
        if (!$userplans) {
            return redirect()->route('frontend.user.subscription.plans')->withFlashDanger('Please upgrade your subscription plan to access this feature.');
        }

        $inputs = $request->all();
        $viewby = (isset($inputs['viewby'])) ? $inputs['viewby'] : 0;

        if ($viewby) {
            $logs = $this->getUserInboxLogs($id, $id);
        } else {
            $logs = $this->getUserInboxLogs($id);
        }

        $flash_info = '';
        if (empty($logs)) {
            $flash_info = 'No messages';
        }

        $view = view('frontend.user.myinbox')->with(
            [
                'title' => 'Inbox',
                'logs' => $logs,
                'viewby' => $viewby,
                'flash_info' => $flash_info,
            ]
        );

        return $view;
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewlogs(Request $request) {
        
        $userplans = UserRepository::getUserPlans();
        if (!$userplans) {
            return redirect()->route('frontend.user.subscription.plans')->withFlashDanger('Please upgrade your subscription plan to access this feature.');
        }

        $id = access()->id();
        $userinfo = $this->getUserInfo($id);

        $inputs = $request->all();
        $viewby = (isset($inputs['viewby'])) ? $inputs['viewby'] : 0;

        if ($viewby) {
            $logs = $this->getRequestsSent($id);
        } else {
            $logs = $this->getRequestsReceived($id);
        }

        //dd($logs);

        $flash_info = '';
        if (empty($logs->total())) {
            $flash_info = 'No logs';
        }

        return view('frontend.user.viewlogs')->with(
            [
                'title' => 'View Logs',
                'userinfo' => $userinfo,
                'logs' => $logs,
                'viewby' => $viewby,
                'flash_info' => $flash_info,
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mymatches(Request $request) {
        
        $userplans = UserRepository::getUserPlans();
        if (!$userplans) {
            return redirect()->route('frontend.user.subscription.plans')->withFlashDanger('Please upgrade your subscription plan to access this feature.');
        }

        $id = access()->id();
        $logs = $this->getMatchedProfiles($id);

        $userUnseenChats = DB::table('chats')->where('receiver_id', $id)->where('seen', 0)->select('sender_id', DB::raw('count(*) as total'))->groupby('sender_id')->get()->keyBy('sender_id')->toArray();

        $flash_info = '';
        if (empty($logs)) {
            $flash_info = 'No matches found.';
        }

        return view('frontend.user.mycontacts')->with(
            [
                'title' => 'Matched Contacts',
                'logs' => $logs,
                'viewby' => 0,
                'flash_info' => $flash_info,
                'userUnseenChats' => $userUnseenChats,
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mypendingcontacts(Request $request) {
        
        $userplans = UserRepository::getUserPlans();
        if (!$userplans) {
            return redirect()->route('frontend.user.subscription.plans')->withFlashDanger('Please upgrade your subscription plan to access this feature.');
        }

        $id = access()->id();
        $inputs = $request->all();
        $viewby = (isset($inputs['viewby'])) ? $inputs['viewby'] : 0;

        if ($viewby) {
            $logs = $this->getRequestsSent($id, 0, 1, 2);
        } else {
            $logs = $this->getRequestsSent($id, 0, 1, 0);
        }
        $flash_info = '';
        if (empty($logs->total())) {
            $flash_info = 'No requests';
        }

        return view('frontend.user.mycontacts')->with(
            [
                'title' => 'Requests Sent',
                'logs' => $logs,
                'viewby' => $viewby,
                'flash_info' => $flash_info,
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mycontacts(Request $request) {
        
        $userplans = UserRepository::getUserPlans();
        if (!$userplans) {
            return redirect()->route('frontend.user.subscription.plans')->withFlashDanger('Please upgrade your subscription plan to access this feature.');
        }
        
        $id = access()->id();
        $inputs = $request->all();
        $viewby = (isset($inputs['viewby'])) ? $inputs['viewby'] : 0;

        if ($viewby) {
            $logs = $this->getRequestsReceived($id, 1, 2);
        } else {
            $logs = $this->getRequestsReceived($id, 1, 0);
        }

        $flash_info = '';
        if (empty($logs->total())) {
            $flash_info = 'No requests';
        }
        
        //dd($inputs);
        return view('frontend.user.mycontacts')->with(
            [
                'title' => 'Requests Received',
                'logs' => $logs,
                'currentuser' => $id,
                'viewby' => $viewby,
                'flash_info' => $flash_info,
            ]
        );
    }

    /**
     * @param $id
     *
     * @return Mixed
     */
    protected function getRequestsSent($id, $viewid = 0, $contact = 0, $accepted = 0) {
        $query = DB::table('users')
            ->join('requestlogs', 'users.id', '=', 'requestlogs.viewuserid')
            ->where('requestlogs.userid', $id)
            ->select('users.id as uid', 'users.first_name', 'users.last_name', 'users.accountname', 'users.city', 'users.state', 'users.profilepic', 'users.picapproved', 'requestlogs.id as reqid', 'requestlogs.*');
        if ($contact) {
            $query = $query->where('requestlogs.contact_status', 1);
            $query = $query->where('requestlogs.accept_status', $accepted);
        }
        if ($viewid) {
            return $query->where('requestlogs.viewuserid', $viewid)->first();
        } elseif ($accepted == 1) {
            return $query;
        } else {
            return $query->paginate(50);
        }
    }

    /**
     * @param $id
     *
     * @return Mixed
     */
    protected function getRequestsReceived($id, $contact = 0, $accepted = 0) {
        $query = DB::table('users')
            ->join('requestlogs', 'users.id', '=', 'requestlogs.userid')
            ->where('requestlogs.viewuserid', $id)
            ->where('users.status', 1)
            ->where('users.confirmed', 1)
            ->whereNull('users.deleted_at')
            ->select('users.id as uid', 'users.first_name', 'users.last_name', 'users.accountname', 'users.city', 'users.state', 'users.profilepic', 'users.picapproved', 'requestlogs.id as reqid', 'requestlogs.*');
            if ($contact) {
                $query = $query->where('requestlogs.contact_status', 1);
                $query = $query->where('requestlogs.accept_status', $accepted);
            }

            if ($accepted == 1) {
                return $query;
            } else {
                return $query->paginate(50);
            }
    }

    /**
     * @param $id
     *
     * @return Mixed
     */
    protected function getUserInfo($id) {
        return DB::table('users')
            ->where('users.status', 1)
            ->where('users.confirmed', 1)
            ->where('users.id', $id)->first();
    }

    protected function getMatchedProfiles($id) {
        return DB::select("(
            SELECT users.id as uid, users.first_name, users.last_name, users.accountname, users.city, users.state, users.profilepic, users.picapproved, requestlogs.id as reqid, requestlogs.* FROM users INNER JOIN requestlogs ON users.id = requestlogs.viewuserid WHERE users.status = 1 AND users.confirmed = 1 AND users.deleted_at IS NULL AND requestlogs.contact_status = 1 AND requestlogs.accept_status = 1 AND requestlogs.userid = '" . $id . "'
            ) UNION (
                SELECT users.id as uid, users.first_name, users.last_name, users.accountname, users.city, users.state, users.profilepic, users.picapproved, requestlogs.id as reqid, requestlogs.* FROM users INNER JOIN requestlogs ON users.id = requestlogs.userid WHERE users.status = 1 AND users.confirmed = 1 AND users.deleted_at IS NULL AND requestlogs.contact_status = 1 AND requestlogs.accept_status = 1 AND requestlogs.viewuserid = '" . $id . "'
            ) ORDER BY reqid");

    }

    protected function getUserInboxLogs($id, $sentby = 0) {
        
        $query = "SELECT users.id as uid, users.first_name, users.last_name, users.accountname, users.city, users.state, users.profilepic, users.picapproved, userinbox.id as reqid, userinbox.* FROM users INNER JOIN userinbox ON users.id = userinbox.sentbyuser WHERE users.status = 1 AND users.confirmed = 1 AND deleted_at IS NULL AND userinbox.userid = '" . $id . "' ORDER BY reqid DESC";
        if ($sentby) {
            $query = "SELECT users.id as uid, users.first_name, users.last_name, users.accountname, users.city, users.state, users.profilepic, users.picapproved, userinbox.id as reqid, userinbox.* FROM users INNER JOIN userinbox ON users.id = userinbox.userid WHERE users.status = 1 AND users.confirmed = 1 AND users.deleted_at IS NULL AND userinbox.sentbyuser = '" . $sentby . "' ORDER BY reqid DESC";
        }

        return DB::select($query);

    }


    public function getchatconversations(Request $request) {

        $sender_id = $request->input('LoggedUserId', false);
        $receiver_id = $request->input('receiver_id', false);
        
        $chats = DB::table('chats');
        $chats->wherein('sender_id', [$receiver_id, $sender_id])
                ->wherein('receiver_id', [$receiver_id, $sender_id]);

        $updateSql = $chats->update(['seen'=>1]);
        $getMessages = $chats->get();

        $totalMessages = count($getMessages);


        $otherUserId = $receiver_id;
        $otherUser = User::find($otherUserId);
        $users = DB::table('users')->wherein('id', [$receiver_id, $sender_id])->get()->keyBy('id')->toArray();

        $response_array = [
                            'user_id' => $sender_id,
                            'otherUser_id' => $otherUserId,
                            'chattingData' => $getMessages,
                            'totalMessages' => $totalMessages,
                            'users' => $users,
                        ];

        return response()->view('frontend.user.chatconversations', $response_array, 200);
    }

    public function loadmoremessages(Request $request) {
        // dd($request->all());
    }

    public function seenmessages(Request $request) {
        $sender_id = $request->input('sender_id', false);
        $receiver_id = $request->input('receiver_id', false);
        $message = $request->input('message', false);

        $chats = DB::table('chats')
            ->where('sender_id', $sender_id)
            ->where('receiver_id', $receiver_id);

        $getMessage = $chats->orderby('id', 'DESC')->first();
        if(!empty($getMessage->id)) {
            $chats->where('id', $getMessage->id)->update(['seen'=>1]);
            $result = ['status'=>'success'];
        } else {
            $result = ['status'=>'error'];
        }

        echo json_encode($result);
    }


    public function convertemoji(Request $request) {
        $sender_id = $request->input('sender', false);
        $emojimsg = $request->input('emojimsg', false);

        $upic = DB::table('users')->where('id', $sender_id)->select('profilepic')->first();
        $profilepic = (!empty($upic->profilepic)) ? env('IMG_URL') . '/storage/app/public/img/profilepic/' . $upic->profilepic : url('images/placeholder-img.jpg');

        $result = [
            'status'=>'success',
            'emojimsg' => \LaravelEmojiOne::toShort($emojimsg),
            'userpic' => $profilepic
        ];

        $return = json_encode($result);

        dd($return);

        echo json_encode($result);
    }

    public function checkUserPlans() {
        $userplans = UserRepository::getUserPlans();
        if (!$userplans) {
            return redirect()->route('frontend.user.subscription.plans')->withFlashDanger('Please upgrade your subscription plan to access this feature.');
        }
    }

}
