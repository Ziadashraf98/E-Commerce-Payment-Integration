<!DOCTYPE html>
<html lang="en">
	<head>

		@include('admin.layouts.css')

	</head>

	<body class="main-body app sidebar-mini dark-theme">

		<!-- Loader -->
		@include('admin.layouts.preloader')
		<!-- /Loader -->
		
		<!-- Page -->
		<div class="page">
		
			<!-- main-sidebar -->
			@include('admin.layouts.sidebar')
			<!-- main-sidebar -->

			<!-- main-content -->
			<div class="main-content app-content">

				<!-- main-header -->
				@include('admin.layouts.navbar')
				<!-- /main-header -->

				<!-- container -->
				<div class="container-fluid">
					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
                        @yield('content')
					</div>
					<!-- /breadcrumb -->

					<!-- /row -->
				</div>
				<!-- /Container -->
			</div>
			<!-- /main-content -->

			<!-- Sidebar-right-->
			@include('admin.layouts.sidebar-right')
			<!--/Sidebar-right-->

			


			<!-- Footer opened -->
			@include('admin.layouts.footer')
			<!-- Footer closed -->
			
		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		@include('admin.layouts.scripts')
	</body>
</html>