<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>
        @if ($websiteParameter->title)
            {!! $websiteParameter->title !!}
        @else
            {{ env('APP_NAME_BIG') }} | Matrimony Service in Bangladesh | Marriage Media Service provider in
            Bangladesh |
            Matchmaker Service in Bangladesh
        @endif
    </title>

    <!-- Favicon -->
    @if ($websiteParameter->favicon)
        <link rel="shortcut icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    @endif





    <meta name="description"
        content="{{ $websiteParameter->meta_description ?:
    'Matrimony Service in Bangladesh
Marriage Media Service provider in Bangladesh
Matchmaker Service in Bangladesh Looing for Marriage Media In Bangladesh? Matchinglife is the trustworthy media in Dhaka, Bangladesh. We offer you the best matched life parner according to your profile. Create a free account and search your partner.' }}">

    <meta name="author" content="{{ $websiteParameter->meta_author ?: 'Matchinglife' }}">
    <meta name="keywords"
        content="{{ $websiteParameter->meta_keyword ?:
    'Matrimony Service in Bangladesh
Marriage Media Service provider in Bangladesh
Matchmaker Service in Bangladesh' }}">

    @if ($websiteParameter->google_analytics_code)
        {!! $websiteParameter->google_analytics_code !!}
    @endif

    @if ($websiteParameter->facebook_pixel_code)
        {!! $websiteParameter->facebook_pixel_code !!}
    @endif

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
        rel="stylesheet" type="text/css" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('porto/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/vendor/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/vendor/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{
                asset(
                    'porto/vendor/simple-line-icons/css/simple-line-icons.min.css'
                )
            }}" />
    <link rel="stylesheet" href="{{
                asset('porto/vendor/owl.carousel/assets/owl.carousel.min.css')
            }}" />
    <link rel="stylesheet" href="{{
                asset(
                    'porto/vendor/owl.carousel/assets/owl.theme.default.min.css'
                )
            }}" />
    <link rel="stylesheet" href="{{
                asset('porto/vendor/magnific-popup/magnific-popup.min.css')
            }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('porto/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/css/theme-elements.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/css/theme-blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/css/theme-shop.css') }}" />

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('porto/vendor/rs-plugin/css/settings.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/vendor/rs-plugin/css/layers.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/vendor/rs-plugin/css/navigation.css') }}" />
    <link rel="stylesheet" href="{{
                asset('porto/vendor/circle-flip-slideshow/css/component.css')
            }}" />

    <!-- Demo CSS -->

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('porto/css/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('porto/css/custom.css') }}" />

    <!-- Head Libs -->
    <script src="{{
                asset('porto/vendor/modernizr/modernizr.min.js')
            }}"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    @stack('css')

    <style type="text/css">
        .rgba-gradient {
            background: linear-gradient(45deg,
                    rgba(234, 21, 129, 0.6),
                    rgba(10, 23, 187, 0.6));
        }

    .bg-color-vipmm{
    background-color: #0E686D !important;
}

.color-vipmm{
    color: #0E686D !important;
}

.color-vipmm2{
    color: #ED1A37 !important;
}

.vipmm-cover{
        position: relative !important;
        top:320px !important;
    }

    #header .header-body {
    display: flex;
    flex-direction: column;
    background: #FFF;
    transition: min-height 0.3s ease;
    width: 100%;
    border-top: 0px solid #EDEDED;
    border-bottom: 1px solid transparent;
    z-index: 1001;
}

.home-login{

    background: rgba(0,0,0,0.1);
  backdrop-filter: blur(20px);

}




    @media only screen and (max-width: 740px){
        .vipmm-cover{
        position: static !important;

    }


    .home-login{
        -webkit-backdrop-filter: blur(100px);
    }
}



    </style>
</head>

<body>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v4.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFJQGGP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="body">

        {{-- @include('partials.header') --}}

        @include('user.parts.header')
        <div role="main" class="main">


            @yield('content')


        </div>

        @include('partials.footer')
    </div>

    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="
                                featured-box featured-box-default
                                text-left
                                mt-0
                            ">
                        <div class="box-content">
                            <h4 class="
                                        color-primary
                                        font-weight-semibold
                                        text-4 text-uppercase
                                        mb-3
                                    ">
                                Login
                            </h4>
                            <form action="{{ route('login.custom') }}" method="POST" class="needs-validation">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="
                                                    font-weight-bold
                                                    text-dark text-2
                                                ">E-mail Address</label>
                                        <input type="text" value="" name="email" class="
                                                    form-control form-control-lg
                                                " required />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="
                                                    font-weight-bold
                                                    text-dark text-2
                                                ">Password</label>
                                        <input type="password" value="" name="password" class="
                                                    form-control form-control-lg
                                                " required />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" />
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="
                                            form-row
                                            d-fled
                                            justify-content-center
                                        ">
                                    <input type="submit" value="Login" class="
                                                btn btn-primary btn-modern
                                                float-right
                                            " data-loading-text="Loading..." />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registion" tabindex="-1" role="dialog" aria-labelledby="registion"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="
                            featured-box featured-box-default
                            text-left
                            mt-0
                        ">
                    <div class="box-content">
                        <h4 class="
                                    color-primary
                                    font-weight-semibold
                                    text-4 text-uppercase
                                    mb-3
                                ">
                            REGISTER AN ACCOUNT
                        </h4>
                        <form action="{{
                            route('register.custom')
                        }}" method="POST" class="needs-validation">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="
                                        font-weight-bold
                                        text-dark text-2
                                    ">E-mail Address</label>
                            <input type="email" value="" name="email" class="
                                        form-control
                                        form-control-lg
                                    " required />
                            @if ($errors->has('email'))
                            <div class="
                                        alert alert-danger
                                    ">
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
                        <div class="form-group col-lg-6">
                            <label class="
                                        font-weight-bold
                                        text-dark text-2
                                    ">Password</label>
                            <input type="password" value="" name="password" class="
                                        form-control
                                        form-control-lg
                                    " required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="
                                        font-weight-bold
                                        text-dark text-2
                                    ">Re-enter
                                Password</label>
                            <input type="password" value="" name="password_confirmation" class="
                                        form-control
                                        form-control-lg
                                    " required />
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
                        <div class="form-group col-lg-9">
                            <div class="
                                        custom-control
                                        custom-checkbox
                                    ">
                                <input type="checkbox" class="
                                            custom-control-input
                                        " id="terms" checked required />
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

                                <label class="
                                            custom-control-label
                                            text-2
                                        " for="terms">I agree to the
                                    <a href="#">terms of
                                        service</a></label>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <input type="submit" value="Register" class="
                                        btn
                                        btn-primary
                                        btn-modern
                                        float-right
                                    " data-loading-text="Loading..." />
                        </div>
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
