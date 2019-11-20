<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.account');
    }

    public function changePasswordPage()
    {
        return view('frontend.user.account.change-password')->with(
        	[
        		'title' => 'Change Password',
        	]
        );
    }
}
