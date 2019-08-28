<header>
        <div class="container-fluid position-relative no-side-padding">
    
            <a href="{{ route('landing') }}" class="logo" style=" font-family: montserrat-bold, sans-serif;font-weight:400;font-size:15px;">ASWIFTCONNECT</a>
    
            <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
    
            <ul class="main-menu visible-on-click" id="main-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    @if(Auth::user()->role->id == 1)
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    @endif
                    @if(Auth::user()->role->id == 2)
                        <li><a href="{{ route('author.dashboard') }}">Dashboard</a></li>
                    @endif
                    @if(Auth::user()->role->id == 3)
                        <li><a href="{{ route('freelancer.dashboard') }}">Dashboard</a></li>
                    @endif
                @endguest
            </ul><!-- main-menu -->
    
            @if(Request::is('browse/*'))
            <ul class="main-menu visible-on-click" id="main-menu">
               <li><a href="{{ route('browse') }}">Browse Freelancers</a></li>
            </ul>
            @else 
                <div class="src-area">
                    <form method="GET" action="{{ route('browse') }}">
                        <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                        <input class="src-input" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="Type of search">
                    </form>
                </div>
            @endif
    
        </div><!-- conatiner -->
    </header>
    