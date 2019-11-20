<?php

namespace App\Listeners\Backend\Customer;

use App\Events\Backend\Customer\CustomerDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerDeletedListener
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
     * @param  CustomerDeleted  $event
     * @return void
     */
    public function handle(CustomerDeleted $event)
    {
        //
    }
}
