<?php
namespace App\Classes;

use App\User;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\UserData;
use App\Models\OrderContent;

class OrderManager
{
    protected $order;
    protected $orderCode;

    public function __construct($orderCode)
    {
        $this->OrderCode = $orderCode;
        $this->initOrder();
    }

    private function initOrder()
    {
        $order = Order::where('order_code', '=', $this->OrderCode)->first();

        $this->order = $order;
    }

    public static function latestUserOrders()
    {
        $userId = auth()->user()->id;

        $orders = Order::where('user_id', '=', $userId)
                            ->orderBy('id', 'desc')
                            ->limit(5)
                            ->get();

        return $orders;
    }

    public static function ordersToday()
    {
        $date = Carbon::parse('today');

        $orders = Order::whereDate('created_at', '=', $date->format('Y-m-d'))->get();

        return $orders;
    }

    public static function ordersYesterday()
    {
        $date = Carbon::parse('yesterday');

        $orders = Order::whereDate('created_at', '=', $date->format('Y-m-d'))->get();

        return $orders;
    }

    public static function ordersThisWeek()
    {
        $start = Carbon::parse('monday this week')->format('Y-m-d');
        $end = Carbon::parse('sunday this week')->format('Y-m-d');

        $orders = static::ordersFromPeriod($start, $end);

        return $orders;
    }

    public static function ordersThisMonth()
    {
        $start = '01/' . date('m') . date("Y");
        $end = '31/' . date('m') . date("Y");

        $orders = static::ordersFromPeriod($start, $end);

        return $orders;
    }

    private static function ordersFromPeriod($start, $end)
    {
        $orders = Order::whereDate('created_at', '>=', $start)
                        ->whereDate('created_at', '<=', $end)
                        ->get();

        return $orders;
    }
}
?>
