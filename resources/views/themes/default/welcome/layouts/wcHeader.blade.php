<nav class="navbar navbar-color-on-scroll fixed-top navbar-expand-lg bg-primary navbar-transparent" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/ml.png') }}" class="img-thumbnail" width="60" style="margin-top: -21px;" alt="{{ env('APP_NAME') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                     

                    <li class="nav-item">
                        <a class="nav-link" href="tel:+{{ bdMobile(env('CONTACT_MOBILE1')) }}" >
                            <span class="w3-large">
                             <i class="material-icons">local_phone</i> 
                         +{{ bdMobile(env('CONTACT_MOBILE1')) }}</span>
                        </a>
                    </li>
                    
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">apps</i> Contact
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="{{url('/page/about-us')}}" class="dropdown-item">
                                <i class="material-icons">layers</i> About Us
                            </a>
                            <a href="{{url('/page/contact-us')}}" class="dropdown-item">
                                <i class="material-icons">layers</i> Contact Us
                            </a>

                            <a href="{{ url('/page/terms-and-condition') }}" class="dropdown-item">
                                <i class="material-icons">layers</i> Terms and Condition
                            </a>


                            <a href="{{ url('blog/index') }}" class="dropdown-item">
                                <i class="material-icons">layers</i> Blog
                            </a>

                            
                        </div>
                    </li>
                    


                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#myLoginModal" >
                            <span class="w3-border w3-padding w3-round">
                                
                            <i class="material-icons">apps</i> LOGIN
                            </span>
                        </a>

                        
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('signup')}}" >
                            <span class="w3-border w3-padding w3-round">
                            <i class="material-icons">featured_play_list</i> Register
                        </span>
                        </a>

                        
                    </li>
                    {{-- 
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
