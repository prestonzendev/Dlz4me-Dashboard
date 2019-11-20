<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User\User;
use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;
use Validator;

class ForgotPasswordController extends APIController
{
    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Send a reset link to the given user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $user = $this->repository->findByEmail($request->get('email'));


        if (!$user) {
            return $this->respondNotFound(trans('api.messages.forgot_password.validation.email_not_found'));
        }

        $token = $this->repository->saveToken();

        $count = \DB::table('password_resets')->where('email', $request->get('email'))->count();
        if ($count) {
            $record = \DB::table('password_resets')->where('email', $request->get('email'))->first();
            $lastTime = $record->created_at;
            $differenceTime = \Carbon\Carbon::now()->timestamp - strtotime($lastTime);
            if ($differenceTime < 60) {
                return $this->respond([
                    'status'    => 'ok',
                    'message'   => 'Please wait atleast for 60 seconds before sending the request.',
                ]);
            }
        }
        $user->notify(new UserNeedsPasswordReset($token));
        return $this->respond([
            'status'    => 'ok',
            'message'   => trans('api.messages.forgot_password.success'),
        ]);
    }
}
