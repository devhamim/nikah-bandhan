@extends('master.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div
                class="
                    heading
                    heading-border
                    heading-middle-border
                    heading-middle-border-center
                    heading-border-xl
                "
            >
                <h2 class="font-weight-normal">
                  Get Your Package Here
                </h2>
            </div>
        </div>
    </div>

    <div
        class="
            featured-boxes
            featured-boxes-style-3
            featured-boxes-flat
        "
    >
        <div class="row">
            @foreach($packages as $package)
            <div class="col-lg-4 col-sm-6">
                <div
                    class="
                        featured-box
                        featured-box-primary
                        featured-box-effect-3
                    "
                >
                    <div
                        class="
                            box-content box-content-border-0
                            w3-card w3-hover-shadow
                        "
                        style="cursor: pointer"
                    >
                        <i
                            class="icon-featured icon-briefcase icons"
                        ></i>
                        <h4
                            class="
                                font-weight-normal
                                text-5
                                mt-3
                            "
                        >
                            <strong
                                class="font-weight-extra-bold"
                                >{{$package->package_title}}</strong
                            >
                        </h4>
                        <p class="mb-2 mt-2 text-2">
                            <small>{{ $package->package_currency }}</small>{{ round($package->package_amount) }}
                         </p>
                        <p class="mb-2 mt-2 text-2">
                           Duration: <small>{{$package->package_duration}}Days</small>
                        </p>
                        <p class="mb-2 mt-2 text-2">
                            Permissions: <small>Contact Details, Private Chating</small>
                         </p>

                         <p class="mb-2 mt-2 text-2">
                            {{ $package->proposal_send_daily_limit }}/Proposals <small>Day</small>
                         </p>
                         <p class="mb-2 mt-2 text-2">
                            {{ $package->contact_view_limit }}/Proposals <small>Day</small>
                         </p>
                         <p class="mb-2 mt-2 text-2">
                            24/7 support
                         </p>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>

    <hr class="pattern tall" />
</div>

<section
    class="
        parallax
        section section-parallax section-center
        overlay overlay-color-primary overlay-show overlay-op-4
    "
    data-plugin-parallax
    data-plugin-options="{'speed': 2}"
    data-image-src="{{ asset('img/1.jpg') }}"
    style="min-height: 450px"
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h4 class="mb-0 text-light">
                    GREAT PEOPLE TRUSTED OUR SERVICES
                </h4>
                <br />

                <p class="mb-0 text-light">
                    Lorem ipsum dolor sit amet, consectetuer
                    adipiscing elit. Aenean commodo ligula eget
                    dolor. Aenean massa. <br />Nulla consequat
                    massa quis enim.Donec pede justo, fringilla
                    vel, aliquet nec, vulputate eget, arcu.In
                    enim justo, rhoncus ut, imperdiet a,
                    venenatis vitae, justo. Nullam dictum felis
                    eu pede mollis pretium.Integer tincidunt.
                    Cras dapibus. Vivamus elementum semper
                    nisi.Aenean vulputate eleifend tellus.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="row mt-n5">
    <div class="col">
        <div
            class="
                heading
                heading-border
                heading-middle-border
                heading-middle-border-center
                heading-border-xl
            "
        >
            <h2 class="font-weight-normal">
                What Our
                <strong class="font-weight-extra-bold"
                    >Clients</strong
                >
                Say
            </h2>
        </div>
    </div>
</div>

<section
    class="
        parallax
        section
        section-text-light
        section-parallax
        section-center
        mt-0
    "
    data-plugin-parallax
    data-plugin-options="{'speed': 1.5}"
    data-image-src="https://www.okler.net/previews/porto/8.0.0/img/parallax/parallax-2.jpg"
>
    <div class="container">
        <div class="row counters counters-text-light">
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                <div class="counter">
                    <i class="fas fa-user"></i>
                    <strong data-to="30000" data-append="+"
                        >0</strong
                    >
                    <label>Happy Clients</label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                <div class="counter">
                    <i class="fas fa-star"></i>
                    <strong data-to="15">0</strong>
                    <label>Years in Business</label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4 mb-sm-0">
                <div class="counter">
                    <i class="fas fa-coffee"></i>
                    <strong data-to="352">0</strong>
                    <label>Cups of Coffee</label>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="counter">
                    <i class="far fa-chart-bar"></i>
                    <strong data-to="178">0</strong>
                    <label>High Score</label>
                </div>
            </div>
        </div>
    </div>
</section>

<section
    style="min-height: 250px"
    class="w3-light-gray text-center"
>
    <h2
        class="text-lg-10 text-sm-5 text-md-10 pt-5"
        style="text-shadow: 1px 1px 2px #000"
    >
        Sale<strong> 30% OFF</strong>
    </h2>

    @guest
    <div class="p-4">
        <a
            class="
                w3-btn
                btn btn-lg
                w3-blue
                w3-round-xxlarge
                w3-border
                w3-border-white
                w3-hover-shadow
            "
            href=""
            >Register</a
        >
        <a
            class="
                w3-btn
                btn btn-lg
                w3-blue
                w3-round-xxlarge
                w3-border
                w3-border-white
                w3-hover-shadow
            "
            href=""
            data-toggle="modal"
            data-target="#smallModal"
            >Login</a
        >
    </div>

    @else 
    <div class="p-4">
        <a
            class="
                w3-btn
                btn btn-lg
                w3-red
                w3-round-xxlarge
                w3-border
                w3-border-white
                w3-hover-shadow
            "
            href="{{route('user.packeges')}}"
            >Get your package</a
        >

    </div>
   @endguest
</section>

<section style="min-height: 250px">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div
                    class="
                        heading
                        heading-border
                        heading-middle-border
                        heading-middle-border-center
                        heading-border-xl
                    "
                >
                    <h2 class="font-weight-normal">
                        <strong class="font-weight-extra-bold"
                            >VIP Marriage Media</strong
                        >
                        with Millions of
                        <strong class="font-weight-extra-bold">
                            Success Stories
                        </strong>
                    </h2>
                </div>
            </div>
        </div>

        <div
            class="owl-carousel owl-theme"
            data-plugin-options="{'items': 4, 'autoplay': true, 'autoplayTimeout': 3000}"
        >
            <div>
                <div class="card">
                    <img
                        class="card-img-top"
                        src="{{ asset('img/2.png') }}"
                        alt="Card Image"
                    />
                    <div class="card-body">
                        <h4
                            class="
                                card-title
                                mb-1
                                text-4
                                font-weight-bold
                            "
                        >
                            Card Title
                        </h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                            Curabitur rhoncus nulla dui, in
                            dapi.
                        </p>
                        <a
                            href="/"
                            class="
                                read-more
                                text-color-primary
                                font-weight-semibold
                                text-2
                            "
                            >Read More
                            <i
                                class="
                                    fas
                                    fa-angle-right
                                    position-relative
                                    top-1
                                    ml-1
                                "
                            ></i
                        ></a>
                    </div>
                </div>
            </div>

            <div>
                <div class="card">
                    <img
                        class="card-img-top"
                        src="{{ asset('img/7.jpg') }}"
                        alt="Card Image"
                    />
                    <div class="card-body">
                        <h4
                            class="
                                card-title
                                mb-1
                                text-4
                                font-weight-bold
                            "
                        >
                            Card Title
                        </h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                            Curabitur rhoncus nulla dui, in
                            dapi.
                        </p>
                        <a
                            href="/"
                            class="
                                read-more
                                text-color-primary
                                font-weight-semibold
                                text-2
                            "
                            >Read More
                            <i
                                class="
                                    fas
                                    fa-angle-right
                                    position-relative
                                    top-1
                                    ml-1
                                "
                            ></i
                        ></a>
                    </div>
                </div>
            </div>

            <div>
                <div class="card">
                    <img
                        class="card-img-top"
                        src="{{ asset('img/5.jpg') }}"
                        alt="Card Image"
                    />
                    <div class="card-body">
                        <h4
                            class="
                                card-title
                                mb-1
                                text-4
                                font-weight-bold
                            "
                        >
                            Card Title
                        </h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                            Curabitur rhoncus nulla dui, in
                            dapi.
                        </p>
                        <a
                            href="/"
                            class="
                                read-more
                                text-color-primary
                                font-weight-semibold
                                text-2
                            "
                            >Read More
                            <i
                                class="
                                    fas
                                    fa-angle-right
                                    position-relative
                                    top-1
                                    ml-1
                                "
                            ></i
                        ></a>
                    </div>
                </div>
            </div>

            <div>
                <div class="card">
                    <img
                        class="card-img-top"
                        src="{{ asset('img/7.jpg') }}"
                        alt="Card Image"
                    />
                    <div class="card-body">
                        <h4
                            class="
                                card-title
                                mb-1
                                text-4
                                font-weight-bold
                            "
                        >
                            Card Title
                        </h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                            Curabitur rhoncus nulla dui, in
                            dapi.
                        </p>
                        <a
                            href="/"
                            class="
                                read-more
                                text-color-primary
                                font-weight-semibold
                                text-2
                            "
                            >Read More
                            <i
                                class="
                                    fas
                                    fa-angle-right
                                    position-relative
                                    top-1
                                    ml-1
                                "
                            ></i
                        ></a>
                    </div>
                </div>
            </div>

            <div>
                <div class="card">
                    <img
                        class="card-img-top"
                        src="{{ asset('img/7.jpg') }}"
                        alt="Card Image"
                    />
                    <div class="card-body">
                        <h4
                            class="
                                card-title
                                mb-1
                                text-4
                                font-weight-bold
                            "
                        >
                            Card Title
                        </h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                            Curabitur rhoncus nulla dui, in
                            dapi.
                        </p>
                        <a
                            href="/"
                            class="
                                read-more
                                text-color-primary
                                font-weight-semibold
                                text-2
                            "
                            >Read More
                            <i
                                class="
                                    fas
                                    fa-angle-right
                                    position-relative
                                    top-1
                                    ml-1
                                "
                            ></i
                        ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section
    style="min-height: 400px"
    class="w3-light-gray text-center"
>
    <h2
        class="text-lg-10 text-sm-5 text-md-10 pt-5"
        style="text-shadow: 1px 1px 2px #000"
    >
        <strong>Download </strong> Our App
    </h2>

    <div class="row">
        <div class="col-md-6">
            <img
                class="img-fluid rounded"
                src="{{ asset('img/intro-mobile.png') }}"
            />
        </div>

        <div class="col-md-6">
            <br />
            <img
                class="img-fluid rounded"
                src="{{
                    asset('img/Home-Couple-Optimized.png')
                }}"
            />

            <br />
            <img
                class="img-fluid rounded"
                src="{{
                    asset(
                        'img/Matrimony-App-Shaadi.com-Playstore.svg'
                    )
                }}"
            />
        </div>
    </div>
</section>
@endsection