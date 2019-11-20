<?php
namespace App\Http\Controllers\Api;
use App;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Models\Api\User; 
use App\Models\Access\User\SocialLogin;
use App\Models\Api\Referral;
use App\Models\Service\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Validator;
use App\Models\Access\Role\Role;
use App\Notifications\Api\SignupActivate;
use GuzzleHttp\Exception\GuzzleException;
//use GuzzleHttp\Client;
use App\Classes\SmsClass;
use App\Http\Controllers\Api\PasswordResetController;


use stdClass;
use Hash;

class UserController extends Controller 
{
public $successStatus = 200;
 public $paginate_no = 10;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $credentials = request(['email', 'password']);
        $credentials['confirmed'] = 1;
        $credentials['status'] = 1;
        $credentials['deleted_at'] = null;

        if(!Auth::attempt($credentials)) {
            $response['status'] = false;
            $response['message'] = 'Email or Password Incorrect';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        //logged in user details
        $user = Auth::user();
        $user_role = $user->roles->first()->id;
        if($user_role!=3) {
            $response['status'] = false;
            $response['message'] = 'You are not user.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        //$user = $request->user();
        $success['status'] = true;
        $success['message'] = 'You have logged in successfully.';
        $success['code'] = 200;
        $success['data'] = $user->toArray();
        $success['data']['account_type_id'] = $user_role;
        $success['data']['token'] =  $user->createToken('MyApp')-> accessToken;
        //return response()->json(['success' => $success], $this-> successStatus);
        return response()->json($success, $this-> successStatus); 
    }

    public function socialLogin(Request $request){


        $user = null;
        $validator = Validator::make($request->all(), [ 
            'email'         =>  'required|string',
            'account'       =>  'required|string',
            'provider'      =>  'required|string',
            'provider_id'   =>  'required|string'
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }

        $user = User::where('email', $request->email)->first();
        $data = getRandomString(6);
        if (!$user) {
            $user = User::create([
                'accountname' => $request->account,
                'email' => $request->email,
                'referral_code' => $data
            ]);
            $userid = $user->id;
            $get_Role = Role::findOrFail(3);
            $user->attachRole($get_Role);
            SocialLogin::create([
                'provider' => $request->provider,
                'provider_id' => $request->provider_id,
                'user_id'   => $userid
            ]);
        } else {
            $userid = $user->id;
            $provider = SocialLogin::where(['user_id'=>$userid, 'provider_id'=>$request->provider_id])->first();
            if(!$provider) {
                SocialLogin::create([
                'provider' => $request->provider,
                'provider_id' => $request->provider_id,
                'user_id'   => $userid
                ]);
            }
        }

        $user_role = DB::table('role_user')->where('user_id', $user->id)->first();
        $role_id = $user_role->role_id;
        $success['status'] = true;
        $success['message'] = 'You have logged in successfully.';
        $success['code'] = 200;
        $success['data'] = $user->toArray();
        $success['data']['account_type_id'] = $role_id;
        $success['data']['token'] =  $user->createToken('MyApp')-> accessToken;
        //return response()->json(['success' => $success], $this-> successStatus);
        return response()->json($success, $this-> successStatus); 
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    {
        $validator = Validator::make($request->all(), [ 
            'first_name' => 'required',
            'last_name' => 'required', 
            'email' => 'required|email',
            'mobile' => 'required',            
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }
        $input = $request->all();
        if ($this->findByEmail($input['email'])) {
            $response['status'] = false;
            $response['message'] = 'Email already exists.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);
        }
        
        /*if ($this->findByMobile($input['mobile'])) {
            $response['status'] = false;
            $response['message'] = 'Mobile Number already Exists.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);
        }*/
        
        $email_code = mt_rand(100000,999999);
        $mobile_code = mt_rand(100000,999999);
        $input['password'] = bcrypt($input['password']);
        $data = [];
        $data['first_name'] = $input['first_name'];
        $data['last_name'] = $input['last_name'];
        $data['accountname'] = $input['first_name'].'_'.$input['last_name'];
        $data['email'] = $input['email'];
        $data['password'] = $input['password'];
        $data['phone'] = $input['mobile'];
        $data['role'] = 3;
        $data['confirmation_code'] = $email_code;
        $data['mobile_code'] = $mobile_code;
        $data['referral_code'] = getRandomString(6);
        $data['refer_by'] = isset($input['refer_code'])? $input['refer_code'] : '' ;
        //dd($data);

        //Mobile OTP
        // $SmsClass = new SmsClass();
        // $sendSms = $SmsClass->sendSms($data);
        // // return response()->json($sendSms);
        // //$sendSms = $this->sendSms($data);
        // if($sendSms=='error') {
        //     $response['status'] = false;
        //     $response['message'] = 'Invalid Mobile Number.';
        //     $response['code'] = 200;
        //     $response['data'] = new stdClass;
        //     return response()->json($response);
        // }


        $user = User::create($data);
        
        $user->notify(new SignupActivate($user));

        if($user) {
            $get_Role = Role::findOrFail($data['role']);
            $user->attachRole($get_Role);

            $success['status'] = true;
            $success['message'] = 'You are registered successfully. Confirmation OTP has been sent to your email.';
            $success['code'] = 200;
            $success['data'] = $user->toArray();
            $success['data']['token'] =  $user->createToken('MyApp')-> accessToken;
        } else {
            $success['status'] = false;
            $success['message'] = 'Error in registration.';
            $success['code'] = 200;
            $success['data'] = new stdClass;
        }
        return response()->json($success, $this-> successStatus);
        //$success['name'] =  $user->name;
        //return response()->json(['success'=>$success], $this-> successStatus); 
    }
    public function findByEmail($email)
    {
        return DB::table('users')->where('email', $email)->first();
    }
    public function findByMobile($mobile)
    {
        return DB::table('users')->where('phone', $mobile)->first();
    }

    public function checkEmail(Request $request) {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'mobile' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all();
        $users = DB::table('users')
                    ->where('email', $input['email'])
                    ->orWhere('phone', $input['mobile'])
                    ->get();
        if(count($users)>0) {
            $success['status'] = false;
            $success['message'] = 'Email or Mobile already exists.';
            $success['code'] = 200;
            $success['data'] = new stdClass;
            return response()->json($success);
        } else {
            $success['status'] = true;
            $success['message'] = 'Email or Mobile not found.';
            $success['code'] = 200;
            $success['data'] = new stdClass;
            return response()->json($success);
        }
    }

    /*public function checkReferral($referral)
    {
        if(settings()->referral_amt && settings()->referral_status==1) {

        }
    }*/

    public function registerResendOtp(Request $request) {
        $input['email'] = $request->email;
        // $input['phone'] = $request->mobile;
        $input['email_code'] = rand(1, 1000000);
        // $input['mobile_code'] = rand(1, 1000000);
        // $mobile_otp = '';
        $email_otp = '';

        $user = User::where(['email'=>$input['email']])->first();

        if(!$user) {
            $response['status'] = false;
            $response['message'] = 'Invalid Mobile number or email address.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);
        }
        //update mobile and confirmation code
            User::where( ['email'=>$input['email'] ])
                      ->update(['confirmation_code' => $input['email_code'] 
                        ]);
            // $user = User::where(['email'=>$input['email']])->first();
            //email OTP
            $email_otp = $user->notify(new SignupActivate($user));

        if($user) {
            $response['status'] = true;
            $response['message'] = 'Resend OTP successfully.';
            $response['code'] = 200;
            $response['data'] = $user->toArray();
            return response()->json($response);
        }
    }

    public function registerActivate(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
            // 'mobile_otp' => 'required|string'
        ]);

        // $user = User::where(['confirmation_code'=>$request->otp, 'mobile_code'=>$request->mobile_otp])->first();
        $user = User::where(['confirmation_code'=>$request->otp])->first();
        if (!$user) {
            $response['status'] = false;
            $response['message'] = 'Invalid OTP.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);
        }
        $user->confirmed = true;
        $user->save();
        $referral = User::where('referral_code', $user->refer_by)->first();
        if($referral) {
            $amt = settings()->referral_amt;
            Referral::create(['amt' => $amt, 'user_id' => $referral->id, 'refer_to'=>$user->id]);
        }
        //$user->confirmation_code = '';
        /*$referral_data = [];
        $referral_data['code'] = getRandomString(6);
        $referral_data['user_id'] = $user->id;
        $referral = Referral::create($referral_data);*/
        $response['status'] = true;
        $response['message'] = 'Account confirmation successfully.';
        $response['code'] = 200;
        $response['data'] = new stdClass;
        return response()->json($response);
    }

    public function applyReferral(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $referral = Referral::where('code', $request->code)->first();
        if (!$referral) {
            $response['status'] = false;
            $response['message'] = 'Invalid referral code.';
            $response['code'] = 200;
            $response['data'] = [];
            return response()->json($response);
        }
        $amt = settings()->referral_amt;
        $user_id = $referral->user_id;
        Wallet::create(['offer_amount' => $amt, 'user_id' => $user_id]);

        $response['status'] = true;
        $response['message'] = 'Success.';
        $response['code'] = 200;
        $response['data'] = new stdClass;
        return response()->json($response);
    }

    public function profileUpdate(Request $request) 
    {
        $user = Auth::user();

        $user_role = $user->roles->first()->id;
        if($user_role!=3) {
            $response['status'] = false;
            $response['message'] = 'You are not user.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        $validator = Validator::make($request->all(), [ 
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = $validator->errors();
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }
        $input = $request->all();
        $data = [];
        $data['first_name'] = $input['first_name'];
        $data['last_name'] = $input['last_name'];
        //$data['accountname'] = $input['username'];
        /*$data['dob'] = $input['dob'];
        $data['gender'] = $input['gender'];*/
        $data['phone'] = $input['mobile'];
        //dd($data);
        $user->update($data);

        if($user) {
            $user_data = [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'gender' => $user->gender,
                'mobile' => $user->phone
            ];
            $response['status'] = true;
            $response['message'] = 'Your profile has been successfully Updated.';
            $response['code'] = 200;
            $response['data'] = $user_data;
            $response['data']['token'] =  $user->createToken('MyApp')-> accessToken;
        } else {
            $response['status'] = false;
            $response['message'] = 'Error in update profile.';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus);
    }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function getProfile(Request $request) 
    {
        $response['status'] = true;
        $response['message'] = 'Record has found.';
        $response['code'] = 200;
        $response['data'] = $request->user();
        return response()->json($response, $this-> successStatus);
    }

    public function getVendors(Request $request){
        $name = $request->name;
        $offer_type = $request->offer_type;
        $users = User::whereHas('roles', function ($query) {
            $query->addSelect('users.id');
            $query->where('name', '=', 'Vendor');
        });
        $users->with(['services'=> function($q) use($offer_type){
                     if ($offer_type!='') {
                        $q->where('offer_type','=',$offer_type);
                     }
                     return $q;
                }]);
      //$users->with('service')->orderBy('is_featured','desc');  
        $users->leftJoin('services', 'users.id', '=', 'services.vendor_id');
        $users->select('users.*');
        if ($request->lat!='' && $request->long!='') {
            $lat = $request->lat;
            $lon = $request->long;
            $users->select('users.*', DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                    * cos(radians(users.latitude)) 
                    * cos(radians(users.longitude) - radians(" . $lon . ")) 
                    + sin(radians(" .$lat. ")) 
                    * sin(radians(users.latitude))) AS distance"))
                ->having('distance','<=',5);

        }
        if ($name!='') {
            $users->where('accountname','LIKE','%'.$name.'%');
        }
        $users->where(['users.status'=>1, 'users.confirmed'=>1]);
        $users->groupBy('users.id');
        $users->orderBy('services.is_featured','desc');
       
        
        $users = $users->limit('20')->get();
        if($users->count() >0) {
            $response['status'] = true;
            $response['message'] = 'Record has found';
            $response['code'] = 200;
            $response['data']['total'] = $users->count();
            $response['data']['data']= $users->toArray();
        } else {
            $response['status'] = false;
            $response['message'] = 'No Record found';
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }
        return response()->json($response, $this-> successStatus); 
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'new_confirm_password' => 'required|same:new_password'
        ]);

        $current_password = Auth::User()->password;

        if (Hash::check($request->current_password, $current_password)) {
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request->new_password);;
            $obj_user->save();

            $response['status'] = true;
            $response['message'] = "Password changed successfully.";
            $response['code'] = 200;
            $response['data'] = new stdClass;            
        } else {
            $response['status'] = false;
            $response['message'] = "Incorrect Current Password.";
            $response['code'] = 200;
            $response['data'] = new stdClass;
        }     
        return response()->json($response);
    }

    public function getReferCode() {
        $user_id = Auth::User()->id;
        $User = User::where('id', '=', $user_id)->first();


        if($User->count()>0 && settings()->referral_status==1) {
            $referData['refer_code'] = $User->referral_code;
            $referData['refer_amt'] = settings()->referral_amt;
            $response['status'] = true;
            $response['message'] = 'Success.';
            $response['code'] = 200;
            $response['data'] = $referData;
        } else {
            $response['status'] = false;
            $response['message'] = 'Error.';
            $response['code'] = 200;
            $response['data'] = [];
        }
        return response()->json($response, $this-> successStatus); 
    }
}