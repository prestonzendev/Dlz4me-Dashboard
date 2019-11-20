<?php

namespace App\Listeners\Backend\Customer;

use App\Events\Backend\Customer\CustomerRestored;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerRestoredListener
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
     * @param  CustomerRestored  $event
     * @return void
     */
    public function handle(CustomerRestored $event)
    {
        //
    }
}
