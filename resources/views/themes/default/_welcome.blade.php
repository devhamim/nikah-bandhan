@extends('master.master')

@push('css')
    <style>
        ul.list li {
            font-size: 12px !important;
            font-weight: 400 !important;
            line-height: 24px !important;
            white-space: nowrap !important;
        }

        .list.list-icons li {
            position: relative !important;
            padding-left: 15px !important;
            color: black;
        }

        .list li {
            margin-bottom: 0px !important;

        }

        .li-uniq-pri {
            color: #0274CB !important;
        }

        .viptextcolor {
            color: #A2248E !important;
        }

        html .featured-box-effect-3.featured-box-secondary:hover .icon-featured {
            background: #FFF !important;
        }

        .featured-box-effect-3:hover .icon-featured {
            color: var(--branding-color) !important;
        }
    </style>

    <style>
        .cta-box-wrapper {
            margin: 0 25px;


        }

        .cta-box {

            border: none;
            box-shadow: none;
        }

        .cta-box .box-content {
            cursor: pointer;
            background-color: var(--branding-color) !important;
            border-radius: 45px;
            display: inline-block;
            min-width: 250px;
        }

        .iti__country {
            padding: 5px 10px;
            outline: none;
            /* background: var(--blue); */
            color: var(--branding-color);
            z-index: 101000;
        }
    </style>
