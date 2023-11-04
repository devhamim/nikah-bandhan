<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- <title> @yield('title') </title> --}}
  <title>{{config('app.name')}}</title>
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" >
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



       <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url"           content="{{route('welcome.postDetails',[$post, $post->excerpt])}}" />
  <meta property="og:type"          content="post" />
  <meta property="og:title"         content="{{$post->title}}" />
  <meta property="og:description"   content="{{str_limit($post->excerpt,160)}}" />
  <meta property="og:image"         content="{{asset($post->fi())}}" />



  {{-- <script defer src="{{asset('fonts/fa/svg-with-js/js/fontawesome-all.min.js')}}"></script> --}}
  <link rel="stylesheet" type="text/css" href="{{asset('css/w3.css')}}">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" type="text/css" href="{{asset('cp1/bootstrap/css/bootstrap.min.css')}}">

  <!-- Font Awesome -->
  <link href="{{asset('cp/bower_components/font-awesome/css/font-awesome.min.css')}}" rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" href="{{asset('assets/select2/dist/css/select2.min.css')}}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/Ionicons/css/ionicons.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="{{asset('cp1/dist/css/AdminLTE.min.css')}}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('cp1/dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



  <!-- Google Font -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">

  <style type="text/css">

  .skin-black-light .main-header .navbar .navbar-nav>li>a {
    /*border-right: 1px solid #eee;*/
    border-right: none !important;
}

  .skin-black-light .main-header .logo {
    background-color: #777 !important;
    color: #fff;
    border-bottom: 0 solid transparent;
}

  .layout-boxed {
     background: url("img/bg.jpg") repeat fixed; 
}

    .skin-blue .main-header .navbar {
    background-color: #0D4DA1;
    }


 .select2-container--default .select2-results__option--highlighted[aria-selected] {
    /*background-color: #f37022;*/
    background-color: #2196f3;
    color: white;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #4e56ff;
    border-color: #c1d6ff;
    padding: 1px 10px;
    color: #fff;
}

h3.footer-h3
{
  line-height: 3;
}


@media (max-width:768px)
{
  
  .top-bg-img{
    width: 100%;
    height: 700px; 
  }

  h3.footer-h3
    {
      line-height: 1;
    }

/*  .top-title {
    text-align: center;
    color: white;
    width: 100%;
    position: relative;
    top:20px;
  }
  .top-title h1{
    font-size: 20px;
    font-weight: normal;
  }*/

}

 

footer ul {
    list-style-type: none;
    /*margin: 0;*/
    padding: 0;
    overflow: hidden;
    
}

footer li {
    float: left;
    border-right:1px solid #bbb;
}
footer li:nth-last-child(1) {

    border-right:1px solid transparent;
}


 
footer li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 55px;
    text-decoration: none;
}


footer li a:hover:not(.active) {
    background-color: #111;
    color: #fff;
}

/*.active {
    background-color: #4CAF50;
}*/
.weekdays {
    margin: 0;
    padding: 10px 0;
    background-color: #ddd;
}

.weekdays li {
    display: inline-block;
    width: 13.6%;
    color: #666;
    text-align: center;
}

.days {
    padding: 10px 0;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 13.6%;
    text-align: center;
    margin-bottom: 5px;
    font-size:12px;
    color: #777;
}

.days li .active {
    padding: 5px;
    background: #1abc9c;
    color: white !important
}

  </style>



  {{-- <link rel="stylesheet" href="{{asset('assets/ticker/example/libs/style.css')}}"> --}}
  {{-- <link rel="stylesheet" href="{{asset('assets/ticker/example/libs/theme.css')}}"> --}}
  <style type="text/css">
      #stop-resume{
        display: block;
        padding: 10px;
        background-color: #f1f1f1;
        margin:10px;
        width: 70px;
        text-align: center;
        border:solid 1px white;
        text-transform: uppercase;
        font-family: sans-serif;
        text-decoration: none;
      }
      #stop-resume:active{
        background-color:white;
        border:solid 1px #f1f1f1;
        color:blue;
      }
    </style>

