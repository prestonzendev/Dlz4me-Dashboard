<?php

namespace App\Http\Responses\Backend\Reportedissue;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Reportedissue\Reportedissue
     */
    protected $reportedissues;

    /**
     * @param App\Models\Reportedissue\Reportedissue $reportedissues
     */
    public function __construct($reportedissues)
    {
        $this->reportedissues = $reportedissues;
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
        return view('backend.reportedissues.edit')->with([
            'reportedissue' => $this->reportedissues
        ]);
    }
}