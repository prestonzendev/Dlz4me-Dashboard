<?php

namespace App\Http\Responses\Backend\Subscriptionplan;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Subscriptionplan\Subscriptionplan
     */
    protected $subscriptionplans;
    protected $planFeaturesValues;

    /**
     * @param App\Models\Subscriptionplan\Subscriptionplan $subscriptionplans
     */
    public function __construct($subscriptionplans,$planFeaturesValues)
    {
        $this->subscriptionplans = $subscriptionplans;
        $this->planFeaturesValues = $planFeaturesValues;
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
        return view('backend.subscriptionplans.edit')->with([
            'subscriptionplans' => $this->subscriptionplans,
            'planFeaturesValues' => $this->planFeaturesValues
        ]);
    }
}