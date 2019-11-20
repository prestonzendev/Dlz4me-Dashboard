<?php

namespace App\Http\Responses\Backend\Service;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $status;
    protected $serviceCategories;
    protected $vendors;

    public function __construct($status, $is_featured, $serviceCategories, $vendors)
    {
        $this->status            = $status;
        $this->is_featured       = $is_featured;
        $this->serviceCategories = $serviceCategories;
        $this->vendors           = $vendors;
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
        return view('backend.services.create')->with([
                    'serviceCategories' => $this->serviceCategories,
                    'vendors'           => $this->vendors,
                    'status'            => $this->status,
        ]);
    }
}
