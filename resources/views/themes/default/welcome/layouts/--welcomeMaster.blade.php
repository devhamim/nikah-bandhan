<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- <title> @yield('title') </title> --}}
  <title>News</title>
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" >
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" type="text/css" href="{{asset('css/w3.css')}}">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/font-awesome/css/font-awesome.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('assets/select2/dist/css/select2.min.css')}}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('cp/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('cp/dist/css/skins/_all-skins.min.css')}}">
 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">
  

  <style type="text/css">

  .layout-boxed {
     background: url("img/bg.jpg") repeat fixed; 
}

    .skin-blue .main-header .navbar {
    background-color: #0D4DA1;
    }

  .top-bg-img{
  background-image: url("{{asset('img/bg.jpg')}}") !important;
  background-size: cover;
  background-position: center;
  /*background-color: #ccc;*/


  width: 100%;
  min-height: 400px;
/*  position: absolute;*/
  margin: 0;
  padding: 0;
  border: 0;

}

    .top-bg-cover{
  position: absolute;
  height:inherit;
  width: inherit;
  margin: 0;
  padding:0;
  border: 0;
  /*background-color: rgba(0,0,0,.3);*/
  

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



  <link rel="stylesheet" href="{{asset('assets/ticker/example/libs/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/ticker/example/libs/theme.css')}}">
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
    color:#007f00 !important;
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
    font-size: 18px;
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
<body class="hold-transition  skin-blue  layout-top-nav layout-boxed">
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


<!-- jQuery 3 -->
<script src="{{asset('cp/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('cp/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('cp/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/select2/dist/js/select2.full.min.js')}}"></script>

<!-- Slimscroll -->
<script src="{{asset('cp/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('cp/bower_components/fastclick/lib/fastclick.js')}}"></script>

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
              height: '260px'
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

</body>
</html>
