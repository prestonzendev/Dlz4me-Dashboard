<?php

namespace App\Http\Responses\Backend\Faqcategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Faqcategory\Faqcategory
     */
    protected $faqcategories;
    protected $status;

    /**
     * @param App\Models\Faqcategory\Faqcategory $faqcategories
     */
    public function __construct($faqcategories, $status)
    {
        $this->faqcategories = $faqcategories;
        $this->status  = $status;
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
        $entry = \DB::table('faqcategories')->find($this->faqcategories->id);
        $status = $entry->status;

        return view('backend.faqcategories.edit')->with([
            'faqcategories' => $this->faqcategories,
            'status' => $status
        ]);
    }
}