<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register | Employer</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{ asset('assets/frontend/css/register/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{ asset('assets/frontend/css/register/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{ asset('assets/frontend/css/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{ asset('assets/frontend/css/register/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="{{ asset('assets/frontend/css/register/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/css/main.css')}}">


    <!-- favicons
	================================================== -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/css/landing/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/css/landing/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/frontend/css/landing/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/css/landing/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('assets/frontend/css/landing/site.webmanifest')}}">
    <link rel="mask-icon" href="{{ asset('assets/frontend/css/landing/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="{{ asset('assets/frontend/css/landing/favicon.ico')}}" type="image/x-icon">
</head>

<body>

	<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100">
				<div class="login100-pic js-tilt" style="margin-top:12%;" data-tilt>
					<img src="{{ asset('assets/frontend/css/register/images/img-01.jpg')}}" alt="employers-image-page">
					<a href="{{route('freelancer')}}">
						<button class="login100-form-btn1">
							Join Us As Freelancer
						</button>
					</a>
				</div>
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					@csrf

					<div style="text-align:center;padding-bottom:10px;">
						<a href="{{route('landing')}}" title="Go Back to Homepage"><img style="border-radius: 50%;"
								width="50" height="50"
								src="{{ asset('assets/frontend/css/login/images/avatar-01.png')}}" alt="AVATAR"></a>

					</div>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<input id="name" class="input100 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
							name="name" value="{{ old('name') }}" type="text" name="email" placeholder="Name">
						<input id="role_id" type="text" name="role_id" value="2" style="display:none;">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						@if ($errors->has('name'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input id="username" type="text"
							class="input100 form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
							name="username" value="{{ old('username') }}" placeholder="Username">

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						@if ($errors->has('username'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input id="email" type="email"
							class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
							value="{{ old('email') }}" placeholder="Email">

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>

						@if ($errors->has('email'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input id="password" type="password"
							class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
							name="password" placeholder="Password">

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						@if ($errors->has('password'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input id="password-confirm" type="password" class="input100 form-control"
							name="password_confirmation" placeholder="Confirm Password">

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						@if ($errors->has('password'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>

					<div class="contact100-form-checkbox validate-input">
						<input class="input-checkbox100" id="terms" type="checkbox" name="terms" value="1">
						<label class="label-checkbox100" for="terms">
							I Agree to <a href="{{ url('/terms') }}">Terms and Conditions</a><span
								style="color:red;">*</span>
						</label><br>
						@if ($errors->has('terms'))
						<span style="color:red; font-size:12px;">
							<strong>You must agree to our terms</strong>
						</span>
						@endif
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							{{ __('Register') }} As Employer
						</button>
					</div>
					<div class="text-center p-t-13">
						<strong>
							<a class="txt3" href="{{route('freelancer')}}">
								Sign up as freelancer?
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</strong>
					</div>
					<div class="text-center p-t-13">
						<strong>
							<a class="txt2" href="{{route('login')}}">
								Already signed Up? Login
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</strong>
					</div>
				</form>

			</div>
		</div>
	</div>



	<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('assets/frontend/css/register/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/select2/select2.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})

	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/js/main.js')}}"></script>

</body>

</html>