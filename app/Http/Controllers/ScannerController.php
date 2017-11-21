<?php

namespace App\Http\Controllers;

use App\Models\Pics;
use Illuminate\Http\Response;
use \RecursiveDirectoryIterator;
use \RecursiveIteratorIterator;

/**
 * Recursively scanns the SCAN_DIR (see .env file)
 * for new picture files and adds them to the DB.
 */
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
