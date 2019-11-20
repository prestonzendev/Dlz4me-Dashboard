<?php

namespace App\Listeners\Backend\Customer;

use App\Events\Backend\Customer\CustomerReactivated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerReactivatedListener
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
     * @param  CustomerReactivated  $event
     * @return void
     */
    public function handle(CustomerReactivated $event)
    {
        //
    }
}
