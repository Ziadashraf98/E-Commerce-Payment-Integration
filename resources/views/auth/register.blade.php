<!DOCTYPE html>
<html lang="en">
	<head>

		@section('title' , 'Register')
		@include('admin.layouts.css')

	</head>
	<body class="main-body dark-theme">

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
										<div class="card-sigin">
											<div class="mb-5 d-flex mx-auto"> <a href="{{route('login')}}" class="mx-auto d-flex"><img src="{{asset('admin/assets/img/brand/favicon.png')}}" class="sign-favicon ht-40 mx-auto" alt="logo"><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28 text-white ml-2">Register<span></span></h1></a></div>
											<div class="main-signup-header">
												{{-- <h2 class="text-primary">Get Started</h2> --}}
												{{-- <h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h5> --}}
												<form method="POST" action="{{route('register')}}">
                                                    @csrf
													<div class="form-group">
                                                        <label>Name</label>
                                                        <input name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name" type="text" value="{{old('name')}}">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
													<div class="form-group">
                                                        <label>Email</label>
                                                        <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" type="email" value="{{old('email')}}">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
													<div class="form-group">
                                                        <label>Phone</label>
                                                        <input name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter your phone" type="text" value="{{old('phone')}}">
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
													<div class="form-group">
                                                        <label>Address</label>
                                                        <input name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter your address" type="text" value="{{old('address')}}">
                                                        @error('address')
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
													<div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter your confirm password'" type="password" value="">
                                                        @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <button class="btn btn-main-primary btn-block">Create Account</button>
													{{-- <div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
														</div>
													</div> --}}
												</form>
												<div class="main-signup-footer mt-5">
													<p>Already have an account? <a href="{{route('login')}}">Sign In</a></p>
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