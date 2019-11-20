<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Traits\SendCreatePasswordMail;
use App\Models\User\User;
use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;
use Validator;

use App\Exceptions\GeneralException;

/**
 * Class ForgotPasswordController.
 */
class CreatePasswordController extends Controller
{
    use SendCreatePasswordMail;
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
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('frontend.auth.passwords.email')->with([
                'title' => 'Forgot Password',
            ]);
    }
}
