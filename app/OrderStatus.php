<?php
namespace App;


class OrderStatus
{

    const PENDING = "PENDING";
    const CONFIRMED = "CONFIRMED";
    const CANCELED = "CANCELED";
    const PROCESSING = "PROCESSING";
    const DELIVERED  = "DELIVERED";
    const SHIPPED = "SHIPPED";

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

    public static function getClass($status)
    {
        $class = "";

        if($status == static::PENDING)
        {
            $class = "warning";
        }
        elseif($status == static::DELIVERED)
        {
            $class = "success";
        }
        elseif($status == static::CANCELED)
        {
            $class = "danger";
        }
        elseif($status == static::PROCESSING)
        {
            $class = "info";
        }
        elseif($status == static::CONFIRMED)
        {
            $class = "primary";
        }
        elseif($status == static::SHIPPED)
        {
            $class = "shipped";
        }

        else {
            $class = "unknown";
        }

        return $class;
    }

}

?>
