<?php

namespace App\Listeners\Backend\Testmod;

use App\Events\Backend\Testmod\TestmodUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestmodUpdatedListener
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
     * @param  TestmodUpdated  $event
     * @return void
     */
    public function handle(TestmodUpdated $event)
    {
        //
    }
}
