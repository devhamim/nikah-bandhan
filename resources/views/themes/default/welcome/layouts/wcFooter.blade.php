{{-- <style>
       .footer-link { 
            text-decoration: none;
            color: #ccc !important;
            text-align: left !important;
            line-height: 1.8;
        }
        .footer-link:visited {
            color:#ccc !important;
        }
        .footer-link:hover {
            color:#ccc !important;
        }

        .footer-link:active {
            color:#ccc !important;
        }

  .footer_logo_section{
    text-align: left !important; 
    
  }

  @media (min-width: 320px) and (max-width: 480px) {
    .footer_section_bottom{
    padding-bottom: 20px;
  }
  .footer_logo_section{
        text-align: left !important; padding-left: 15px;
      }
  }


  @media (min-width: 768px) and (max-width: 1024px) {
    .footer_logo_section{
       text-align: left !important; padding-left: 10px;
    }
  }

</style>
<footer class="footer py-4" style="min-height: 100px; background: #405765;color:#ccc;">
        <div class="container ">

            <div class="row">
                <div class="col-sm-3 footer_logo_section footer_section_bottom">
                     


                    <a class="footer-link w3-large" href="{{ url('/') }}">Explore</a> <br>

                    <a class="footer-link" href="{{ url('/') }}">Home</a>
                    <br>
                    
  

                    <a class="footer-link" href="{{ url('/success/profiles') }}">Succes Stories</a>

                    <br>
  

                    <a class="footer-link" href="{{ url('blog/index') }}">Matching Life Blog</a>

                    <br>
                    


                </div>
                
                <div class="col-sm-3 footer_section_bottom" style="text-align: left; ">

                  <a class="footer-link w3-large" href="{{ url('/') }}">Help</a> <br>

                  <a class="footer-link" href="{{url('/page/contact-us')}}">Contact Us</a><br>

                  <a class="footer-link" href="tel:+88{{ env('CONTACT_MOBILE1') }}">Call: {{ env('CONTACT_MOBILE1') }}</a><br>


                </div>

                <div class="col-sm-3 footer_section_bottom" style="text-align: left; ">


                    <a class="footer-link w3-large" href="{{ url('/') }}">Services</a> <br>

                                    
                   
 
                    <a class="footer-link" href="{{ route('welcome.membershipPackages') }}">
                            Membership Options
                        </a>
                        <br>

                  <a class="footer-link" href="">
                            Career Oportunities
                        </a>

                </div>
  
                    <div class="col-sm-3 footer_section_bottom" style="text-align: left;">

                        <a class="footer-link w3-large" href="{{ url('/') }}">Legal</a> <br>

                      
                      <a class="footer-link" href="{{url('/page/about-us')}}">About Us</a><br>
                    <a class="footer-link" href="{{url('/page/contact-us')}}">Contact Us</a><br>
                    <a class="footer-link" href="{{url('/page/cookie-policy')}}">Cookie Policy</a><br>
                    <a class="footer-link" href="{{url('/page/how-to-use')}}">How to Use</a><br>
                    <a class="footer-link" href="{{url('/page/privacy-policy')}}">Privacy Policy</a><br>
                    <a class="footer-link" href="{{url('/page/terms-and-condition')}}">Terms & Conditions</a>
     
                </div>
            </div>

   
            
        </div>
</footer>

<footer class="w3-white p-0" style="min-height: 100px;">
        <div class="container py-4">

          <div class="row">
            
            <div class="col-6">

              <a href="" class="w3-large w3-text-gray">Follow Us On: </a>      <br>

              <a href=""><i class="fa fa-facebook-square fa-2x w3-text-teal"></i></a>    

              <a href=""><i class="fa fa-instagram fa-2x w3-text-red"></i></a>   

              <a href=""><i class="fa fa-youtube-play fa-2x w3-text-red"></i></a>    

            </div>
            <div class="col-6">


              <a href="{{ url('/') }}">
                <img class="img-responsive" src="{{ asset($websiteParameter->logo ? 'storage/logo/'.$websiteParameter->logo : 'img/logo.jpg') }}" alt="{{ env('APP_NAME_BIG') }}" style="width: 60px;">
                         
              </a>
              

            </div>
          </div>

        </div>
      </footer>

     
 

    <footer class="" style="background: #E1E4E7;padding:0 !important;">
        <div class="container ">

            <div class="row">
                <div class="col-6">
                    <p class="text-muted mt-2 ">
                        <a href="tel:+88{{ env('CONTACT_MOBILE1') }}">Call: {{ env('CONTACT_MOBILE1') }}</a>, Everyday 9:00 am to 6:00 pm
        </p> 
                </div>
                <div class="col-6">
                    
                    <p class="text-muted mt-2 text-left">Copyright &copy; {{ date('Y') }} {{ env('APP_NAME_BIG') }} All Rights Reserved 
        </p> 
                </div>
            </div>

        

 
        </div>
</footer> --}}

