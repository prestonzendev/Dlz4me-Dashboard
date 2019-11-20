<?php

namespace App\Listeners\Backend\ServiceCategory;

use App\Events\Backend\ServiceCategory\ServiceCategoryDisabled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceCategoryDisabledListener
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
     * @param  ServiceCategoryDisabled  $event
     * @return void
     */
    public function handle(ServiceCategoryDisabled $event)
    {
        //
    }
}
