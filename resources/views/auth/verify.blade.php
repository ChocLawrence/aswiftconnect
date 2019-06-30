<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <!-- The title tag shows in email notifications, like Android 4.4. -->

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


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
                <br><br>
                <h2 style="color:#0fad00">Success</h2>
                <img src="{{ asset('assets/frontend/images/success.png') }}" width="60px" height="60px">
                <h3>{{ __('Verify Your Email Address') }}</h3>
                <p style="font-size:20px;color:#5C5C5C;">
                    {{ __('ASwiftConnect just sent a  verification link to your email address.') }}</p>
                <p> {{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p> {{ __('If you did not receive the email') }}</p>
                <a href="{{ route('verification.resend') }}"
                    class="btn btn-success">{{ __('click here to request another') }}</a>.
                <br><br>
            </div>

        </div>
    </div>
</body>

</html>