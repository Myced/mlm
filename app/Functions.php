<?php
namespace App;

/**
 *
 */
class Functions
{

    const DATE_FORMAT = "j M, Y";
    const DATE_TIME_FORMAT = "D, d M, Y - h:i a";


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

    public static function getTel($number)
    {
        $regex = '/[\s\,\.\-\+\_]/';
        if(preg_match($regex, $number))
        {
            $filter = preg_filter($regex, '', $number);
        }
        else
        {
            $filter = $number;
        }

        return $filter;
    }

    public static function getGeneologyDepth()
    {
        return $depth = \App\Models\GeneologyDepth::find(1)->depth;
    }

}

?>
