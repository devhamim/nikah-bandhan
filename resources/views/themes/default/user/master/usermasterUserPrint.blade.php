<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title> {{$websiteParameter->title}}</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template" />
    <meta name="author" content="okler.net" />

    <!-- Favicon -->
    @if ($websiteParameter->favicon)

    <link rel="shortcut icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">

    @else

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    @endif

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

    @if ($websiteParameter->google_analytics_code)
        {!! $websiteParameter->google_analytics_code !!}
    @endif

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
    <link rel="stylesheet" href="{{asset('alt3/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('alt3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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

.bg-color-vipmm2{
    background-color: #ED1A37 !important;
}

.color-vipmm{
    color: #0E686D !important;
}

.color-vipmm2{
    color: #ED1A37 !important;
}
.form-control {
    border-color: #0E686D !important;
}


#footer {
    background: #212529;
    border-top: 4px solid #212529;
    font-size: 0.9em;
    margin-top: 0px !important;
    padding: 0;
    position: relative;
    clear: both;
}

hr {
    border: 0;
    border-top: 1px solid #0E686D;
    margin: 10px 0;
}


hr.info {
    border: 0 !important;
    border-top: 1px dotted gray !important;
    margin: 7px 0 !important;
}


.profile-image-outer-container .profile-image-inner-container {
        border-radius: 50% !important;
        width: 80px !important;
        height: 80px;
        padding: 5px;
    }

    .progress {
        border-radius: 25px !important;
        height: 12px !important;
        background: #FAFAFA !important;
        overflow: visible !important;
    }
    </style>
</head>

<body onload="window.print();">

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFJQGGP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div class="body" style="background-color: #e7e6e6">
        <div role="main" class="main">
            @yield('content')
        </div>
    </div>






  @stack('js')



</body>

</html>
