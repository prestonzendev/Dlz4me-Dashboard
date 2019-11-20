<?php

namespace App\Listeners\Backend\ServiceCategory;

use App\Events\Backend\ServiceCategory\ServiceCategoryCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceCategoryCreatedListener
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
     * @param  ServiceCategoryCreated  $event
     * @return void
     */
    public function handle(ServiceCategoryCreated $event)
    {
        //
    }
}
