<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('landing')}}"><strong class="brand">ASWIFTCONNECT</strong></a>
        </div>
        <div class="pull-right">
            <ul class="nav">
                <br>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('home')}}"><i class="material-icons">home</i>Projects Home</a></li>
                        <li><a href="{{route('faqs')}}"><i class="material-icons">contact_support</i> FAQs</a></li>
                        <li>
                            @if(Auth::user()->role->id == 1)
                             <a href="{{route('admin.settings')}}"><i class="material-icons">settings</i>Settings</a>
                            @elseif(Auth::user()->role->id == 2)
                             <a href="{{route('author.settings')}}"><i class="material-icons">settings</i>Settings</a>
                            @else
                             <a href="{{route('freelancer.settings')}}"><i class="material-icons">settings</i>Settings</a>
                            @endif
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             <i class="material-icons">input</i>
                             <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>