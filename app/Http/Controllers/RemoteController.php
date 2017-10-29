<?php

namespace App\Http\Controllers;

use Log;
use App\Events\ChangePictureEvent;

class RemoteController extends Controller
{

    function remote($direction)
    {
        Log::info($direction);
        event(new ChangePictureEvent($direction));
    }
}
