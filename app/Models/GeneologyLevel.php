<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneologyLevel extends Model
{
    public static function getLevelBenefit($level)
    {
        $level = self::where('level', '=', $level)->first();

        if(is_null($level))
        {
            return '';
        }
        else {
            return $level->benefit;
        }
    }
}
