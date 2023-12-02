<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function add_cart(Request $request , $product_id)
    {
        $product = Product::find($product_id);

        $cart = session()->get('cart');
        
        $cart[$product_id] = [
            'quantity'=>$request->quantity,
            'price'=>$product->discount_price ? $product->discount_price * $request->quantity : $product->price * $request->quantity,
            'image'=>$product->image,
            'title'=>$product->title,
            'product_id'=>$product->id,
            'user_id'=>Auth::id(),
        ];
        
        session()->put('cart' , $cart);
        
        // Alert::success('Product Added Successfully' , 'We have added product to the cart');
        
        return back()->with(['success'=>"You have added the product to cart successfully"]);
    }

    public function show_cart()
    {
        $carts = session()->get('cart');
        $total_price = false; 

        foreach((array)$carts as $cart)
        {
            $total_price += $cart['price'];
        }
        
        return view('frontend.cart.show_cart' , compact('carts' , 'total_price'));
    }

    public function delete_cart($product_id)
    {
        $cart = session()->get('cart');
        unset($cart[$product_id]);
        session()->put('cart' , $cart);
        return back()->with(['success'=>"You have deleted the product from cart"]);
    }
}
