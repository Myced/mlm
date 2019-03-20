<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use App\Models\ProductMovement;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCancelledListener
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
     * @param  OrderCancelled  $event
     * @return void
     */
     public function handle(OrderCancelled $event)
     {
         $order = $event->order;

         //loop through order content and reduce
         // product quantity
         foreach($order->content as $content)
         {
             $product = $content->model();

             $orderQuantity = $content->quantity;
             $productQuantity = $product->quantity;

             $newQuantity = $productQuantity + $orderQuantity;

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

         $message = "Order " . $order->order_code . " By " . $order->user->name
                             . " Cancelled.";;

         $log->comment = $message;

         $log->save();
     }
}
