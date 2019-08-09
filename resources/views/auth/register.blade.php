<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register as Employer | ASwiftConnect</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/register/css/main.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" href="{{ asset('assets/frontend/country/build/css/intlTelInput.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/country/build/css/demo.css')}}">
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
<body style="background-color: #000000;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('{{ asset('assets/frontend/css/register/images/bg-01.jpg')}}');">
				<div class="centered">
						<strong><h3 style="background:black;padding:10px;
							border-radius: 25px;">REGISTER as an Employer</h3></strong><br>
						<strong><h3 style="background:black;padding:10px;border-radius: 25px;">Join our clients in getting quality work done.</h3></strong><br>
						<strong><h3 style="background:black;padding:10px;border-radius: 25px;">Our freelancers are professionals</h3></strong><br>
						<a class="txt2" href="{{route('freelancer')}}"><button class="btn btn-primary">Join us as Freelancer</button><br><br></a>
				</div>
	
			</div>
		
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					@csrf
					@honeypot
					<span class="login100-form-title p-b-59">
						ASwiftConnect |  Employer
						<a href="{{route('landing')}}" title="Go Back to Homepage"><img style="border-radius: 50%;"
							width="50" height="50"
							src="{{ asset('assets/frontend/css/login/images/avatar-01.png')}}" alt="AVATAR"></a>
						
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Name..." value="{{ old('name') }}">
						<input id="role_id" type="text" name="role_id" value="2" style="display:none;">
						<span class="focus-input100"></span>
						@if ($errors->has('name'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" placeholder="Email addess..."  value="{{ old('email') }}">
						<span class="focus-input100"></span>
						@if ($errors->has('email'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100 form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" name="username" placeholder="Username..."  value="{{ old('username') }}">
						<span class="focus-input100"></span>
						@if ($errors->has('username'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Phone is required">
						<span class="label-input100">Phone</span>
						{{-- <input class="input100 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" type="number" name="phone" placeholder="Phone..."  value="{{ old('phone') }}"> --}}
						<input class="input100 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" type="number"  value="{{ old('phone') }}">
						<span class="focus-input100"></span>
						@if ($errors->has('phone'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="*************">
						<span class="focus-input100"></span>
						@if ($errors->has('password'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password_confirmation" placeholder="*************">
						<span class="focus-input100"></span>
						@if ($errors->has('password'))
						<div class="invalid-feedback">
							<strong>{{ $errors->first('password') }}</strong>
						</div>
						@endif
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="terms">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I Agree to the <a href="{{ url('/terms') }}">Terms and Conditions</a><br>& <a href="{{ url('/privacy') }}">Privacy Policy</a><span
										style="color:red;">*</span>
								</span>
							</label>
						</div>
						@if ($errors->has('terms'))
						<div style="color:red; font-size:12px;">
							<strong>You must agree to our terms</strong>
						</div>
						@endif

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Register as Employer
							</button>
						</div>

						<a href="{{ url('login') }}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('assets/frontend/css/register/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/css/register/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/register/js/main.js')}}"></script>

	  <script src="{{ asset('assets/frontend/country/build/js/intlTelInput.js')}}"></script>
	  <script>
		var input = document.querySelector("#phone");
		window.intlTelInput(input, {
		  // allowDropdown: false,
		  // autoHideDialCode: false,
		  // autoPlaceholder: "off",
		  // dropdownContainer: document.body,
		  // excludeCountries: ["us"],
		  // formatOnDisplay: false,
		  // geoIpLookup: function(callback) {
		  //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
		  //     var countryCode = (resp && resp.country) ? resp.country : "";
		  //     callback(countryCode);
		  //   });
		  // },
		  // hiddenInput: "full_number",
		  // initialCountry: "auto",
		  // localizedCountries: { 'de': 'Deutschland' },
		  // nationalMode: false,
		  // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		  // placeholderNumberType: "MOBILE",
		  // preferredCountries: ['cn', 'jp'],
		  // separateDialCode: true,
		  utilsScript: "{{ asset('assets/frontend/country/build/js/utils.js')}}",
		});
	  </script>

</body>
</html>