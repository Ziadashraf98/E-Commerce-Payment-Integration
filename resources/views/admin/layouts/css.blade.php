<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
<meta name="Author" content="Spruko Technologies Private Limited">
<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

<!-- Title -->
<title> @yield('title') </title>

<!-- Favicon -->
<link rel="icon" href="{{asset('admin/assets/img/brand/favicon.png')}}" type="image/x-icon"/>

<!-- Icons css -->
<link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet">

<!--  Owl-carousel css-->
<link href="{{asset('admin/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

<!--  Custom Scroll bar-->
<link href="{{asset('admin/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

<!--  Right-sidemenu css -->
<link href="{{asset('admin/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

@if(App::getLocale() == 'ar')

<!-- Sidemenu css -->
<link rel="stylesheet" href="{{asset('admin/assets/css-rtl/sidemenu.css')}}">

<!-- Maps css -->
<link href="{{asset('admin/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

<!-- style css -->
<link href="{{asset('admin/assets/css-rtl/style.css')}}" rel="stylesheet">
<link href="{{asset('admin/assets/css-rtl/style-dark.css')}}" rel="stylesheet">

<!---Skinmodes css-->
<link href="{{asset('admin/assets/css-rtl/skin-modes.css')}}" rel="stylesheet" />

@else

<!-- Sidemenu css -->
<link rel="stylesheet" href="{{asset('admin/assets/css/sidemenu.css')}}">

<!-- Maps css -->
<link href="{{asset('admin/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

<!-- style css -->
<link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('admin/assets/css/style-dark.css')}}" rel="stylesheet">

<!---Skinmodes css-->
<link href="{{asset('admin/assets/css/skin-modes.css')}}" rel="stylesheet" />

@endif

@yield('css')