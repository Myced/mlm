<?php
namespace App;

/**
 *
 */
class Functions
{

    const DATE_FORMAT = "j M, Y";


    public static function getMoney($money)
    {
        $regex = '/[\s\,\.\-]/';
        if(preg_match($regex, $money))
        {
            $filter = preg_filter($regex, '', $money);
        }
        else
        {
            $filter = $money;
        }

        return $filter;
    }
}

?>
