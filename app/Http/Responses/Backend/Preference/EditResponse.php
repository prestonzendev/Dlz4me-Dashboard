<?php

namespace App\Http\Responses\Backend\Preference;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Preference\Preference
     */
    protected $preferences;

    /**
     * @param App\Models\Preference\Preference $preferences
     */
    public function __construct($preferences)
    {
        $this->preferences = $preferences;
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
        return view('backend.preferences.edit')->with([
            'preferences' => $this->preferences
        ]);
    }
}