@php
/*
--------------------------------------------------------------------------
Title: Header Component.
Responsibility: Displaying the header.
--------------------------------------------------------------------------
*/
@endphp

<div class="header-wrapper">

    <div class="header">

        {{-- Header Layer 1 --}}
        <div id="layer_1" class="layer-1">

            {{--Side Nav dropdown Toggle--}}
            <div id="side_nav_toggle" class="side-nav-toggle">
                <button class="desktop-dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-list" style="font-size: 1.3em;"></i>
                </button>
                <div class="dropdown-menu p-2 b-c-b" aria-labelledby="dropdownMenuButton">
                    <nav class="side-nav-menu">
                        <a href="#" class="like-a-table-row text-white">
                            <span class="like-a-table-col text-center"><i style="width:22px;"
                                    class="fas fa-home"></i></span>
                            <span class="like-a-table-col">Home</span>
                        </a>

                        @auth
                        <a href="#" class="like-a-table-row text-white">
                            <span class="like-a-table-col text-center"><i style="width:22px;"
                                    class="far fa-question-circle"></i></span>
                            <span class="like-a-table-col">My questions</span>
                        </a>

                        <a href="#" class="like-a-table-row text-white">
                            <span class="like-a-table-col text-center"><i style="width:22px;"
                                    class="far fa-comment-alt"></i></span>
                            <span class="like-a-table-col">My Answers</span>
                        </a>

                        <a href="#" class="like-a-table-row text-white">
                            <span class="like-a-table-col text-center"><i style="width:22px;"
                                    class="fas fa-bookmark"></i></span>
                            <span class="like-a-table-col"> Bookmarks</span>
                        </a>

                        {{-- logout form --}}
                        <form class="d-inline text-white like-a-table-row" action="/logout" method="POST"
                            style="padding:0 !important;margin:0 !important;">
                            @csrf
                            <span class="like-a-table-col text-center">
                                <i class="fas fa-sign-out-alt" style="width:22px;"></i>
                            </span>
                            <span class="like-a-table-col">
                                <input name="logout" class="btn btn-link text-white  like-a-table-col" type="submit"
                                    value="Log out">
                            </span>
                        </form>
                        @endauth
                    </nav>
                </div>
            </div>


            {{--Site Branding --}}
            <div class="branding">
                <a href="{{url('/')}}">
                    <img class="logo-graphical" src="/images/logo-graphical.svg" alt="LOGO" style="">
                    <img class="logo-textual" src="/images/logo-textual.svg" alt="LOGO">
                </a>
            </div>

            {{--Search Bar --}}
            <div class="desktop-search-box">
                <form class="desktop-search-form" action="/search" method="GET">
                    @csrf
                    <div class="desktop-searchbar">
                        <input class="desktop-searchbar__input" type="search" name="query" autocomplete="off">
                        <button type="submit" class="desktop-searchbar__btn">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{--Main Navigation --}}
            <nav class="header-nav">
                {{--Auth-aware nav menu--}}

                {{--if authenticated --}}
                @auth
                <div>
                    <a class="b-c-f profile-btn text-center p-1 px-2" href={{ route('profile') }}>
                        <span class="profile-icon"><i class="bi bi-person-circle"></i></span>
                        <span class="profile-text">Profile</span>
                    </a>
                </div>


                {{-- notification dropdown--}}
                <div class="notification-btn dropdown p-1 px-2">
                    {{-- notification dropdown-button --}}
                    <button class="b-c-f text-center" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="notification-icon"><i class="bi bi-bell-fill"></i></span>
                        <span class="notification-text">Notifications</span>

                    </button>
                    {{-- notification dropdown-menu --}}
                    <div class="dropdown-menu dropdown-menu-right p-1" aria-labelledby="dropdownMenuButton">
                        No notifications.
                    </div>
                </div>


                {{--if not authenticated --}}
                @else
                <a class="register-btn branding-border inline-perfect-center mx-1" href={{route('register')}}>
                    <span>
                        <span class="register-icon"><i class="fas fa-user-plus"></i></span>
                        <span class="register-text">Join</span>
                    </span>
                </a>

                <a class="login-btn branding-border inline-perfect-center mx-1" href={{route('login')}}>
                    <span>
                        <span class="login-icon"><i class="fas fa-sign-in-alt"></i></span>
                        <span class="login-text">Log in</span>
                    </span>
                </a>

                @endauth

                <button class="b-c-f">
                    <span class="guideline-icon"> <i class="bi bi-info-circle-fill"></i></span>
                    <span class="guideline-text">Guideline</span>
                </button>
            </nav>
        </div>


        {{-- Header Layer 2 --}}
        <div id="layer_2" class="layer-2">
            <div class="mobile-search-box p-2">
                <form class="mobile-search-form" action="/search" method="GET">
                    @csrf
                    <div class="mobile-searchbar">
                        <input class="mobile-searchbar__input" type="search" name="query" autocomplete="off">
                        <button type="submit" class="mobile-searchbar__btn">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
<div class="bottom-nav" id="bottom_nav">
    @auth
    {{-- attach question create page link if the user is authenticated --}}
    <a href="{{route('questions.create')}}">
        @else
        <a href="{{route('login')}}">
            @endauth
            <span class="question-plus-btn inline-perfect-center"><i class="fa fa-plus-circle"
                    aria-hidden="true"></i></i>&nbsp;প্রশ্ন</span>
        </a>
</div>

@push('styles_before_body_endtag')
<style>
</style>
@endpush

@push('scripts_before_body_endtag')
@endpush
