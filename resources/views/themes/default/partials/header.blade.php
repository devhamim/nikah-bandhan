<header class="header" id="navbar" style="z-index: 999">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo/logo.png') }}" alt="logo"></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler--icon"></span>
                </button>
                @if(!Auth::check())
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav mainmenu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route("aboutUs") }}">About Us</a></li>
                            <li><a href="{{url('/packages')}}">Premium Plan</a></li>
                            <li><a href="{{ route('page',"contact-us") }}">Contect Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav mainmenu">
                        <ul>
                            <li><a href="tel:+8801751216771"><span><i class="fa-solid fa-phone-volume fa-shake"></i> </span> +8801751-216771</a></li>
                            <li>
                                <button type="button" class="btn btn-danger text-white"  style="background-color: #E31190;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Login
                                  </button>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="header__more navbar-nav mainmenu">
                        <ul >
                            <li><a class="dropdown-item" href="login.html">Log In</a></li>
                        </ul>
                    </div> -->
                </div>
                @endif
                @Auth
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav mainmenu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route("aboutUs") }}">About Us</a></li>
                            <li><a href="{{url('/packages')}}">Premium Plan</a></li>
                            <li><a href="{{ route('page',"contact-us") }}">Contect Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav mainmenu">
                        <ul>
                            <li class="dropdown dropdown-mega">
                                <a class="dropdown-item dropdown-toggle viptextcolor"
                                    href="{{route('user.messageDashboard')}}">
                                    Messages ({{ Auth::user()->unreadMsgUsersCount() }})
                                </a>
        
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-item dropdown-toggle viptextcolor active " style="background-color: #E31190;" href="#">
                                    {{auth()->user()->email}}
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item viptextcolor-" href="{{route('user.profile')}}">My
                                            Profile</a>
        
                                    </li>
        
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item viptextcolor-"
                                            href="{{route('user.updateprofile')}}">Update Profile</a>
        
                                    </li>
        
                                    @hasrole('Admin')
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item viptextcolor-" href="{{route('dashboard')}}">Admin
                                            Dashboard</a>
        
                                    </li>
                                    @endif
        
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item text-danger viptextcolor-" href="{{
                                            route('signout')
                                        }}">Logout</a>
        
                                    </li>
        
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                    @else
                    {{-- <li class="dropdown dropdown-mega">
                        <a class="dropdown-item dropdown-toggle viptextcolor" href="" data-toggle="modal"
                            data-target="#smallModal">
                            Login
                        </a>

                    </li> --}}
                    

                    
                    @endauth
            </nav>
        </div>
    </div>
</header>
