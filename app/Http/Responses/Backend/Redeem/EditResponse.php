<?php

namespace App\Http\Responses\Backend\Redeem;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{

    /**
     * @var App\Models\Redeem\Redeem
     */
    protected $status;
    protected $redeem;

    /**
     * @param App\Models\Redeem\Redeem $redeems
     */
    public function __construct($status, $redeem)
    {
        $this->status            = $status;
        $this->redeem           = $redeem;
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
        $entry = \DB::table('redeems')->find($this->redeem->id);
        $status = $entry->status;
        return view('backend.redeems.edit')->with([
                    'status'             => $status,
                    'redeem'            => $this->redeem,
        ]);
    }
}
