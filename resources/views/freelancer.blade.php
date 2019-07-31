<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register  Freelancer | ASwiftConnect</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/freelancer/style.css')}}">
	
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

    <div class="main">

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
					<img width="683px" height="605px" src="{{ asset('assets/frontend/images/form-img.jpg')}}" alt="">
                    <div class="signup-img-content">
						<h2>REGISTER</h2>
						<p>We can't wait to get you started!</p><br><br>
						<h2>Join our pool of freelancers</h2>
						<p>Get jobs right away!</p><br><br>
						<h2>Our freelancers are professionals</h2>
						<p>We got you covered</p><br><br>
						<a class="txt2" href="{{route('register')}}"><button class="btn btn-primary">Join us as Employer</button><br><br></a>
						<a class="txt2" href="{{route('login')}}" style="color:white;">
							Already signed Up? Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
                    </div>
                </div>
                <div class="signup-form">
					<div class="center">
							<a href="{{route('landing')}}" title="Go Back to Homepage"><img style="border-radius: 50%;"
								width="50" height="50"
								src="{{ asset('assets/frontend/css/login/images/avatar-01.png')}}" alt="AVATAR"></a>
					</div>
					<form class="register-form" id="register-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
						@csrf
                        <div class="form-row">

                            <div class="form-group">

                                <div class="form-input">
                                    <label for="name" class="required">Full names</label>
									<input type="text" name="name" id="name"  value="{{ old('name') }}"/>
									<input id="role_id" type="text" name="role_id" value="3" style="display:none;">
									@if ($errors->has('name'))
										<span class="invalid-feedback">
											{{ $errors->first('name') }}
										</span>
									@endif
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
									<input type="text" name="email" id="email"  value="{{ old('email') }}" />
									@if ($errors->has('email'))
									<span class="invalid-feedback">
										{{ $errors->first('email') }}
									</span>
									@endif
								</div>
								
								<div class="form-input">
									<label for="password" class="required">Password</label>
									<input type="password" name="password" id="password" />
									@if ($errors->has('password'))
									<span class="invalid-feedback">
										{{ $errors->first('password') }}
									</span>
									@endif
								</div>

								<!--test-->
									<div class="form-select">
										<div class="label-flex">
											<label for="specialty" class="required">I am a freelance ...</label>
										</div>
										<div class="select-list">
											<select class="form-control" id="sel1" name="specialty">
												<option value="">Select...</option>
												<option value="1">Developer</option>
												<option value="2">Designer</option>
											</select>
										</div>
										@if ($errors->has('specialty'))
										<span class="invalid-feedback">
											{{ $errors->first('specialty') }}
										</span>
									@endif
									</div>

								<!--test end-->
								{{-- <div class="form-group ">
										<div class="label-flex">
												<label for="specialty" class="required">I am a freelance...</label>
											</div>
										<select class="form-control" id="sel1" name="specialty">
										  <option value="1">1</option>
										  <option value="2">2</option>
										</select>
									  </div> --}}
								
                            </div>
                            <div class="form-group">

								<div class="form-input">
									<label for="username" class="required">Username</label>
									<input type="text" name="username" id="username"  value="{{ old('username') }}"/>
									@if ($errors->has('username'))
									<span class="invalid-feedback">
										{{ $errors->first('username') }}
									</span>
									@endif
								</div>

								<div class="form-input">
									<label for="phone" class="required">Phone number</label>
									<input type="number" name="phone" id="phone" value="{{ old('phone') }}"/>
									@if ($errors->has('phone'))
									<span class="invalid-feedback">
										{{ $errors->first('phone') }}
									</span>
									@endif
								</div>

								<div class="form-input">
									<label for="confirm_password" class="required">Confirm Password</label>
									<input type="password" name="password_confirmation" id="confirm_password" />
									@if ($errors->has('password'))
									<span class="invalid-feedback">
										{{ $errors->first('password') }}
									</span>
									@endif
								</div>

								<div class="form-input">
									<label for="resume" class="required">Resume (max 4MB)</label>
									<div class="input-group">
										<span class="input-group-btn">
											<button id="fake-file-button-browse" type="button" class="btn btn-default">
												<span class="glyphicon glyphicon-file"></span>
											</button>
										</span>
										<input type="file" id="files-input-upload" style="display:none" name="resume" accept="application/pdf">
										<input type="text" id="fake-file-input-name" disabled="disabled" placeholder="File not selected" class="form-control">
									</div>
									@if ($errors->has('resume'))
									<span class="invalid-feedback">
										{{ $errors->first('resume') }}
									</span>
									@endif
								</div>

                            </div>
						</div>
						<div class="form-input">
									
							<input class="input-checkbox100" id="terms" type="checkbox" name="terms" value="1">
							<label class="label-checkbox100" for="terms">
								I Agree to the <a href="{{ url('/terms') }}">Terms and Conditions</a><br>& <a href="{{ url('/privacy') }}">Privacy Policy</a><span
									style="color:red;">*</span>
							</label><br>
							@if ($errors->has('terms'))
							<span class="invalid-feedback">
								You must agree to our terms
							</span>
							@endif
						</div>
                        <div class="form-submit">
                            <input type="submit" value="Register as Freelancer" class="submit" id="submit" name="submit" />
                        </div>
					</form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
	<script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/frontend/vendor/wnumb/wNumb.js')}}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/freelancer/main.js')}}"></script>
	<script type="text/javascript">
		// Fake file upload
		document.getElementById('fake-file-button-browse').addEventListener('click', function() {
			document.getElementById('files-input-upload').click();
		});
		
		document.getElementById('files-input-upload').addEventListener('change', function() {
			document.getElementById('fake-file-input-name').value = this.value;
			
		});

		
		</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>