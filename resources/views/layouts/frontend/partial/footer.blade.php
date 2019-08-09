<footer class="text-center">

    <div class="container mx-auto">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    {{--<a class="logo" href="#"><img src="images/logo.png" alt="Logo Image"></a>--}}
                    <p class="copyright">{{ config('app.name') }} @ 2019. All rights reserved.</p>
                    <ul class="icons">
                        <li><a href="https://www.facebook.com/aswiftconnect/" target="_blank"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a href="https://twitter.com/ASwiftConnect1" target="_blank"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a href="https://www.instagram.com/aswiftconnect/" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
                        {{-- <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li> --}}
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><strong>CATEGORIES</strong></h4>
                    <ul style="text-align: justify;">
                        @foreach($categories as $category)
                            <li  style="color:white;"><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form method="POST" action="{{ route('subscriber.store') }}">
                            @csrf
                            @honeypot
                            <input class="email-input" name="email" type="email" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->

</footer>