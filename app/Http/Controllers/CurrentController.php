<?php

namespace App\Http\Controllers;

use App\Models\Pics;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Return the current image as a binary stream. Usage: <img src="/public/current" />
 */
class CurrentController extends Controller
{
    public function next()
    {
        $pics = Pics::where('shown', true)
            ->orderBy('updated_at', 'DESC')
            ->first();
    
        $response = new BinaryFileResponse($pics->path, 200, [], true, null, true);
        
        // modify headers to disable any kind of caching
        $response->headers->addCacheControlDirective('no-cache', true);
        $response->headers->addCacheControlDirective('max-age', 0);
        $response->headers->addCacheControlDirective('must-revalidate', true);
        $response->headers->addCacheControlDirective('no-store', true);
       
        return $response;
    }
}
