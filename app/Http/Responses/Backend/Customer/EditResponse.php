<?php

namespace App\Http\Responses\Backend\Customer;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Customer\Customer
     */
    protected $customers;

    /**
     * @param App\Models\Customer\Customer $customers
     */
    public function __construct($customers)
    {
        $this->customers = $customers;
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
        return view('backend.customers.edit')->with([
            'customers' => $this->customers
        ]);
    }
}