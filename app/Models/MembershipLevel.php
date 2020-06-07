<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipLevel extends Model
{
    public static function getTitle($id)
    {
        $level = self::where('level', '=', $id)->first();

        if(is_null($level))
            return '';

        return $level->title;
    }

    public static function getPoints($id)
    {
        $level = self::where('level', '=', $id)->first();

        if(is_null($level))
            return '';

        return $level->points;
    }

    public static function getBonus($id)
    {
        $level = self::where('level', '=', $id)->first();

        if(is_null($level))
            return '';

        return $level->bonus;
    }
}
