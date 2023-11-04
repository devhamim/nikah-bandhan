<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        
        <meta property="og:image" content="{{ asset($websiteParameter->logo ? 'storage/logo/'.$websiteParameter->logo : 'img/logo.jpg') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
 @if ($websiteParameter->favicon)

  <link rel="shortcut icon" href="{{ asset('storage/favicon/'. $websiteParameter->favicon) }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('storage/favicon/'. $websiteParameter->favicon) }}" type="image/x-icon">

  @else

  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    
  @endif

{{-- <title>
    Taslima Marriage Media 💕 - The #1 Matrimonial Website In Bangladesh
    

</title> --}}

<title>
  
  {{ env('APP_NAME_BIG') }} | Matrimony Service in Bangladesh | Marriage Media Service provider in Bangladesh | 
  Matchmaker Service in Bangladesh
</title>
      

     {{-- <meta name="google-site-verification" content="hXsQ0jlq5t5lKq_HJiI4fkx7B7hAQnWFEgr4OnUzpo0" /> --}}

    <meta name="description" 
    content="Matrimony Website In Bangladesh, Islamic Marriage Media In Bangladesh, Divorcee Matrimony In Bangladesh, Bangladesh Matrimony for Hindu, Bengali matrimony site.">

        <meta name="author" content="{{ $websiteParameter->meta_author ?: 'Matchinglife' }}">
        <meta name="keywords" content="Matrimony Website In Bangladesh, Islamic Marriage Media In Bangladesh, Divorcee Matrimony In Bangladesh, Bangladesh Matrimony for Hindu, Bengali matrimony site">

@if ($websiteParameter->google_analytics_code)
  {!! $websiteParameter->google_analytics_code !!}
@endif

@if ($websiteParameter->facebook_pixel_code)
  {!! $websiteParameter->facebook_pixel_code !!}
@endif


<!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url"           content="{{ url('/') }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{ env('APP_NAME_BIG') }} | Matrimony Service in Bangladesh | Marriage Media Service provider in Bangladesh | 
  Matchmaker Service in Bangladesh" />
  <meta property="og:description"   content="Matrimony Website In Bangladesh, Islamic Marriage Media In Bangladesh, Divorcee Matrimony In Bangladesh, Bangladesh Matrimony for Hindu, Bengali matrimony site." />
  <meta property="og:image"         content="{{ asset($websiteParameter->logo ? 'storage/logo/'.$websiteParameter->logo : 'img/logo.jpg') }}" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="{{asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons')}}" />
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('mk/mk/BS4/assets/css/material-kit.css?v=2.0.2')}}">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('mk/mk/BS4/assets/assets-for-demo/demo.css')}}" rel="stylesheet" />
    <!-- iframe removal -->
 
 <link href="{{asset('css/front.min.css')}}" rel="stylesheet" />
<script src="{{asset('js/front.min.js')}}"></script>

 
    <link href="{{asset('css/w3.css')}}" rel="stylesheet" />

  @stack('css')

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>



            /*-- /counter-agile --*/
        .agileinfo_counter_section {
            background: url(assets/wedding/images/bg2.jpg)no-repeat 0px 0px;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-attachment: fixed;
            padding: 6em 0;
        }
        .agileinfo_counter_section h3 {
            /*font-family: 'Arizonia', cursive;*/
            color: #fff;
            font-size: 3em;
            letter-spacing: 2px;
        }
        .agileinfo_counter_section p {
            padding: 1em 0;
            color: #eaeaea;
            font-size: 1em;
            letter-spacing: 2px;
        }

        .header-filter::before {
    background: rgba(0, 0, 0, 0.01);
}

 



        .page-header{ height: 100vh !important; }

        @media screen and (max-width: 992px) {

            /*.header-filter{
                height: 600px !important;
                bottom: 0 !important;
            }*/

            .page-header {
                height: 30vh !important;
                 
                /*display: flex ;*/
                align-items: flex-start !important;
            }

            h1.title
            {
                font-size: 25px;
                margin-top: 35px;
                text-align: center;
                margin-bottom: 25px;
            }


            .agileinfo_counter_section h3 {
                font-size: 3.5em;
            }
            .agileinfo_counter_section {
                padding: 5em 0;
            }
            .agileinfo_counter_section p {
                font-size: .8em;
            }

        }

        @media screen and (max-width: 768px) {

        }

 
        @media screen and (max-width: 576px) {

        }

        h1,h2,h4{
        
            font-family: 'Raleway',sans-serif!important;
    }



    </style>


</head>

<body class="landing-page-s profile-page">
   <div id="backtop">&#9650;</div>


   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFJQGGP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
 
    
    @include('welcome.layouts.wcHeader')
    @yield('content')
    @include('welcome.layouts.wcFooter')


    @auth
{{-- @include('user.includes.modal.myModal')  --}}

@else

@include('welcome.includes.modals.loginModal')
@include('welcome.includes.modals.registerModal')
@endauth


    <!--   Core JS Files   -->
    <script src="{{asset('mk/mk/BS4/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('mk/mk/BS4/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('mk/mk/BS4/assets/js/bootstrap-material-design.js')}}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/moment.min.js')}}"></script>
    <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/nouislider.min.js')}}"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="{{asset('mk/mk/BS4/assets/js/material-kit.js?v=2.0.2')}}"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="{{asset('mk/mk/BS4/assets/assets-for-demo/js/material-kit-demo.js')}}"></script>

    <script type="text/javascript">
  $(function(){
   

  });


    $(window).load(function(){



      setTimeout( function(){ 

        $('#dvLoading').fadeOut(500);
        // Do something after 2 second
         
              }  , 2000 );
    });

</script>


</body>

</html>