<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class BasketController extends Controller
{
   public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
  
       }
       return view('basket', compact('order'));
    }
       public function basketConfirm(Request $request)
         {
             return redirect()->route('index');
         }

      public function basketPlace()
    {
        return view('order');
       $orderId = session('orderId');
       if(is_null($orderId)){
           return redirect()->route('index');
       }
       $order = Order::find($orderId);
      return view('order', compact('order'));
        

    }
    public function basketAdd($productId)
    {
        $orderId = session('orderId');
      if (is_null($orderId)) {
            $order = Order::create()->id;
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
       }
       if ($order->products->contains($productId)){
          $privotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $privotRow->count++;
            $privotRow->update();
        } else {
            $order->products()->attach($productId);
    
        }
        
        return redirect()->route('basket');

    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        if ($order->products->contains($productId)) {
            $privotRow = $order->products()->where('product_id', $productId)->first()->pivot;
           if ($privotRow->count < 2) {
               $order->products()->detach($productId);
           } else {
               $privotRow->count--;
               $privotRow->update();
           }
       }

        return redirect()->route('basket');
    }
   
}
