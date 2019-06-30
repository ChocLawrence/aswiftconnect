<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

   <title>419 ASwiftConnect</title>
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

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/errors/timeout/css/style.css')}}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
			</div>
			<h2>419 -Session timeout</h2>
			<p>Go back to Homepage and login to continue</p>
			<a href="{{route('home')}}">Go To Homepage</a>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
