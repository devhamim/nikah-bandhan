@php
/*
-------------------------------------
Footer
Footer of the website
-------------------------------------
*/
@endphp

<div class="footer-wrapper">
    <div class="footer">
        <div class="row footer-content">

            {{-- Footer branding Logo --}}
            <div class="col-md-4 p-3 perfect-center">
                <div>
                    <img class="footer-branding-logo" src="{{asset('images/logo.svg')}}" alt="LOGO">
                </div>
            </div>

            {{-- info links --}}
            <div class="col-md-4 p-3">
                <h5>
                    <span class="inine-perfect-center">
                        <i class="bi bi-info-square"></i>&nbsp;Meta
                    </span>
                </h5>
                <ul class="p-0 m-0 list-unstyled" style="font-size: .8em;">
                    <li><a href="{{ route('about-us') }}">About Us</a> </li>
                    <li> <a href="{{ route('guideline') }}">Guideline</a></li>
                    <li> <a href="{{ route('contact-us') }}">Contact Us</a></li>
                    <li> <a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-conditions') }}">Terms & Conditions </a></li>
                </ul>
            </div>

            {{-- Footer contact-widget --}}
            <div class="col-md-4 p-3">

                <h5>
                    <span class="inine-perfect-center">
                        <i class="fa fa-users" aria-hidden="true"></i> Social
                        Media
                    </span>
                </h5>
                <div style="font-size:.9em;">
                    <ul class="p-0 m-0 list-unstyled">
                        <li>
                            <a href="" style="color:royalblue;"><i class="bi bi-facebook"></i>
                                Facebook
                            </a>
                        </li>
                        <li>
                            <a href="" style="color:red;"><i class="bi bi-youtube"></i> Youtube</a>
                        </li>
                        <li>
                            <a href="" style="color:#1c9cea;"><i class="fab bi bi-twitter"></i>
                                Twitter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- attribution footer --}}
        <div class="attribution perfect-center">
            <div class="attribution-text text-center">
                <span class="d-inline-block">Copyright 2021 &copy;</span>
                <span class="d-inline-block">All Rights Reserved</span>
                <span class="d-inline-block"> by QueAns Inc.</span>
            </div>
        </div>
    </div>
</div>
