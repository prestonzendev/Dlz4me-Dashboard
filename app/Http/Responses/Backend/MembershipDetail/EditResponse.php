<?php

namespace App\Http\Responses\Backend\MembershipDetail;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    
    /**
     * @var App\Models\MembershipDetail\Membershipdetail
     */
    protected $membershipdetails;

    /**
     * @param App\Models\MembershipDetail\Membershipdetail $membershipdetails
     */

    public function __construct($membershipdetails, $memberships)
    {
        $this->membershipdetails = $membershipdetails;
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
        $entry = \DB::table('membership_details')->find($this->membershipdetails->id);
        $status = $entry->status;
        return view('backend.membershipdetails.edit')->with([
            'membershipdetail' => $this->membershipdetails,
            'memberships' => $this->memberships,
            'status' => $status
        ]);
    }
}
