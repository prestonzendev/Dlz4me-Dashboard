<?php

namespace App\Http\Responses\Backend\Testmod;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Testmod\Testmod
     */
    protected $testmods;

    /**
     * @param App\Models\Testmod\Testmod $testmods
     */
    public function __construct($testmods)
    {
        $this->testmods = $testmods;
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
        return view('backend.testmods.edit')->with([
            'testmods' => $this->testmods
        ]);
    }
}