<?php

namespace App\Http\Responses\Backend\Preferencesoption;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable {

    protected $preference;
    protected $optionfields;

    public function __construct($layout,$preference, $optionfields) {
      
        $this->preference         = $preference;
        $this->optionfields       = $optionfields;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request) {

        //$preference = [''=>'Select Preference'] + Preference::where(['is_active' =>1 , 'is_deleted' => 0])->pluck('title','id')->all();
        //$optionfields = [''=>'Select Option Type'] + OptionField::Pluck('name','id')->all();

        return view('backend.preferencesoptions.create')->with(['preference' => $this->preference, 'optionfields' => $this->optionfields]);
    }

}
