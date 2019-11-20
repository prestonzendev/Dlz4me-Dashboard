<?php

namespace App\Http\Responses\Backend\TermsAndCondition;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    public function __construct($policy_types)
    {
        $this->policy_types = $policy_types;
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
        return view('backend.termandconditions.create')->with([
                    'status' => $this->status,
                    'policy_types' => $this->policy_types
        ]);
    }
}
