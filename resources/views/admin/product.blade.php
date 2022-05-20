<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
.div_center
{
    text-align: center;
    padding-top: 40px;
}
.font_size
{
    font-size: 40px;
    padding-bottom: 40px;
}
.text_color
{
    color:black;
    padding-bottom: 20px;
}
label
{
    display: inline-block;
    width: 200px;
}
.div_desgin
{
    padding-bottom: 15px;
}
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      
      <div class="main-panel">
        <div class="content-wrapper">
            
            @if(session()->has('message'))
            
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
                
            </div>
            
            @endif
            <div class="div_center">
                
                <h1 class="font_size">Add Product</h1>
                
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="div_desgin">
                <label>Product Title :</label>
                <input class="text_color" type="text" name="title" placeholder="Write a title" required="">
                </div>
                <div class="div_desgin">
                <label>Product Description :</label>
                <input class="text_color" type="text" name="description" placeholder="Write a description" required="">
                </div>
                <div class="div_desgin">
                <label>Product Price :</label>
                <input class="text_color" type="number" name="price" placeholder="Write a price" required="">
                </div>
                <div class="div_desgin">
                    <label>Discount Price :</label>
                    <input class="text_color" type="number" name="discount_price" placeholder="Write a discount is apply">
                </div>
                <div class="div_desgin">
                <label>Product Quantity :</label>
                <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="">
                </div>
                <div class="div_desgin">
                <label>Product Catagory :</label>
                <select class="text_color" name="catagory" required="">
                    <option value="" selected="">Add a catagory here</option>
                    
                    @foreach ($catagory as $catagory)
                    
                    <option>{{$catagory->catagory_name}}</option>
                    
                    @endforeach
               
                </select>
            </div>
            <div class="div_desgin">
                <label>Product Image Here :</label>
                <input type="file" name="image" required="">
            </div>
            <div class="div_desgin">
                <input type="submit" value="Add Product" class="btn btn-primary">
            </div>
                </form>
                
            </div>
        </div>
      </div>
        <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
        <!-- End custom js for this page -->
        @include('admin.script')
  </body>
</html>
