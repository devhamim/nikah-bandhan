<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
   
  @if ($websiteParameter->favicon)
  <link rel="shortcut icon" href="{{ asset('storage/favicon/'. $websiteParameter->favicon) }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('storage/favicon/'. $websiteParameter->favicon) }}" type="image/x-icon">
  @else
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">    
  @endif
    

<title>
  @if ($websiteParameter->title)
  {!! $websiteParameter->title !!}
  @else
  {{ env('APP_NAME_BIG') }} | Matrimony Service in Bangladesh | Marriage Media Service provider in Bangladesh | 
  Matchmaker Service in Bangladesh
  @endif
</title>

     {{-- <meta name="google-site-verification" content="hXsQ0jlq5t5lKq_HJiI4fkx7B7hAQnWFEgr4OnUzpo0" /> --}}

<meta name="description" 
    content="{{ $websiteParameter->meta_description ?: 'Matrimony Service in Bangladesh
Marriage Media Service provider in Bangladesh
Matchmaker Service in Bangladesh Looing for Marriage Media In Bangladesh? Matchinglife is the trustworthy media in Dhaka, Bangladesh. We offer you the best matched life parner according to your profile. Create a free account and search your partner.' }}">

        <meta name="author" content="{{ $websiteParameter->meta_author ?: 'Matchinglife' }}">
        <meta name="keywords" content="{{ $websiteParameter->meta_keyword ?: 'Matrimony Service in Bangladesh
Marriage Media Service provider in Bangladesh
Matchmaker Service in Bangladesh' }}">

@if ($websiteParameter->google_analytics_code)
  {!! $websiteParameter->google_analytics_code !!}
@endif

@if ($websiteParameter->facebook_pixel_code)
  {!! $websiteParameter->facebook_pixel_code !!}
@endif

    <link href="{{asset('css/w3.css')}}" rel="stylesheet" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('cp/dist/css/AdminLTE.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="{{asset('cp/dist/css/skins/_all-skins.min.css')}}">





<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="{{asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons')}}" />

{{-- <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}" /> --}}


<link rel="stylesheet" type="text/css" href="{{ asset('fonts/fa/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{asset('mk/mk/BS4/assets/css/material-kit.css?v=2.0.2')}}">
<!-- Documentation extras -->
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{asset('mk/mk/BS4/assets/assets-for-demo/demo.css')}}" rel="stylesheet" />
<!-- iframe removal -->

<link href="{{asset('assets/rc/x_rotating_card_v1.4/css/rotating-card.css')}}" rel='stylesheet' />

  <link rel="stylesheet" type="text/css" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/select2-bootstrap4/dist/select2-bootstrap4.css')}}">
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('cp/bower_components/select2/dist/css/select2.css')}}"> --}}

  <!-- dropzone -->
    <link rel="stylesheet" href="{{asset('assets/dropzonejs/dist/min/dropzone.min.css')}}" />

<style>

  .main{
  background: #e9ebee !important;
}

    .modal-open {
    overflow: unset;
}

.ntfy-badge{
        padding:2px 4px !important;
        border-radius: 4px;
        font-weight: bold;
    }

    
.navbar.bg-danger {
    background-color: #D52379!important;
    /*background-color: #2E2F96!important;*/
}

.bg-bg{

  background-color: #d81f26 !important;
  color: #fff !important; 
}

.navbar.bg-bg {
    color: #fff;
    background-color: #d81f26 !important;
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 12px -5px rgba(233, 30, 99, 0.46);
}

.navbar .navbar-toggler .navbar-toggler-icon {
    background-color: #eee !important;
}
 
</style>

<link href="{{asset('css/card.css')}}" rel="stylesheet" />
<link href="{{asset('css/welcome.css')}}" rel="stylesheet" />
<link href="{{asset('css/front.css')}}" rel="stylesheet" />
 



     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

@auth
  @endauth
    <link href="{{asset('css/user.css')}}" rel="stylesheet" />

@stack('css')

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>


