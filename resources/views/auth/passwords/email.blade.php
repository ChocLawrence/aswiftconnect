<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <!-- The title tag shows in email notifications, like Android 4.4. -->
    <title>Password reset |  AswiftConnect</title>
    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/css/landing/favicon.ico')}}" type="image/x-icon">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/css/landing/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/frontend/css/landing/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/css/landing/favicon-16x16.png')}}">
	<link rel="manifest" href="{{ asset('assets/frontend/css/landing/site.webmanifest')}}">
	<link rel="mask-icon" href="{{ asset('assets/frontend/css/landing/safari-pinned-tab.svg')}}" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
    <link rel="icon" href="{{ asset('assets/frontend/css/landing/favicon.ico')}}" type="image/x-icon">

    <style>
        .form-gap {
            padding-top: 70px;
        }
    </style>

</head>

<body>

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                @if (!session('status'))
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    @honeypot

                                    <div class="form-group row">

                                        <div class="input-group col-md-12">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <span><input id="email" type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" value="{{ old('email') }}" placehoder="Enter your email address" required></span>

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert" style="color:red;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @endif

                            </div>


                            <a href="{{route('landing')}}" title="Go Back to Homepage"><img style="border-radius: 50%;"
                                width="50" height="50"
                                src="{{ asset('assets/frontend/css/login/images/avatar-01.png')}}" alt="AVATAR"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>