<?php

namespace App\Http\Responses\Backend\MembershipDetail;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    public function __construct($memberships)
    {
        $this->memberships = $memberships;
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
        return view('backend.membershipdetails.create')->with([
                    'status' => $this->status,
                    'memberships' => $this->memberships
        ]);
        ;
    }
}
