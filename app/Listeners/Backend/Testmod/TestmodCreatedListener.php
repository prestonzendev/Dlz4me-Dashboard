<?php

namespace App\Listeners\Backend\Testmod;

use App\Events\Backend\Testmod\TestmodCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestmodCreatedListener
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
     * @param  TestmodCreated  $event
     * @return void
     */
    public function handle(TestmodCreated $event)
    {
        //
    }
}
