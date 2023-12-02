<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{route('/')}}"><img width="250" src="{{asset('frontend/images/logo.png')}}" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="{{route('show_cart')}}">Cart[{{$productsOfCart}}]</a>
                </li>
                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>
             </ul>
             <ul class="navbar-nav ms-auto" style='margin-left: 150px;'>
               <div class="btn-group mb-1">
                   <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       @if (App::getLocale() == 'ar')
                           {{ LaravelLocalization::getCurrentLocaleName() }}
                           @elseif (App::getLocale() == 'fr')
                           {{ LaravelLocalization::getCurrentLocaleName() }}
                       @else
                           {{ LaravelLocalization::getCurrentLocaleName() }}
                       @endif
                   </button>
                   <div class="dropdown-menu">
                       @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                           <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}    ">
                               {{ $properties['native'] }}
                           </a>
                       @endforeach
                   </div>
               </div>
            </ul>
             <ul class="navbar-nav ms-auto">
               <!-- Authentication Links -->
               @guest
                   @if (Route::has('login'))
                       <li class="nav-item">
                           <a class="nav-link btn btn-primary" style='margin-left: 20px;' href="{{ route('login') }}">{{ __('Login') }}</a>
                       </li>
                   @endif

                   @if (Route::has('register'))
                       <li class="nav-item">
                           <a class="nav-link btn btn-success" style='margin-left: 10px;'  href="{{ route('register') }}">{{ __('Register') }}</a>
                       </li>
                   @endif
               @else
                   <li class="nav-item dropdown">
                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }}
                       </a>

                       <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
                       </div>
                   </li>
               @endguest
           </ul>
          </div>
       </nav>
    </div>
 </header>