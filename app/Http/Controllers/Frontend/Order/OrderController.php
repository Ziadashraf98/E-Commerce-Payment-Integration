<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function cash_order(Request $request)
    {
        $carts = session()->get('cart');
        
        foreach($carts as $cart)
        {
            Order::create([
                'quantity'=>$cart['quantity'],
                'price'=>$cart['price'],
                'image'=>$cart['image'],
                'product_id'=>$cart['product_id'],
                'user_id'=>Auth::id(),
                'payment_method'=>'cash',
                'status'=>'cash on delivery',
            ]);
        }

        session()->forget('cart');
        
        return back()->with(['success'=>"We have Received your Order. We will connect with you soon..."]);
    }
}
