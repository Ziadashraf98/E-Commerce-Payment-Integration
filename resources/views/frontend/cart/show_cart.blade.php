@extends('frontend.layouts.master')

@section('title' , 'Show Cart')
@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.center
{
    margin: auto;
    width: 50%;
    text-align: center;
    padding:30px;
}
table,th,td
{
    border: 1px solid grey;

}
.th_deg
{
    font-size: 30px;
    padding: 5px;
    background: skyblue;
}
.total_deg
{
    font-size: 20px;
    padding: 40px;
}
</style>

@endsection

@section('content')

<div class="center">
    <table>
    <tr>
        <th class="th_deg">Product Title</th>
        <th class="th_deg">Product Quantity</th>
        <th class="th_deg">Price</th>
        <th class="th_deg">Image</th>
        <th class="th_deg">Actions</th>
    </tr>

    @foreach ((array)$carts as $cart)  
    <tr>
        <td>{{str_replace('-',' ',$cart['title'])}}</td>
        <td>{{$cart['quantity']}}</td>
        <td>{{$cart['price']}}</td>
        <td><img style="width: 150px; height:150px"  src="{{asset('images/products/'.$cart['image'])}}"></td>
        <td><a class="btn btn-danger" onclick="confirmation_delete_cart(event)" href="{{route('delete_cart' , $cart['product_id'])}}">Remove</a></td>
    </tr>
    @endforeach
      
  </table>

@if(session()->has('cart'))
  
  <div>
    <h1 class="total_deg">Total Price: {{$total_price}} {{getCurrency()}} </h1>
  </div>

<div>
    <h1 style="font-size:25px; padding-bottom:30px;">Proceed to Order</h1>
    <a href="{{route('cash_order')}}" onclick="confirmation_cash_order(event)" class="btn btn-success">Cash On Delivery</a>
    <a href="{{route('stripe' , $total_price)}}" class="btn btn-secondary"  target="_blank">Pay Using Card (Stripe)</a>
    <a href="{{route('paypal.index')}}" class="btn btn-info" target="_blank">Pay Using Card (PayPal)</a>
</div>

@endif

@endsection

@section('js')
         
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
   @if(session()->has('success'))
   <script>toastr.success("{{session()->get('success')}}");</script>
   @endif
   
   @if(session()->has('error'))
   <script>toastr.error("{{session()->get('error')}}");</script>
   @endif

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


   
<script>  
    function confirmation_delete_cart(ev){
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');  
      console.log(urlToRedirect); 
      swal({
          title: "Are you sure to cancel this product",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
               
            window.location.href = urlToRedirect;
        }  
    });  
}
</script>

<script>  
    function confirmation_cash_order(ev){
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');  
      console.log(urlToRedirect); 
      swal({
          title: "Are you sure to accept this order",
          text: "You will not be able to revert this!",
          icon: "info",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
               
            window.location.href = urlToRedirect;
        }  
    });  
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   

@endsection