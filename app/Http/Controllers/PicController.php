<?php

namespace App\Http\Controllers;

use App\Models\Pics;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Delivers the picture with the given id as a
 * binary stream.
 */
class PicController extends Controller
{

    public function pic($id)
    {
        $pics = Pics::where('id', '=', $id)
            ->get()
            ->first();

        $response = new BinaryFileResponse($pics->path);
        return $response;
    }
}
