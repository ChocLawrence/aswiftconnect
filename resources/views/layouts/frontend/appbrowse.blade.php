<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--SEO-->
    <meta name="description" content="Looking for freelance tech jobs remotely, apply to work with us and get lots of projects and earn.">
    
    <!---Meta keywords--->

    <meta name="keywords" content="ASwiftConnect,freelance jobs,tech jobs" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')-{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!-- Stylesheets -->

    <link href="{{asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('assets/frontend/css/swiper.css')}}" rel="stylesheet">

    <link href="{{asset('assets/frontend/css/ionicons.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
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

    @stack('css')

</head>
<body>

    @include('layouts.frontend.partial.headerbrowse')

	@yield('content')

    @include('layouts.frontend.partial.footer')

    <!-- SCIPTS -->

    <script src="{{asset('assets/frontend/js/jquery-2.1.3.min.js')}}"></script>

	<script src="{{asset('assets/frontend/js/jquery-3.1.1.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/tether.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/bootstrap.js')}}"></script>


   <script src="{{asset('assets/frontend/js/swiper.js')}}"></script>

    <script src="{{asset('assets/frontend/js/scripts.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {!! Toastr::message() !!}

    <script>
        @if($errors->any())

          @foreach($errors->all() as $error)
                 
                 toastr.error('{{$error}}','Error',{
                     closeButton:true,
                     progressBar:true,
                 });

          @endforeach
       
        @endif
    
    </script>    
    @stack('js')

    
</body>
</html>
