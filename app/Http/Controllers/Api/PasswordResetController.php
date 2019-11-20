<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\Api\PasswordResetRequest;
use App\Notifications\Api\PasswordResetSuccess;
use App\Models\Access\User\User;
use App\Models\Api\PasswordReset;
use Validator;

use stdClass;
class PasswordResetController extends Controller
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|string|email',
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = "The email field is required.";
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $response['status'] = false;
            $response['message'] = "We can't find a user with that e-mail address.";
            $response['code'] = 500;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => rand(1, 1000000),
             ]
        );

        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );

        $response['status'] = true;
        $response['message'] = "We have e-mailed you OTP for password reset!";
        $response['code'] = 200;
        $response['data'] = new stdClass;
        return response()->json($response);
    }

    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();

        if (!$passwordReset) {
            $response['status'] = false;
            $response['message'] = "This password reset token is invalid.";
            $response['code'] = 500;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            $response['status'] = false;
            $response['message'] = "This password reset token is invalid.";
            $response['code'] = 500;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        $success['status'] = true;
        $success['message'] = 'This password reset token is valid.';
        $success['code'] = 200;
        $success['data'] = $passwordReset;
        return response()->json($success);
    }

    public function checkOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'otp' => 'required|string',
        ]);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = "The otp field is required.";
            $response['code'] = 200;
            $response['data'] = new stdClass;
            return response()->json($response);            
        }
        $passwordReset = PasswordReset::where('token', $request->otp)
            ->first();

        if (!$passwordReset) {
            $response['status'] = false;
            $response['message'] = "OTP is invalid.";
            $response['code'] = 500;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(10)->isPast()) {
            $passwordReset->delete();
            $response['status'] = false;
            $response['message'] = "OTP is invalid.";
            $response['code'] = 500;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        $success['status'] = true;
        $success['message'] = 'OTP is valid.';
        $success['code'] = 200;
        $success['data'] = $passwordReset;
        return response()->json($success);
    }

     /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed'
        ]);

        $passwordReset = PasswordReset::where([
            ['email', $request->email]
        ])->first();

        /*if (!$passwordReset) {
            $response['status'] = false;
            $response['message'] = "This password reset OTP is invalid.";
            $response['code'] = 500;
            $response['data'] = new stdClass;
            return response()->json($response);
        }*/

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            $response['status'] = false;
            $response['message'] = "We can't find a user with that e-mail address.";
            $response['code'] = 500;
            $response['data'] = new stdClass;
            return response()->json($response);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        $passwordReset->delete();

        $user->notify(new PasswordResetSuccess($passwordReset));

        $success['status'] = true;
        $success['message'] = 'Password reset successfully.';
        $success['code'] = 200;
        $success['data'] = new stdClass;
        //$success['data'] = $user;
        return response()->json($success);
    }

    public function resendOtp($data)
    {
        $email = $data['email'];
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $email],
            [
                'email' => $email,
                'token' => rand(1, 1000000),
             ]
        );
        $user = User::where('email', $request->email)->first();

        return 'success';
    }
}

