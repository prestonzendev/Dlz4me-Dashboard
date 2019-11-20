<?php

namespace App\Listeners\Backend\Customer;

use App\Events\Backend\Customer\CustomerPasswordChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerPasswordChangedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CustomerPasswordChanged  $event
     * @return void
     */
    public function handle(CustomerPasswordChanged $event)
    {
        //
    }
}
