@extends('user.layouts.tertiaryLayout')


@section('sitebody')
<div class="body">
        {{-- <header id="header" class="header-transparent header-effect-shrink"
                data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
                <div class="header-body border-top-0 header-body-bottom-border">
                        <div class="header-container container">
                                <div class="header-row">
                                        <div class="header-column">
                                                <div class="header-row">
                                                        <div class="header-logo">
                                                                <a href="index.html">
                                                                        <img alt="Porto" width="100" height="48"
                                                                                data-sticky-width="82"
                                                                                data-sticky-height="40"
                                                                                src="{{ asset('porto/img/logo.png') }}">
                                                                </a>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="header-column justify-content-end">
                                                <div class="header-row">
                                                        <div class="header-nav header-nav-links order-2 order-lg-1">
                                                                <div
                                                                        class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                                                        <nav class="collapse">
                                                                                <ul class="nav nav-pills" id="mainNav">
                                                                                        <li class="dropdown">
                                                                                                <a class="dropdown-item dropdown-toggle"
                                                                                                        href=""
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#smallModal">
                                                                                                        Login
                                                                                                </a>


                                                                                        </li>
                                                                                        <li
                                                                                                class="dropdown dropdown-mega">
                                                                                                <a class="dropdown-item dropdown-toggle"
                                                                                                        href="elements.html">
                                                                                                        Elements
                                                                                                </a>

                                                                                        </li>
                                                                                        <li class="dropdown">
                                                                                                <a class="dropdown-item dropdown-toggle active"
                                                                                                        href="#">
                                                                                                        Features
                                                                                                </a>
                                                                                        </li>
                                                                                </ul>
                                                                        </nav>
                                                                </div>

                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </header> --}}

        {{-- ************************Login Modal************************ --}}
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">

                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="font-weight-bold d-inline-block text-center" id="smallModalLabel">
                                                Welcome</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Mobile No. / Email ID</label>
                                                        <input class="form-control" type="text"
                                                                placeholder="Enter Mobile Number. / EMail ID">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Password</label>
                                                        <input class="form-control" type="password"
                                                                placeholder="Enter Password">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                        <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                        id="rememberme" checked>
                                                                <label class="custom-control-label text-2"
                                                                        for="rememberme">Stay Logged in</label>
                                                        </div>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                        <a class="text-primary" href="">Forget Password</a>
                                                </div>
                                        </div>
                                        <div class="form-row text-center">
                                                <div class="form-group col-lg-12">
                                                        <input type="submit" value="Login"
                                                                class="btn vip-btn-primary btn-block">
                                                </div>
                                        </div>
                                        <div class="form-row text-center">
                                                <div class="form-group col-lg-12">
                                                        <span>---or---</span>
                                                </div>
                                        </div>
                                        <div class="form-row text-center">
                                                <div class="form-group col-lg-12">
                                                        <input type="submit" value="Login with OTP"
                                                                class="btn vip-btn-primary btn-block">
                                                </div>
                                        </div>


                                        <div class="form-row text-center">
                                                <div class="form-group col-lg-12">
                                                        <span>New to VIP? <button
                                                                        style="font-size: 16px; font-weight: 600; border: 0"
                                                                        id="signIn" onclick="signin()">Sign up free
                                                                </button>
                                                                {{-- <a href="" id="signIn"
                                                                        style="font-size: 16px; font-weight: 600"
                                                                        data-toggle="modal"
                                                                        data-target="#smallregModal">Sign up free</a>
                                                                --}}
                                                        </span>
                                                </div>
                                        </div>
                                </div>

                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                </div>
        </div>


        {{-- ************************End login modal************************ --}}

        {{-- **********************Registration Modal 1********************** --}}
        <div class="modal fade" id="smallregModal" tabindex="-1" role="dialog" aria-labelledby="smallregModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">

                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="font-weight-bold d-inline-block text-center" id="smallregModalLabel">
                                                Let's set up your
                                                account, while
                                                we find Matches for you!</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Enter Your Email ID</label>
                                                        <input class="form-control" type="text"
                                                                placeholder="Enter Mobile Number. / EMail ID">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Password</label>
                                                        <input class="form-control" type="password"
                                                                placeholder="Enter Password">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Create account forrrrr</label>
                                                        <select class="form-control" name="" id="gender_control">
                                                                <option value="1">Self</option>
                                                                <option value="2">Option 1</option>
                                                                <option value="3">Option 2</option>
                                                                <option value="4"> Option 3</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                        <div class="form-check form-check-inline">
                                                                <label class="form-check-label"> gender:
                                                                        <input class="form-check-input"
                                                                                name="checkboxes[]" type="checkbox"
                                                                                data-msg-required="Please select at least one option."
                                                                                id="inlineCheckbox1" value="option1">
                                                                        Male

                                                                        <input class="form-check-input"
                                                                                name="checkboxes[]" type="checkbox"
                                                                                data-msg-required="Please select at least one option."
                                                                                id="inlineCheckbox1" value="option1">
                                                                        Female
                                                                </label>
                                                        </div>

                                                </div>

                                        </div>


                                        <div class="form-row text-center">
                                                <div class="form-group col-lg-12">

                                                        <a class="btn vip-btn-primary btn-block" href=""
                                                                onclick="reg1()" data-toggle="modal"
                                                                data-target="#smallregModal2">
                                                                Next</a>
                                                </div>
                                        </div>

                                        <div class="form-row text-center">
                                                <div class="form-group col-lg-12">
                                                        <span>Already Have Account? <a href="" style="font-size: 16px;"
                                                                        onclick="reg1()" data-toggle="modal"
                                                                        data-target="#smallModal">Login here ></a>
                                                        </span>
                                                </div>
                                        </div>
                                </div>

                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                </div>
        </div>

        {{-- ********************End Registration Modal 1******************** --}}

        {{-- Start Registration step-2 Modal --}}
        <div class="modal fade" id="smallregModal2" tabindex="-1" role="dialog" aria-labelledby="smallregModal2Label"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">

                        <div class="modal-content">
                                <div class="modal-header">
                                        <h4 class="font-weight-bold d-inline-block text-center"
                                                id="smallregModal2Label">Great! Now some
                                                basic details</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Your Name</label>
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                        <input class="form-control" type="text"
                                                                                placeholder="First Name">
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <input class="form-control" type="text"
                                                                                placeholder="Last Name">
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Date of birth</label>
                                                        <input class="form-control" type="date"
                                                                placeholder="Enter Password">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Religion</label>
                                                        <select class="form-control" name="" id="">
                                                                <option value="">Muslim</option>
                                                                <option value="">Hindu</option>
                                                                <option value="">Buddhist</option>
                                                                <option value="">Christian</option>
                                                        </select>
                                                </div>
                                        </div>


                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Community</label>
                                                        <select class="form-control" name="" id="">
                                                                <option value="">Marathi</option>
                                                                <option value="">Hindu</option>
                                                                <option value="">Panjabi</option>
                                                                <option value="">Urdu</option>
                                                                <option value="">Telugu</option>
                                                                <option value="">Tamil</option>
                                                                <option value="">Marwari</option>
                                                        </select>
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                        <label for="">Where do you live</label>
                                                        <select class="form-control" name="" id="">
                                                                <option value="">Bangladesh</option>
                                                                <option value="">India</option>
                                                                <option value="">USA</option>
                                                                <option value="">Pakistan</option>
                                                                <option value="">Nepal</option>
                                                                <option value="">Bhutan</option>
                                                        </select>
                                                </div>
                                        </div>




                                        <div class="form-row text-center">
                                                <div class="form-group col-lg-12">

                                                        <a class="btn vip-btn-primary btn-block" href=""
                                                                data-toggle="modal" data-target="#smallregModal2">
                                                                Next</a>
                                                </div>
                                        </div>

                                        <div class="form-row text-center">
                                                <div class="form-group col-lg-12">
                                                        <span>By signing up, you agree to our <a href=""
                                                                        style="font-size: 16px;">Terms ></a>
                                                        </span>
                                                </div>
                                        </div>
                                </div>

                        </div>

                        <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                </div>
        </div>

        {{-- End registration part-2 Modal --}}

