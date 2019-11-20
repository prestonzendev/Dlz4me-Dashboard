<?php

namespace App\Listeners\Backend\ServiceCategory;

use App\Events\Backend\ServiceCategory\ServiceCategoryEdited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceCategoryEditedListener
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
     * @param  ServiceCategoryEdited  $event
     * @return void
     */
    public function handle(ServiceCategoryEdited $event)
    {
        //
    }
}
