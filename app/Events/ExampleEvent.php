<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class ExampleEvent extends Event
{
    use SerializesModels;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
