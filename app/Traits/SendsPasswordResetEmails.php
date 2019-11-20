<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\Access\User\User;
use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Exceptions\GeneralException;

trait SendsPasswordResetEmails
{

public function __construct(UserRepository $repository)
{
$this->repository = $repository;
}

/**
* Display the form to request a password reset link.
*
* @return \Illuminate\Http\Response
*/
public function showLinkRequestForm()
{
return view('auth.passwords.email');
}

/**
* Send a reset link to the given user.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
*/
public function sendResetLinkEmail(Request $request)
{
$this->validateEmail($request);

$user = $this->repository->findByEmail($request->get('email'));


if (!$user) {
throw new GeneralException(trans('api.messages.forgot_password.validation.email_not_found'));
} else if ($user->confirmed != 1) {
throw new GeneralException('Your email address is not yet verified!');
}

$count = \DB::table('password_resets')->where('email', $request->get('email'))->count();
if ($count) {
$record = \DB::table('password_resets')->where('email', $request->get('email'))->first();
$lastTime = $record->created_at;
$differenceTime = \Carbon\Carbon::now()->timestamp - strtotime($lastTime);
if ($differenceTime < 60) {
throw new GeneralException('Please wait atleast for 60 seconds before sending the request.');
}
}
$token = $this->repository->saveToken();
//$user->notify(new UserNeedsPasswordReset($token));

// We will send the password reset link to this user. Once we have attempted
// to send the link, we will examine the response then see the message we
// need to show to the user. Finally, we'll send out a proper response.
$response = $this->broker()->sendResetLink(
$request->only('email')
);

return $response == Password::RESET_LINK_SENT ? $this->sendResetLinkResponse($request, $response) : $this->sendResetLinkFailedResponse($request, $response);
}

/**
* Validate the email for the given request.
*
* @param \Illuminate\Http\Request $request
* @return void
*/
protected function validateEmail(Request $request)
{
$this->validate($request, ['email' => 'required|email']);
}

/**
* Get the response for a successful password reset link.
*
* @param \Illuminate\Http\Request $request
* @param string $response
* @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
*/
protected function sendResetLinkResponse(Request $request, $response)
{
$admin = User::find(1);
if ($request->email == $admin->email) {
return redirect(url('admin/login'))->withFlashSuccess(trans($response));
} else {
return redirect(url('login'))->withFlashSuccess(trans($response));
}
}

/**
* Get the response for a failed password reset link.
*
* @param \Illuminate\Http\Request $request
* @param string $response
* @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
*/
protected function sendResetLinkFailedResponse(Request $request, $response)
{
return back()
->withInput($request->only('email'))
->withErrors(['email' => trans($response)]);
}

/**
* Get the broker to be used during password reset.
*
* @return \Illuminate\Contracts\Auth\PasswordBroker
*/
public function broker()
{
return Password::broker();
}

}