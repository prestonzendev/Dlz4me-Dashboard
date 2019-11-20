<?php

namespace App\Http\Responses\Backend\PolicyType;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\PolicyType\Policytype
     */
    protected $policytypes;

    /**
     * @param App\Models\PolicyType\Policytype $policytypes
     */
    public function __construct($policytypes)
    {
        $this->policytypes = $policytypes;
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
        $entry = \DB::table('policy_types')->find($this->policytypes->id);
        $status = $entry->status;
        return view('backend.policytypes.edit')->with([
            'policytype' => $this->policytypes,
            'status' => $status
        ]);
    }
}
