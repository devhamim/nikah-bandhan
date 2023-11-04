<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <title> VIP Marriage Media</title>

        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Porto - Responsive HTML5 Template" />
        <meta name="author" content="okler.net" />

        <!-- Favicon -->
        @if ($websiteParameter->favicon)

        <link rel="shortcut icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}"
            type="image/x-icon">
        <link rel="icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">

    @else

        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    @endif

        <!-- Mobile Metas -->
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no"
        />

        <!-- Web Fonts  -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
            rel="stylesheet"
            type="text/css"
        />

        <!-- Vendor CSS -->
        <link
            rel="stylesheet"
            href="{{ asset('porto/vendor/bootstrap/css/bootstrap.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('porto/vendor/fontawesome-free/css/all.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('porto/vendor/animate/animate.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{
                asset(
                    'porto/vendor/simple-line-icons/css/simple-line-icons.min.css'
                )
            }}"
        />
        <link
            rel="stylesheet"
            href="{{
                asset('porto/vendor/owl.carousel/assets/owl.carousel.min.css')
            }}"
        />
        <link
            rel="stylesheet"
            href="{{
                asset(
                    'porto/vendor/owl.carousel/assets/owl.theme.default.min.css'
                )
            }}"
        />
        <link
            rel="stylesheet"
            href="{{
                asset('porto/vendor/magnific-popup/magnific-popup.min.css')
            }}"
        />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('porto/css/theme.css') }}" />
        <link
            rel="stylesheet"
            href="{{ asset('porto/css/theme-elements.css') }}"
        />
        <link rel="stylesheet" href="{{ asset('porto/css/theme-blog.css') }}" />
        <link rel="stylesheet" href="{{ asset('porto/css/theme-shop.css') }}" />

        <!-- Current Page CSS -->
        <link
            rel="stylesheet"
            href="{{ asset('porto/vendor/rs-plugin/css/settings.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('porto/vendor/rs-plugin/css/layers.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('porto/vendor/rs-plugin/css/navigation.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{
                asset('porto/vendor/circle-flip-slideshow/css/component.css')
            }}"
        />

        <!-- Demo CSS -->

        <!-- Skin CSS -->
        <link
            rel="stylesheet"
            href="{{ asset('porto/css/skins/default.css') }}"
        />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('porto/css/custom.css') }}" />

        <!-- Head Libs -->
        <script src="{{
                asset('porto/vendor/modernizr/modernizr.min.js')
            }}"></script>

        <link
            rel="stylesheet"
            href="https://www.w3schools.com/w3css/4/w3.css"
        />

        <style type="text/css">
            .rgba-gradient {
                background: linear-gradient(
                    45deg,
                    rgba(234, 21, 129, 0.6),
                    rgba(10, 23, 187, 0.6)
                );
            }
        </style>
    </head>
    <body>
        <div class="body">
            <header
                id="header"
                class="header-transparent header-effect-shrink"
                data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}"
            >
                <div class="header-body">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-logo">
                                        <a href="">
                                            <img
                                                class=""
                                                alt="Porto"
                                                width="140"
                                                height="68"
                                                data-sticky-width="82"
                                                data-sticky-height="40"
                                                src="{{
                                                    asset('img/logo.png')
                                                }}"
                                            />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <div
                                        class="
                                            header-nav
                                            header-nav-line
                                            header-nav-top-line
                                            header-nav-top-line-with-border
                                            order-2 order-lg-1
                                        "
                                    >
                                        <div
                                            class="
                                                header-nav-main
                                                header-nav-main-square
                                                header-nav-main-effect-2
                                                header-nav-main-sub-effect-1
                                            "
                                        >
                                            <nav class="collapse">
                                                <ul
                                                    class="nav nav-pills"
                                                    id="mainNav"
                                                >
                                                    @guest
                                                    <li class="dropdown">
                                                        <a
                                                            class="
                                                                dropdown-item
                                                                dropdown-toggle
                                                                w3-text-blue
                                                            "
                                                            href=""
                                                            data-toggle="modal"
                                                            data-target="#smallModal"
                                                        >
                                                            <span
                                                                class="
                                                                    w3-border
                                                                    w3-white
                                                                    w3-border-white
                                                                    w3-round
                                                                    px-3
                                                                    py-1
                                                                "
                                                                >Login</span
                                                            >
                                                        </a>
                                                    </li>
                                                    @else

                                                    <li class="dropdown">
                                                        <a
                                                            class="
                                                                dropdown-item
                                                                dropdown-toggle
                                                                w3-text-blue
                                                            "
                                                            href="{{
                                                                route('signout')
                                                            }}"
                                                        >
                                                            <span
                                                                class="
                                                                    w3-border
                                                                    w3-white
                                                                    w3-border-white
                                                                    w3-round
                                                                    px-3
                                                                    py-1
                                                                "
                                                                >Logout</span
                                                            >
                                                        </a>
                                                    </li>

                                                    @endguest
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div role="main" class="main">
                <section
                    style="min-height: 670px"
                    class="
                        page-header
                        page-header-modern
                        page-header-background
                        page-header-background-md
                        overlay overlay-color-dark overlay-show overlay-op-5
                        mt-0
                    "
                    data-video-path="{{ asset('vdo/animation-intro.mp4') }}"
                    data-plugin-video-background
                    data-plugin-options="{'posterType': 'jpg', 'position': '50% 50%'}"
                >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div
                                    class="
                                        align-self-center
                                        p-static
                                        order-2
                                        text-center
                                        mb-3
                                    "
                                >
                                    <h1
                                        class="text-lg-15 text-sm-5 text-md-10"
                                        style="text-shadow: 3px 3px 10px #000"
                                    >
                                        <strong>VIP Marriage Media</strong>
                                    </h1>

                                    <h2
                                        class="
                                            word-rotator
                                            clip
                                            is-full-width
                                            mb-2
                                            w3-text-white
                                            d-none d-lg-block
                                        "
                                        style="text-shadow: 3px 3px 10px #000"
                                    >
                                        <span>We Provide </span>
                                        <span class="word-rotator-words">
                                            <b class="is-visible w3-text-aqua"
                                                >Worldwide Solution</b
                                            >
                                            <b class="w3-text-deep-orange"
                                                >Elite Matrimony Service</b
                                            >
                                            <b class="w3-text-yellow"
                                                >Trusted Solution</b
                                            >
                                        </span>
                                    </h2>
                                </div>
                            </div>
                            @guest
                            <div class="col-md-5">
                                <div
                                    class="
                                        featured-box featured-box-default
                                        text-left
                                        mt-0
                                    "
                                >
                                    <div class="box-content">
                                        <h4
                                            class="
                                                color-primary
                                                font-weight-semibold
                                                text-4 text-uppercase
                                                mb-3
                                            "
                                        >
                                            Register An Account
                                        </h4>

                                        @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif

                                        <form
                                            action="{{
                                                route('register.custom')
                                            }}"
                                            method="POST"
                                            class="needs-validation"
                                        >
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label
                                                        class="
                                                            font-weight-bold
                                                            text-dark text-2
                                                        "
                                                        >E-mail Address</label
                                                    >
                                                    <input
                                                        type="text"
                                                        value=""
                                                        name="email"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                        "
                                                        required
                                                    />
                                                    @if ($errors->has('email'))
                                                    <div
                                                        class="
                                                            alert alert-danger
                                                        "
                                                    >
                                                        <ul>
                                                            <li>
                                                                {{ $errors->first('email') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div
                                                    class="form-group col-lg-6"
                                                >
                                                    <label
                                                        class="
                                                            font-weight-bold
                                                            text-dark text-2
                                                        "
                                                        >Password</label
                                                    >
                                                    <input
                                                        type="password"
                                                        value=""
                                                        name="password"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                        "
                                                        required
                                                    />
                                                </div>
                                                <div
                                                    class="form-group col-lg-6"
                                                >
                                                    <label
                                                        class="
                                                            font-weight-bold
                                                            text-dark text-2
                                                        "
                                                        >Re-enter
                                                        Password</label
                                                    >
                                                    <input
                                                        type="password"
                                                        value=""
                                                        name="password_confirmation"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                        "
                                                        required
                                                    />
                                                </div>
                                                @if ($errors->has('password'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        <li>
                                                            {{ $errors->first('password') }}
                                                        </li>
                                                    </ul>
                                                </div>

                                                @endif
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <li>
                                                        {{ $errors->first('password_confirmation') }}
                                                    </li>
                                                </ul>
                                            </div>

                                            @endif
                                            <div class="form-row">
                                                <div
                                                    class="form-group col-lg-9"
                                                >
                                                    <div
                                                        class="
                                                            custom-control
                                                            custom-checkbox
                                                        "
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="
                                                                custom-control-input
                                                            "
                                                            id="terms"
                                                        />
                                                        <!-- <label
                                                            class="
                                                                custom-control-label
                                                                text-2
                                                            "
                                                            for="terms"
                                                            >I have read and
                                                            agree to the
                                                            <a href="#"
                                                                >terms of
                                                                service</a
                                                            ></label
                                                        > -->

                                                        <label
                                                            class="
                                                                custom-control-label
                                                                text-2
                                                            "
                                                            for="terms"
                                                            >I agree to the
                                                            <a href="#"
                                                                >terms of
                                                                service</a
                                                            ></label
                                                        >
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group col-lg-3"
                                                >
                                                    <input
                                                        type="submit"
                                                        value="Register"
                                                        class="
                                                            btn
                                                            btn-primary
                                                            btn-modern
                                                            float-right
                                                        "
                                                        data-loading-text="Loading..."
                                                    />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endguest
                        </div>
                    </div>
                </section>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div
                                class="
                                    heading
                                    heading-border
                                    heading-middle-border
                                    heading-middle-border-center
                                    heading-border-xl
                                "
                            >
                                <h2 class="font-weight-normal">
                                    Find Your
                                    <strong class="font-weight-extra-bold"
                                        >Special</strong
                                    >
                                    Soulmate
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div
                        class="
                            featured-boxes
                            featured-boxes-style-3
                            featured-boxes-flat
                        "
                    >
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div
                                    class="
                                        featured-box
                                        featured-box-primary
                                        featured-box-effect-3
                                    "
                                >
                                    <div
                                        class="
                                            box-content box-content-border-0
                                            w3-card w3-hover-shadow
                                        "
                                        style="cursor: pointer"
                                    >
                                        <i
                                            class="icon-featured far fa-edit"
                                        ></i>
                                        <h4
                                            class="
                                                font-weight-normal
                                                text-5
                                                mt-3
                                            "
                                        >
                                            <strong
                                                class="font-weight-extra-bold"
                                                >Sign Up</strong
                                            >
                                        </h4>
                                        <p class="mb-2 mt-2 text-2">
                                            Donec id elit non mi porta gravida
                                            at eget metus. Fusce dapibus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div
                                    class="
                                        featured-box
                                        featured-box-primary
                                        featured-box-effect-3
                                    "
                                >
                                    <div
                                        class="
                                            box-content box-content-border-0
                                            w3-card w3-hover-shadow
                                        "
                                        style="cursor: pointer"
                                    >
                                        <i
                                            class="icon-featured fas fa-users"
                                        ></i>
                                        <h4
                                            class="
                                                font-weight-normal
                                                text-5
                                                mt-3
                                            "
                                        >
                                            <strong
                                                class="font-weight-extra-bold"
                                                >Connect</strong
                                            >
                                        </h4>
                                        <p class="mb-2 mt-2 text-2">
                                            Donec id elit non mi porta gravida
                                            at eget metus. Fusce dapibus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div
                                    class="
                                        featured-box
                                        featured-box-primary
                                        featured-box-effect-3
                                    "
                                >
                                    <div
                                        class="
                                            box-content box-content-border-0
                                            w3-card w3-hover-shadow
                                        "
                                        style="cursor: pointer"
                                    >
                                        <i
                                            class="
                                                icon-featured
                                                far
                                                fa-comments
                                            "
                                        ></i>
                                        <h4
                                            class="
                                                font-weight-normal
                                                text-5
                                                mt-3
                                            "
                                        >
                                            <strong
                                                class="font-weight-extra-bold"
                                            >
                                                Communicate
                                            </strong>
                                        </h4>
                                        <p class="mb-2 mt-2 text-2">
                                            Donec id elit non mi porta gravida
                                            at eget metus. Fusce dapibus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="pattern tall" />
                </div>

                <section
                    class="
                        parallax
                        section section-parallax section-center
                        overlay overlay-color-primary overlay-show overlay-op-4
                    "
                    data-plugin-parallax
                    data-plugin-options="{'speed': 2}"
                    data-image-src="{{ asset('img/1.jpg') }}"
                    style="min-height: 450px"
                >
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h4 class="mb-0 text-light">
                                    GREAT PEOPLE TRUSTED OUR SERVICES
                                </h4>
                                <br />

                                <p class="mb-0 text-light">
                                    Lorem ipsum dolor sit amet, consectetuer
                                    adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. <br />Nulla consequat
                                    massa quis enim.Donec pede justo, fringilla
                                    vel, aliquet nec, vulputate eget, arcu.In
                                    enim justo, rhoncus ut, imperdiet a,
                                    venenatis vitae, justo. Nullam dictum felis
                                    eu pede mollis pretium.Integer tincidunt.
                                    Cras dapibus. Vivamus elementum semper
                                    nisi.Aenean vulputate eleifend tellus.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row mt-n5">
                    <div class="col">
                        <div
                            class="
                                heading
                                heading-border
                                heading-middle-border
                                heading-middle-border-center
                                heading-border-xl
                            "
                        >
                            <h2 class="font-weight-normal">
                                What Our
                                <strong class="font-weight-extra-bold"
                                    >Clients</strong
                                >
                                Say
                            </h2>
                        </div>
                    </div>
                </div>

                <section
                    class="
                        parallax
                        section
                        section-text-light
                        section-parallax
                        section-center
                        mt-0
                    "
                    data-plugin-parallax
                    data-plugin-options="{'speed': 1.5}"
                    data-image-src="https://www.okler.net/previews/porto/8.0.0/img/parallax/parallax-2.jpg"
                >
                    <div class="container">
                        <div class="row counters counters-text-light">
                            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                                <div class="counter">
                                    <i class="fas fa-user"></i>
                                    <strong data-to="30000" data-append="+"
                                        >0</strong
                                    >
                                    <label>Happy Clients</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                                <div class="counter">
                                    <i class="fas fa-star"></i>
                                    <strong data-to="15">0</strong>
                                    <label>Years in Business</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mb-4 mb-sm-0">
                                <div class="counter">
                                    <i class="fas fa-coffee"></i>
                                    <strong data-to="352">0</strong>
                                    <label>Cups of Coffee</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="counter">
                                    <i class="far fa-chart-bar"></i>
                                    <strong data-to="178">0</strong>
                                    <label>High Score</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section
                    style="min-height: 250px"
                    class="w3-light-gray text-center"
                >
                    <h2
                        class="text-lg-10 text-sm-5 text-md-10 pt-5"
                        style="text-shadow: 1px 1px 2px #000"
                    >
                        Sale<strong> 30% OFF</strong>
                    </h2>

                    @guest
                    <div class="p-4">
                        <a
                            class="
                                w3-btn
                                btn btn-lg
                                w3-blue
                                w3-round-xxlarge
                                w3-border
                                w3-border-white
                                w3-hover-shadow
                            "
                            href=""
                            >Register</a
                        >
                        <a
                            class="
                                w3-btn
                                btn btn-lg
                                w3-blue
                                w3-round-xxlarge
                                w3-border
                                w3-border-white
                                w3-hover-shadow
                            "
                            href=""
                            data-toggle="modal"
                            data-target="#smallModal"
                            >Login</a
                        >
                    </div>

                    @else 
                    <div class="p-4">
                        <a
                            class="
                                w3-btn
                                btn btn-lg
                                w3-red
                                w3-round-xxlarge
                                w3-border
                                w3-border-white
                                w3-hover-shadow
                            "
                            href=""
                            >Get your package</a
                        >
                
                    </div>
                   @endguest
                </section>

                <section style="min-height: 250px">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col">
                                <div
                                    class="
                                        heading
                                        heading-border
                                        heading-middle-border
                                        heading-middle-border-center
                                        heading-border-xl
                                    "
                                >
                                    <h2 class="font-weight-normal">
                                        <strong class="font-weight-extra-bold"
                                            >VIP Marriage Media</strong
                                        >
                                        with Millions of
                                        <strong class="font-weight-extra-bold">
                                            Success Stories
                                        </strong>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div
                            class="owl-carousel owl-theme"
                            data-plugin-options="{'items': 4, 'autoplay': true, 'autoplayTimeout': 3000}"
                        >
                            <div>
                                <div class="card">
                                    <img
                                        class="card-img-top"
                                        src="{{ asset('img/2.png') }}"
                                        alt="Card Image"
                                    />
                                    <div class="card-body">
                                        <h4
                                            class="
                                                card-title
                                                mb-1
                                                text-4
                                                font-weight-bold
                                            "
                                        >
                                            Card Title
                                        </h4>
                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                            Curabitur rhoncus nulla dui, in
                                            dapi.
                                        </p>
                                        <a
                                            href="/"
                                            class="
                                                read-more
                                                text-color-primary
                                                font-weight-semibold
                                                text-2
                                            "
                                            >Read More
                                            <i
                                                class="
                                                    fas
                                                    fa-angle-right
                                                    position-relative
                                                    top-1
                                                    ml-1
                                                "
                                            ></i
                                        ></a>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="card">
                                    <img
                                        class="card-img-top"
                                        src="{{ asset('img/7.jpg') }}"
                                        alt="Card Image"
                                    />
                                    <div class="card-body">
                                        <h4
                                            class="
                                                card-title
                                                mb-1
                                                text-4
                                                font-weight-bold
                                            "
                                        >
                                            Card Title
                                        </h4>
                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                            Curabitur rhoncus nulla dui, in
                                            dapi.
                                        </p>
                                        <a
                                            href="/"
                                            class="
                                                read-more
                                                text-color-primary
                                                font-weight-semibold
                                                text-2
                                            "
                                            >Read More
                                            <i
                                                class="
                                                    fas
                                                    fa-angle-right
                                                    position-relative
                                                    top-1
                                                    ml-1
                                                "
                                            ></i
                                        ></a>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="card">
                                    <img
                                        class="card-img-top"
                                        src="{{ asset('img/5.jpg') }}"
                                        alt="Card Image"
                                    />
                                    <div class="card-body">
                                        <h4
                                            class="
                                                card-title
                                                mb-1
                                                text-4
                                                font-weight-bold
                                            "
                                        >
                                            Card Title
                                        </h4>
                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                            Curabitur rhoncus nulla dui, in
                                            dapi.
                                        </p>
                                        <a
                                            href="/"
                                            class="
                                                read-more
                                                text-color-primary
                                                font-weight-semibold
                                                text-2
                                            "
                                            >Read More
                                            <i
                                                class="
                                                    fas
                                                    fa-angle-right
                                                    position-relative
                                                    top-1
                                                    ml-1
                                                "
                                            ></i
                                        ></a>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="card">
                                    <img
                                        class="card-img-top"
                                        src="{{ asset('img/7.jpg') }}"
                                        alt="Card Image"
                                    />
                                    <div class="card-body">
                                        <h4
                                            class="
                                                card-title
                                                mb-1
                                                text-4
                                                font-weight-bold
                                            "
                                        >
                                            Card Title
                                        </h4>
                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                            Curabitur rhoncus nulla dui, in
                                            dapi.
                                        </p>
                                        <a
                                            href="/"
                                            class="
                                                read-more
                                                text-color-primary
                                                font-weight-semibold
                                                text-2
                                            "
                                            >Read More
                                            <i
                                                class="
                                                    fas
                                                    fa-angle-right
                                                    position-relative
                                                    top-1
                                                    ml-1
                                                "
                                            ></i
                                        ></a>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="card">
                                    <img
                                        class="card-img-top"
                                        src="{{ asset('img/7.jpg') }}"
                                        alt="Card Image"
                                    />
                                    <div class="card-body">
                                        <h4
                                            class="
                                                card-title
                                                mb-1
                                                text-4
                                                font-weight-bold
                                            "
                                        >
                                            Card Title
                                        </h4>
                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                            Curabitur rhoncus nulla dui, in
                                            dapi.
                                        </p>
                                        <a
                                            href="/"
                                            class="
                                                read-more
                                                text-color-primary
                                                font-weight-semibold
                                                text-2
                                            "
                                            >Read More
                                            <i
                                                class="
                                                    fas
                                                    fa-angle-right
                                                    position-relative
                                                    top-1
                                                    ml-1
                                                "
                                            ></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section
                    style="min-height: 400px"
                    class="w3-light-gray text-center"
                >
                    <h2
                        class="text-lg-10 text-sm-5 text-md-10 pt-5"
                        style="text-shadow: 1px 1px 2px #000"
                    >
                        <strong>Download </strong> Our App
                    </h2>

                    <div class="row">
                        <div class="col-md-6">
                            <img
                                class="img-fluid rounded"
                                src="{{ asset('img/intro-mobile.png') }}"
                            />
                        </div>

                        <div class="col-md-6">
                            <br />
                            <img
                                class="img-fluid rounded"
                                src="{{
                                    asset('img/Home-Couple-Optimized.png')
                                }}"
                            />

                            <br />
                            <img
                                class="img-fluid rounded"
                                src="{{
                                    asset(
                                        'img/Matrimony-App-Shaadi.com-Playstore.svg'
                                    )
                                }}"
                            />
                        </div>
                    </div>
                </section>
            </div>

            <footer id="footer">
                <div class="container">
                    <div class="footer-ribbon">
                        <span>Get in Touch</span>
                    </div>
                    <div class="row py-5 my-4">
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <h5 class="text-3 mb-3">NEWSLETTER</h5>
                            <p class="pr-1">
                                Keep up on our always evolving product features
                                and technology. Enter your e-mail address and
                                subscribe to our newsletter.
                            </p>
                            <div
                                class="alert alert-success d-none"
                                id="newsletterSuccess"
                            >
                                <strong>Success!</strong> You've been added to
                                our email list.
                            </div>
                            <div
                                class="alert alert-danger d-none"
                                id="newsletterError"
                            ></div>
                            <form
                                id="newsletterForm"
                                action="php/newsletter-subscribe.php"
                                method="POST"
                                class="mr-4 mb-3 mb-md-0"
                            >
                                <div class="input-group input-group-rounded">
                                    <input
                                        class="
                                            form-control form-control-sm
                                            bg-light
                                        "
                                        placeholder="Email Address"
                                        name="newsletterEmail"
                                        id="newsletterEmail"
                                        type="text"
                                    />
                                    <span class="input-group-append">
                                        <button
                                            class="
                                                btn btn-light
                                                text-color-dark
                                            "
                                            type="submit"
                                        >
                                            <strong>GO!</strong>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <h5 class="text-3 mb-3">LATEST TWEETS</h5>
                            <div
                                id="tweet"
                                class="twitter"
                                data-plugin-tweets
                                data-plugin-options="{'username': 'oklerthemes', 'count': 2}"
                            >
                                <p>Please wait...</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                            <div class="contact-details">
                                <h5 class="text-3 mb-3">CONTACT US</h5>
                                <ul class="list list-icons list-icons-lg">
                                    <li class="mb-1">
                                        <i
                                            class="
                                                far
                                                fa-dot-circle
                                                text-color-primary
                                            "
                                        ></i>
                                        <p class="m-0">
                                            234 Street Name, City Name
                                        </p>
                                    </li>
                                    <li class="mb-1">
                                        <i
                                            class="
                                                fab
                                                fa-whatsapp
                                                text-color-primary
                                            "
                                        ></i>
                                        <p class="m-0">
                                            <a href="tel:8001234567"
                                                >(800) 123-4567</a
                                            >
                                        </p>
                                    </li>
                                    <li class="mb-1">
                                        <i
                                            class="
                                                far
                                                fa-envelope
                                                text-color-primary
                                            "
                                        ></i>
                                        <p class="m-0">
                                            <a href="mailto:mail@example.com"
                                                >mail@example.com</a
                                            >
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <h5 class="text-3 mb-3">FOLLOW US</h5>
                            <ul class="social-icons">
                                <li class="social-icons-facebook">
                                    <a
                                        href="http://www.facebook.com/"
                                        target="_blank"
                                        title="Facebook"
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                </li>
                                <li class="social-icons-twitter">
                                    <a
                                        href="http://www.twitter.com/"
                                        target="_blank"
                                        title="Twitter"
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                </li>
                                <li class="social-icons-linkedin">
                                    <a
                                        href="http://www.linkedin.com/"
                                        target="_blank"
                                        title="Linkedin"
                                        ><i class="fab fa-linkedin-in"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container py-2">
                        <div class="row py-4">
                            <div
                                class="
                                    col-lg-1
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                    justify-content-lg-start
                                    mb-2 mb-lg-0
                                "
                            >
                                <a href="index.html" class="logo pr-0 pr-lg-3">
                                    <img
                                        alt="Porto Website Template"
                                        src="{{ asset('img/logo.png') }}"
                                        class="opacity-5"
                                        height="33"
                                    />
                                </a>
                            </div>
                            <div
                                class="
                                    col-lg-7
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                    justify-content-lg-start
                                    mb-4 mb-lg-0
                                "
                            >
                                <p>© Copyright 2020. All Rights Reserved.</p>
                            </div>
                            <div
                                class="
                                    col-lg-4
                                    d-flex
                                    align-items-center
                                    justify-content-center
                                    justify-content-lg-end
                                "
                            >
                                <nav id="sub-menu">
                                    <ul>
                                        <li>
                                            <i class="fas fa-angle-right"></i
                                            ><a
                                                href="page-faq.html"
                                                class="
                                                    ml-1
                                                    text-decoration-none
                                                "
                                            >
                                                FAQ's</a
                                            >
                                        </li>
                                        <li>
                                            <i class="fas fa-angle-right"></i
                                            ><a
                                                href="sitemap.html"
                                                class="
                                                    ml-1
                                                    text-decoration-none
                                                "
                                            >
                                                Sitemap</a
                                            >
                                        </li>
                                        <li>
                                            <i class="fas fa-angle-right"></i
                                            ><a
                                                href="contact-us.html"
                                                class="
                                                    ml-1
                                                    text-decoration-none
                                                "
                                            >
                                                Contact Us</a
                                            >
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <div
            class="modal fade"
            id="smallModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="smallModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div
                            class="
                                featured-box featured-box-default
                                text-left
                                mt-0
                            "
                        >
                            <div class="box-content">
                                <h4
                                    class="
                                        color-primary
                                        font-weight-semibold
                                        text-4 text-uppercase
                                        mb-3
                                    "
                                >
                                    Login
                                </h4>
                                <form
                                    action="{{ route('login.custom') }}"
                                    method="POST"
                                    class="needs-validation"
                                >
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label
                                                class="
                                                    font-weight-bold
                                                    text-dark text-2
                                                "
                                                >E-mail Address</label
                                            >
                                            <input
                                                type="text"
                                                value=""
                                                name="email"
                                                class="
                                                    form-control form-control-lg
                                                "
                                                required
                                            />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label
                                                class="
                                                    font-weight-bold
                                                    text-dark text-2
                                                "
                                                >Password</label
                                            >
                                            <input
                                                type="text"
                                                value=""
                                                name="password"
                                                class="
                                                    form-control form-control-lg
                                                "
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input
                                                        type="checkbox"
                                                        name="remember"
                                                    />
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="
                                            form-row
                                            d-fled
                                            justify-content-center
                                        "
                                    >
                                        <input
                                            type="submit"
                                            value="Register"
                                            class="
                                                btn btn-primary btn-modern
                                                float-right
                                            "
                                            data-loading-text="Loading..."
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor -->
        <script src="{{ asset('porto/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{
                asset('porto/vendor/jquery.appear/jquery.appear.min.js')
            }}"></script>
        <script src="{{
                asset('porto/vendor/jquery.easing/jquery.easing.min.js')
            }}"></script>
        <script src="{{
                asset('porto/vendor/jquery.cookie/jquery.cookie.min.js')
            }}"></script>
        <script src="{{
                asset('porto/vendor/popper/umd/popper.min.js')
            }}"></script>
        <script src="{{
                asset('porto/vendor/bootstrap/js/bootstrap.min.js')
            }}"></script>
        <script src="{{ asset('porto/vendor/common/common.min.js') }}"></script>
        <script src="{{
                asset('vendor/jquery.validation/jquery.validate.min.js')
            }}"></script>
        <script src="{{
                asset(
                    'porto/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js'
                )
            }}"></script>
        <script src="{{
                asset('porto/vendor/jquery.gmap/jquery.gmap.min.js')
            }}"></script>
        <script src="{{
                asset('porto/vendor/jquery.lazyload/jquery.lazyload.min.js')
            }}"></script>
        <script src="{{
                asset('porto/vendor/isotope/jquery.isotope.min.js')
            }}"></script>
        <script src="{{
                asset('porto/vendor/owl.carousel/owl.carousel.min.js')
            }}"></script>
        <script src="{{
                asset(
                    'porto/vendor/magnific-popup/jquery.magnific-popup.min.js'
                )
            }}"></script>
        <script src="{{
                asset('porto/vendor/vide/jquery.vide.min.js')
            }}"></script>
        <script src="{{ asset('porto/vendor/vivus/vivus.min.js') }}"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('porto/js/theme.js') }}"></script>

        <!-- Current Page Vendor and Views -->
        <script src="{{
                asset(
                    'porto/vendor/rs-plugin/js/jquery.themepunch.tools.min.js'
                )
            }}"></script>
        <script src="{{
                asset(
                    'porto/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js'
                )
            }}"></script>
        <script src="{{
                asset(
                    'porto/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js'
                )
            }}"></script>
        <script src="{{ asset('porto/js/views/view.home.js') }}"></script>

        <!-- Theme Custom -->
        <script src="{{ asset('porto/js/custom.js') }}"></script>

        <!-- Theme Initialization Files -->
        <script src="{{ asset('porto/js/theme.init.js') }}"></script>

        <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->
    </body>
</html>
