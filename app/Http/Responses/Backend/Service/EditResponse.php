<?php

namespace App\Http\Responses\Backend\Service;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{

    /**
     * @var App\Models\Service\Service
     */
    protected $status;
    protected $service;
    protected $vendors;

    /**
     * @param App\Models\Service\Service $services
     */
    public function __construct($status, $service, $serviceCategories, $vendors)
    {
        $this->status            = $status;
        $this->service           = $service;
        $this->serviceCategories = $serviceCategories;
        $this->vendors           = $vendors;
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

        $selectedCategories = $this->service->categories->pluck('id')->toArray();
        $entry = \DB::table('services')->find($this->service->id);
        
        $status = $entry->status;
        // dd($entry);
        return view('backend.services.edit')->with([
                    'status'             => $status,
                    'service'            => $this->service,
                    'selectedCategories' => $selectedCategories,
                    'serviceCategories'  => $this->serviceCategories,
                    'vendors'            => $this->vendors,
        ]);
    }
}
