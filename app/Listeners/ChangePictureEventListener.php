<?php

namespace App\Listeners;

use Log;
use App\Events\ChangePictureEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangePictureEventListener
{
    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(ChangePictureEvent $event)
    {
        Log::info('ChangePictureEventListener->handle, $event='.$event->direction);
    }
}
