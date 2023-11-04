@if(Route::currentRouteName() != "welcome.welcome")


   <!-- Load Facebook SDK for JavaScript -->
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
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=install_email
  page_id="1425864754148350">
</div>

@endif


   <style>
       .footer-link { 
            text-decoration: none;
            color: #ddd;
            text-align: left !important;
        }
        .footer-link:hover {
            color:#fff;
        }
.footer_logo_section{
  text-align: left; 
  /*padding-left: 94px;*/
}

@media (min-width: 320px) and (max-width: 480px) {
  .footer_section_bottom{
  padding-bottom: 20px;
}
.footer_logo_section{
       text-align: left; padding-left: 15px;
    }
}


  @media (min-width: 768px) and (max-width: 1024px) {
    .footer_logo_section{
       text-align: left; padding-left: 10px;
    }
  }

   </style>
   {{-- <footer class="footer" style="min-height: 100px; background: #405765;color:#CCCCC5;"> --}}
   {{-- <footer class="footer" style="min-height: 100px; background: #2E2F96;color:#CCCCC5;"> --}}
   <footer class="footer" style="min-height: 100px; background-color: #0F1626  !important;color:#CCCCC5;padding: 34px 0px!important;">
        <div class="container ">

            <div class="row">
                <div class="col-4 footer_logo_section footer_section_bottom">
                    <!-- <a title="{{ env('APP_NAME_BIG') }}" class="footer-link" href="{{ url('/') }}"> -->
                        <!-- <img class="img-responsive" src="{{ asset($websiteParameter->logo ? 'storage/logo/'.$websiteParameter->logo : 'img/logo.jpg') }}" alt="{{ env('APP_NAME_BIG') }}" style="width: 80px;"> -->
                        <!-- <img src="{{asset('storage/logo/footer_logo.png')}}" style="width: 80px;"> -->
                    <!-- </a> -->
           


                    <a class="footer-link" href="{{ url('/') }}">Home</a>
                    <br>
                    <!--blog one  -->
                    <a class="footer-link" href="https://www.taslimamarriagemedia.com/diary/">
                            Blog-1
                        </a>
                        <br>
                        <!-- blog two (old blog) -->
                    <a class="footer-link" href="{{ route('welcome.blog') }}">
                            Blog-2
                        </a>
                        <br>

                    <a class="footer-link" href="{{ url('/success/profiles') }}">Succes Stories</a>

                    <br>

                    <a class="footer-link" href="{{ route('welcome.membershipPackages') }}">
                            Membership Packages
                        </a>
                        <br>

                    
 <a class="footer-link" href="{{ url('https://play.google.com/store/apps/details?id=com.taslima.tmm') }}">
                    Download our App
 </a>
                    <br>

                    <a href="{{ url('https://play.google.com/store/apps/details?id=com.taslima.tmm') }}" title="Download our android app"> 
                    <img class="img-responsive mt-2" style="border-radius: 5px;max-width: 100px;" src="{{asset('img/taslima-marriage-media-android-app.png')}}" alt="{{$websiteParameter->h1}} App" download>
                    </a>
                    


                </div>
                
                <div class="col-4 footer_section_bottom" style="text-align: left; ">
                                    
                   

                    <!-- <p class="w3-xlarge">Necessary Links</p> -->

<!--                     @foreach($menupages as $pg)
                    <a class="footer-link" href="{{ route('page', $pg->route_name) }}">{{ $pg->page_title }}</a> <br>
                    @endforeach -->
                    <a class="footer-link" href="{{url('/page/about-us')}}">About Us</a><br>
                    <a class="footer-link" href="{{url('/page/contact-us')}}">Contact Us</a><br>
                    <a class="footer-link" href="{{url('/page/cookie-policy')}}">Cookie Policy</a><br>
                    <a class="footer-link" href="{{url('/page/how-to-use')}}">How to Use</a><br>
                    <a class="footer-link" href="{{url('/page/privacy-policy')}}">Privacy Policy</a><br>
                    <a class="footer-link" href="{{url('/page/terms-and-condition')}}">Terms & Conditions</a>

                </div>
