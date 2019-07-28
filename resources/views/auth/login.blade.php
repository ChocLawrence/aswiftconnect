<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | ASwiftConnect</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/login/css/main.css')}}">
<!--===============================================================================================-->
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
		<div class="container-login100" style="background-image: url('{{ asset('assets/frontend/css/login/images/img-01.jpg')}}');">
			<div class="wrap-login100 p-t-20 p-b-30">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">  
				   @csrf
				   
                    <div class="login100-form-avatar" title="Go back to Homepage">
					   <a href="{{route('landing')}}"><img src="{{ asset('assets/frontend/css/login/images/avatar-01.jpg')}}" alt="Logo"></a>
					</div>

					
					<span class="login100-form-title p-t-20 p-b-45">
						Login To <span class="orange">ASwift</span>Connect</span>
                    </span>
                    

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input id="password" type="password"  placeholder="Password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
                            <i class="fa fa-lock"></i>
						</span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>

                        @endif 
                        
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button type="submit" class="login100-form-btn">
                           {{ __('Login') }}
						</button>
                    </div>
                    

                    @if (Route::has('password.request'))
					<div class="text-center w-full p-t-25 p-b-25">
						<a href="{{ route('password.request')}}" class="txt1">
							Forgot Username / Password?
						</a>
                    </div>
                    @endif

					<div class="text-center w-full">
						<a class="txt1" href="{{route('register')}}">
							<strong>Register as Employer</strong>					
						</a> | 
						<a class="txt2" href="{{route('freelancer')}}">
							<strong>Register as Freelancer</strong>					
						</a> 
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{ asset('assets/frontend/css/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('assets/frontend/css/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/frontend/css/login/js/main.js')}}"></script>

</body>
</html>