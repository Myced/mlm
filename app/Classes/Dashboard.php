<?php
namespace App\Classes;

use App\User;
use Carbon\Carbon;
use App\Models\Order;
use App\Admin\Product;

class Dashboard
{
    public $ordersToday = 0;
    public $earningsToday = 0;
    public $pendingOrders = 0;
    public $totalMembers = 0;

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $date = Carbon::now()->format('Y-m-d');

        $orders = Order::whereDate('created_at', '=', $date)->get();



        if(!empty($orders))
        {
            $this->ordersToday  = $orders->count();

            $total = $orders->sum('total');

            $this->earningsToday = $total;
        }

        //set the pending orders
        $pending = \App\OrderStatus::PENDING;
        $orders = Order::where('status', '=', $pending)->get();
        if(!empty($orders))
        {
            $this->pendingOrders = $orders->count();
        }

        //initialise total memebers
        $level = \App\UserLevel::USER;
        $users = User::where('level', '=', $level)->get();
        if(!empty($users))
        {
            $this->totalMembers = $users->count();
        }
    }

    public static function latestOrders()
    {
        return Order::orderBy('id', 'desc')->limit(10)->get();
    }

    public static function topProducts()
    {
        return Product::orderBy('views', 'desc')->limit(10)->get();
    }
}
?>
