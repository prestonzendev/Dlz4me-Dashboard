<?php

namespace App\Listeners\Backend\Customer;

use App\Events\Backend\Customer\CustomerDeactivated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerDeactivatedListener
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
     * @param  CustomerDeactivated  $event
     * @return void
     */
    public function handle(CustomerDeactivated $event)
    {
        //
    }
}
