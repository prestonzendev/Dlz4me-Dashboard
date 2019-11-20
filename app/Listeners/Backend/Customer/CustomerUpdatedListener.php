<?php

namespace App\Listeners\Backend\Customer;

use App\Events\Backend\Customer\CustomerUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerUpdatedListener
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
     * @param  CustomerUpdated  $event
     * @return void
     */
    public function handle(CustomerUpdated $event)
    {
        //
    }
}
