<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Pics extends Model
{
    const BEARBEITET = '_bearbeitet';

    protected $fillable = ['path'];

    /**
     * Finds a random Pics from the DB and marks it as the
     * next one to show.
     *
     * @return Pics
     */
    public static function nextPic()
    {
        $pics = Pics::where('path', 'not like', '%' . self::BEARBEITET . '%')
            ->where('shown', false)
            ->get()
            ->random();

        $pics->shown = true;
        $pics->save();

        // is there a _bearbeitet version?
        $pathWithBearbeitet = str_replace('.', self::BEARBEITET . '.', $pics->path);
        $picsWith = Pics::where('path', $pathWithBearbeitet)
            ->get()
            ->first();

        if ($picsWith) {
            $picsWith->shown = true;
            $picsWith->save();
            $pics = $picsWith;
        }

        return $pics;

    }
}