@endpush
@section('content')
    @include('alerts.alerts')
    <section style="">
        <div class="container">
            {{-- <div class="row" style="">
        <div class="col">
            <div class="
                    heading
                    heading-border
                    heading-middle-border
                    heading-middle-border-center
                    heading-border-xl
                ">
                <h2 class="font-weight-normal color-vipmm w3-cursive">
                    <span class="w3-text-gray">  Find Your </span>
                    <strong class="font-weight-extra-bold viptextcolor">Special</strong>
                    <span class="w3-text-gray">Soulmate </span>
                </h2>
            </div>
        </div>
    </div> --}}
            <h1 class="text-center h1 mb-4">Find Your Special Soulmate</h1>
            <div
                class="mb-5
            featured-boxes
            featured-boxes-style-3
            featured-boxes-flat
            d-flex justify-content-between
        ">
                <div class="d-flex flex-column flex-md-row">
                    <a href="{{ url('register') }}" class="text-decoration-none">
                        <div class="cta-box-wrapper" style="">
                            <div class="
                        featured-box
                        featured-box-secondary
                        featured-box-effect-3
                        cta-box
                    "data-toggle="modal-"
                                data-target="#registion-">
                                <div
                                    class="
                            box-content box-content-border-0
                            w3-card w3-hover-shadow
                        ">
                                    <i class="icon-featured far fa-edit"></i>
                                    <h4
                                        class="
                                font-weight-normal
                                text-5
                                mt-3
                            ">
                                        <strong class="font-weight-extra-bold text-white">Register Free</strong>
                                    </h4>
                                </div>
                            </div>
                            <div>
                                <p class="mb-2 mt-2 text-2">
                                    Most trusted plateform in our country, Sign up to find the best partner for your life.
                                </p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ url('page/contact-us') }}" class="text-decoration-none">

                    <div class="cta-box-wrapper">
                        <div
                            class="
                        featured-box
                        featured-box-secondary
                        featured-box-effect-3
                        cta-box
                    ">
                            <div
                                class="
                            box-content box-content-border-0
                            w3-card w3-hover-shadow
                        ">
                                <i class="icon-featured fas fa-users"></i>
                                <h4
                                    class="
                                font-weight-normal
                                text-5
                                mt-3
                            ">
                                    <strong class="font-weight-extra-bold text-white">Contact</strong>
                                </h4>

                            </div>
                        </div>
                        <div>
                            <p class="mb-2 mt-2 text-2">
                                Feeling connected to each other is a basic human need.
                            </p>
                        </div>
                    </div>
                </a>

                <a href="{{ url('https://www.facebook.com/vipmarriagemedia/') }}" class="text-decoration-none">

                    <div class="cta-box-wrapper">
                        <div
                            class="
                        featured-box
                        featured-box-secondary
                        featured-box-effect-3
                        cta-box
                    ">
                            <div
                                class="
                            box-content box-content-border-0
                            w3-card w3-hover-shadow
                        ">
                                <i
                                    class="
                                icon-featured
                                far
                                fa-comments
                            "></i>
                                <h4
                                    class="
                                font-weight-normal
                                text-5
                                mt-3
                            ">
                                    <strong class="font-weight-extra-bold text-white">
                                        Message
                                    </strong>
                                </h4>
                            </div>
                        </div>
                        <div>
                            <p class="mb-2 mt-2 text-2 ">
                                Good communication is the bridge between confusion and clarity.
                            </p>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h1 class="text-center h1 mb-4">We help Every Stage</h1>


        <div class="" style="background-color: #d0d0d0">
            <div class="container py-5 text-center">

                

                {!! $websiteParameter->home_1st_part_content !!}


                {{-- <div class="d-flex justify-content-center flex-column flex-md-row py-3" style="min-height: 300px">
                    {!! $websiteParameter->home_1st_part_content !!}

                    <div class="col-md-3 align-self-center text-center">
                        <img src="{{ asset("storage/homePage/".$websiteParameter->home_1st_part_image) }}" alt="" height="200" width="200"
                            class="rounded-circle">

                    </div>
                </div> --}}
            </div>
        </div>
    </section>

        <section class="mt-0">
            <div class="" style="background-color: #E2E2E2">
                <div class="container py-4">
                    <div class="d-flex justify-content-center flex-column flex-md-row"><div class="col-md-6"><p class="pt-2"><img src="{{ asset("storage/homePage/".$websiteParameter->home_2nd_part_image) }}" alt="" class="img-fluid"></p></div><div class="col-md-6">{!! $websiteParameter->home_2nd_part_content !!}</div></div>
                </div>
            </div>

        </section>





        {{-- @if ($everyStagePage)
@foreach ($everyStagePage->items as $item)
{!! $item->content !!}

@endforeach
@endif --}}





        {{-- <div class="row mt-n5">
    <div class="col">
        <div class="
                heading
                heading-middle-border
                heading-middle-border-center
                heading-border-xl
            ">
            <h2 class="font-weight-normal viptextcolor w3-cursive"><strong class="font-weight-extra-bold">
                    𝑾𝒆 𝒉𝒆𝒍𝒑 </strong>
                <strong class="font-weight-extra-bold"> 𝒆𝒗𝒆𝒓𝒚 𝒔𝒕𝒂𝒈𝒆 </strong>
            </h2>
        </div>
    </div>
</div>
--}}

        {{-- <section class="page-header page-header-modern page-header-background page-header-background-sm overlay overlay-color-secondary overlay-show overlay-op-8 mb-5" style="background-image: url({{ asset('img/1.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">

                <ul class="list list-icons">
                    <li><i class="fas fa-check"></i> <b>Army Officer</b> <i class="fas fa-check"></i> Major & Captains
                        </li>
                    <li><i class="fas fa-check"></i> Secretary <i class="fas fa-check"></i> Army officer Divorce
                    </li>

                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">Bcs Admin Cadre</span> <i
                            class="fas fa-check"></i> Navy officer</li>
                    <li><i class="fas fa-check"></i> Magistrate <i class="fas fa-check"></i> Judicial Magistrate</li>
                    <li><i class="fas fa-check"></i> Bcs Police Cadre</li>
                    <li><i class="fas fa-check"></i><span class="li-uniq-pri">Divorce</span> <i
                            class="fas fa-check"></i> Single <i class="fas fa-check"></i> Widow</li>
                </ul>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">

                <ul class="list list-icons">
                    <li><i class="fas fa-check"></i> <b><span class="li-uniq-pri">𝐁𝐜𝐬 𝐃𝐨𝐜𝐭𝐨𝐫 </span></b>
                    </li>
                    <li><i class="fas fa-check"></i> Govt. Officer  <i class="fas fa-check"></i> Engineer</li>

                    <li><i class="fas fa-check"></i> Buet Kuet Cuet Ruet  </li>
                    <li><i class="fas fa-check"></i><span class="li-uniq-pri">Industrialist</span> <i
                            class="fas fa-check"></i> businessman</li>

                    <li><i class="fas fa-check"></i><span class="li-uniq-pei">Group OF Companies</span> <i
                            class="fas fa-check"></i> MP <i class="fas fa-check"></i> Minister</li>
                </ul>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">

                <ul class="list list-icons">
                    <li><i class="fas fa-check"></i> <b>𝐂𝐢𝐭𝐢𝐳𝐞𝐧𝐬𝐡𝐢𝐩 𝐏𝐫𝐨𝐟𝐢𝐥𝐞</b> </li>
                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">USA</span> <i class="fas fa-check"></i>
                        UK <i class="fas fa-check"></i> Canada </li>

                    <li><i class="fas fa-check"></i> Australia <i class="fas fa-check"></i> Germany <i
                            class="fas fa-check"></i> France </li>
                    <li><i class="fas fa-check"></i> Italy & All Europe</li>
                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">PHD</span> <i class="fas fa-check"></i>
                        Doctor <i class="fas fa-check"></i> Barrister</li>

                </ul>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">

                <ul class="list list-icons">
                    <li><i class="fas fa-check"></i> <b><span class="li-uniq-pri">𝐂𝐡𝐚𝐫𝐭𝐞𝐫𝐞𝐝
                                𝐀𝐜𝐜𝐨𝐮𝐧𝐭𝐚𝐧𝐭</span></b> </li>
                    <li><i class="fas fa-check"></i> Multinational Company</li>

                    <li><i class="fas fa-check"></i> Airforce <i class="fas fa-check"></i> armed forces doctor</li>
                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">University professor</span> <i
                            class="fas fa-check"></i> Banker</li>
                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">celebrities</span></li>

                </ul>

            </div>
        </div>



    </div>
</section>

<section class="

        section
        section-text-light
        section-parallax
        mt-0
    " data-plugin-parallax data-plugin-options="{'speed': 1.5}" >
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">

                <ul class="list list-icons">
                    <li><i class="fas fa-check"></i> <b>Army Officer</b> <i class="fas fa-check"></i> Major & Captains
                        (300+)</li>
                    <li><i class="fas fa-check"></i> Secretary <i class="fas fa-check"></i> Army officer(150+) Divorce
                    </li>

                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">Bcs Admin Cadre</span> <i
                            class="fas fa-check"></i> Navy officer</li>
                    <li><i class="fas fa-check"></i> Magistrate <i class="fas fa-check"></i> Judicial Magistrate</li>
                    <li><i class="fas fa-check"></i> Bcs Police Cadre) (350+)</li>
                    <li><i class="fas fa-check"></i><span class="li-uniq-pri">Divorce</span> <i
                            class="fas fa-check"></i> Single <i class="fas fa-check"></i> Widow</li>
                </ul>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">

                <ul class="list list-icons">
                    <li><i class="fas fa-check"></i> <b><span class="li-uniq-pri">𝐁𝐜𝐬 𝐃𝐨𝐜𝐭𝐨𝐫 </span></b>(100+)
                    </li>
                    <li><i class="fas fa-check"></i> Govt. Officer (500+) <i class="fas fa-check"></i> Engineer</li>

                    <li><i class="fas fa-check"></i> Buet Kuet Cuet Ruet (500+) </li>
                    <li><i class="fas fa-check"></i><span class="li-uniq-pri">Industrialist</span> <i
                            class="fas fa-check"></i> businessman (1200+)</li>

                    <li><i class="fas fa-check"></i><span class="li-uniq-pei">Group OF Companies</span> <i
                            class="fas fa-check"></i> MP <i class="fas fa-check"></i> Minister</li>
                </ul>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">

                <ul class="list list-icons">
                    <li><i class="fas fa-check"></i> <b>𝐂𝐢𝐭𝐢𝐳𝐞𝐧𝐬𝐡𝐢𝐩 𝐏𝐫𝐨𝐟𝐢𝐥𝐞</b> </li>
                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">USA</span> <i class="fas fa-check"></i>
                        UK <i class="fas fa-check"></i> Canada </li>

                    <li><i class="fas fa-check"></i> Australia <i class="fas fa-check"></i> Germany <i
                            class="fas fa-check"></i> France </li>
                    <li><i class="fas fa-check"></i> Italy & All Europe (2000+)</li>
                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">PHD</span> <i class="fas fa-check"></i>
                        Doctor <i class="fas fa-check"></i> Barrister</li>

                </ul>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">

                <ul class="list list-icons">
                    <li><i class="fas fa-check"></i> <b><span class="li-uniq-pri">𝐂𝐡𝐚𝐫𝐭𝐞𝐫𝐞𝐝
                                𝐀𝐜𝐜𝐨𝐮𝐧𝐭𝐚𝐧𝐭</span></b> </li>
                    <li><i class="fas fa-check"></i> Multinational Company</li>

                    <li><i class="fas fa-check"></i> Airforce <i class="fas fa-check"></i> armed forces doctor</li>
                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">University professor</span> <i
                            class="fas fa-check"></i> Banker</li>
                    <li><i class="fas fa-check"></i> <span class="li-uniq-pri">celebrities</span></li>

                </ul>

            </div>
        </div>



    </div>
</section> --}}


        {{-- <section style="min-height: 400px" class="w3-light-gray text-center">
    <h2 class="text-lg-10 text-sm-5 text-md-10 pt-5" style="text-shadow: 1px 1px 2px #000">
        <strong>Download </strong> Our App
    </h2>

    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid rounded" src="{{ asset('img/intro-mobile.png') }}" />
        </div>

        <div class="col-md-6">
            <br />
            <img class="img-fluid rounded" src="{{
                    asset('img/mobile-app.png')
                }}" />

            <br />
            <img class="img-fluid rounded" src="{{
                    asset(
                        'img/Matrimony-App-Shaadi.com-Playstore.svg'
                    )
                }}" />
        </div>
    </div>
