<?php

namespace App\Http\Responses\Backend\Enquiry;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Enquiry\Enquiry
     */
    protected $enquiries;

    /**
     * @param App\Models\Enquiry\Enquiry $enquiries
     */
    public function __construct($enquiries)
    {
        $this->enquiries = $enquiries;
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
        return view('backend.enquiries.edit')->with([
            'enquiries' => $this->enquiries
        ]);
    }
}