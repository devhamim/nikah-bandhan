<style type="text/css">
    
    .profiles_box_style{
/*        border:1px solid #d52379!important;
        border-radius: 5px;*/
        padding: 19px !important;
        line-height: 10px!important;
          transition: box-shadow .3s !important;
          /*width: 300px;*/
          /*height: 500px;*/
          /*margin: 50px;*/

          /*important work */
          /*border-radius:10px !important;*/
          /*border: 1px solid #d52379 !important;*/
          border:none !important;

          background: #fff !important;
           /*box-shadow: 0 0 16px rgba(33,33,33,1) !important;*/
           box-shadow: 0 0 16px rgb(200, 200, 200) !important;
          /*float: left;*/
    }
    .profiles_box_style:hover{
           /*box-shadow: 0 0 16px rgba(33,33,33,1) !important;*/
    }
    .register_free_button{
            background-color: #fff !important;
            border: 1px solid #d52379 !important;
            color:#d52379 !important;
            box-shadow: none !important;
    }
    .register_free_button:hover{
        background-color: #d52379!important;
        color: #fff!important;
    }
.profile_desktop{
    display: none;
}
</style>


<!-- <br> -->

        <div class="row profile_desktop" style=" padding-bottom: 50px;">
            <div class="col-sm-6">

                <div class="">

                   <!--  <div style="width: 160px;" class="w3-tag w3-indigo w3-round w3-xxlarge w3-padding-large">
                    Brides
                </div> -->
                <h2 style="font-size: 1.6rem;">Brides</h2>
                    
                </div>    

             <!--    <br> <br> -->

                @foreach($brides as $user)

                <div class="w3-round mb-3 p-2 w3-border w3-border-gray profiles_box_style">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="w3-display-container">
                                
                            <img class="img-bordered w-100 w3-round" src="{{ route('imagecache', [ 'template'=>'ppsmbl','filename' => $user->latestCheckedPPNameOnly() ]) }}" alt="profile picture">
                              <div class="w3-display-middle">
                                <i class="fa fa-lock fa-2x w3-text-light-gray"></i>
                            </div>
                            <div class="w3-display-middle w3-display-hover">
                                <!-- <i class="fa fa-lock fa-2x w3-text-light-gray"></i> -->
                                 <!-- <p class="text-center" style="color: black!important; line-height: 15px!important;"> We take our Members' privacy seriously. Only registered Members can view photos.</p> -->
                            </div>
                            <div class="w3-display-bottom w3-display-hover">
                                <!-- <p class="w3-text-gray"> We take our Members' privacy seriously. Only registered Members can view photos.</p> -->
                            </div>
                            </div>
                        </div>

                        <div class="col-sm-7 text-left">
                            <p>Matrimony ID: {{ $user->username }}</p>
                            <p>Age: {{ $user->age() }}</p>
                            <p>Height:  @if($user->personalInfo)
                                        {{ $user->personalInfo->height }}
                                        @endif</p>
                            <p>Religion: {{ $user->religion }}</p>
                            <p>Profession: @if ($user->personalInfo)
    {{ $user->personalInfo->profession() }}
    @endif</p>

    <p>Country: {{ $user->country }}</p>

    <hr>
    <!-- <a  href="{{ url('login') }}">Login Now</a> or <a href="{{ url('signup') }}" class="w3-btn w3-indigo w3-round register_free_button">Register FREE</a> <br> <br> -->
                        </div>
                    </div>
                </div>
                @endforeach
      <!-- {{$grooms->links()}} -->

                
                
            </div>
            <div class="col-sm-6">
                <!-- <div class="text-center"> -->
                    <div>
