<!DOCTYPE html>
<html lang="en">
	<head>
	
	@section('title' , 'Login')
	@include('admin.layouts.css')

	</head>

	<body class="main-body dark-theme">
      
		@include('sweetalert::alert')

		<!-- Loader -->
		@include('admin.layouts.preloader')
		<!-- /Loader -->
		
		<!-- Page -->
		<div class="page">

			<div class="container-fluid">
				<div class="row no-gutter">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
						<div class="row wd-100p mx-auto text-center">
							<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
								<img src="{{asset('admin/assets/img/media/lockscreen.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							</div>
						</div>
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-5">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
										<div class="mb-5 d-flex mx-auto"> <a href="{{route('login')}}" class="mx-auto d-flex"><img src="{{asset('admin/assets/img/brand/favicon.png')}}" class="sign-favicon ht-40 mx-auto" alt="logo"><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28 text-white ml-2">Login<span></span></h1></a></div>
										<div class="main-card-signin d-md-flex">
											<div class="p-4 wd-100p">
												<div class="main-signin-header">
													{{-- <div class="avatar avatar-xxl avatar-xxl mx-auto text-center mb-2"><img alt="" class="avatar avatar-xxl rounded-circle  mt-2 mb-2 " src="{{asset('admin/assets/img/faces/6.jpg')}}"></div>
													<div class="mx-auto text-center mt-4 mg-b-20">
														<h5 class="mg-b-10 tx-16">Admin Login</h5>
														<p class="tx-13 text-muted">Enter Your Password to View your Screen</p>
													</div> --}}
													<form method="POST" action="{{route('login')}}">
														@csrf
                                                        <div class="form-group">
															<label>Email</label>
                                                            <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{old('email')}}" type="text" value="">
															@error('email')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
                                                        </div>
														<div class="form-group">
															<label>Password</label>
															<input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" type="password" value="">
															@error('password')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
														<button class="btn btn-main-primary btn-block">Unlock</button>
														<div class="row row-xs">
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<a class="btn btn-success btn-block" href="{{route('googlePage')}}"><i class="fab fa-google"></i> Sign in with Google</a>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="{{ route('password.request') }}">Forgot password?</a></p>
														<p>Don't have an account? <a href="{{route('register')}}">Create an Account</a></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
			</div>
			
		</div>
		<!-- End Page -->

		@include('admin.layouts.scripts')

	</body>
</html>