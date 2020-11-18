<?php

namespace App\Listeners;

use App\Events\NumberThreeDropped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNumberThreeNotification
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
     * @param  NumberThreeDropped  $event
     * @return void
     */
    public function handle(NumberThreeDropped $event)
    {
        if ($event->number === 3) {
            print_r('hery event works<br>');

        }
    }
}