{{-- <body class="{{Auth::check() ? 'profile-page' : 'index-page'}}"> --}}
<body class="profile-page" 
{{-- data-url="{{ route('welcome.automail') }}" --}}
>
  <div id="backtop">&#9650;</div>

  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFJQGGP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

          <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    @auth
    @include('user.layouts.userHeader') 
    @else
    @include('welcome.layouts.welcomeHeader')
    @endauth

    @yield('content')
    
    @include('welcome.layouts.wcFooter') 
    
    <!--   Core JS Files   -->
    <script src="{{asset('mk/mk/BS4/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('mk/mk/BS4/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('mk/mk/BS4/assets/js/bootstrap-material-design.js')}}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/moment.min.js')}}"></script>

<!-- Dropzonejs -->
    <script src="{{asset('assets/dropzonejs/dist/min/dropzone.min.js')}}"></script><!-- Dropzonejs -->
{{--     <script src="{{asset('dropzonejs/dist/min/dropzone.min.js')}}"></script>
     --}}

    <script src="{{asset('js/custom.js')}}"></script>
    
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js')}}"></script>

    {{-- <script src="{{asset('cp/bower_components/select2/dist/js/select2.full.min.js')}}"></script> --}}

    
    <!--    Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
    <!--    Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/nouislider.min.js')}}"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="{{asset('mk/mk/BS4/assets/js/material-kit.js?v=2.0.2')}}"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="{{asset('mk/mk/BS4/assets/assets-for-demo/js/material-kit-demo.js')}}"></script>


     
<!-- Slimscroll -->
<script src="{{asset('cp/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

{{--  <script>
  
$(function(){

$(document).bind("contextmenu",function(e) {   
  e.preventDefault();  
});  
$(document).keydown(function(e){    
  if(e.which === 123){ return false;    }})

});
</script>
    --}}
    <script>
        $(document).ready(function() {

            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();

            Dropzone.autoDiscover = false;




        });
    </script>


    <script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        // console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>


<script>
        $(document).ready(function() {
            $('.simple-select2').select2({
                theme: 'bootstrap4',
                placeholder: "Select an option",
                allowClear: true
            });

            $('.simple-select2-sm').select2({
                theme: 'bootstrap4',
                containerCssClass: ':all:',
                placeholder: "Select an option",
                allowClear: true
            });
        });
    </script>

<script src="{{asset('js/user.min.js')}}"></script>
<script src="{{asset('js/userSetting.min.js')}}"></script>
<script src="{{asset('js/front.min.js')}}"></script>


{{-- @auth --}}

{{-- @if (Auth::user()->hasIncompleteData())   --}}
{{-- modal is outside of .main .main-raised class --}}
{{-- @include('user.includes.modal.settingModal') --}}

{{-- <script>
$(document).ready(function(){
    // Show the Modal on load
    $("#settingModal").modal({backdrop: "static"});
    $("#settingModal").modal("show");
    // alert('ok');
});
</script> --}}
{{-- @endif --}}

{{-- @endauth --}}

    @auth
 @include('user.includes.modal.myModal')  

@else

{{-- @include('welcome.includes.modals.loginModal')
{{-- @include('welcome.includes.modals.registerModal') --}}
@endauth




    @stack('js')

   {{--  <script>
 document.addEventListener("contextmenu", function (e) {
        e.preventDefault();
    }, false);

document.onkeypress = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
 //alert(‘No F-12’);
 return false;
 }
 }
 document.onmousedown = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
 //alert(‘No F-keys’);
 return false;
 }
 }
document.onkeydown = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
 //alert(‘No F-keys’);
 return false;
 }
 }

 jQuery(function ($) {
    var baseUrl = window.location.origin;
     var img = $('.img-changer');
     var int = 1; 
  setInterval(function() {
    if(int===6){int=1}
       
       var background = baseUrl + '/img/b' + int + '.png';
       img.attr('src', background); // change src
       // console.log(int);
       int++;
    }, 4000);
});

</script>  --}}

</body>

</html>