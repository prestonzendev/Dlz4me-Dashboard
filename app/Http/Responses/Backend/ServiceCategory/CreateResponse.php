<?php

namespace App\Http\Responses\Backend\ServiceCategory;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
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
        return view('backend.servicecategories.create')->with([
                    'status'            => $this->status,
        ]);
    }
}
