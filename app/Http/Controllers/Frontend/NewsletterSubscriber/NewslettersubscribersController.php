<?php

namespace App\Http\Controllers\Frontend\NewsletterSubscriber;

use App\Models\NewsletterSubscriber\Newslettersubscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Exceptions\GeneralException;

/**
 * NewslettersubscribersController
 */
class NewslettersubscribersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @return \App\Http\Responses\RedirectResponse
     */

    public function store(Request $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $input['status'] = 1;
        $check_existence = Newslettersubscriber::where('email', $input['email'])->first();
        if ($check_existence) {
            throw new GeneralException('You are already subscribed!');
        } else {
            if (Newslettersubscriber::create($input)) {
                return redirect()->back()->withFlashSuccess('You are successfully subscribed for our newsletter');
            } else {
                throw new GeneralException('Something went wrong!');
            }
        }
    }
}