<!--footer top-->
<section id="footer-top" class="" style="background-color: #252525">
    <div class="container">
        <div class="row f-top-bottom-section-- pl-2 pl-sm-0">
            <div class="col-md-3 col-sm-6 pt-3 ">
                <div class="row">
                    <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title w3-large w3-hover-red w3-hover-text-white">
                        CONTACT</h6>
                    <div class="col-md-12 px-3 px-sm-0  pt-3">
                        <ul class="navbar-nav">
                            <li>
                                <span class="address-icon"><i class="fas fa-map-marker-alt"
                                        style="color: red"></i></span>
                                <span class="address-text">
                                    24/1 Chamelibag,<br />
                                    Shan Tower(4th Floor)<br />
                                    Shantinagar mor<br />
                                    Dhaka-1217.

                                </span>
                            </li>
                            <li class="py-3">
                                <a href="tel:+88{{ env('CONTACT_MOBILE1') }}">
                                    <span class="address-icon"><i class="fas fa-phone-volume"
                                            style="color: red"></i></span>
                                    <span class="address-text">Telephone : (+88)
                                        {{ env('CONTACT_MOBILE1') }}</span></a>
                            </li>
                            <li>
                                <span class="address-icon"><i class="fas fa-globe-americas"
                                        style="color: red"></i></span>
                                <span class="address-text">Email:info@BRIDEGROOMBD.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-sm-6 pl-md-5 pt-3 ">
                <div class="row">
                    <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title w3-large w3-hover-red w3-hover-text-white">
                        COMPANY</h6>
                    <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                        <ul class="pl-3 footer-menu">
                            <li class=""><a href="{{ url('/') }}"><span>Home</span></a></li>
                            {{-- <li class=""><a href="{{ route('about-us') }}">About Us</a>
                          </li> --}}
                            {{-- <li class=""><a href="{{ url('/page/about-us') }}">About Us</a>
                            </li> --}}

                            <li class=""><a href="{{ route('aboutUs') }}">About Us</a>
                            </li>
                            <li class=""><a href="{{ route('welcome.membershipPackages') }}">Membership
                                    plan</a></li>
                            {{-- <li><a href="http://blog.bridegroombd.com">Our Blog</a></li> --}}
                            {{-- <li><a href=" {{ route('request') }}">Call back</a></li> --}}
                            {{-- <li class=""><a href="{{ route('wedding-service') }}">Services</a></li>
                          <li class=""><a href="{{url('/page/contact-us')}}">Contact</a></li> --}}
                            <li class=""><a href="{{ route('contact-us') }}">Contact</a></li>
                            <li class=""><a href="{{ route('welcome.blog') }}">Blogs</a></li>

                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-sm-6 pl-md-5 pt-3 ">
                <div class="row">
                    <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title w3-large w3-hover-red w3-hover-text-white">TERMS
                        OF USE</h6>
                    <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                        <ul class="pl-3 footer-menu">
                            <li class=""><a href="{{ route('termsconditions') }}">Terms &
                                    Conditions</a></li>

                            {{-- <li class=""><a href="{{ route('termsconditions') }}">Terms &
                                        Conditions</a></li> --}}
                            <li class=""><a href="{{ route('privacy') }}">Privacy Policy</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class=" col-md-3 col-sm-6 pl-md-5 pt-3 ">
                <div class="row footer-text">
                    <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title w3-large w3-hover-red w3-hover-text-white">
                        INFORMATION</h6>
                    <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                        <ul class="pl-3 footer-menu">
                            <li class=""><a href="{{ url('/page/cookie-policy') }}">Cookie Policy</a>
                            </li>
                            <li class=""><a href="{{ url('/page/how-to-use') }}">How to Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class=" col-md-12 pt-1 ">
                <div class="row footer-text text-center">

                    <div class="col-md-12 text-light px-1 px-sm-0 pt-1  ">
                        @if ($websiteParameter->fb_url)
                        <a href="{{ url($websiteParameter->fb_url) }} class="fa fa-facebook btn btn-danger btn-lg"></a>
                        @endif
                        @if($websiteParameter->twitter_url)
                        <a href="{{ url($websiteParameter->twitter_url) }}" class="fa fa-twitter btn btn-danger btn-lg"></a>
                        @endif
                        @if($websiteParameter->linkedin_url)
                        <a href="{{ url($websiteParameter->linkedin_url) }}" class="fa fa-linkedin btn btn-danger btn-lg "></a>
                        @endif
                        @if($websiteParameter->youtube_url)
                        <a  href="{{ url($websiteParameter->youtube_url) }}" class="fa fa-youtube btn btn-danger btn-lg"></a>
                        @endif
                        @if($websiteParameter->pinterest_url)
                        <a href="{{ url($websiteParameter->pinterest_url) }}" class="fa fa-pinterest btn btn-danger btn-lg"></a>
                        @endif
                    </div>
                </div>
            </div>
            {{-- google map --}}
            {{-- <div class="col-md-3 col-sm-6 pl-md-5 pt-3">
              <div class="row">
                  <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">LOCATION</h6>
                  <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                      <ul class="pl-0 footer-menu">
                          <li style="list-style: none">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913.0386866455027!2d90.4116626291742!3d23.74186052664262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9b5c7ac29bf%3A0x215192208b217ef2!2sBride%20Groom%20BD!5e0!3m2!1sen!2sbd!4v1599480163332!5m2!1sen!2sbd" width="250" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                          </li>
                      </ul>
                  </div>
              </div>
          </div> --}}
            {{-- google map end --}}
            <!--end address-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end footer top-->

<!-- Scroll to Top Button-->
<a class="scroll-to-top " href="#page-top">
    <i class="fas fa-angle-up" style="color: red"></i>
</a>

<!--footer bottom-->

{{-- <div class="" id="footer_bottom" style="background-color: black">
    <div class="container" >
        <div class="row py-2">
            <div class="col-md-8 text-light footer-text pl-0">
                <span>CopyRights © {{ date('Y') }} BrideGroom. All Rights Reserved</span>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('asset/images/home/payment.jpg') }}" alt="">

            </div>
        </div>
    </div>
</div> --}}
<footer class="" id="footer_bottom" style="background-color: #363636">
    <div class="container">
        <div class="row py-1">
            <div class="col-md-8 text-light footer-text pl-0">
                <span>CopyRights © {{ date('Y') }} BrideGroom. All Rights Reserved</span>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('asset/images/home/payment.jpg') }}" alt="payment">

            </div>
        </div>
    </div>
</footer>
