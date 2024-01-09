<?php

namespace App\Http\Controllers\Frontend\PayPal;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Order;

class PaypalController extends Controller
{
    public function index()
    {
        $carts = session()->get('cart');
        $title = Product::whereIn('id' , array_keys($carts))->first()->title;
        
        $total_price = false; 
        
        foreach((array)$carts as $cart)
        {
            $total_price += $cart['price'];
        }

        $data = [];
        
        $data['items'] =
        [
            [
                'name' => $title,
                'price' => $total_price,
            ]
        ];

        $data['invoice_id'] = rand(1 , 100);
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('paypal.success');
        $data['cancel_url'] = route('paypal.cancel');
        $data['total'] = $total_price;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        $carts = session()->get('cart');

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']))
        {
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
            return redirect()->route('show_cart')->with(['success'=>"Your payment was successfully"]); 
        }

        return redirect()->route('show_cart')->with(['error'=>"Please try again later"]); 
    }

    public function cancel()
    {
        return redirect()->route('show_cart')->with(['error'=>"Your payment is canceled"]); 
    }

}
