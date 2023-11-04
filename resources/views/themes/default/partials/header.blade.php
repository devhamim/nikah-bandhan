<header class="header" id="navbar">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo/logo.png') }}" alt="logo"></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler--icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav mainmenu">
                        <ul>
                            <li><a href="tel:+880176750668"><span><i class="fa-solid fa-phone-volume fa-shake"></i> </span> +880176750668</a></li>
                            <li>
                                <button type="button" class="btn btn-danger text-white"  style="background-color: #E31190;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Login
                                  </button>
                            </li>
                            {{-- <a class="btn btn-success text-white" style="background-color: #E31190;"  href="login.html"><span class="me-2"><i class="fa-solid fa-arrow-right-to-bracket fa-beat"></i>  </span>  Log In</a> --}}
                        </ul>
                    </div>
                    <!-- <div class="header__more navbar-nav mainmenu">
                        <ul >
                            <li><a class="dropdown-item" href="login.html">Log In</a></li>
                        </ul>
                    </div> -->
                </div>
            </nav>
        </div>
    </div>
</header>
