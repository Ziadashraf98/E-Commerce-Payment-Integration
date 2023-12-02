<!DOCTYPE html>
<html>
<head>
   
   @section('title' , 'Famms')
   
   @section('css')
      
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
   @endsection

   @section('js')
         
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
   @if(session()->has('success'))
   <script>toastr.success("{{session()->get('success')}}");</script>
   @endif

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
   @endsection
   
   @include('frontend.layouts.css')
   
</head>
   <body>
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('frontend.layouts.navbar')
         <!-- end header section -->
         <!-- slider section -->
         @include('frontend.layouts.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('frontend.layouts.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('frontend.layouts.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('frontend.layouts.products')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('frontend.layouts.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('frontend.layouts.client')
      <!-- end client section -->
      <!-- footer start -->
      
      @include('frontend.layouts.footer')
      
      <!-- jQery -->
      @include('frontend.layouts.scripts')
      
   </body>
</html>