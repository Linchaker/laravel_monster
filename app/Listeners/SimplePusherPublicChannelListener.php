<?php

namespace App\Listeners;

use App\Events\SimplePusherPublicChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SimplePusherPublicChannelListener
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
     * @param  SimplePusherPublicChannel  $event
     * @return void
     */
    public function handle(SimplePusherPublicChannel $event)
    {
        //
    }
}
