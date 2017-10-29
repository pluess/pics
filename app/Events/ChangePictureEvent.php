<?php

namespace App\Events;

class ChangePictureEvent extends Event
{
    
    public $direction;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(String $direction)
    {
        $this->direction = $direction;
    }
}
