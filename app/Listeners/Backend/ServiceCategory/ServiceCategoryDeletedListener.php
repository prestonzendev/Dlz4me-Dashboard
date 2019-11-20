<?php

namespace App\Listeners\Backend\ServiceCategory;

use App\Events\Backend\ServiceCategory\ServiceCategoryDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceCategoryDeletedListener
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
     * @param  ServiceCategoryDeleted  $event
     * @return void
     */
    public function handle(ServiceCategoryDeleted $event)
    {
        //
    }
}
