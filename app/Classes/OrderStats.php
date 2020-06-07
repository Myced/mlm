<?php
namespace App\Classes;

use App\OrderStatus;

class OrderStats
{
    protected $orders;

    public $data = [
        OrderStatus::PENDING => 0,
        OrderStatus::CONFIRMED => 0,
        OrderStatus::PROCESSING => 0,
        OrderStatus::SHIPPED => 0,
        OrderStatus::DELIVERED => 0,
        OrderStatus::CANCELED => 0
    ];

    public function __construct($orders)
    {
        $this->orders = $orders;

        $this->generateStats();
    }

    private function generateStats()
    {
        $orders = $this->orders;

        foreach($orders as $order)
        {
            ++$this->data[$order->status];
        }
    }
}
?>
