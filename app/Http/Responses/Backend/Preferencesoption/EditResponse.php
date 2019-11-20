<?php

namespace App\Http\Responses\Backend\Preferencesoption;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable {

    /**
     * @var App\Models\Preferencesoption\Preferencesoption
     */
    protected $preferencesoptions;
    protected $preference;
    protected $optionfields;
    protected $optionPreferenceValues;

    /**
     * @param App\Models\Preferencesoption\Preferencesoption $preferencesoptions
     */
    public function __construct($preferencesoptions, $preference, $optionfields, $optionPreferenceValues) {
        $this->preferencesoptions      = $preferencesoptions;
        $this->preference              = $preference;
        $this->optionfields            = $optionfields;
        $this->optionPreferenceValues = $optionPreferenceValues;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request) {
        return view('backend.preferencesoptions.edit')->with([
                    'preferencesoptions'     => $this->preferencesoptions,
                    'preference'             => $this->preference,
                    'optionfields'           => $this->optionfields,
                    'optionPreferenceValues' => $this->optionPreferenceValues
        ]);
    }

}
