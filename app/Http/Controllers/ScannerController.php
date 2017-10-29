<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use \RecursiveIteratorIterator;
use \RecursiveDirectoryIterator;
use App\Models\Pics;

class ScannerController extends Controller
{


    public function scan()
    {
        $directory = env('SCAN_DIR');
        
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
        
        $content = '';
        $it->rewind();
        while ($it->valid()) {
            if (!$it->isDot()) {
                $path = $it->key();
                $pics = Pics::firstOrCreate(['path' => $path]);
            }
        
            $it->next();
        }

        return new Response();
    }
}
