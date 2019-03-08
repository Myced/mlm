<?php
namespace App\Classes;

use App\User;
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
}
?>
