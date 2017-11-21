<?php

namespace App\Models;

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

class SocketIoUtil
{
    public static function notifyNextPic()
    {
        $client = new Client(new Version2X('http://localhost:3000'));
        $client->initialize();
        $client->emit('pics message', ['msg' => 'next']);
        $client->close();
    }
}
