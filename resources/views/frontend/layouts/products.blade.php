<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach($products as $product)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{route('product_details' , Str::slug($product->title,'-',null))}}" class="option1">
                        Product Details
                     </a>
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
               <div class="img-box">
                  <img src="{{asset('images/products/'.$product->image)}}" alt="">
               </div>
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
               </div>
            </div>
         </div>
         @endforeach
         <div style="padding-left: 45%; padding-top:5%">
            {!!$products->withQueryString()->links('pagination::bootstrap-4')!!}
         </div>
       
      </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>