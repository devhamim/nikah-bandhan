
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<title>Nikah Bandhan</title>
	{{-- <title>
        @if ($websiteParameter->title)
            {!! $websiteParameter->title !!}
        @else
            {{ env('APP_NAME_BIG') }} | Matrimony Service in Bangladesh | Marriage Media Service provider in
            Bangladesh |
            Matchmaker Service in Bangladesh
        @endif
    </title> --}}
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- site favicon -->
	<link rel="icon" type="image/png" href="{{ asset('frontend') }}/images/favicon.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- All stylesheet and icons css  -->
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/swiper.min.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/lightcase.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">

</head>

<body>
	<!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
	<!-- preloader ending here -->


	<!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="fa-solid fa-angle-up"></i></a>
    <!-- scrollToTop ending here -->


    
    @include('partials.header')
    <div role="main" class="main">
        {{-- @include('partials.homeOverlay') --}}


        @yield('content')


    </div>

    @include('partials.footer')


    <!-- ================> Footer section start here <================== -->
	

	<div class="side_button">
		<a class="btn btn-success py-3 px-1 rounded fa-beat" style="background-color: #E31190;" href="{{ url('register') }}"><p><i class="fa-solid fa-user-tie fa-beat"></i></p> Register</a>
	</div>
    <!-- ================> Footer section end here <================== -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div
                        class="
                                featured-box featured-box-default
                                text-left
                                mt-0
                            ">
                        <div class="box-content">
                            <h4
                                class="
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
                                        <label
                                            class="
                                                    font-weight-bold
                                                    text-dark text-2
                                                ">E-mail
                                            Address</label>
                                        <input type="text" value="" name="email"
                                            class="
                                                    form-control form-control-lg
                                                "
                                            required />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label
                                            class="
                                                    font-weight-bold
                                                    text-dark text-2
                                                ">Password</label>
                                        <input type="password" value="" name="password"
                                            class="
                                                    form-control form-control-lg
                                                "
                                            required />
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="form-group col-6">
                                        <div class="checkbox">
                                            <div class="row">
                                                <div class="col-2"><input type="checkbox" name="remember" /></div>
                                                <div class="col-9"> <label class="form-label">Remember Me</label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6 text-end">
                                        <a href="{{ route('forget.password.get') }}" class="float-right">Forgot
                                            Password</a>
                                    </div>

                                </div>

                                <div
                                    class="row">
                                        <div class="col-lg-6">
                                            <input type="submit" value="Login"
                                        class="
                                                btn btn-primary btn-modern
                                                float-right
                                            "
                                        data-loading-text="Loading..." style="background-color: #E31190;" />
                                        </div>
                                        <div class="col-lg-6 m-auto text-center">
                                            <a href="{{ url('register') }}" class="" >Register Now</a>
                                        </div>
                                    


                                    <div class="text-right mt-2" >
                                        

                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade py-3 px-3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ route('login.custom') }}" method="POST" class="needs-validation">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label
                            class="
                                    font-weight-bold
                                    text-dark text-2
                                ">E-mail
                            Address</label>
                        <input type="text" value="" name="email"
                            class="
                                    form-control form-control-lg
                                "
                            required />
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="form-group col">
                        <label
                            class="
                                    font-weight-bold
                                    text-dark text-2
                                ">Password</label>
                        <input type="password" value="" name="password"
                            class="
                                    form-control form-control-lg
                                "
                            required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" />
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6 ">
                        <a href="{{ route('forget.password.get') }}" class="float-right">Forgot
                            Password</a>
                    </div>
        
                </div>
        
                <div
                    class="
                            form-row
                            d-fled
                            justify-content-center
                        ">
                    <input type="submit" value="Login"
                        class="
                                btn btn-primary btn-modern
                                float-right
                            "
                        data-loading-text="Loading..." />
        
        
                    <div class="text-right mt-2" >
                        <a href="{{ url('register') }}" class="" style="margin-left: 20px !important;" >Register Now</a>
        
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div> --}}

	
	<!-- All Needed JS -->
	<script src="{{ asset('frontend') }}/js/vendor/jquery-3.6.0.min.js"></script>
	<script src="{{ asset('frontend') }}/js/vendor/modernizr-3.11.2.min.js"></script>
	<script src="{{ asset('frontend') }}/js/isotope.pkgd.min.js"></script>
	<script src="{{ asset('frontend') }}/js/slick.min.js"></script>
	<script src="{{ asset('frontend') }}/js/swiper.min.js"></script>
	<!-- <script src="assets/js/all.min.js"></script> -->
	<script src="{{ asset('frontend') }}/js/wow.js"></script>
	<script src="{{ asset('frontend') }}/js/lightcase.js"></script>
	<script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
	<script src="{{ asset('frontend') }}/js/waypoints.min.js"></script>
	<script src="{{ asset('frontend') }}/js/vendor/bootstrap.bundle.min.js"></script>
	<script src="{{ asset('frontend') }}/js/plugins.js"></script>
	<script src="{{ asset('frontend') }}/js/main.js"></script>

	<!-- SLIder -->
	<script>
		$('.autoplay').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: false,
		});
	</script>

	<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
	<script>
		window.ga = function () {
			ga.q.push(arguments)
		};
		ga.q = [];
		ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto');
		ga('set', 'anonymizeIp', true);
		ga('set', 'transport', 'beacon');
		ga('send', 'pageview')
	</script>
	<script src="../../../../www.google-analytics.com/analytics.js" async></script>
</body>
</html>