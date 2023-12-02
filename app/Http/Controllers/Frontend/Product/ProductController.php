<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function product_details($title)
    {
        $product = Product::where('title->en' , $title)->orWhere('title->ar' , $title)->first();
        return view('frontend.products.product_details' , compact('product'));
    }
}
