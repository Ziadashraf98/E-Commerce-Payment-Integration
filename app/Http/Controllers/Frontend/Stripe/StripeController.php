<?php

namespace App\Http\Controllers\Frontend\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    public function stripe($totalPrice)
    {
        return view('frontend.stripe.stripe' , compact('totalPrice'));
    }

    public function stripePost(Request $request , $totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
            "amount" => $totalPrice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment." 
        ]);

        $carts = session()->get('cart');
        
        foreach($carts as $cart)
        {
            Order::create([
                'quantity'=>$cart['quantity'],
                'price'=>$cart['price'],
                'image'=>$cart['image'],
                'product_id'=>$cart['product_id'],
                'user_id'=>Auth::id(),
                'payment_method'=>'visa',
            ]);
        }

        session()->forget('cart');

        return back()->with(['success'=>"Payment successful"]);
    }
}
