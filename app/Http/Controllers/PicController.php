<?php

namespace App\Http\Controllers;

use App\Models\Pics;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PicController extends Controller
{
    const BEARBEITET = '_bearbeitet';

    public function pic($id)
    {
        $pics = Pics::where('id', '=', $id)
                    ->get()
                    ->first();

        $response = new BinaryFileResponse($pics->path);       
        return $response;
    }
}
