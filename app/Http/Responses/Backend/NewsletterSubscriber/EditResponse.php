<?php

namespace App\Http\Responses\Backend\NewsletterSubscriber;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\NewsletterSubscriber\Newslettersubscriber
     */
    protected $newslettersubscribers;

    /**
     * @param App\Models\NewsletterSubscriber\Newslettersubscriber $newslettersubscribers
     */
    public function __construct($newslettersubscribers)
    {
        $this->newslettersubscribers = $newslettersubscribers;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.newslettersubscribers.edit')->with([
            'newslettersubscribers' => $this->newslettersubscribers
        ]);
    }
}