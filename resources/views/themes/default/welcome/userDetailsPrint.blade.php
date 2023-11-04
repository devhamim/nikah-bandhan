<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Print User Details of {{$user->username}} ({{$user->email}})</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @if ($websiteParameter->favicon)

  <link rel="shortcut icon" href="{{ asset('storage/favicon/'. $websiteParameter->favicon) }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('storage/favicon/'. $websiteParameter->favicon) }}" type="image/x-icon">

  @else

  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    
  @endif

    <meta name="description" 
    content="{{ $websiteParameter->meta_description ?: 'Matrimony Service in Bangladesh
Marriage Media Service provider in Bangladesh
Matchmaker Service in Bangladesh Looing for Marriage Media In Bangladesh? Taslima marriage media is the trustworthy media in Dhaka, Bangladesh. We offer you the best matched life parner according to your profile. Create a free account and search your partner.' }}">

        <meta name="author" content="{{ $websiteParameter->meta_author ?: 'Taslima' }}">
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

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('cp/dist/css/AdminLTE.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">
<link href="{{asset('css/welcome.css')}}" rel="stylesheet" />

<style type="text/css">
.table-condensed>tbody>tr>td, 
.table-condensed>tbody>tr>th, 
.table-condensed>tfoot>tr>td, 
.table-condensed>tfoot>tr>th, 
.table-condensed>thead>tr>td, 
.table-condensed>thead>tr>th 
{
  padding: 0px !important;
}
</style>
</head>
<body onload="window.print();">
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">

      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <div class="w3-row">
              <div class="w3-col" style="width:80px">
                <img style="margin-top: -5px;" class="img-responsive " width="60" src="{{ asset($websiteParameter->logo ? 'storage/logo/'.$websiteParameter->logo : 'img/logo.jpg') }}" alt="{{env('APP_NAME_BIG')}}">
              </div>
              <div class="w3-rest w3-padding">
                {{env('APP_NAME_BIG')}}
                <small class="pull-right">Date: {{date('d/m/Y')}}</small> 
              </div>
            </div>
          </h2>
        </div>
      </div>


 @include('welcome.includes.print.printUserBasic')


 @include('welcome.includes.print.printUserContactInfo')

 @include('welcome.includes.print.printUserPersonalInfo')

 @include('welcome.includes.print.printUserPersonalAct')


  {{-- @include('user.includes.data.dataPersonalInfo') --}}
  
  {{-- @include('user.includes.data.dataPersonalActivity') --}}


  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