<!--                 <div style="width: 160px;" class="w3-tag w3-indigo w3-round w3-xxlarge w3-padding-large">
                    Grooms
                </div> -->
                <h2 style="font-size: 1.6rem;">Grooms</h2>
                </div>

                <!-- <br> <br> -->


                @foreach($grooms as $user)

                <div class="w3-round mb-3 w3-border w3-border-gray p-2 profiles_box_style">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="w3-display-container">
                                
                            <img class="img-bordered w-100 w3-round" src="{{ route('imagecache', [ 'template'=>'ppsmbl','filename' => $user->latestCheckedPPNameOnly() ]) }}" alt="">
                            <div class="w3-display-middle">
                                <i class="fa fa-lock fa-2x w3-text-light-gray"></i>
                            </div>
                            
                            <div class="w3-display-middle w3-display-hover">
                                <!-- <i class="fa fa-lock fa-2x w3-text-light-gray"></i> -->
                                <!-- <p class="text-center" style="color: black!important;line-height: 15px!important;"> We take our Members' privacy seriously. Only registered Members can view photos.</p> -->
                            </div>
                            <div class="w3-display-bottom w3-display-hover">
                                <!-- <p class="w3-text-gray"> We take our Members' privacy seriously. Only registered Members can view photos.</p> -->
                            </div>
                            </div>
                        </div>

                        <div class="col-sm-7 text-left">
                            <p>Matrimony ID: {{ $user->username }}</p>
                            <p>Age: {{ $user->age() }}</p>
                            <p>Heigit:  @if($user->personalInfo)
                                        {{ $user->personalInfo->height }}
                                        @endif</p>
                            <p>Religion: {{ $user->religion }}</p>
                            <p>Profession: @if ($user->personalInfo)
    {{ $user->personalInfo->profession() }}
    @endif</p>

    <p>Country: {{ $user->country }}</p>

    <hr>
  <!--   <a  href="{{ url('login') }}">Login Now</a> or <a href="{{ url('signup') }}" class="w3-btn w3-indigo w3-round register_free_button">Register FREE</a> --> <br> <br>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- {{$grooms->links()}} -->


            </div>
        </div>












<!-- slider -->

<!---->
<!--<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->
<link type="text/css" href="{{asset('assets/slide_profile/jquerysctipttop.css')}}" rel="stylesheet" >
<!--</head>-->
<!--<body>-->

<div class="wrapper" style="margin-top:50px;margin-bottom:50px;">

<div class="jScroll">
     @foreach($profiles as $user)
<div class="jScroll-item">
 <!--  <img style="width: 100% !important;height: 128px;" class="img-bordered w-100 w3-round" src="{{ route('imagecache', [ 'template'=>'ppsmbl','filename' => $user->latestCheckedPPNameOnly() ]) }}" alt=""> -->
 
  <div class="w3-display-middle" style="top: 34% !important;">
    <i class="fa fa-lock fa-2x w3-text-light-gray"></i>
   </div>
 <img class="img-bordered w-100 w3-round" src="{{ route('imagecache', [ 'template'=>'ppsmbl','filename' => $user->latestCheckedPPNameOnly() ]) }}" alt=""> <br>
  <p>ID: {{ $user->username }}<br>
    Age: {{ $user->age() }}<br>
    Height:  @if($user->personalInfo)
    {{ $user->personalInfo->height }}
      @endif    <br> 
       Religion: {{ $user->religion }}<br>
        <p>Profession: @if ($user->personalInfo)
    {{ $user->personalInfo->profession() }}
    @endif <br>
    Country: {{ $user->country }}</p>
</div>
@endforeach
<div class="clear"></div>
</div>
</div>

<script type="text/javascript" src="{{asset('assets/slide_profile/jquery.min.js')}}"></script> 
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<script type="text/javascript" src="{{asset('assets/slide_profile/jscroll.js')}}"></script>
<link type="text/css" rel="stylesheet" href="{{asset('assets/slide_profile/jscroll-style.css')}}" />
<script type="text/javascript">

        $('.jScroll').css('height', 260).jScroll({

            'ScrollDirection': 'left',
            'PanelClass': 'jScroll-item',
            'ArrowOpacity': 1,
            'ArrowImage': '{{asset("img/arrows.png")}}',
            'ArrowBGCol': 'transparent',
            'ArrowWidth': 24,
            'ArrowHeight': 24,
            'ArrowLeft': -12,
            'ArrowRight': -12,
            'Moving': true,
            'ScrollEndless': true
        });

    </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>