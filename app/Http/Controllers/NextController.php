<?php

namespace App\Http\Controllers;

use App\Models\Pics;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class NextController extends Controller
{
    const BEARBEITET = '_bearbeitet';

    public function next()
    {
        $pics = Pics::inRandomOrder()->get()->first();
        
        $pics->shown = true;
        $pics->save();

        // did we get a _bearbeitet image?
        $pathWithoutBearbeitet = str_replace(BEARBEITET, '', $pics->path);
        if ($pics->path!=$pathWithoutBearbeitet) {
            // yes, also mark the original image as used
            $picsWithout = Pics::where('path', $pathWithoutBearbeitet);

            $picsWithout->shown = true;
            $picsWithout->save();
        }

        // is there a _bearbeitet version?
        $pathWithBearbeitet = str_replace('.', '.'.BEARBEITET, $pics->path);
        $picsWith = Pics::where('path', pathWithBearbeitet);


        $response = new BinaryFileResponse($pics->path);
        // you can modify headers here, before returning
        return $response;
    }

    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);

        return $length === 0 ||
        (substr($haystack, -$length) === $needle);
    }
}