</div>

<div role="main" class="main">

        {{-- <div class="slider-container rev_slider_wrapper bg-color-grey-scale-1" style="height: 100vh;">
                <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
                        data-plugin-options="{'width': 100%, 'height' : 85.6322px, 'delay': 9000, 'gridwidth': 1140, 'gridheight': 800, 'responsiveLevels': [4096,1200,992,500]}">
                        <ul>
                                <li data-transition="fade">
                                        <img src="{{ asset('img/home-banner.jpg') }}" alt="" data-bgposition="50% 100%"
                                                data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                                </li>

                        </ul>
                </div>
        </div> --}}

        <div class="container-fluid p-0 m-0">
                <div class="home-banner-grad" style="height: 450px; position:relative">


                        <div class="w-100" style="position: absolute; top: 0">
                                <div class="container">
                                        <div class="row p-5">
                                                <div class="col-sm-6">
                                                        <img src="{{ asset('img/vip-logo.png') }}" class="img-fluid"
                                                                style="width: 100px" alt="">
                                                </div>
                                                <div class="col-sm-6 d-flex justify-content-end">
                                                        <a class="mx-2" href="{{url('index')}}">Index</a>
                                                        <a class="mx-2" href="" data-toggle="modal"
                                                                data-target="#smallModal">Login</a>
                                                        <a class="mx-2" href="">Register</a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="w-100" style="position: absolute; bottom: 0">
                                <div class="container">
                                        <form action="" class="banner-search-form">
                                                <div class="row">
                                                        <div class="col-md-2 col-sm-6">
                                                                <div class="form-row ">
                                                                        <div class="form-group col-lg-12">
                                                                                <label for="">I am looking for</label>
                                                                                <select class="form-control" name=""
                                                                                        id="">
                                                                                        <option value="">Male</option>
                                                                                        <option value="">Female</option>
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6 ">
                                                                <div class="form-row">
                                                                        <div class="form-group col-lg-12">
                                                                                <label for="">aged</label>
                                                                                <div class="form-row">
                                                                                        <div
                                                                                                class="form-group col-lg-5 col-sm-5">
                                                                                                <select class="form-control"
                                                                                                        name="" id="">
                                                                                                        <option
                                                                                                                value="">
                                                                                                                18
                                                                                                        </option>
                                                                                                        <option
                                                                                                                value="">
                                                                                                                19
                                                                                                        </option>
                                                                                                </select>
                                                                                        </div>
                                                                                        <div
                                                                                                class="form-group col-lg-2 col-sm-2 text-center">
                                                                                                to
                                                                                        </div>

                                                                                        <div
                                                                                                class="form-group col-lg-5 col-sm-5">
                                                                                                <select class="form-control"
                                                                                                        name="" id="">
                                                                                                        <option
                                                                                                                value="">
                                                                                                                18
                                                                                                        </option>
                                                                                                        <option
                                                                                                                value="">
                                                                                                                19
                                                                                                        </option>
                                                                                                </select>
                                                                                        </div>

                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                                                <div class="form-row">
                                                                        <div class="form-group col-lg-12">
                                                                                <label for="">Of Religion</label>
                                                                                <select class="form-control" name=""
                                                                                        id="">
                                                                                        <option value="">Muslim</option>
                                                                                        <option value="">Hindu</option>
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                                                <div class="form-row">
                                                                        <div class="form-group col-lg-12">
                                                                                <label for=""> Live in</label>
                                                                                <select class="form-control" name=""
                                                                                        id="">
                                                                                        <option value="">Bangladesh
                                                                                        </option>
                                                                                        <option value="">India</option>
                                                                                        <option value="0">USA</option>
                                                                                        <option value="">Canada</option>
                                                                                        <option value="">Africa</option>
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="col-md-2 col-sm-12 perfect-center">
                                                                <div class="form-row btn btn-block p-0 m-0">
                                                                        <div
                                                                                class="col-lg-12 col-sm-12 btn btn-block p-0 border-0">
                                                                                <a href=""
                                                                                        class="btn btn-block d-inline-block brand-color brand-bg-color">Let's
                                                                                        Start</a>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </form>

                                </div>
                        </div>
                </div>
        </div>


        <div class="container">

                <div class="row text-center">
                        <div class="col-md-12 py-2 mb-4">
                                <span class="text-danger" style="font-size: 38px"> Find your Special Someone</span>
                        </div>
                        <div class="col-md-4">

                                <div class="card text-center rounded-0">

                                        <div class="flip-back d-flex align-items-center p-5"
                                                style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center;">
                                                <div class="flip-content my-4">
                                                        <img src="{{ asset('img/edit.png') }}" class="img-fluid"
                                                                style="width: 110px" alt="">
                                                        <br>
                                                        <div class="mt-5">
                                                                <a class="tarek-text-1 tarek-font-1 mt-5" href="">Sign
                                                                        Up</a>
                                                                <p>Register for free & put up your Matrimony
                                                                        Profile</p>
                                                        </div>

                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-4">
                                <div class="card text-center rounded-0">

                                        <div class="flip-back d-flex align-items-center p-5"
                                                style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center;">
                                                <div class="flip-content my-4">
                                                        <img src="{{ asset('img/user.png') }}" class="img-fluid"
                                                                style="width: 110px" alt="">
                                                        <br>
                                                        <div class="mt-5">
                                                                <a class="tarek-text-1 tarek-font-1 mt-5"
                                                                        href="">Connect</a>
                                                                <p>Select & Connect with Matches you like</p>
                                                        </div>

                                                </div>
                                        </div>
                                </div>

                        </div>
                        <div class="col-md-4">
                                <div class="card text-center rounded-0">

                                        <div class="flip-back d-flex align-items-center p-5"
                                                style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center;">
                                                <div class="flip-content my-4">
                                                        <img src="{{ asset('img/chatbox.png') }}" class="img-fluid"
                                                                style="width: 110px" alt="">
                                                        <br>
                                                        <div class="mt-5">
                                                                <a class="tarek-text-1 tarek-font-1 mt-5" href="">
                                                                        Interact</a>
                                                                <p>ecome a Premium Member & Start a Conversation
                                                                </p>
                                                        </div>

                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

                {{-- <div class="container-full tarek-background-w1">
                        <div class="row text-center ">
                                <div class="col-md-12 tarek-py-15">
                                        <span class="text-danger" style="font-size: 38px"> Introducing Shaadi
                                                Meet!</span>
                                </div>


                                <div class="col-md-12">
                                        <div class="row text-center">
                                                <div class="col-lg-4 offset-md-2">
                                                        <img src="{{ asset('img/Home-Couple-Optimized.png') }}" alt="">
                                                </div>
                                                <div class="col-lg-4">
                                                        <div class="row">
                                                                <div class="col-md-12">
                                                                        <img src="{{ asset('img/meet-badge.svg') }}"
                                                                                style="position: relative" alt="">
                                                                        <img src="{{ asset('img/new.svg') }}"
                                                                                style="position: absolute; right: 80px"
                                                                                width=30 alt="">
                                                                </div>

                                                                <div class="col-md-12">
                                                                        <span class="tarek-vip-meet">Now meet your
                                                                                Matches over <br> video call</span>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                </div>
                        </div>
                </div> --}}
        </div>


        <section>
                <div class="container my-5 pt-3 text-center">
                        <div class="text-danger mb-5" style="font-size: 38px"> Happy Stories</div>
                        <div class="owl-carousel owl-theme"
                                data-plugin-options="{'items': 4, 'margin': 10, 'autoplay': true, 'autoplayTimeout': 3000}">
                                @foreach (array("f", "g", "g", "7", "8", "7", "g", "g", "g") as $item)
                                <div>
                                        <div class="card">
                                                <img class="card-img-top" src="{{asset('img/couple.jpeg')}}"
                                                        alt="Card Image">
                                                <div class="card-body">
                                                        <h4 class="card-title mb-1 text-4 font-weight-bold">Mr. & Mrs.
                                                                Hululu</h4>
                                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. Curabitur
                                                                rhoncus nulla dui, in dapi.</p>
                                                        <a href="/"
                                                                class="read-more text-color-primary font-weight-semibold text-2">Read
                                                                More
                                                                <i
                                                                        class="fas fa-angle-right position-relative top-1 ml-1"></i></a>
                                                </div>
                                        </div>
                                </div>
                                @endforeach
                        </div>
                </div>
        </section>

        <section>
                <div class="container">
                        <div class="container">
                                <div class="py-3">
                                        We help at every stage
                                </div>
                                <div class="row">
                                        <div class="col-md-3">
                                                <span class="vip-li-icon font-weight-bold"> Army officer</span>
                                                <span class="vip-li-icon"> Major & Captain(300+)</span>
                                                <span class="vip-li-icon"> Secretary </span>
                                                <span class="vip-li-icon"> Army officer (150+) Divorce</span>
                                                <span class="vip-li-icon text-primary">Bcs Admin Cadre</span>
                                                <span class="vip-li-icon"> Navy officer</span>
                                                <span class="vip-li-icon"> Magistrate</span>
                                                <span class="vip-li-icon"> Judicial Magistrate</span>
                                                <span class="vip-li-icon"> Bcs Police Cadre) (350+) </span>
                                                <span class="vip-li-icon text-primary"> Divorce </span>
                                                <span class="vip-li-icon"> Single </span>
                                                <span class="vip-li-icon">Widow</span>
                                        </div>
                                        <div class="col-md-3">
                                                <span class="vip-li-icon font-weight-bold text-primary"> Bcs Doctor
                                                        (100+)</span>
                                                <span class="vip-li-icon"> Govt. Officer (500+)</span>
                                                <span class="vip-li-icon"> Engineer</span>
                                                <span class="vip-li-icon"> Buet Kuet Cuet Ruet (500+)</span>
                                                <span class="vip-li-icon text-primary"> Industrialist</span>
                                                <span class="vip-li-icon"> businessman (1200+)</span>
                                                <span class="vip-li-icon text-primary"> Group OF Companies</span>
                                                <span class="vip-li-icon">MP</span>
                                                <span class="vip-li-icon"> Minister</span>

                                        </div>
                                        <div class="col-md-3">
                                                <span class="vip-li-icon font-weight-bold"> Citizenship Profile</span>
                                                <span class="vip-li-icon"> USA</span>
                                                <span class="vip-li-icon"> Canada</span>
                                                <span class="vip-li-icon"> Australia</span>
                                                <span class="vip-li-icon"> Germany</span>
                                                <span class="vip-li-icon">France</span>
                                                <span class="vip-li-icon"> Italy % ALl Europe (2000+)</span>
                                                <span class="vip-li-icon text-primary"> PHD</span>
                                                <span class="vip-li-icon"> Doctor</span>
                                                <span class="vip-li-icon">Barrister</span>

                                        </div>
                                        <div class="col-md-3">
                                                <span class="vip-li-icon text-primary font-weight-bold"> Chartered
                                                        Accountant</span>
                                                <span class="vip-li-icon"> Multinational Company</span>
                                                <span class="vip-li-icon"> Airforce</span>
                                                <span class="vip-li-icon"> armed forces doctor</span>
                                                <span class="vip-li-icon text-primary"> University professor</span>
                                                <span class="vip-li-icon"> Banker</span>
                                                <span class="vip-li-icon text-primary"> Celebrities</span>


                                        </div>
                                </div>
                        </div>
                </div>
        </section>

        <footer id="footer" class="brand-bg-color border-top-0 vip-text-white-darken">
                <div class="container py-2">
                        <div class="row py-5">
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                        <h5 class="text-3 mb-3 opacity-7">NEWSLETTER</h5>
                                        <p class="pr-1 vip-text-white-darken">Keep up on our always evolving product
                                                features and
                                                technology.
                                                Enter
                                                your e-mail address and subscribe to our newsletter.</p>
                                        <div class="alert alert-success d-none" id="newsletterSuccess">
                                                <strong>Success!</strong> You've been added to our email list.
                                        </div>
                                        <div class="alert alert-danger d-none" id="newsletterError"></div>
                                        <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST"
                                                class="mr-4 mb-3 mb-md-0">
                                                <div class="input-group input-group-rounded">
                                                        <input class="form-control form-control-sm bg-light"
                                                                placeholder="Email Address" name="newsletterEmail"
                                                                id="newsletterEmail" type="text">
                                                        <span class="input-group-append">
                                                                <button class="btn btn-light text-color-dark"
                                                                        type="submit"><strong>GO!</strong></button>
                                                        </span>
                                                </div>
                                        </form>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <h5 class="text-3 mb-3 opacity-7">LATEST TWEETS</h5>
                                        <div id="tweet" class="twitter twitter-light" data-plugin-tweets
                                                data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                                                <p class="vip-text-white-darken">Please wait...</p>
                                        </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                                        <h5 class="text-3 mb-3 opacity-7">CONTACT US</h5>
                                        <ul class="list list-icons list-icons-lg">
                                                <li class="mb-1"><i class="far fa-dot-circle vip-text-white-darken"></i>
                                                        <p class="m-0 vip-text-white-darken">234 Street Name, City Name
                                                        </p>
                                                </li>
                                                <li class="mb-1"><i class="fab fa-whatsapp vip-text-white-darken"></i>
                                                        <p class="m-0"><a class="vip-text-white-darken"
                                                                        href="tel:8001234567">(800) 123-4567</a>
                                                        </p>
                                                </li>
                                                <li class="mb-1"><i class="far fa-envelope vip-text-white-darken"></i>
                                                        <p class="m-0"><a class="vip-text-white-darken"
                                                                        href="mailto:mail@example.com">mail@example.com</a>
                                                        </p>
                                                </li>
                                        </ul>
                                </div>
                                <div class="col-md-6 col-lg-2">
                                        <h5 class="text-3 mb-3 opacity-7">FOLLOW US</h5>
                                        <ul class="header-social-icons social-icons">
                                                <li class="social-icons-facebook"><a href="http://www.facebook.com/"
                                                                target="_blank" title="Facebook"><i
                                                                        class="fab fa-facebook-f"></i></a></li>
                                                <li class="social-icons-twitter"><a href="http://www.twitter.com/"
                                                                target="_blank" title="Twitter"><i
                                                                        class="fab fa-twitter"></i></a></li>
                                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/"
                                                                target="_blank" title="Linkedin"><i
                                                                        class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                </div>
                        </div>
                </div>
                <div class="footer-copyright second-brand-bg-color bg-color-scale-overlay bg-color-scale-overlay-1">
                        <div class="bg-color-scale-overlay-wrapper">
                                <div class="container py-2" style="height: 50px">
                                        <div class="row">
                                                <div
                                                        class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                                                        <a href="index.html" class="logo pr-0 pr-lg-3">
                                                                <img alt="Porto Website Template"
                                                                        src="{{ asset('img/vip-logo.png') }}"
                                                                        class="opacity-5" height="33">
                                                        </a>
                                                </div>
                                                <div
                                                        class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                                                        <p class="vip-text-white-darken">© Copyright 2020. All Rights
                                                                Reserved.</p>
                                                </div>
                                                <div
                                                        class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                                                        <nav id="sub-menu">
                                                                <ul>
                                                                        <li class="border-0"><i
                                                                                        class="fas fa-angle-right text-color-light"></i><a
                                                                                        href="page-faq.html"
                                                                                        class="ml-1 text-decoration-none text-color-light">
                                                                                        FAQ's</a></li>
                                                                        <li class="border-0"><i
                                                                                        class="fas fa-angle-right text-color-light"></i><a
                                                                                        href="sitemap.html"
                                                                                        class="ml-1 text-decoration-none text-color-light">
                                                                                        Sitemap</a></li>
                                                                        <li class="border-0"><i
                                                                                        class="fas fa-angle-right text-color-light"></i><a
                                                                                        href="contact-us.html"
                                                                                        class="ml-1 text-decoration-none text-color-light">
                                                                                        Contact Us</a></li>
                                                                </ul>
                                                        </nav>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </footer>
</div>
@endsection


<script>
        // alert('hukkahua');
        function signin(){
                
      $('#smallModal').modal('hide');
      $('#smallregModal').modal('show');
      
        }


        function reg1(){
      $('#smallregModal').modal('hide');
      
        }


</script>