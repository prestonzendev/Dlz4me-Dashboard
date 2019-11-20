<?php

namespace App\Listeners\Backend\Customer;

use App\Events\Backend\Customer\CustomerPermanentlyDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerPermanentlyDeletedListener
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
     * @param  CustomerPermanentlyDeleted  $event
     * @return void
     */
    public function handle(CustomerPermanentlyDeleted $event)
    {
        //
    }
}
