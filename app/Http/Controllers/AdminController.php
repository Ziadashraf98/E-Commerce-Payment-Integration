<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use GuzzleHttp\Promise\Create;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::latest()->paginate();
        return view('admin.catagory' , compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data = new Catagory;
        $data->catagory_name = $request->catagory_name;
        $data->save();
        return back()->with('message' , 'Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data = Catagory::find($id);
        $data->delete();
        return back()->with('message' , 'Catagory Deleted Successfully');
    }

    public function view_product()
    {
        $catagory = Catagory::all();
        return view('admin.product' , compact('catagory'));
    }

    public function add_product(Request $request)
    {
        $data = Product::create($request->all());
        $data->image = time() .'.'. $data->image->getClientOriginalExtension();
        $request->image->move('productimage' , $data->image);
        $data->save();
        return back()->with('message' , 'Product Added Successfully');
    }

    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product' , compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('message' , 'Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $catagory = Catagory::all();
        return view('admin.update_product' , compact('product' , 'catagory'));
    }

    public function update_product_confirm(Request $request , $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        
        if($request->image)
        {
            $product->image = time() .'.'. $product->image->getClientOriginalExtension();
            $request->image->move('productimage' , $product->image);
            $product->save();
        }

        return back()->with('message' , "Product Updated Successfully");
    }

    public function order()
    {
        $order = Order::all();
        return view('admin.order' , compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'Delivered';
        $order->payment_status = 'Paid';
        $order->save();
        return back();
    }

    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf' , compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order = Order::find($id);
        return view('admin.email_info' , compact('order'));
    }

    public function send_user_email(Request $request , $id)
    {
        $order = Order::find($id);
        
        $details = 
        [
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline
        ];

        Notification::send($order , new SendEmailNotification($details));
        return back();
    }
}
