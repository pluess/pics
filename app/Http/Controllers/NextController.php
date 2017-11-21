<?php

namespace App\Http\Controllers;

use App\Models\Pics;
use App\Models\SocketIoUtil;

/**
 * Choose a random picture from the DB and
 * notify all socket.io listeners that there's
 * a new one.
 */
class NextController extends Controller
{
    public function next()
    {
        $pics = Pics::nextPic();
        SocketIoUtil::notifyNextPic();
    }
}
