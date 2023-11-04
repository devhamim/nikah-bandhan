 


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
   <footer class="footer" style="min-height: 100px; background-color: #000  !important;color:#CCCCC5;padding: 34px 0px!important;">
        <div class="container ">

            <div class="row">
                <div class="col-4 footer_logo_section footer_section_bottom">
                     


                    {{-- <a class="footer-link" href="{{ url('/') }}">Home</a> --}}
                    <br>
                    
  

                    {{-- <a class="footer-link" href="{{ url('/success/profiles') }}">Succes Stories</a> --}}

                    <br>

                   {{--  <a class="footer-link" href="{{ route('welcome.membershipPackages') }}">
                            Membership Packages
                        </a> --}}
                        <br>

                    
{{--  <a class="footer-link" href="">
                    Download our App
 </a>
        --}}
                    


                </div>
                
                <div class="col-4 footer_section_bottom" style="text-align: left; ">
                                    
                   
 {{-- 
                    <a class="footer-link" href="{{url('/page/about-us')}}">About Us</a><br>
                    <a class="footer-link" href="{{url('/page/contact-us')}}">Contact Us</a><br>
                    <a class="footer-link" href="{{url('/page/cookie-policy')}}">Cookie Policy</a><br>
                    <a class="footer-link" href="{{url('/page/how-to-use')}}">How to Use</a><br>
                    <a class="footer-link" href="{{url('/page/privacy-policy')}}">Privacy Policy</a><br>
                    <a class="footer-link" href="{{url('/page/terms-and-condition')}}">Terms & Conditions</a> --}}

                </div>
  
                    <div class="col-4 footer_section_bottom" style="text-align: center;">
                      
     
                </div>
            </div>

   
            
        </div>
    </footer>

     
 

    <footer class="" style="background: #E1E4E7;padding:0 !important;">
        <div class="container ">

            <div class="row">
                <div class="col-6">
                    <p class="text-muted mt-2 ">
                        <a href="tel:+8801800-000000">+8801800-000000</a>, Everyday 9:00 am to 6:00 pm
        </p> 
                </div>
                <div class="col-6">
                    
                    <p class="text-muted mt-2 text-left">Copyright &copy; {{ date('Y') }} {{ env('APP_NAME_BIG') }} All Rights Reserved 
        </p> 
                </div>
            </div>

        

 
        </div>
    </footer>