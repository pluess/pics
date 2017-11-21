<?php

namespace App\Http\Controllers;

use App\Models\Pics;

/**
 * Allows to request the next random picture, in case the user
 * is not happy with the current one.
 *
 * Lists all used pictures with their path to make it
 * easier to find the original file.
 */
class AdminController extends Controller
{

    public function admin()
    {
        $pics = Pics::where('shown', true)
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

        return view('admin', ['pics' => $pics]);
    }
}
