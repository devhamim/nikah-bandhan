@extends('user.layouts.tertiaryLayout')

@section('sitebody')
<div class="body">
    <header id="header" class="header-effect-shrink">
        <div class="header-body border-top-0 second-brand-bg-color">
            <div class="container-fluid px-lg-4">
                <div class="header-row">
                    <div class="header-column header-column-border-right flex-grow-0">
                        <div class="header-row pr-4">
                            <div class="header-logo">
                                <a href="index.html">
                                    <img alt="Porto" width="100" height="48" data-sticky-width="82"
                                        data-sticky-height="40" src="img/vip-logo.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-nav header-nav-links justify-content-center">
                                <div
                                    class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                    <nav class="collapse header-mobile-border-top">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="index.html">
                                                    My Shaadi
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="index.html">
                                                    Matches
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="index.html">
                                                    Search
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="index.html">
                                                    Inbox
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="index.html">
                                                    Upghrade Now
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="index.html">
                                                    Help
                                                </a>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" href="index.html">
                                                    <i class="far fa-user btn btn-rounded btn-light pl">
                                                        <i class="icon-arrow-down icons pl-2"></i></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-column header-column-border-left flex-grow-0 justify-content-center">

                    </div>
                </div>
            </div>
        </div>
        <div class="header-top " style="background-color: white">
            <div class="container">
                <div class="header-row py-2">
                    <div class="header-column ">
                        <div class="header-row perfect-center">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link pl-0" href="about-us.html"><i class="fas fa-angle-right"></i>
                                            Dashboard</a>
                                    </li>
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i>
                                            My Profile</a>
                                    </li>

                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i>
                                            My Photos</a>
                                    </li>

                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i>
                                            Pertner Preferences</a>
                                    </li>
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i>
                                            Settings</a>
                                    </li>

                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i>
                                            More</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

