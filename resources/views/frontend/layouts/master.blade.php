<!DOCTYPE html>
<html>
<head>
   
   @include('frontend.layouts.css')
   
</head>
   <body>
    
      <div class="hero_area">
         
         @include('frontend.layouts.navbar')

         @yield('content')
      
      </div>

      @include('frontend.layouts.footer')
      
      @include('frontend.layouts.scripts')
      
   </body>
</html>