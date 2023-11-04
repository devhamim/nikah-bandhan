<li class="dropdown nav-item">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <i class="material-icons">contact_phone</i> Social
    </a>
    <div class="dropdown-menu dropdown-with-icons">
        
        @if ($websiteParameter->fb_url)
            <a class="dropdown-item" href="{{ url($websiteParameter->fb_url) }}" target="_blank">
                            <i class="fa fa-facebook-square"></i> &nbsp; Facebook
                        </a>
        @endif

        @if($websiteParameter->linkedin_url)
        <a class="dropdown-item"   href="{{ url($websiteParameter->linkedin_url) }}" target="_blank">
            <i class="fa fa-linkedin-square"></i> &nbsp;
            Linked In
        </a>
        @endif

        @if($websiteParameter->twitter_url)
        <a class="dropdown-item"   href="{{ url($websiteParameter->twitter_url) }}" target="_blank">
            <i class="fa fa-twitter-square"></i> &nbsp;
            Twitter
        </a>
        @endif

        @if($websiteParameter->pinterest_url)
        <a class="dropdown-item"   href="{{ url($websiteParameter->pinterest_url) }}" target="_blank">
            <i class="fa fa-pinterest-square"></i> &nbsp;
            Pinterest
        </a>
        @endif

        @if($websiteParameter->youtube_url)
        <a class="dropdown-item"   href="{{ url($websiteParameter->youtube_url) }}" target="_blank">
            <i class="fa fa-youtube-square"></i> &nbsp;
            Youtube
        </a>
        @endif

        @if($websiteParameter->google_plus_url)
        <a class="dropdown-item"   href="{{ url($websiteParameter->google_plus_url) }}" target="_blank">
            <i class="fa fa-google-plus-square"></i> &nbsp; 
            Google Plus
        </a>
        @endif
 
            {{-- <a href="" class="dropdown-item">
               <i class="material-icons">layers</i> {{ $fp->page_title }}
            </a> --}}
 


    </div>
</li>