<div role="main" class="main">




    <div class="container my-5 pt-3">
        <div class="row ">
            <div class="col-lg-2 p-0">
                <aside class="sidebar pt-3">
                    <div class="card border-radius-0 bg-color-light border-0 box-shadow-1">
                        <div class="card-body">
                            <img src="{{asset('img/user.jpg')}}" class="img-fluid" alt="">
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    Tarek Aziz
                                </div>
                                <div class="col-sm-4" style="white-space: nowrap;">
                                    <a href="">Edit</a>
                                </div>

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-7">
                                    <span style="font-size: 9px"> Account Type <br>

                                        <span style="font-size: 11px"> Free </span></span>
                                </div>
                                <div class="col-sm-5" style="white-space: nowrap;">
                                    <a href="">Upgrade</a>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-9">
                                    <span style="font-size: 8px"> Mobile number verified

                                        <br>

                                        <span style="font-size: 11px"> Verify your ID </span></span>
                                </div>
                                <div class="col-sm-3" style="white-space: nowrap;">
                                    <i class="icon-note icons"></i>
                                </div>

                            </div>
                        </div>
                    </div>



                </aside>
            </div>
            <div class="col-lg-6 pt-3 my-3">

                <h5 class="font-weight-bold">Your Activity Summery</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="px-1 vip-activity-card" style="width: 100%; height: 50px; border: 1px solid black">
                            <span>0</span> <br>
                            <span>No pending invitations</span>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="px-1"
                            style="width: 100%; height: 50px; border: 1px solid black; background-color:#f7f7f">
                            <span>0</span> <br>
                            <span>No pending invitations</span>

                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="px-1" style="width: 100%; height: 50px; border: 1px solid black">
                            <span>0</span> <br>
                            <span>No pending invitations</span>

                        </div>

                    </div>
                </div>
                <div class="row pt-2 my-3">
                    <div class="col-md-4">
                        <div class="px-1" style="width: 100%; height: 50px; border: 1px solid black">
                            <span>0</span> <br>
                            <span>No pending invitations</span>

                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="px-1" style="width: 100%; height: 50px; border: 1px solid black">
                            <span>0</span> <br>
                            <span>No pending invitations</span>

                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="px-1" style="width: 100%; height: 50px; border: 1px solid black">
                            <span>0</span> <br>
                            <span>No pending invitations</span>

                        </div>

                    </div>
                </div>

                <section class="pt-3">
                    <h5>Improve your profile</h5>
                    <div class="owl-carousel owl-theme nav-inside"
                        data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                        @foreach (array("f", "g", "g", "7", "8", "7", "g", "g", "g") as $item)
                        <div>
                            <div class="img-thumbnail border-0 p-0 d-block">
                                <img class="img-fluid border-radius-0" style="height: 150px; width: 100%"
                                    src="{{asset('img/couple.jpeg')}}" alt="xfwft">
                            </div>
                        </div>
                        @endforeach

                    </div>
                </section>
            </div>
            <div class="col-lg-3">
                <aside class="sidebar">
                    <img class="img-fluid border-radius-0" style="height: 450px; width: 100%"
                        src="{{asset('img/couple.jpeg')}}" alt="xfwft">
                </aside>
            </div>
        </div>

        <div class="container pt-5">
            <div class="row">
                <h5>Recent Visitors <span class="btn btn-sm btn-rounded btn-danger">12</span></h5>
                <div class="owl-carousel owl-theme show-nav-hover"
                    data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': false, 'dots': false}">
                    @foreach (array("f", "g", "g", "7", "8", "7", "g", "g", "g") as $item)
                    <div>
                        <div style="width: 180px; height: 240px; border: 1px solid black">
                            <div class="text-center" style="width: 70%; margin: 0 auto">
                                <img src="{{asset('img/user.jpg')}}" class="img-fluid" alt="">
                                <span style="font-size: 12px">Tarek</span> <br>
                                <span>20y, Bangla, Dhaka</span>

                                <a href="" class="btn btn-block btn-primary btn-rounded"> Connect Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>


        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6">
                    <h5>My Matches <span class="btn btn-sm btn-rounded btn-danger">12</span></h5>
                    <div class="card border-radius-0 bg-color-light border-0 box-shadow-1">
                        <div class="card-body">
                            @foreach (array("f", "g", "g", "7", "8", "7", "g", "g", "g") as $item)
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{asset('img/user.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-6">
                                    <h6>Tarek</h6>
                                    <span>24 yrs, 2"3', Bengali, Dhaka <br> not working</span>

                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="fas fa-check-circle fa-3x"></i> <br>
                                    <small>Connect now</small>

                                </div>
                            </div>
                            <hr>
                            @endforeach


                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>New Matches for you <span class="btn btn-sm btn-rounded btn-danger">12</span></h5>
                    <div class="card border-radius-0 bg-color-light border-0 box-shadow-1">
                        <div class="card-body">
                            @foreach (array("f", "g", "g", "7", "8", "7", "g", "g", "g") as $item)
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{asset('img/user.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-6">
                                    <h6>Tarek</h6>
                                    <span>24 yrs, 2"3', Bengali, Dhaka <br> not working</span>

                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="fas fa-check-circle fa-3x"></i> <br>
                                    <small>Connect now</small>

                                </div>
                            </div>
                            <hr>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>





    <footer id="footer" class="brand-bg-color border-top-0 vip-text-white-darken">

        <div class="footer-copyright second-brand-bg-color bg-color-scale-overlay bg-color-scale-overlay-1">
            <div class="bg-color-scale-overlay-wrapper">
                <div class="container py-2" style="height: 50px">
                    <div class="row">
                        <div
                            class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                            <a href="index.html" class="logo pr-0 pr-lg-3">
                                <img alt="Porto Website Template" src="{{ asset('img/vip-logo.png') }}"
                                    class="opacity-5" height="33">
                            </a>
                        </div>
                        <div
                            class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                            <p class="vip-text-white-darken">© Copyright 2020. All Rights
                                Reserved.</p>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                            <nav id="sub-menu">
                                <ul>
                                    <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a
                                            href="page-faq.html" class="ml-1 text-decoration-none text-color-light">
                                            FAQ's</a></li>
                                    <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a
                                            href="sitemap.html" class="ml-1 text-decoration-none text-color-light">
                                            Sitemap</a></li>
                                    <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a
                                            href="contact-us.html" class="ml-1 text-decoration-none text-color-light">
                                            Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection