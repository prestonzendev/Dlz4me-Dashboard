<?php

namespace App\Http\Responses\Backend\ServiceCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ServiceCategory\Servicecategory
     */
    protected $servicecategories;
    protected $status;

    /**
     * @param App\Models\ServiceCategory\Servicecategory $servicecategories
     */
    public function __construct($servicecategory, $status)
    {
        $this->servicecategory = $servicecategory;
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
        $entry = \DB::table('service_categories')->find($this->servicecategory->id);
        $status = $entry->status;
        return view('backend.servicecategories.edit')->with([
            'servicecategory' => $this->servicecategory,
            'status' => $status
        ]);
    }
}
