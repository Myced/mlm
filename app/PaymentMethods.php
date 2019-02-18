<?php
namespace App;

/**
 *
 */
class PaymentMethods
{
    const MTN_MOMO = "MTN_MOMO";
    const ORANGE_MONEY = "ORANGE_MONEY";
    const CASH_ON_DELIVERY = "CASH_ON_DELIVERY";
    const VISA = "VISA";

    public static function all()
    {
        return array(
            "MTN_MOMO" => SELF::MTN_MOMO,
            "ORANGE_MONEY" => SELF::ORANGE_MONEY,
            "CASH_ON_DELIVERY" =>SELF::CASH_ON_DELIVERY,
            "VISA" => SELF::VISA
        );
    }

    public static function format($string)
    {
        $regex = '/[\s\\_]/';
        if(preg_match($regex, $string))
        {
            $filter = preg_filter($regex, ' ', $string);
        }
        else
        {
            $filter = $string;
        }

       return $filter;
    }
}

?>
