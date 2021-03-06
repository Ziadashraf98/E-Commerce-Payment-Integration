<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Stripe;


class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('/redirect');
        }
        else
        {
            $product = Product::paginate(3);
            return view('home.userpage' , compact('product'));
        }
    }
    
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == 1)
        {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();
            
            
            $order = Order::all();
            $total_revenue = 0;
            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status' , 'Delivered')->count();
            $total_processing = Order::where('delivery_status' , 'Processing')->count();

            return view('admin.home' , compact('total_product' , 'total_order' , 'total_user' , 
            'total_revenue' , 'total_delivered' , 'total_processing'));
        }
        else
        {
            $product = Product::paginate(3);
            return view('home.userpage' , compact('product'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details' , compact('product'));
    }

    public function add_cart(Request $request , $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            if($product->discount_price == null)
            {
                $cart->price = $product->price * $request->quantity;
            }
            else
            {
                $cart->price = $product->discount_price * $request->quantity;
            }
            $cart->quantity = $request->quantity;
            $cart->product_id = $product->id;
            $cart->user_id = $user->id;
            $cart->image = $product->image;
            $cart->save();
            return back()->with('message' , 'Product Added Successfully');
        }
        else
        {
            return redirect('/register');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id' , $id)->get();
            return view('home.show_cart' , compact('cart'));
        }
        else
        {
            return redirect('/register');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id' , $userid)->get();
        
        foreach($data as $data)
        {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();
        }
        
        DB::table('carts')->where('phone' , $user->phone)->delete();

        return back()->with('message' , 'We have Received your Order. We will connect with you soon...');

         
    }

    public function stripe($totalprice)
    {
        return view('home.stripe' , compact('totalprice'));
    }

    public function stripePost(Request $request , $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id' , $userid)->get();
        
        foreach($data as $data)
        {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';
            $order->save();
        }
        
        DB::table('carts')->where('phone' , $user->phone)->delete();
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user()->id;
            $order = Order::where('user_id' , $user)->get();
            return view('home.order' , compact('order'));
        }
        else
        {
            return redirect('/register');
        }
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back();
    }

}
