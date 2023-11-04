{{-- <style type="text/css">


    .pricelist_style{
        background-color: #fff !important;
        padding-top: 20px!important;
        /*border: none !important;*/
    }
.nav-link{
    color: #d52379 !important;
}
    
    .w3-padding-large {
    padding: 12px 10px !important;
}
.w3-xxlarge {
    font-size: 30px !important;
}
.w3-xlarge {
    font-size: 19px !important;
}
.contact_button {
    background-color: #d52379 !important;
    border: 1px solid #d52379 !important;
    border-radius: 5px !important;
    width: 36% !important;
    padding-left: 11px!important;
    padding: 8px!important;
}

.price_package_border {
    border-radius: 10px !important;
    border: 0px !important;

    transition: box-shadow .3s !important;
    box-shadow: 0 0 16px rgb(200, 200, 200) !important;
}

.recommended_button {
    margin-top: -11px !important;
    border: 1px solid #d52379;
    background-color:#d52379 !important;
    color:#fff !important;
    border-radius: 5px;
    font-size: 9px !important;
    width: 30% !important;
    padding: 0px !important;
    font-weight: bold !important;
    margin-right: 35% !important;



}

.navbar-toggler:not(:disabled):not(.disabled) {
    cursor: pointer;
    border: 1px solid #D52379 !important;
    padding: 9px;
    
}
.navbar-toggler-icon{
    background-color: #D52379 !important;
}
.w3-border {
    border: 1px solid #D52379 !important;
    border-top-color: rgb(204, 204, 204);
    border-right-color: rgb(204, 204, 204);
    border-bottom-color: rgb(204, 204, 204);
    border-left-color: rgb(204, 204, 204);
}
.w3-text-white, .w3-hover-text-white:hover {
    color: #D52379 !important;
}

.navbar.bg-danger {
    background-color: #fff !important;
    /*background-color: #2E2F96 !important;*/
     box-shadow: 0 4px 18px 0px rgba(0, 0, 0, 0.12), 0 7px 10px -5px rgba(0, 0, 0, 0.15)!important;
}




</style> --}}


<nav class="navbar  fixed-top  navbar-expand-lg bg-bg" color-on-scroll="100" id="sectionsNav">

    <div class="container" id="no-ads">
        <div class="navbar-translate">
            <a title="" rel="tooltip" data-placement="bottom" class="navbar-brand"
                data-original-title="{{ env('APP_NAME_BIG') }}" href="{{ url('/') }}">
                <img class="img-responsive img-thumbnail"
                    src="{{ asset($websiteParameter->logo ? 'storage/logo/' . $websiteParameter->logo : 'img/logo.jpg') }}"
                    alt="{{ env('APP_NAME_BIG') }}" style="width: 213px;border-radius: 4px;margin-top: -19px;">
            </a>

            @if (Agent::isMobile())





                <a href="{{ route('login') }}"
                    class="w3-text-white w3-btn w3-border w3-border-white w3-round btn-sm ">Login</a>
                <a href="{{ route('signup') }}"
                    class="w3-text-white w3-btn w3-border w3-border-white w3-round btn-sm ">Register</a>
            @endif

            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="tel:+{{ bdMobile(env('CONTACT_MOBILE1')) }}">
                        <span class="w3-small">
                            <i class="fa fa-phone"></i> +{{ bdMobile(env('CONTACT_MOBILE1')) }}</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                        <a class="nav-link" href="https://www.taslimamarriagemedia.com/diary/" >
                             <img src="{{ route('servicess') }}" alt="{{ env('APP_NAME_BIG') }}" width="27"> Sevices
                        </a>
                    </li> --}}

                <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('page', 'contact_us') }}" >
                            <i class="material-icons">contact_phone</i> Contact Us
                        </a>
                    </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome.membershipPackages') }}">
                        <i class="material-icons">contact_phone</i> Packages
                    </a>
                </li>

                @include('welcome.includes.others.pageLinkList')

                @if (Browser::isDesktop())

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome.successProfiles') }}">
                            <i class="material-icons">contact_phone</i> Stories
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome.blog') }}">
                            <i class="material-icons">contact_phone</i> Blogs
                        </a>
                    </li>
                @endif


                {{-- @include('welcome.includes.others.userSearchLinkList') --}}

                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myLoginModal">
                        <span class="w3-border w3-padding w3-round">

                            <i class="material-icons">apps</i> LOGIN
                        </span>
                    </a>


                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signup') }}">
                        <span class="w3-border w3-padding w3-round">
                            <i class="material-icons">featured_play_list</i> Register
                        </span>
                    </a>


                </li>



                {{-- <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="javascript::void(0)" target="_blank" data-original-title="Follow us on Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li> --}}
                {{-- <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="{{ url('https://www.facebook.com/taslimamediabd') }}" target="_blank" data-original-title="Like us on Facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li> --}}

                {{-- @include('welcome.includes.others.socialLinkList') --}}

                {{-- <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="javascript::void(0)" target="_blank" data-original-title="Follow us on Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li> --}}
            </ul>
        </div>
    </div>
</nav>
