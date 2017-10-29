<?php

namespace App\Http\Controllers;

use App\Models\Pics;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class NextController extends Controller
{
    const BEARBEITET = '_bearbeitet';

    public function next()
    {
        $pics = Pics::where('path', 'not like', '%'.self::BEARBEITET.'%')
                    ->where('shown', false)
                    ->get()
                    ->random();
        
        $pics->shown = true;
        $pics->save();

        // is there a _bearbeitet version?
        $pathWithBearbeitet = str_replace('.', self::BEARBEITET.'.', $pics->path);
        $picsWith = Pics::where('path', $pathWithBearbeitet)
                        ->get()
                        ->first();

        if ($picsWith) {
            $picsWith->shown = true;
            $picsWith->save();
            $pics = $picsWith;
        }

        $response = new BinaryFileResponse($pics->path);
        // you can modify headers here, before returning
        return $response;
    }
}
