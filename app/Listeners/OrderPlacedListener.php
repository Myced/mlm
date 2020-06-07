<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Models\ProductMovement;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlacedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        $order = $event->order;

        //loop through order content and increase
        // product quantity
        foreach($order->content as $content)
        {
            $product = $content->model();

            $orderQuantity = $content->quantity;
            $productQuantity = $product->quantity;

            $newQuantity = $productQuantity - $orderQuantity;

            $product->quantity = $newQuantity;

            $product->save();

            $this->LogProductMovement($product, $order, $productQuantity, $newQuantity);
        }
    }

    private function LogProductMovement($product, $order, $oldQuantity, $newQuantity)
    {
        $log = new ProductMovement;

        $log->product_id = $product->id;
        $log->old_quantity = $oldQuantity;
        $log->difference = abs($newQuantity - $oldQuantity);
        $log->new_quantity = $newQuantity;

        $message = "Order " . $order->order_code . " By " . $order->user->name;

        $log->comment = $message;

        $log->save();
    }
}
