@extends('user.layouts.tertiaryLayout') @push('css') @endpush
@section('sitebody')
<div class="body">
    <div role="main" class="main">
        <div
            class="slider-container rev_slider_wrapper"
            style="height: 100vh; position: relative; z-index: 1"
        >
            <div
                id="revolutionSlider"
                class="slider rev_slider"
                data-version="5.4.8"
                data-plugin-revolution-slider
                data-plugin-options="{'sliderLayout': 'fullscreen', 'delay': 9000, 'gridwidth': 1140, 'gridheight': 800, 'responsiveLevels': [4096,1200,992,500]}"
            >
                <ul>
                    <li
                        class="
                            slide-overlay
                            d-flex
                            justify-content-end
                            align-items-center
                        "
                        data-transition="fade"
                    >
                        <img
                            src="{{ asset('img/couple.jpeg') }}"
                            alt=""
                            data-bgposition="center center"
                            data-bgfit="cover"
                            data-bgrepeat="no-repeat"
                            class="rev-slidebg"
                        />

                        <div
                            class="tp-caption tp-resizeme"
                            data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"opacity:0;x:-100%;y:-100%;","to":"o:1;x:0;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-type="image"
                            data-x="left"
                            data-hoffset="['0','-150','-200','-200']"
                            data-y="top"
                            data-voffset="['-100','-150','-200','-200']"
                            data-width="['auto']"
                            data-height="['auto']"
                            data-basealign="slide"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-one-page-1-2.jpg')
                                }}"
                                alt=""
                            />
                        </div>

                        {{--
                        <div
                            class="tp-caption tp-resizeme"
                            data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"opacity:0;x:100%;y:-100%;","to":"o:1;x:0;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-type="image"
                            data-x="right"
                            data-hoffset="['0','-150','-200','-200']"
                            data-y="top"
                            data-voffset="['-100','-150','-200','-200']"
                            data-width="['auto']"
                            data-height="['auto']"
                            data-basealign="slide"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-one-page-1-3.jpg')
                                }}"
                                alt=""
                            />
                        </div>
                        --}} {{--
                        <div
                            class="tp-caption tp-resizeme"
                            data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"opacity:0;x:-100%;y:100%;","to":"o:1;x:0;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-type="image"
                            data-x="left"
                            data-hoffset="['0','-150','-200','-200']"
                            data-y="bottom"
                            data-voffset="['-100','-150','-200','-200']"
                            data-width="['auto']"
                            data-height="['auto']"
                            data-basealign="slide"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-one-page-1-4.jpg')
                                }}"
                                alt=""
                            />
                        </div>
                        --}} {{--
                        <div
                            class="tp-caption tp-resizeme"
                            data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"opacity:0;x:100%;y:100%;","to":"o:1;x:0;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-type="image"
                            data-x="right"
                            data-hoffset="['0','-150','-200','-200']"
                            data-y="bottom"
                            data-voffset="['-100','-150','-200','-200']"
                            data-width="['auto']"
                            data-height="['auto']"
                            data-basealign="slide"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-one-page-1-5.jpg')
                                }}"
                                alt=""
                            />
                        </div>
                        --}} {{--
                        <div
                            class="tp-caption"
                            data-x="center"
                            data-hoffset="['-170','-170','-170','-365']"
                            data-y="center"
                            data-voffset="['-80','-80','-80','-105']"
                            data-start="1000"
                            data-transform_in="x:[-300%];opacity:0;s:500;"
                            data-transform_idle="opacity:0.2;s:500;"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-title-border.png')
                                }}"
                                alt=""
                            />
                        </div>
                        --}}

                        <div
                            class="text-color-light font-weight-normal"
                            data-voffset="['-80','-80','-80','-105']"
                            data-start="700"
                            data-fontsize="['16','16','16','40']"
                            data-lineheight="['25','25','25','45']"
                            data-transform_in="y:[-50%];opacity:0;s:500;"
                        >
                            @include('user.partials.sections.registerForm')
                        </div>

                        {{--
                        <div
                            class="tp-caption"
                            data-x="center"
                            data-hoffset="['170','170','170','365']"
                            data-y="center"
                            data-voffset="['-80','-80','-80','-105']"
                            data-start="1000"
                            data-transform_in="x:[300%];opacity:0;s:500;"
                            data-transform_idle="opacity:0.2;s:500;"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-title-border.png')
                                }}"
                                alt=""
                            />
                        </div>
                        --}} {{--
                        <h1
                            class="
                                tp-caption
                                font-weight-extra-bold
                                text-color-light
                                negative-ls-1
                            "
                            data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-y="center"
                            data-voffset="['-30','-30','-30','-30']"
                            data-fontsize="['50','50','50','90']"
                            data-lineheight="['55','55','55','95']"
                        >
                            THE BEST DESIGN
                        </h1>
                        --}} {{--
                        <div
                            class="tp-caption"
                            data-frames='[{"delay":2000,"speed":500,"frame":"0","from":"opacity:0;x:10%;","to":"opacity:1;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-hoffset="['-40','-40','-40','-40']"
                            data-y="center"
                            data-voffset="['2','2','2','15']"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-blue-line-big.png')
                                }}"
                                alt=""
                            />
                        </div>
                        --}} {{--
                        <div
                            class="
                                tp-caption
                                font-weight-light
                                ws-normal
                                text-center
                            "
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.03,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                            data-x="center"
                            data-y="center"
                            data-voffset="['53','53','53','105']"
                            data-width="['530','530','530','1100']"
                            data-fontsize="['18','18','18','40']"
                            data-lineheight="['26','26','26','45']"
                            style="color: #b5b5b5"
                        >
                            Trusted by over
                            <strong class="text-color-light">30,000</strong>
                            satisfied users, Porto is a huge success in the one
                            of largest world's MarketPlace.
                        </div>

                        <a
                            class="
                                tp-caption
                                btn btn-primary btn-rounded
                                font-weight-semibold
                            "
                            data-frames='[{"delay":2500,"speed":2000,"frame":"0","from":"opacity:0;y:50%;","to":"o:1;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-hash
                            data-hash-offset="85"
                            href="#projects"
                            data-x="center"
                            data-hoffset="0"
                            data-y="center"
                            data-voffset="['133','133','133','255']"
                            data-whitespace="nowrap"
                            data-fontsize="['14','14','14','33']"
                            data-paddingtop="['15','15','15','40']"
                            data-paddingright="['45','45','45','110']"
                            data-paddingbottom="['15','15','15','40']"
                            data-paddingleft="['45','45','45','110']"
                            >GET STARTED NOW!</a
                        >
                        --}}
                    </li>
                    {{--
                    <li class="slide-overlay" data-transition="fade">
                        <img
                            src="{{ asset('porto/img/slides/slide-bg-2.jpg') }}"
                            alt=""
                            data-bgposition="center center"
                            data-bgfit="cover"
                            data-bgrepeat="no-repeat"
                            class="rev-slidebg"
                        />

                        <div
                            class="tp-caption"
                            data-x="center"
                            data-hoffset="['-170','-170','-170','-350']"
                            data-y="center"
                            data-voffset="['-50','-50','-50','-75']"
                            data-start="1000"
                            data-transform_in="x:[-300%];opacity:0;s:500;"
                            data-transform_idle="opacity:0.2;s:500;"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-title-border.png')
                                }}"
                                alt=""
                            />
                        </div>

                        <div
                            class="
                                tp-caption
                                text-color-light
                                font-weight-normal
                            "
                            data-x="center"
                            data-y="center"
                            data-voffset="['-50','-50','-50','-75']"
                            data-start="700"
                            data-fontsize="['16','16','16','40']"
                            data-lineheight="['25','25','25','45']"
                            data-transform_in="y:[-50%];opacity:0;s:500;"
                        >
                            WE WORK HARD AND PORTO HAS
                        </div>

                        <div
                            class="tp-caption"
                            data-x="center"
                            data-hoffset="['170','170','170','350']"
                            data-y="center"
                            data-voffset="['-50','-50','-50','-75']"
                            data-start="1000"
                            data-transform_in="x:[300%];opacity:0;s:500;"
                            data-transform_idle="opacity:0.2;s:500;"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-title-border.png')
                                }}"
                                alt=""
                            />
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-extra-bold
                                text-color-light
                                negative-ls-1
                            "
                            data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-y="center"
                            data-fontsize="['50','50','50','90']"
                            data-lineheight="['55','55','55','95']"
                        >
                            THE BEST DESIGN
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-light
                                ws-normal
                                text-center
                            "
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                            data-x="center"
                            data-y="center"
                            data-voffset="['60','60','60','105']"
                            data-width="['530','530','530','1100']"
                            data-fontsize="['18','18','18','40']"
                            data-lineheight="['26','26','26','45']"
                            style="color: #b5b5b5"
                        >
                            Trusted by over
                            <strong class="text-color-light">30,000</strong>
                            satisfied users, Porto is a huge success in the one
                            of largest world's MarketPlace.
                        </div>
                    </li>
                    <li
                        class="slide-overlay slide-overlay-dark"
                        data-transition="fade"
                    >
                        <img
                            src="{{ asset('porto/img/slides/slide-bg-6.jpg') }}"
                            alt=""
                            data-bgposition="center center"
                            data-bgfit="cover"
                            data-bgrepeat="no-repeat"
                            class="rev-slidebg"
                        />

                        <div
                            class="tp-caption"
                            data-x="center"
                            data-hoffset="['-145','-145','-145','-320']"
                            data-y="center"
                            data-voffset="['-80','-80','-80','-130']"
                            data-start="1000"
                            data-transform_in="x:[-300%];opacity:0;s:500;"
                            data-transform_idle="opacity:0.2;s:500;"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-title-border.png')
                                }}"
                                alt=""
                            />
                        </div>

                        <div
                            class="
                                tp-caption
                                text-color-light
                                font-weight-normal
                            "
                            data-x="center"
                            data-y="center"
                            data-voffset="['-80','-80','-80','-130']"
                            data-start="700"
                            data-fontsize="['16','16','16','40']"
                            data-lineheight="['25','25','25','45']"
                            data-transform_in="y:[-50%];opacity:0;s:500;"
                        >
                            WE CREATE DESIGNS, WE ARE
                        </div>

                        <div
                            class="tp-caption"
                            data-x="center"
                            data-hoffset="['145','145','145','320']"
                            data-y="center"
                            data-voffset="['-80','-80','-80','-130']"
                            data-start="1000"
                            data-transform_in="x:[300%];opacity:0;s:500;"
                            data-transform_idle="opacity:0.2;s:500;"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-title-border.png')
                                }}"
                                alt=""
                            />
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-extra-bold
                                text-color-light
                            "
                            data-frames='[{"delay":1300,"speed":1000,"frame":"0","from":"opacity:0;x:-50%;","to":"opacity:0.7;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-hoffset="['-155','-155','-155','-255']"
                            data-y="center"
                            data-fontsize="['145','145','145','250']"
                            data-lineheight="['150','150','150','260']"
                        >
                            P
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-extra-bold
                                text-color-light
                            "
                            data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"opacity:0;x:-50%;","to":"opacity:0.7;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-hoffset="['-80','-80','-80','-130']"
                            data-y="center"
                            data-fontsize="['145','145','145','250']"
                            data-lineheight="['150','150','150','260']"
                        >
                            O
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-extra-bold
                                text-color-light
                            "
                            data-frames='[{"delay":1700,"speed":1000,"frame":"0","from":"opacity:0;x:-50%;","to":"opacity:0.7;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-y="center"
                            data-fontsize="['145','145','145','250']"
                            data-lineheight="['150','150','150','260']"
                        >
                            R
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-extra-bold
                                text-color-light
                            "
                            data-frames='[{"delay":1900,"speed":1000,"frame":"0","from":"opacity:0;x:-50%;","to":"opacity:0.7;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-hoffset="['65','65','65','115']"
                            data-y="center"
                            data-fontsize="['145','145','145','250']"
                            data-lineheight="['150','150','150','260']"
                        >
                            T
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-extra-bold
                                text-color-light
                            "
                            data-frames='[{"delay":2100,"speed":1000,"frame":"0","from":"opacity:0;x:-50%;","to":"opacity:0.7;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-hoffset="['139','139','139','240']"
                            data-y="center"
                            data-fontsize="['145','145','145','250']"
                            data-lineheight="['150','150','150','260']"
                        >
                            O
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-light
                                text-color-light
                            "
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2300,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                            data-x="center"
                            data-y="center"
                            data-voffset="['85','85','85','140']"
                            data-fontsize="['18','18','18','40']"
                            data-lineheight="['26','26','26','45']"
                        >
                            The best choice for your new website
                        </div>
                    </li>
                    <li class="slide-overlay" data-transition="fade">
                        <img
                            src="{{ asset('porto/img/blank.gif') }}"
                            alt=""
                            data-bgposition="center center"
                            data-bgfit="cover"
                            data-bgrepeat="no-repeat"
                            class="rev-slidebg"
                        />

                        <div
                            class="rs-background-video-layer"
                            data-forcerewind="on"
                            data-volume="mute"
                            data-videowidth="100%"
                            data-videoheight="100%"
                            data-videomp4="video/memory-of-a-woman.mp4"
                            data-videopreload="preload"
                            data-videoloop="loop"
                            data-forceCover="1"
                            data-aspectratio="16:9"
                            data-autoplay="true"
                            data-autoplayonlyfirsttime="false"
                            data-nextslideatend="false"
                        ></div>

                        <div
                            class="tp-caption"
                            data-x="center"
                            data-hoffset="['-170','-170','-170','-350']"
                            data-y="center"
                            data-voffset="['-50','-50','-50','-75']"
                            data-start="1000"
                            data-transform_in="x:[-300%];opacity:0;s:500;"
                            data-transform_idle="opacity:0.2;s:500;"
                            style="z-index: 5"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-title-border.png')
                                }}"
                                alt=""
                            />
                        </div>

                        <div
                            class="
                                tp-caption
                                text-color-light
                                font-weight-normal
                            "
                            data-x="center"
                            data-y="center"
                            data-voffset="['-50','-50','-50','-75']"
                            data-start="700"
                            data-fontsize="['16','16','16','40']"
                            data-lineheight="['25','25','25','45']"
                            data-transform_in="y:[-50%];opacity:0;s:500;"
                            style="z-index: 5"
                        >
                            WE WORK HARD AND PORTO HAS
                        </div>

                        <div
                            class="tp-caption"
                            data-x="center"
                            data-hoffset="['170','170','170','350']"
                            data-y="center"
                            data-voffset="['-50','-50','-50','-75']"
                            data-start="1000"
                            data-transform_in="x:[300%];opacity:0;s:500;"
                            data-transform_idle="opacity:0.2;s:500;"
                            style="z-index: 5"
                        >
                            <img
                                src="{{
                                    asset('img/slides/slide-title-border.png')
                                }}"
                                alt=""
                            />
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-extra-bold
                                text-color-light
                                negative-ls-1
                            "
                            data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-x="center"
                            data-y="center"
                            data-fontsize="['50','50','50','90']"
                            data-lineheight="['55','55','55','95']"
                            style="z-index: 5"
                        >
                            PERFECT VIDEOS
                        </div>

                        <div
                            class="
                                tp-caption
                                font-weight-light
                                ws-normal
                                text-center
                            "
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                            data-x="center"
                            data-y="center"
                            data-voffset="['60','60','60','105']"
                            data-width="['530','530','530','1100']"
                            data-fontsize="['18','18','18','40']"
                            data-lineheight="['26','26','26','45']"
                            style="color: #b5b5b5; z-index: 5"
                        >
                            Trusted by over
                            <strong class="text-color-light">30,000</strong>
                            satisfied users, Porto is a huge success in the one
                            of largest world's MarketPlace.
                        </div>

                        <div class="tp-dottedoverlay tp-opacity-overlay"></div>
                    </li>
                    --}}
                </ul>
            </div>
        </div>

        <div
            class="container d-flex justify-content-end w-100"
            style="z-index: -1; position: absolute"
        >
            <div class="row d-flex justify-content-end">
                <div class="col-md-9">
                    <div
                        class="featured-box featured-box-primary text-left mt-0"
                    >
                        <div class="box-content">
                            <h4
                                class="
                                    color-primary
                                    font-weight-semibold
                                    text-4 text-uppercase
                                    mb-3
                                "
                            >
                                Register An Account
                            </h4>
                            <form
                                action="/"
                                id="frmSignUp"
                                method="post"
                                class="needs-validation"
                            >
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label
                                            class="
                                                font-weight-bold
                                                text-dark text-2
                                            "
                                            >Full Name</label
                                        >
                                        <input
                                            type="text"
                                            value=""
                                            class="form-control form-control-lg"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label
                                            class="
                                                font-weight-bold
                                                text-dark text-2
                                            "
                                            >E-mail Address</label
                                        >
                                        <input
                                            type="text"
                                            value=""
                                            class="form-control form-control-lg"
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label
                                            class="
                                                font-weight-bold
                                                text-dark text-2
                                            "
                                            >Mobile</label
                                        >
                                        <input
                                            type="text"
                                            value=""
                                            class="form-control form-control-lg"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label
                                            class="
                                                font-weight-bold
                                                text-dark text-2
                                            "
                                            >Password</label
                                        >
                                        <input
                                            type="password"
                                            value=""
                                            class="form-control form-control-lg"
                                            required
                                        />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label
                                            class="
                                                font-weight-bold
                                                text-dark text-2
                                            "
                                            >Re-enter Password</label
                                        >
                                        <input
                                            type="password"
                                            value=""
                                            class="form-control form-control-lg"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-9">
                                        <div
                                            class="
                                                custom-control custom-checkbox
                                            "
                                        >
                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="terms"
                                            />
                                            <label
                                                class="
                                                    custom-control-label
                                                    text-2
                                                "
                                                for="terms"
                                                >I have read and agree to the
                                                <a href="#"
                                                    >terms of service</a
                                                ></label
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <input
                                            type="submit"
                                            value="Register"
                                            class="
                                                btn btn-primary btn-modern
                                                float-right
                                            "
                                            data-loading-text="Loading..."
                                        />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="intro" class="mb-5">
            <header
                id="header"
                class="header-narrow header-below-slider"
                data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAtElement': '#header', 'stickySetTop': '0', 'stickyChangeLogo': false}"
            >
                <div class="header-body header-body-bottom-border-fixed">
                    <div
                        class="
                            header-container header-container-height-sm
                            container
                        "
                    >
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-logo">
                                        <a href="index.html">
                                            <img
                                                alt="Porto"
                                                width="100"
                                                height="48"
                                                data-sticky-width="82"
                                                data-sticky-height="40"
                                                src="{{
                                                    asset('img/vip-logo.png')
                                                }}"
                                            />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <div
                                        class="
                                            header-nav
                                            header-nav-line
                                            header-nav-top-line
                                            header-nav-top-line-with-border
                                            order-2 order-lg-1
                                        "
                                    >
                                        <div
                                            class="
                                                header-nav-main
                                                header-nav-main-square
                                                header-nav-main-effect-2
                                                header-nav-main-sub-effect-1
                                            "
                                        >
                                            <nav class="collapse">
                                                <ul
                                                    class="nav nav-pills"
                                                    id="mainNav"
                                                >
                                                    <li class="dropdown">
                                                        <a
                                                            class="
                                                                dropdown-item
                                                                dropdown-toggle
                                                            "
                                                            href="index.html"
                                                        >
                                                            Home
                                                        </a>
                                                    </li>
                                                    <li
                                                        class="
                                                            dropdown
                                                            dropdown-mega
                                                        "
                                                    >
                                                        <a
                                                            class="
                                                                dropdown-item
                                                                dropdown-toggle
                                                            "
                                                            href="elements.html"
                                                        >
                                                            Element
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <button
                                            class="btn header-btn-collapse-nav"
                                            data-toggle="collapse"
                                            data-target=".header-nav-main nav"
                                        >
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                    <div
                                        class="
                                            header-nav-features
                                            header-nav-features-no-border
                                            header-nav-features-lg-show-border
                                            order-1 order-lg-2
                                        "
                                    >
                                        <div
                                            class="
                                                header-nav-feature
                                                header-nav-features-search
                                                d-inline-flex
                                            "
                                        >
                                            <a
                                                href="#"
                                                class="
                                                    header-nav-features-toggle
                                                "
                                                data-focus="headerSearch"
                                                ><i
                                                    class="
                                                        fas
                                                        fa-search
                                                        header-nav-top-icon
                                                    "
                                                ></i
                                            ></a>
                                            <div
                                                class="
                                                    header-nav-features-dropdown
                                                "
                                                id="headerTopSearchDropdown"
                                            >
                                                <form
                                                    role="search"
                                                    action="page-search-results.html"
                                                    method="get"
                                                >
                                                    <div
                                                        class="
                                                            simple-search
                                                            input-group
                                                        "
                                                    >
                                                        <input
                                                            class="
                                                                form-control
                                                                text-1
                                                            "
                                                            id="headerSearch"
                                                            name="q"
                                                            type="search"
                                                            value=""
                                                            placeholder="Search..."
                                                        />
                                                        <span
                                                            class="
                                                                input-group-append
                                                            "
                                                        >
                                                            <button
                                                                class="btn"
                                                                type="submit"
                                                            >
                                                                <i
                                                                    class="
                                                                        fa
                                                                        fa-search
                                                                        header-nav-top-icon
                                                                    "
                                                                ></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <div class="container">
            <div class="row text-center pt-3">
                <div class="col-md-12 py-2 mb-4">
                    <span class="text-danger" style="font-size: 38px">
                        Find your Special Someone</span
                    >
                </div>
                <div class="col-md-4">
                    <div class="text-center rounded-0">
                        <div
                            class="flip-back d-flex align-items-center p-5"
                            style="
                                background-image: url(img/generic/generic-corporate-17-1.jpg);
                                background-size: cover;
                                background-position: center;
                            "
                        >
                            <div class="flip-content my-4">
                                <img
                                    src="{{ asset('img/edit.png') }}"
                                    class="img-fluid"
                                    style="width: 110px"
                                    alt=""
                                />
                                <br />
                                <div class="mt-5">
                                    <a
                                        class="tarek-text-1 tarek-font-1 mt-5"
                                        href=""
                                        >Sign Up</a
                                    >
                                    <p>
                                        Register for free & put up your
                                        Matrimony Profile
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center rounded-0">
                        <div
                            class="flip-back d-flex align-items-center p-5"
                            style="
                                background-image: url(img/generic/generic-corporate-17-1.jpg);
                                background-size: cover;
                                background-position: center;
                            "
                        >
                            <div class="flip-content my-4">
                                <img
                                    src="{{ asset('img/user.png') }}"
                                    class="img-fluid"
                                    style="width: 110px"
                                    alt=""
                                />
                                <br />
                                <div class="mt-5">
                                    <a
                                        class="tarek-text-1 tarek-font-1 mt-5"
                                        href=""
                                        >Connect</a
                                    >
                                    <p>
                                        Select & Connect with Matches you like
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center rounded-0">
                        <div
                            class="flip-back d-flex align-items-center p-5"
                            style="
                                background-image: url(img/generic/generic-corporate-17-1.jpg);
                                background-size: cover;
                                background-position: center;
                            "
                        >
                            <div class="flip-content my-4">
                                <img
                                    src="{{ asset('img/chatbox.png') }}"
                                    class="img-fluid"
                                    style="width: 110px"
                                    alt=""
                                />
                                <br />
                                <div class="mt-5">
                                    <a
                                        class="tarek-text-1 tarek-font-1 mt-5"
                                        href=""
                                    >
                                        Interact</a
                                    >
                                    <p>
                                        ecome a Premium Member & Start a
                                        Conversation
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center pt-3">
                <div class="col-md-12 py-2 mb-4">
                    <span class="text-danger" style="font-size: 38px">
                        Happy Stories</span
                    >
                </div>
                <div
                    class="owl-carousel owl-theme"
                    data-plugin-options="{'items': 4, 'margin': 10, 'autoplay': true, 'autoplayTimeout': 3000}"
                >
                    @foreach (array("f", "g", "g", "7", "8", "7", "g", "g", "g")
                    as $item)
                    <div>
                        <div class="card">
                            <img
                                class="card-img-top"
                                src="{{ asset('img/couple.jpeg') }}"
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
                                    Mr. & Mrs. Hululu
                                </h4>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Curabitur rhoncus nulla
                                    dui, in dapi.
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <footer id="footer">
        <div class="container">
            <div class="row py-5 my-4">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-3 mb-3">NEWSLETTER</h5>
                    <p class="pr-1">
                        Keep up on our always evolving product features and
                        technology. Enter your e-mail address and subscribe to
                        our newsletter.
                    </p>
                    <div
                        class="alert alert-success d-none"
                        id="newsletterSuccess"
                    >
                        <strong>Success!</strong> You've been added to our email
                        list.
                    </div>
                    <div
                        class="alert alert-danger d-none"
                        id="newsletterError"
                    ></div>
                    <form
                        id="newsletterForm"
                        action="php/newsletter-subscribe.php"
                        method="POST"
                        class="mr-4 mb-3 mb-md-0"
                    >
                        <div class="input-group input-group-rounded">
                            <input
                                class="form-control form-control-sm bg-light"
                                placeholder="Email Address"
                                name="newsletterEmail"
                                id="newsletterEmail"
                                type="text"
                            />
                            <span class="input-group-append">
                                <button
                                    class="btn btn-light text-color-dark"
                                    type="submit"
                                >
                                    <strong>GO!</strong>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <h5 class="text-3 mb-3">LATEST TWEETS</h5>
                    <div
                        id="tweet"
                        class="twitter"
                        data-plugin-tweets
                        data-plugin-options="{'username': 'oklerthemes', 'count': 2}"
                    >
                        <p>Please wait...</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <div class="contact-details">
                        <h5 class="text-3 mb-3">CONTACT US</h5>
                        <ul class="list list-icons list-icons-lg">
                            <li class="mb-1">
                                <i
                                    class="far fa-dot-circle text-color-primary"
                                ></i>
                                <p class="m-0">234 Street Name, City Name</p>
                            </li>
                            <li class="mb-1">
                                <i
                                    class="fab fa-whatsapp text-color-primary"
                                ></i>
                                <p class="m-0">
                                    <a href="tel:8001234567">(800) 123-4567</a>
                                </p>
                            </li>
                            <li class="mb-1">
                                <i
                                    class="far fa-envelope text-color-primary"
                                ></i>
                                <p class="m-0">
                                    <a href="mailto:mail@example.com"
                                        >mail@example.com</a
                                    >
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <h5 class="text-3 mb-3">FOLLOW US</h5>
                    <ul class="social-icons">
                        <li class="social-icons-facebook">
                            <a
                                href="http://www.facebook.com/"
                                target="_blank"
                                title="Facebook"
                                ><i class="fab fa-facebook-f"></i
                            ></a>
                        </li>
                        <li class="social-icons-twitter">
                            <a
                                href="http://www.twitter.com/"
                                target="_blank"
                                title="Twitter"
                                ><i class="fab fa-twitter"></i
                            ></a>
                        </li>
                        <li class="social-icons-linkedin">
                            <a
                                href="http://www.linkedin.com/"
                                target="_blank"
                                title="Linkedin"
                                ><i class="fab fa-linkedin-in"></i
                            ></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div
            class="
                footer-copyright
                second-brand-bg-color
                bg-color-scale-overlay bg-color-scale-overlay-1
            "
        >
            <div class="bg-color-scale-overlay-wrapper">
                <div class="container py-2" style="height: 50px">
                    <div class="row">
                        <div
                            class="
                                col-lg-1
                                d-flex
                                align-items-center
                                justify-content-center justify-content-lg-start
                                mb-2 mb-lg-0
                            "
                        >
                            <a href="index.html" class="logo pr-0 pr-lg-3">
                                <img
                                    alt="Porto Website Template"
                                    src="{{ asset('img/vip-logo.png') }}"
                                    class="opacity-5"
                                    height="33"
                                />
                            </a>
                        </div>
                        <div
                            class="
                                col-lg-7
                                d-flex
                                align-items-center
                                justify-content-center justify-content-lg-start
                                mb-4 mb-lg-0
                            "
                        >
                            <p class="vip-text-white-darken">
                                © Copyright 2020. All Rights Reserved.
                            </p>
                        </div>
                        <div
                            class="
                                col-lg-4
                                d-flex
                                align-items-center
                                justify-content-center justify-content-lg-end
                            "
                        >
                            <nav id="sub-menu">
                                <ul>
                                    <li class="border-0">
                                        <i
                                            class="
                                                fas
                                                fa-angle-right
                                                text-color-light
                                            "
                                        ></i
                                        ><a
                                            href="page-faq.html"
                                            class="
                                                ml-1
                                                text-decoration-none
                                                text-color-light
                                            "
                                        >
                                            FAQ's</a
                                        >
                                    </li>
                                    <li class="border-0">
                                        <i
                                            class="
                                                fas
                                                fa-angle-right
                                                text-color-light
                                            "
                                        ></i
                                        ><a
                                            href="sitemap.html"
                                            class="
                                                ml-1
                                                text-decoration-none
                                                text-color-light
                                            "
                                        >
                                            Sitemap</a
                                        >
                                    </li>
                                    <li class="border-0">
                                        <i
                                            class="
                                                fas
                                                fa-angle-right
                                                text-color-light
                                            "
                                        ></i
                                        ><a
                                            href="contact-us.html"
                                            class="
                                                ml-1
                                                text-decoration-none
                                                text-color-light
                                            "
                                        >
                                            Contact Us</a
                                        >
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

@endsection