<!--                 <div class="col-sm-3 footer_section_bottom" style="text-align: center;">
                   <p class="w3-xlarge" style="padding-bottom: 10px;"> We are available for</p> 

                   <div class="row">
                       <div class="col-6">
                           <img class="img-responsive" style="width: 100%; height: auto;" src="{{ asset('img/master.jpg') }}" alt="bKash">
                       </div>
                       <div class="col-6">
                           <img class="img-responsive" style="width: 100%; height: auto;" src="{{ asset('img/visa.jpg') }}" alt="visa">
                       </div>
                   </div>
                   <div style="padding:5px;"></div>
                    <div class="row">
                       <div class="offset-3 col-6">
                           <img class="img-responsive" style="width: 100%; height: auto;" src="{{ asset('img/bkash.jpg') }}" alt="bKash">
                       </div>

                   </div>
                </div> -->
                    <div class="col-4 footer_section_bottom" style="text-align: center;">
                     <!-- <p class="w3-xlarge">Necessary Links</p> -->
                    <p class="w3-xlarge" style="font-size: 18px !important;">We are Member of</p> 
                    
                    <a target="_blank" href="{{ url('http://www.blfbd.org/') }}">
                        
                    <img  style="width: 17%;padding-top: 25px;" class="img-responsive mt-2" src="{{ asset('img/bangladesh-lions-foundation.png') }}" alt="bangladesh lions foundation">
                    </a>

                    <a target="_blank" href="{{ url('https://www.hrw.org/asia/bangladesh') }}">

                    <img style="width: 13%;padding-top: 25px;" class="img-responsive mt-2" src="{{ asset('img/human-rights-watch.jpg') }}" alt="human rights watch">
                </a>
     <div class="social_icons" >
         <p style="margin-top: 27px;">Follow us</p>
                  <ul>
                    <li><a class="facebook_icon" href="https://www.facebook.com/taslimamediabd"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a class="youtube_icon" href="https://www.youtube.com/channel/UC3EAOFJibBtXgmmcmN97VKg/videos"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    <li><a class="twitter_icon" href="https://twitter.com/intent/follow?source=followbutton&variant=1.0&screen_name=taslima_media"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a class="linked_icon" href="https://www.linkedin.com/company/taslima-marriage-media"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
                </div>
            </div>

  <div class="row">
    <div class="offset-sm-3 col-sm-6">
      <a href="{{url('/page/contact-us')}}">
        
        <img class=" col-6 img-responsive" style="width: 100%;" src="{{asset('img/cards.png')}}" alt="taslima marriage media payment method">
      </a>
    </div>
  </div>
            
        </div>
    </footer>

    <style type="text/css">
  .social_icons{
    /*margin-top: 27px;*/
  }
  footer ul li a {
    color: inherit;
    padding: 8px;
    font-weight: 500;
    font-size: 12px;
    text-transform: uppercase;
    border-radius: 3px;
    text-decoration: none;
    position: relative;
    display: block;
    border: 1px solid 
    azure;
    margin-top: 6px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 6px;
    padding-bottom: 6px;
    display: flex;
}
footer ul li .facebook_icon:hover{
    color:#fff;
    background-color: #4267b2;
}
footer ul li .youtube_icon:hover{
    color:#fff;
    background-color: #ff0000;
}
footer ul li .twitter_icon:hover{
    color:#fff;
    background-color: #1da1f2;0073b0
}
footer ul li .linked_icon:hover{
    color:#fff;
    background-color: #0073b0;
}
</style>



<!--     <footer class="" style="background: #fff; padding: 1.938rem 0!important;">
        <div class="container text-center">

            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">

                    <img class="img-responsive mt-1" src="{{ asset('img/rapid_ssl.gif') }}" alt="{{ env('APP_NAME_BIG') }}">
                            
                        </div>
                        <div class="col-sm-3">
                            <img class="img-responsive d-none d-sm-block" style="margin-top:-10px;" src="{{ asset('img/we_accept.jpg') }}" alt="{{ env('APP_NAME_BIG') }}">

                            @if(Agent::isMobile())


                            <img class="w-100 mt-2" style="margin-top:-10px;" src="{{ asset('img/we_accept.jpg') }}" alt="{{ env('APP_NAME_BIG') }}">
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <p class="w3-xlarge pt-2 mt-3">১০০% গ্যারান্টি সহকারে ম্যাচ মেকিং করা হয়।</p>
                </div>


            </div>

        </div>
    </footer> -->

    <footer class="" style="background: #E1E4E7;padding:0 !important;">
        <div class="container text-center">
            
        <p class="text-muted mt-2">Copyright &copy; 2017 - {{ date('Y') }} {{ env('APP_NAME_BIG') }} All Rights Reserved </p>

        
        </div>
    </footer>