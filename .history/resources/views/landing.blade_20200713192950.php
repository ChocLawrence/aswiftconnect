<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASwiftConnect | Home</title>

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="eN4C0is58cktJ0lC3SMuGVW5MX6kWopf4_Hj2r5kkM4" />

    <meta property="og:title" content="ASwiftConnect" />
    <meta property="og:image" content="{{ asset('assets/frontend/css/landing/images/hero-bg.jpg') }}" />
    <meta property="og:type" content="website" />

    <!-- CSS
   ================================================== -->
    <link href="{{ asset('assets/frontend/css/landing/css/base.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/landing/css/vendor.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/landing/css/main.css') }}" rel="stylesheet">


    <!-- script
   ================================================== -->
    <script src="{{ asset('assets/frontend/css/landing/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/frontend/css/landing/js/pace.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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

    @push('scripts')
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

<body id="top">

    <!-- header
   ================================================== -->
    <header id="header" class="row">

        <div class="header-logo">
            <a href="{{route('landing')}}">
                ASWIFTCONNECT &nbsp;<img src="{{ asset('assets/frontend/css/landing/favicon.ico')}}" width="20"
                    height="20">
            </a>
        </div>

        <nav id="header-nav-wrap">
            <ul class="header-main-nav">
                <li class="current"><a class="smoothscroll" href="#home" title="home">Home</a></li>
                <li><a class="smoothscroll" href="#about" title="about">About</a></li>
                <li><a class="smoothscroll" href="#pricing" title="pricing">Fields</a></li>
                <li><a class="smoothscroll" href="#testimonials" title="testimonials">Testimonials</a></li>
                <li><a href="{{ route('journey') }}" title="Our Journey">Our Journey</a></li>
                <li><a href="{{ route('home') }}" title="Projects">Projects</a></li>
                {{-- <li><a href="{{ route('browse') }}" title="Freelancers">Freelancers</a></li> --}}
            </ul>

            <a href="{{ route('login') }}" title="login to ASwiftConnect" class="button button-primary cta">Login</a>
        </nav>

        <a class="header-menu-toggle" href="#"><span>Menu</span></a>

        @if(session()->has('message'))
        <div class="alert-box alert alert-success alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>{{session()->get('message')}}
        </div>
        @endif

    </header> <!-- /header -->




    <!-- home
   ================================================== -->
    <section id="home" data-parallax="scroll"
        data-image-src="{{ asset('assets/frontend/css/landing/images/hero-bg.png')}}" data-natural-width=3000
        data-natural-height=2000>

        <div class="overlay"></div>
        <div class="home-content">

            <div class="row contents">
                <div class="home-content-left">


                    <h1 data-aos="fade-up">
                        Connecting Africa's Top Tech and Design Talent to the World <br>
                    </h1>
                    <h3 data-aos="fade-up">We provide companies with Qualified and Vetted Freelancers to scale their
                        teams</h3>


                    <div class="buttons" data-aos="fade-up">
                        <a href="{{route('freelancer')}}" class="button stroke">
                            <span class="icon-circle-down" aria-hidden="true"></span>
                            Join As Freelancer
                        </a>
                        <a href="{{route('register')}}" class="button stroke">
                            <span class="icon-play" aria-hidden="true"></span>
                            Join As Employer
                        </a>
                        <!-- <a href="http://player.vimeo.com/video/14592941?title=0&amp;byline=0&amp;portrait=0&amp;color=39b54a" data-lity class="button stroke">
                            <span class="icon-play" aria-hidden="true"></span>
                            Join As Employer
                        </a> -->
                    </div>

                </div>

                <!-- <div class="home-image-right">
                    <img src="{{ asset('assets/frontend/css/landing/images/iphone-app-470.png')}}"
                        srcset="{{ asset('assets/frontend/css/landing/images/iphone-app-470.png')}} 1x, {{asset('assets/frontend/css/landing/images/iphone-app-940.png')}} 2x"
                        data-aos="fade-up">
                </div> -->
            </div>

        </div> <!-- end home-content -->

        <ul class="home-social-list">
            <li title="Follow us on Facebook">
                <a href="https://www.facebook.com/aswiftconnect/" target="_blank"><i
                        class="fa fa-facebook-square"></i></a>
            </li>
            <li title="Follow us on Twitter">
                <a href="https://twitter.com/ASwiftConnect1" target="_blank"><i class="fa fa-twitter-square"
                        target="_blank"></i></a>
            </li>
            <li title="Follow us on Instagram">
                <a href="https://www.instagram.com/aswiftconnect/" target="_blank"><i class="fa fa-instagram"></i></a>
            </li>
            {{-- <li>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
            </li> --}}
        </ul>
        <!-- end home-social-list -->

        <div class="home-scrolldown">
            <a href="#about" class="scroll-icon smoothscroll">
                <span>Scroll Down</span>
                <i class="icon-arrow-right" aria-hidden="true"></i>
            </a>
        </div>

    </section> <!-- end home -->


    <!-- about
    ================================================== -->
    <section id="about">

        <div class="row about-intro">

            <div class="col-six">
                <h1 class="intro-header" data-aos="fade-up">About ASwiftConnect</h1>

                <div class="fluid-video-wrapper" style="margin-top:40px;">
                    <iframe src="{{ asset('assets/ad/ad.mp4')}}" width="100%" height="281" frameborder="0"
                        allow="autoplay; fullscreen" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                    <!-- <img src="{{ asset('assets/frontend/images/zoom.jpg')}}" alt="About image">          -->
                </div>

            </div>
            <div class="col-six">
                <br /><br /><br /><br /><br />
                <p class="lead" data-aos="fade-up">
                    A Swift Connect is a social enterprise whose mission is to create jobs on the African Continent for
                    the millions of unemployed youth. We have a vast pool of diverse and highly vetted Programmers,
                    Ux/Ui Designers, and Videographers who are ready to help you achieve your wildest projects.

                </p>
            </div>

        </div>

        <div class="row about-features">

            <div class="features-list block-1-3 block-m-1-2 block-mob-full group">

                <div class="bgrid feature text-center" data-aos="fade-up">

                    <span class="icon"><i class="icon-window"></i></span>

                    <div class="service-content">

                        <h3>Latest Technologies</h3>

                        <p>At ASwiftConnect, our freelancers ensure they use the most recent technologies in order to do
                            the jobs of our clients.This makes sure they deliver top quality work at all times.</p>

                    </div>

                </div> <!-- /bgrid -->

                <div class="bgrid feature text-center" data-aos="fade-up">

                    <span class="icon"><i class="icon-image"></i></span>

                    <div class="service-content">
                        <h3>Experienced Freelancers</h3>

                        <p>Our team of freelancers have gone through a rhobust background check which makes them
                            qualified to handle all your projects.They are professionals and they pride in their work.
                        </p>
                    </div>

                </div> <!-- /bgrid -->


                <div class="bgrid feature text-center" data-aos="fade-up">

                    <span class="icon"><i class="icon-file"></i></span>

                    <div class="service-content">
                        <h3>Bonuses</h3>

                        <p>Loyal clients who always work with us are given free bonuses. This includes having a project
                            done for free whose price is covered by ASwiftConnect.We connect with our clients and we
                            keep
                            them close.</p>

                    </div>

                </div> <!-- /bgrid -->

            </div> <!-- end features-list -->

        </div> <!-- end about-features -->

        <div class="row about-how">

            <h1 class="intro-header" data-aos="fade-up">Why Us?</h1>

            <div class="about-how-content" data-aos="fade-up">
                <div class="about-how-steps">

                    <div class="bgrid step" data-item="1" style="min-height: 150px;">
                        <h3>Reducing unemployment</h3>
                        <p>By hiring a freelancer on our platform you are contributing to reducing the unemployment gap
                            on the African Continent, and therefore stimulating the economy in the region where that
                            Freelancer resides. You automatically become part of the movement to help Africa become
                            self-sufficient.
                            {{-- <a href="#">Click below to see how</a> --}}
                        </p>
                    </div>

                    <div class="bgrid step" data-item="2" style="min-height: 150px;">
                        <h3>Diversity</h3>
                        <p>You have a unique value proposition which is diversity. You have the opportunity to have
                            someone on your team who has a different way of looking at things due to being from a
                            different country and has a different culture which can be a competitive advantage if you
                            have plans of expanding to international markets.

                        </p>
                    </div>

                    <div class="bgrid step" data-item="3" style="min-height: 150px;">
                        <h3>Competitive prices</h3>
                        <p>Our prices are one of the most competitive in the industry.By working with us, you are
                            guaranteed to get your projects done with quality at lesser costs.
                        </p>
                    </div>

                </div>
            </div> <!-- end about-how-content -->

        </div> <!-- end about-how -->

        <div class="row about-how">

            <h1 class="intro-header" data-aos="fade-up">How ASwiftConnect Works?</h1>

            <div class="about-how-content" data-aos="fade-up">
                <div class="about-how-steps block-1-2 block-tab-full group">

                    <div class="bgrid step" data-item="1">
                        <h3>Registration</h3>
                        <p>Employers register through the employer portal while
                            professionals do same through the freelancer
                            portal.
                        </p>
                    </div>

                    <div class="bgrid step" data-item="2">
                        <h3>Posting Projects</h3>
                        <p>Jobs are posted by the employers whenever a job is to be done.Posting
                            a job requires the employer to login to his or her dashboard and create a post. Our
                            reviewers will review the post and
                            either accept or reject based on many criteria which span from clarity to feasibility.
                        </p>
                    </div>

                    <div class="bgrid step" data-item="3">
                        <h3>Freelancer Selection</h3>
                        <p>Our Management team, using an expert based algorithm, will get the professionals
                            who are fit for the job and assign them to the project.
                        </p>
                    </div>

                    <div class="bgrid step" data-item="4">
                        <h3>Job Completion</h3>
                        <p>When the freelancer(s) have finished working on the project, payments are then made to
                            them.
                        </p>
                    </div>

                </div>
            </div> <!-- end about-how-content -->

        </div> <!-- end about-how -->


    </section> <!-- end about -->


    <!-- pricing
    ================================================== -->
    <section id="pricing">
        <div class="row pricing-content">

            <div class="col-four pricing-intro">
                <h1 class="intro-header" data-aos="fade-up">Our Fields of Interest</h1>

                <p data-aos="fade-up">
                    ASwiftConnect has a vast number of fields we delve into.The most important
                    ones will be listed for which we have more freelancers to work on.
                </p>
            </div>

            <div class="col-eight pricing-table">
                <div class="row">

                    <div class="col-six plan-wrap">
                        <div class="plan-block" data-aos="fade-up">

                            <div class="plan-top-part">
                                <h3 class="plan-block-title">Projects</h3>
                                <!-- <p class="plan-block-price"><sup>$</sup>25</p> -->
                                <p class="plan-block-per">Tech</p>
                            </div>

                            <div class="plan-bottom-part">
                                <ul class="plan-block-features">
                                    <li><span>646</span> Web Design</li>
                                    <li><span>420</span> UI & UX Development</li>
                                    <li><span>151</span> API Creation</li>
                                    <li><span>430</span> Android & IOS</li>
                                    <li><span>304</span> Front End Development</li>
                                    <li><span>340</span> Wordpress and CMS</li>
                                    <li><span>167</span> Python</li>
                                </ul>

                                <!-- <a class="button button-primary large" href="">Get Started</a> -->
                            </div>

                        </div>
                    </div> <!-- end plan-wrap -->

                    <div class="col-six plan-wrap">
                        <div class="plan-block primary" data-aos="fade-up">

                            <div class="plan-top-part">
                                <h3 class="plan-block-title">Client Countries</h3>
                                <!-- <p class="plan-block-price"><sup>$</sup>50</p> -->
                                <p class="plan-block-per">Worldwide</p>
                            </div>

                            <div class="plan-bottom-part">
                                <ul class="plan-block-features">
                                    <li><span>120</span> USA</li>
                                    <li><span>486</span> Cameroon</li>
                                    <li><span>335</span> Nigeria</li>
                                    <li><span>113</span> Australia</li>
                                    <li><span>243</span> South Africa</li>
                                    <li><span>103</span> Kenya</li>
                                    <li><span>392</span> Ghana</li>
                                </ul>

                            </div>

                        </div>
                    </div> <!-- end plan-wrap -->

                </div>
            </div> <!-- end pricing-table -->

        </div> <!-- end pricing-content -->
    </section> <!-- end pricing -->


    <!-- Testimonials Section
    ================================================== -->
    <section id="testimonials">

        <div class="row">
            <div class="col-twelve">
                <h1 class="intro-header" data-aos="fade-up">What To Expect From the Platform.</h1>
            </div>
        </div>

        <div class="row owl-wrap">

            <div id="testimonial-slider" data-aos="fade-up">

                <div class="slides owl-carousel">

                    <div>
                        <p>
                            For all the software solutions I need, I am sure to be covered by ASwiftConnect. They are
                            reliable and can
                            be counted on. Link up with them and have affordable rates.
                        </p>

                        <div class="testimonial-author">
                            <img src="{{ asset('assets/frontend/images/jasmine.jpg')}}" alt="Author image">
                            <div class="author-info">
                                Jasmine White
                                <span>Billionaire Factory,Baltimore -USA</span>
                            </div>

                        </div>
                    </div>

                    <div>
                        <p>
                            When I needed help with a project, I quicky posted a job here based on an advert I saw.
                            To my surprise, everything happened so fast and after a couple of days, a completed project
                            was emailed to me.Thanks to ASwiftConnect.
                        </p>

                        <div class="testimonial-author">
                            <img src="{{ asset('assets/frontend/images/julie.png')}}" alt="Author image">
                            <div class="author-info">
                                Julie Bes
                                <span>Student, Cameroon</span>
                            </div>

                        </div>
                    </div>

                    <div>
                        <p>
                            Your work is going to be done as fast as possible considering your
                            requirements.With my fitness company, I easily got some software done and will always stay
                            in touch anytime I need any tech service.
                        </p>

                        <div class="testimonial-author">
                            <img src="{{ asset('assets/frontend/css/landing/images/avatars/mathew.jpg')}}"
                                alt="Author image">
                            <div class="author-info">
                                Matthew Spahr
                                <span>Spahr Fit - Chicago,USA</span>
                            </div>
                        </div>
                    </div>



                </div> <!-- end slides -->

            </div> <!-- end testimonial-slider -->

        </div> <!-- end flex-container -->

    </section> <!-- end testimonials -->




    <!-- footer
    ================================================== -->
    <footer>

        <div class="footer-main">
            <div class="row">

                <div class="col-three md-1-3 tab-full footer-info">

                    <div class="footer-logo">ASWIFTCONNECT</div>

                    <p>
                        We value all our clients and we are always here whenever you need us.
                        Contact us with the information on this section.We would love to hear from you.
                    </p>

                    <ul class="footer-social-list">
                        <li>
                            <a href="https://www.facebook.com/aswiftconnect/" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/ASwiftConnect1" target="_blank"><i class="fa fa-twitter"
                                    target="_blank"></i></a>
                        </li>
                        {{-- <li>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </li> --}}
                        <li>
                            <a href="https://www.instagram.com/aswiftconnect/" target="_blank"><i
                                    class="fa fa-instagram"></i></a>
                        </li>
                    </ul>


                </div> <!-- end footer-info -->

                <div class="col-three md-1-3 tab-1-2 mob-full footer-contact">

                    <h4>Contact</h4>
                    <p>
                        ASwiftConnect LLC<br>
                        332 S Michigan Ave #10-A81,<br>
                        Chicago,Illinois 60604<br>
                        USA
                    </p>

                    <p>
                        info@aswiftconnect.com <br>
                        Phone: +1 800-537-6821<br>
                    </p>

                </div> <!-- end footer-contact -->

                <div class="col-two md-1-3 tab-1-2 mob-full footer-site-links">

                    <h4>Site Links</h4>

                    <ul class="list-links">
                        <li><a href="#top">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#pricing">Fields</a></li>
                        <li><a href="#testimonials">Expectations</a></li>
                    </ul>
                    <a href="{{route('faqs')}}">FAQS</a>

                </div> <!-- end footer-site-links -->

                <div class="col-four md-1-2 tab-full footer-subscribe">

                    <h4>Our Newsletter</h4>

                    <p>Send us your email and we will notify you for every new job posting</p>

                    <div class="subscribe-form">

                        <div class="subscribe-form">

                            <div class="input-area">
                                <form method="POST" action="{{ route('subscriber.store') }}" class="group">
                                    @csrf
                                    @honeypot
                                    <div class="row">
                                        <input class="col-md-8 email-input" id="mc-email" name="email" type="email"
                                            placeholder="Enter your email" style="color:white;" required>
                                        <input class="col-md-4 submit-btn button button-primary cta" type="submit"
                                            name="subscribe" value="Send">
                                    </div>
                                </form>
                            </div>

                        </div>



                    </div>

                </div> <!-- end footer-subscribe -->

            </div> <!-- /row -->
        </div> <!-- end footer-main -->


        <div class="footer-bottom">

            <div class="row">

                <div class="col-twelve">
                    <div class="copyright">
                        <span>© Copyright ASwiftConnect 2019. All Rights Reserved</span>
                        <!-- <span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>		         	 -->
                    </div>

                    <div id="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up"></i></a>
                    </div>
                </div>

            </div> <!-- end footer-bottom -->

        </div>

    </footer>

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('assets/frontend/css/landing/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{ asset('assets/frontend/css/landing/js/plugins.js')}}"></script>
    <script src="{{ asset('assets/frontend/css/landing/js/main.js')}}"></script>
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

    @include('cookieConsent::index')
</body>

</html>
