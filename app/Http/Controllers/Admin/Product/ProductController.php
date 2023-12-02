<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validation = $request->validated();
        $validation['title'] = ['en'=>Str::slug($request->title_en) , 'ar'=>Str::slug($request->title_ar , '-' , null)];
        $validation['description'] = ['en'=>$request->description_en , 'ar'=>$request->description_ar];
        $validation['image'] = $request->image->getClientOriginalName();
        $request->image->move(public_path('images/products') , $request->image->getClientOriginalName());
        
        Product::create($validation);

        return redirect()->route('products.index')->with(['success'=>"you have successfully created item"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit' , compact('product' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        
        $validation = $request->validated();
        $validation['title'] = ['en'=>Str::slug($request->title_en) , 'ar'=>Str::slug($request->title_ar , '-' , null)];
        $validation['description'] = ['en'=>$request->description_en , 'ar'=>$request->description_ar];
        
        if($request->image)
        {
            unlink(public_path('images/products/'.$product->image)); 
            $validation['image'] = $request->image->getClientOriginalName();
            $request->image->move(public_path('images/products') , $request->image->getClientOriginalName());
        }
        
        $product->update($validation);
        
        return redirect()->route('products.index')->with(['success'=>"you have successfully updated item"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink(public_path('images/products/'.$product->image)); 
        $product->delete();
        return back()->with(['success'=>"you have successfully created item"]);
    }
}