</section> --}}



        <section style="min-height: 250px">
            <div class="container">
                {{-- <div class="row mt-5">
            <div class="col">
                <div class="
                        heading
                        heading-border
                        heading-middle-border
                        heading-middle-border-center
                        heading-border-xl
                    ">
                    <h2 class="font-weight-normal color-vipmm pb-3">
                        <strong class="font-weight-extra-bold viptextcolor w3-cursive">
                            Blog
                        </strong> <span class="w3-text-gray">Posts </span>
                    </h2>
                </div>
            </div>
        </div> --}}


                <h1 class="text-center h1 mb-4">Blog Posts</h1>
                <div class="owl-carousel owl-theme"
                    data-plugin-options="{'items': 3, 'autoplay': false, 'autoplayTimeout': 3000, 'margin': 10, 'stagePadding': 0}">
                    @foreach ($posts as $post)
                        <div class="py-2">
                            <a href="{{ route('blogDetails2', $post->id) }}" style="text-decoration: none">
                                <div class="card w3-card-2 w3-hover-border-gray w3-round-small" style="">
                                    {{-- {{$post->feature_img_name}} --}}
                                    {{-- <img class="card-img-top" src="{{asset('storage/media/image/'.$post->feature_img_name)}}" alt="Card Image" /> --}}
                                    <img class="card-img-top"
                                        src="{{ route('imagecache', ['template' => 'medium', 'filename' => $post->fiName()]) }}"
                                        alt="Card Image" />
                                    <div class="card-body p-0 m-0">
                                        <h4 class="
                                card-title
                                text-4
                                font-weight-bold
                                w3-Verdana w3-text-black
                                text-center
                                m-0 mb-1
                            "
                                            style="height: 50px;overflow:hidden">

                                            {{ Str::limit($post->title, 40, '..') }}
                                        </h4>
                                        {{-- <p class="text-center"><small>{{custom_title( \Carbon\Carbon::parse($post->created_at)->format('F'), 3) }} {{ \Carbon\Carbon::parse($post->created_at)->format('d, Y')}}</small></p> --}}
                                        <p class="card-text text-center w3-serif"
                                            style="min-height: 60px;max-height: 60px">
                                            {{ Str::limit($post->excerpt, 80, '...') }}
                                        </p>
                                        {{-- <a href="{{route('blogDetails2', $post->id)}}" class="my-2 ml-2
                                read-more
                                text-color-primary
                                font-weight-semibold
                                text-2 w3-hover-text-red
                            ">Read More
                            <i class="
                                    fas
                                    fa-angle-right
                                    position-relative
                                    ml-1
                                "></i>
                            </a> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>

            </div>
        </section>





        <section style="min-height: 250px">
            <div class="container">
                <div class="row mt-5">
                    <div class="col">
                        {{-- <div class="
                        heading
                        heading-border
                        heading-middle-border
                        heading-middle-border-center
                        heading-border-xl
                    ">
                    <h2 class="font-weight-normal color-vipmm pb-3">
                        <strong class="font-weight-extra-bold viptextcolor w3-cursive">
                            Facebook
                        </strong>
                    </h2>
                </div> --}}
                        <h1 class="text-center h1 mb-4" style="color:#0E8FF2">Facebook</h1>

                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <div class="fb-page" data-href="https://www.facebook.com/vipmarriagemedia"
                                    data-width="350" data-height="480" data-hide-cover="false"
                                    data-tabs="timeline,messages" data-show-facepile="true"></div>
                            </div>
                            <div class="col-md-4"></div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section style="" class="w3-light-gray text-center mt-3 py-4">
            {{-- <h2 class="text-lg-10 text-sm-5 text-md-10 pt-5 color-vipmm w3-cursive" style="text-shadow: 1px 1px 2px #000">
        Sale<strong class="viptextcolor"> 30% OFF</strong>
    </h2> --}}

            <h1 class="text-center h1 my-2">Sale 30% OFF </h1>
            @guest
                <div class="p-2">
                    <a class="
                w3-btn
                btn btn-lg
                w3-blue
                w3-round-xxlarge
                w3-border
                w3-border-white
                w3-hover-shadow
            "
                        href="{{ url('register') }}">Register</a>
                    <a class="
                w3-btn
                btn btn-lg
                w3-blue
                w3-round-xxlarge
                w3-border
                w3-border-white
                w3-hover-shadow
            "
                        href="" data-toggle="modal" data-target="#smallModal">Login</a>
                </div>
            @else
                <div class="p-4">
                    <a class="
                w3-btn
                btn btn-lg
                w3-red
                w3-round-xxlarge
                w3-border
                w3-border-white
                w3-hover-shadow
            "
                        href="{{ route('user.packeges') }}">Get your package</a>

                </div>
            @endguest
        </section>

        <section style="min-height: 250px">
            <div class="container">
                {{-- <div class="row mt-5">
            <div class="col">
                <div class="
                        heading
                        heading-border
                        heading-middle-border
                        heading-middle-border-center
                        heading-border-xl
                    ">
                    <h2 class="font-weight-normal color-vipmm pb-3 w3-cursive">
                        <strong class="font-weight-extra-bold viptextcolor">VIP Marriage Media</strong>
                        with Thousands of
                        <strong class="font-weight-extra-bold viptextcolor">
                            Success Stories
                        </strong>
                    </h2>
                </div>
            </div>
        </div> --}}
                <h1 class="text-center h1 mb-4">Our Success Stories</h1>

                <div class="owl-carousel owl-theme"
                    data-plugin-options="{'items': 4, 'autoplay': true, 'autoplayTimeout': 3000}">
                    @foreach ($stories as $post)
                        {{-- <div class="py-1">
                <div class="card w3-card-2 w3-hover-opacity w3-round-small">
                    <img class="card-img-top" src="{{ asset('/storage/stories/' . $story->image_name) }}" alt="Card Image" />
                    <div class="card-body">
                        <h4 class="
                                card-title
                                mb-1
                                text-4
                                font-weight-bold
                            ">
                            {{$story->title}}
                        </h4>
                        <p class="card-text text-justify">
                         {{$story->description}}
                        </p>
                        <a href="/" class="
                                read-more
                                text-color-primary
                                font-weight-semibold
                                text-2
                            ">Read More
                            <i class="
                                    fas
                                    fa-angle-right
                                    position-relative
                                    top-1
                                    ml-1
                                "></i></a>
                    </div>
                </div>
            </div> --}}



                        <div class="p-1">
                            <a href="{{ route('success.stories_details', $post->id) }}" style="text-decoration: none">
                                <div class="card w3-card-2 w3-hover-border w3-hover-border-gray w3-round-small">
                                    {{-- {{$post->feature_img_name}} --}}
                                    {{-- <img class="card-img-top" src="{{asset('storage/media/image/'.$post->feature_img_name)}}" alt="Card Image" /> --}}
                                    <img class="card-img-top"
                                        src="{{ route('imagecache', ['template' => 'medium', 'filename' => $post->fiName()]) }}"
                                        alt="Card Image" />
                                    <div class="card-body" style="padding:0px">
                                        <h4 class="
                        card-title
                        text-4
                        font-weight-bold
                        w3-Verdana
                        text-center
                        m-0 m-0 p-0"
                                            style="height: 30px;overflow:hidden">

                                            {{ Str::limit($post->title, 40, '...') }}

                                            {{-- <br><small class="color-vipmm">{{custom_title( \Carbon\Carbon::parse($post->created_at)->format('F'), 3) }} {{ \Carbon\Carbon::parse($post->created_at)->format('d, Y')}}</small> --}}
                                        </h4>
                                        <p class="card-text text-justify w3-serif text-center p-0 mb-1"
                                            style="min-height: 60px;max-height: 60px;">
                                            {{ Str::limit($post->description, 80, '...') }}
                                        </p>
                                        {{-- <a href="{{route('success.stories_details', $post->id)}}" class="
                            my-2 ml-2
                            read-more
                            text-color-primary
                            font-weight-semibold
                            text-2 w3-hover-text-red
                            ">Read More
                            <i class="
                                    fas
                                    fa-angle-right
                                    position-relative
                                    ml-1
                                "></i>
                            </a> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach




                </div>
            </div>
        </section>
    @endsection
    @push('js')
    @endpush
