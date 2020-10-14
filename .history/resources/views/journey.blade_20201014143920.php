<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A Lot of Africa’s youth graduate from College or Trade Schools but can’t find a job after school.
               Our dream is to provide good paying gigs in the tech sector to the highly qualified but
               unemployed or underemployed tech ">
    <meta name="author" content="">
    <meta property="og:title" content="ASwiftConnect" />
    <meta property="og:image" content="{{ asset('assets/frontend/css/landing/images/hero-bg.jpg') }}" />
    <meta property="og:type" content="website" />

    <title>ASwiftConnect | Our Story</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/frontend/css/how/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/frontend/css/how/css/one-page-wonder.css')}}" rel="stylesheet">

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



    <style>
        .stroke {
            color: rgb(220, 217, 214);
            font-weight: bold;
            -webkit-text-stroke: 2px rgb(0, 0, 0);
        }
    </style>


    @push('scripts')

    <!-- Mailchimp-->
    <script id="mcjs">
        !function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/c6ca13401775eb3c3707dec66/e1e805a8e4c5ed53bc5ee65c6.js");
    </script>

    <!-- Facebook Pixel Code -->

    <script>
        !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
     fbq('init', '255693655560742');
    fbq('track', 'PageView');
    fbq('track', 'CompleteRegistration');
    fbq('track', 'Contact');
    fbq('track', 'Search');
    fbq('track', 'ViewContent');

    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=255693655560742&ev=PageView
    &noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
    @endpush
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">ASWIFTCONNECT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container">
                <h3 class="masthead-heading mb-0 stroke">Our Journey to Connect Africa's Top Tech </h3>
                <h4 class="masthead-subheading mb-0 stroke">& Design Talent to the World</h4>
                <a href="{{ route('home') }}" class="btn btn-primary btn-xl rounded-pill mt-5">Go to Homepage</a>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle"
                            src="{{ asset('assets/frontend/css/how/img/people-850097_1280.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-7">Our Dream : Alleviating Unemployment on the African Continent</h2>
                        <p> A Lot of Africa’s youth graduate from College or Trade Schools but can’t find a job after
                            school.
                            Our dream is to provide good paying gigs in the tech sector to the highly qualified but
                            unemployed or underemployed tech &amp; design talent on the African continent.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle"
                            src="{{ asset('assets/frontend/css/how/img/opportunity.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-7">The Problem: Lack of Opportunities</h2>
                        <p>A Majority of African youth are not privileged to have access to a market that is willing to
                            employ them
                            for their skills. So a majority of them become under employed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{ asset('assets/frontend/css/how/img/guy.jpg')}}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-7">Our Solution: Bridge the gap between the African Tech Sector and the rest
                            of the World
                        </h2>
                        <p>With the advent of the Internet,geographical locations should and cannot contain boundaries.
                            All what
                            they need, is a laptop, good internet connection, and the
                            ability to communicate in the language of their employer. A majority of African Developers
                            and
                            Designers have what is needed to be a remote independent contractor, but lack a platform
                            that would
                            help connect them with a company or individual who is going to hire them. That’s where A
                            Swift
                            Connect comes in to connect these great talents with businesses and individuals looking to
                            hire them.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="aboutus-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="aboutus">
                                <h2 class="aboutus-title">WHY US?</h2>
                                <p class="aboutus-text">We believe in People first before profits. That’s our golden
                                    rule. Everything we
                                    do is with the sole intention to create value for our clients and freelancers.</p>
                                <p class="aboutus-text">Hiring a Freelancer on our platform is contributing to our
                                    mission of creating
                                    job opportunities for the thousands of unemployed youth residing on the African
                                    Continent. That aligns
                                    with your company’s Corporate Social Responsibility agenda.</p>
                                <a class="aboutus-more" href="{{ route('home') }}">Get Started</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="aboutus-banner">
                                <img src="{{ asset('assets/frontend/css/how/img/man.png')}}" alt="" width="330"
                                    height="450">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="feature">
                                <div class="feature-box">
                                    <div class="clearfix">
                                        <div class="iconset">
                                            <span class="glyphicon glyphicon-cog icon"></span>
                                        </div>
                                        <div class="feature-content">
                                            <h4>Vetted Freelancers</h4>
                                            <p>All our freelancers are vetted to ensure they are knowledgeable in their
                                                area of practice. So,
                                                you can rest assured that you are working with an expert in his/her
                                                domain when you hire on our
                                                platform.</p>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="feature-box">
                                    <div class="clearfix">
                                        <div class="iconset">
                                            <span class="glyphicon glyphicon-cog icon"></span>
                                        </div>
                                        <div class="feature-content">
                                            <h4>Reliable services</h4>
                                            <p>We provide free consulting for you. We would help you define what you
                                                need for your project all
                                                free of charge.</p>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="feature-box">
                                    <div class="clearfix">
                                        <div class="iconset">
                                            <span class="glyphicon glyphicon-cog icon"></span>
                                        </div>
                                        <div class="feature-content">
                                            <h4>Great support</h4>
                                            <p>We reply to your emails withing 12hours </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container">
            <p class="m-0 text-center text-white small">Copyright &copy; ASWIFTCONNECT 2019. All Rights Reserved</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/frontend/css/how/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/css/how/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
