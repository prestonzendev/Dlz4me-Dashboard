<?php

namespace App\Http\Controllers\Frontend\TermsAndConditions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Exceptions\GeneralException;

/**
 * NewslettersubscribersController
 */
class TermsandconditionsController extends Controller
{

    /**
     * show terms page.
     */
    public function showUserAgreement(Request $request)
    {
        if (!$request->session()->get('acceptance')) {
            return view('frontend.terms');
        } else {
            return redirect('/');
        }
    }

    /**
     * accept terms of service.
     */
    public function acceptUserAgreement(Request $request)
    {
        if ($request->acceptance) {
            session(['acceptance' => true]);
            return redirect('/');
        } else {
            return view('frontend.terms');
        }
    }
    
    /**
     * deny terms of service.
     */
    public function denyUserAgreement(Request $request)
    {
        abort(403, 'You are not allowed to access this Website!');
    }

}
