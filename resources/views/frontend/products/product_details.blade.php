@extends('frontend.layouts.master')
       
   @section('title' , 'Product Details')
   
   @section('css')
      
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
   @endsection

   @section('content')
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; padding:30px">
         <div class="box">
            <div class="img-box">
               <img src="{{asset('images/products/'.$product->image)}}" alt="">
            </div>
            <br>
            <div class="detail-box">
               <h5>
                  {{ucfirst(str_replace('-',' ',$product->title))}}
               </h5>
               @if($product->discount_price)
               <h6 style="color:red">
                  Discount price
                  <br>
                  {{$product->discount_price}} {{getCurrency()}}
               </h6>
               <h6 style="text-decoration: line-through; color:blue">
                  Price
                  <br>
                  {{$product->price}} {{getCurrency()}} 
               </h6>
               @else
               <h6 style="color:blue">
                  Price
                  <br>
                  {{$product->price}} {{getCurrency()}} 
               </h6>
               @endif
                  <h6 style="color:midnightblue">Category: {{ucfirst(str_replace('-',' ',$product->category->name))}}</h6>
                  <h6 style="color:midnightblue">Description: {{$product->description}}</h6>
                  <h6 style="color:midnightblue">Quantiy: {{$product->quantity}}</h6>
                  <br>
                  <form action="{{route('add_cart' , $product->id)}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}" style="width: 100px">
                           </div>
                           <div class="col-md-4">
                              <input type="submit" value="Add To Cart">
                           </div>
                        </div>
                  </form>
            </div>
         </div>
      </div>
   @endsection

   @section('js')
         
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
   @if(session()->has('success'))
   <script>toastr.success("{{session()->get('success')}}");</script>
   @endif

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
   @endsection
