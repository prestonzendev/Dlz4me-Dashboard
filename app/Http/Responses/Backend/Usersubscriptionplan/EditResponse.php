<?php

namespace App\Http\Responses\Backend\Usersubscriptionplan;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Usersubscriptionplan\Usersubscriptionplan
     */
    protected $usersubscriptionplans;

    /**
     * @param App\Models\Usersubscriptionplan\Usersubscriptionplan $usersubscriptionplans
     */
    public function __construct($usersubscriptionplans)
    {
        $this->usersubscriptionplans = $usersubscriptionplans;
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
        return view('backend.usersubscriptionplans.edit')->with([
            'usersubscriptionplan' => $this->usersubscriptionplans
        ]);
    }
}