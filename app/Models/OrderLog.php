<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    const logTypes = [
        'primary' => "Information",
        'danger' => "Danger",
        'success' => 'Success',
        'warning' => 'Warning'
    ];

    public static function allTypes()
    {
        return static::logTypes;
    }

    public static function getIcon($type)
    {
        $icons = [
            'primary' => "info-circle",
            'danger' => "times",
            'success' => 'check',
            'warning' => 'exclamation-triangle'
        ];

        $iconValue = '';

        foreach($icons as $key => $icon)
        {
            if($type == $key)
                return $icon;
        }

        return $iconValue; //will return '' if the icon is not seen
    }
}
