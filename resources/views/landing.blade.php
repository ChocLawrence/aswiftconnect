@include('cookieConsent::index')
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
    <title>ASwiftConnect | Home</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

<body id="home">

    <!-- header 
   ================================================== -->
    <header id="header" class="row">

        <div class="header-logo">
            <a href="{{route('landing')}}">
                ASWIFTCONNECT
            </a>
        </div>

        <nav id="header-nav-wrap">
            <ul class="header-main-nav">
                <li class="current"><a class="smoothscroll" href="#home" title="home">Home</a></li>
                <li><a class="smoothscroll" href="#about" title="about">About</a></li>
                <li><a class="smoothscroll" href="#fields" title="fields">Fields</a></li>
                <li><a class="smoothscroll" href="#testimonials" title="testimonials">Testimonials</a></li>
                <li><a href="{{ route('home') }}" title="projects">Projects</a></li>
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

                    <h3 data-aos="fade-up">Welcome to ASWIFTCONNECT</h3>

                    <h1 data-aos="fade-up">
                        We provide Professional <br>
                        Freelancer Services <br>
                        For our great clients.<br>
                    </h1>

                    <div class="buttons" data-aos="fade-up">
                        <a href="" class="button stroke">
                            <span class="icon-circle-down" aria-hidden="true"></span>
                            Join As Professional
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
            <li>
                <a href="https://www.facebook.com/aswiftconnect/" target="_blank"><i
                        class="fa fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-twitter" target="_blank"></i></a>
            </li>
            <li>
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

                <div class="fluid-video-wrapper">
                    <iframe
                        src="https://player.vimeo.com/video/14592941?title=0&amp;byline=0&amp;portrait=0&amp;color=F64B39"
                        width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen
                        allowfullscreen></iframe>
                </div>

            </div>
            <div class="col-six">
                <br /><br /><br /><br /><br />
                <p class="lead" data-aos="fade-up">
                    ASwiftConnect is a platform which brings together professionals and employers who
                    want to get their projects done in the least possible amount of time and at the least cost.
                    We pay great attention to all our customers and ensure the best results.Never fail to Contact
                    us for anything.
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
                            done for free whose price is covered by SwiftConnect.We connect with our clients and we keep
                            them close.</p>

                    </div>

                </div> <!-- /bgrid -->

            </div> <!-- end features-list -->

        </div> <!-- end about-features -->

        <div class="row about-how">

            <h1 class="intro-header" data-aos="fade-up">How ASwiftConnect Works?</h1>

            <div class="about-how-content" data-aos="fade-up">
                <div class="about-how-steps block-1-2 block-tab-full group">

                    <div class="bgrid step" data-item="1">
                        <h3>Registration</h3>
                        <p>Clients register through the client(employer portal) while
                            professionals do same through the professionals(freelancer)
                            portal.
                        </p>
                    </div>

                    <div class="bgrid step" data-item="2">
                        <h3>Job Postings</h3>
                        <p>Jobs are posted by the clients whenever a job is to be done.Posting
                            a job requires the client to login to his or her client dashboard and
                            carry out postings.
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
                            all of them.
                        </p>
                    </div>

                </div>
            </div> <!-- end about-how-content -->

        </div> <!-- end about-how -->


    </section> <!-- end about -->


    <!-- fields
    ================================================== -->
    <section id="fields">
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
                                    <li><span>243</span> Sout Africa</li>
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


    <!-- testimonials Section
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
                                    class="fa fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter" target="_blank"></i></a>
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
                        Information Technology Company<br>
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
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#fields">Fields</a></li>
                        <li><a href="#testimonials">testimonials</a></li>
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
                        <span>© Copyright ASwiftConnect 2019.</span>
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

</body>

</html>