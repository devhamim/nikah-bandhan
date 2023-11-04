<style>
html.sticky-header-active #header .header-body {
    position: fixed;
    border-bottom-color: rgba(234, 234, 234, 0.5);
    box-shadow: 0 0 3px rgb(234 234 234 / 50%);
    background-color: #f15c62;
}
.viptextcolor {
    color: black !important;
}
</style>
<header id="header"
    data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': false, 'stickyStartAt': 0}">
    <div class="header-body border-top-0">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{url('/')}}">
                                <img alt="Porto" height="40" src="{{
                                    asset('images/logo.png')
                                }}" style="border-radius: 5%">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links order-2 order-lg-1">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        @if(!Auth::check())

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle viptextcolor " href="{{ url('/')}}"> Home </a>

                                        </li>

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle viptextcolor" href="{{ route('page',"about-us") }}">
                                              ABOUT US
                                            </a>

                                        </li>

                                        @endif

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle viptextcolor" href="{{url('/packages')}}">
                                                Premium Plan
                                            </a>

                                        </li>

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle viptextcolor" href="{{ route('page',"contact-us") }}">
                                              Contact Us
                                            </a>

                                        </li>



                                        @if(!Auth::check())

                                        {{-- <li class="dropdown" >
                                            <a class="dropdown-item dropdown-toggle viptextcolor" href="{{ url('page/vip-advantage')}}"   >
                                                VIP SERVICE
                                            </a>

                                        </li> --}}
                                         
                                        {{-- <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle viptextcolor" href="{{ url("https://www.vipmarriagemedia.com/blog/") }}">
                                                BLOG
                                            </a>

                                        </li> --}}
                                        @endif
                                        
                                     
                                        @Auth
                                        <li class="dropdown dropdown-mega">
                                            <a class="dropdown-item dropdown-toggle viptextcolor"
                                                href="{{route('user.messageDashboard')}}">
                                                Messages ({{ Auth::user()->unreadMsgUsersCount() }})
                                            </a>

                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle viptextcolor active " href="#">
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
                                        @else
                                        {{-- <li class="dropdown dropdown-mega">
                                            <a class="dropdown-item dropdown-toggle viptextcolor" href="" data-toggle="modal"
                                                data-target="#smallModal">
                                                Login
                                            </a>

                                        </li> --}}

                                        <li class="dropdown dropdown-mega">
                                            <a class="dropdown-item dropdown-toggle viptextcolor" href="{{ url('/register') }}">
                                                Register
                                            </a>

                                        </li>
                                        @endauth

                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                       @auth
                       <div
                       class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                       <div class="header-nav-feature header-nav-features-search d-inline-flex">
                           <a href="#" class="header-nav-features-toggle" data-focus="headerSearch"><i
                                   class="fas fa-search header-nav-top-icon"></i></a>
                           <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed"
                               id="headerTopSearchDropdown">
                               <form role="search" action="{{route('user.search')}}" method="get">
                                @csrf
                                   <div class="simple-search input-group">
                                       <input class="form-control text-1" id="headerSearch" name="q" type="search"
                                           value="" placeholder="Search...">
                                       <span class="input-group-append">
                                           <button class="btn" type="submit">
                                               <i class="fa fa-search header-nav-top-icon"></i>
                                           </button>
                                       </span>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
                       @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
