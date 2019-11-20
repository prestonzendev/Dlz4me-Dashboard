<?php

namespace App\Http\Responses\Backend\TermsAndCondition;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    /**
     * @var App\Models\TermsAndCondition\Termandcondition
     */
    protected $termandconditions;

    /**
     * @param App\Models\TermsAndCondition\Termandcondition $termandconditions
     */
    public function __construct($termandconditions, $policy_types)
    {
        $this->termandconditions = $termandconditions;
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
        $entry = \DB::table('terms_and_conditions')->find($this->termandconditions->id);
        $status = $entry->status;
        return view('backend.termandconditions.edit')->with([
                    'termandconditions' => $this->termandconditions,
                    'status'            => $status,
                    'policy_types' => $this->policy_types

        ]);
    }
}
