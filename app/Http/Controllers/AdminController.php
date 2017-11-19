<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Pics;
use App\Events\ChangePictureEvent;

class AdminController extends Controller
{

    function admin()
    {
        $pics = Pics::where('shown', true)
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
        return view('admin', ['pics' => $pics]);
    }
}