<style>
    .TickerNews{
    width: 100%;
    height: 30px;
    line-height: 30px;
    margin-bottom: 15px;
    overflow: hidden;
}
.ti_wrapper{
    width: 100%;
    position: relative;
    overflow: hidden;
}
.ti_slide{
    width: 30000px;
    position: relative;
    left: 0;
    top: 0;
}
.ti_content{
    width: 8000px;
    position: relative;
    float:left;
}
.ti_news{
    float:left;
}
.ti_news a{
    display: block;
    margin-right: 10px;
    color:black;
    text-decoration: none;
    font-family:"SolaimanLipi";
}
/* template 2 */
.TickerNews.default_theme_2{
    background-color: #f1f1f1;
    position: relative;
    font-family:"SolaimanLipi";
}

.TickerNews.default_theme_2 *{
    box-sizing:border-box;
}

.TickerNews.default_theme_2 .leftside{
    position: relative;
    left:0;
    float:left;
}

.TickerNews.default_theme_2 .leftside h4{
    margin: 0;
    display:inline-block;
    background:#D80505;
    font-size:16px;
    color:#fff;   
    padding: 5px;
    font-weight: normal;
    margin-right:10px;
}

.TickerNews.default_theme_2 .ti_wrapper{
    position: absolute;
    left: 70px;
    float:left;
}

.TickerNews.default_theme_2 .ti_news a{
    display: block;
    margin-right: 10px;
    color:#666 !important;
    text-transform: uppercase;
    text-decoration: none;
    font-size: 16px;
}

.TickerNews.default_theme_2 .ti_news span{
    color:red;
    font-size: 110%;
}
</style>

<style>

  .w3-bar-item{
    font-size: 17px;
  }

  .w3-bar .w3-bar-item{
    padding: 5px 8px;
  }

  .fb-share-button, .fb_iframe_widget
{
  vertical-align: top !important;
  top: 0 !important;
  margin-top: 0px !important;
}


</style>

   @stack('css')

     <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
{{-- <body class="hold-transition  skin-blue  layout-top-nav"> --}}
{{-- <body class="hold-transition  skin-blue  layout-top-nav layout-boxed"> --}}

  <body class="hold-transition  skin-black-light layout-top-nav layout-boxed">

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="wrapper">

@include('welcome.layouts.header')
  


  <!-- Content Wrapper. Contains page content -->
  <!-- Full Width Column -->
  <div class="content-wrapper" style="background-color: #fcfcfc;">


     @yield('content')
     
     @include('welcome.includes.modals.callAmbulanceModal')    


  </div>
  <!-- /.content-wrapper -->

@include('welcome.layouts.footer')
  

</div>
<!-- ./wrapper -->


<!-- jQuery 2.2.3 -->
<script src="{{asset('cp1/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
{{-- <script src="{{asset('cp/bower_components/jquery-ui/jquery-ui.min.js')}}"></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{-- <script>
  $.widget.bridge('uibutton', $.ui.button);
</script> --}}

<!-- Bootstrap 3.3.6 -->
<script src="{{asset('cp1/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/select2/dist/js/select2.full.min.js')}}"></script>

<!-- SlimScroll 1.3.0 -->
<script src="{{asset('cp1/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('cp1/plugins/fastclick/fastclick.js')}}"></script>

<script src="{{asset('assets/ticker/example/libs/jquery.tickerNews.min.js')}}"></script>
      {{-- <script type="text/javascript">
        $(function(){
        _Ticker = $(".TickerNews").newsTicker();
      });
      </script> --}}

      <script type="text/javascript">
        $(function(){
          var timer = !1;
        _Ticker = $("#T3").newsTicker();
        _Ticker.on("mouseenter",function(){
          var __self = this;
          timer = setTimeout(function(){
            __self.pauseTicker();
          },200);
        });
        _Ticker.on("mouseleave",function(){
          clearTimeout(timer);
          if(!timer) return !1;
          this.startTicker();
        });
      });
      </script>

      <script>
        $(function(){
          $('.slim').slimScroll({
              height: '290px'
          });
        });
      </script>


<!-- AdminLTE App -->
<script src="{{asset('cp/dist/js/adminlte.min.js')}}"></script>

 @stack('js')


<script>
function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
}
</script>

<script>
function opentab2(tab2Name) {
    var i;
    var x = document.getElementsByClassName("tab2");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(tab2Name).style.display = "block";  
}
</script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="{{asset('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5aa4ddf71ca1c548')}}"></script>


</body>
</html>
