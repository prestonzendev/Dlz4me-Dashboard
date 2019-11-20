<?php

namespace App\Http\Responses\Backend\Banner;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Banner\Banner
     */
    protected $banners;
    protected $status;

    /**
     * @param App\Models\Banner\Banner $banners
     */
    public function __construct($banners, $status)
    {
        $this->banners = $banners;
        $this->status  = $status;
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
        $entry = \DB::table('banners')->find($this->banners->id);
        $status = $entry->status;
        return view('backend.banners.edit')->with([
            'banner' => $this->banners,
            'status' => $status,
        ]);
    }
}