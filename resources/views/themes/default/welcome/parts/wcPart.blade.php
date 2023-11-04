
    

    <div class="page-header header-filter" data-parallax="true" 

    {{-- style=" background-image: url({{asset('mk/mk/BS4/assets/img/kit/profile_city.jpg')}}); " --}}

    >


<div style="margin-top: 50px;">
@include('welcome.videoBack')
</div>



        <div class="container">


            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Matching Life</h1>
                    <h4>Matching couples lead a life of heaven. Macthing life helps to find mached couple...</h4>
                    {{-- <br> --}}
                    {{-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> Watch video
                    </a> --}}


                </div>

                {{-- <div class="col-md-6">
                    <img  style="max-width: 130px;" class="img-fluid" src="{{ asset('img/m1.png') }}" alt="{{ env('APP_NAME') }}">
                </div> --}}
            </div>
        </div>
    </div>
    <div class="main main-raised-s" style="margin-top: -40px;">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Match your special life mate</h2>
                        <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info  w3-hover-shadow">
                                <div class="icon icon-info">
                                    <i class="material-icons ">person_add</i>
                                </div>
                                <h4 class="info-title">Free Signup</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info   w3-hover-shadow">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Verified Users</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info  w3-hover-shadow">
                                <div class="icon icon-danger">
                                    <i class="material-icons">cast_connected</i>
                                </div>
                                <h4 class="info-title">Connected</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


{{-- <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                        <i class="material-icons">camera</i> Studio
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                        <i class="material-icons">palette</i> Work
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                        <i class="material-icons">favorite</i> Favorite
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-space">
                    <div class="tab-pane active text-center gallery" id="studio">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/studio-1.jpg')}}" class="rounded">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/studio-2.jpg')}}" class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/studio-5.jpg')}}" class="rounded">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/studio-4.jpg')}}" class="rounded">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="works">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/olu-eletu.jpg')}}" class="rounded">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/clem-onojeghuo.jpg')}}" class="rounded">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/cynthia-del-rio.jpg')}}" class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/mariya-georgieva.jpg')}}" class="rounded">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/clem-onojegaw.jpg')}}" class="rounded">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="favorite">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/mariya-georgieva.jpg')}}" class="rounded">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/studio-3.jpg')}}" class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/clem-onojeghuo.jpg')}}" class="rounded">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/olu-eletu.jpg')}}" class="rounded">
                                <img src="{{asset('mk/mk/BS4/assets/img/kit/free/examples/studio-1.jpg')}}" class="rounded">
                            </div>
                        </div>
                    </div>
                </div> --}}




 
        </div>
    </div>



<!--/counter-->
    <div class="agileinfo_counter_section">
        <div class="container">
            <h3>Our Services</h3>
            {{-- <p class="sub_para two">consectetur adipiscing elit, sed do eiusmod</p>
            <h5><a href="#contact" class="view rew3 scroll"><span class="fa fa-hand-right" aria-hidden="true"></span>Contact Us</a></h5> --}}

            <div class="row">
                <div class="col-sm-3">

                    <div class="icon icon-default text-center">
                                    <i class="material-icons  w3-text-white w3-xxxlarge">watch_later</i>
                                </div>
                    
                    <p>
                        We provide customer support from 10 a.m. to 6 p.m. Clients can contact with us via email, phone and Facebook messenger. We try to give simple and expeditious solutions to your problems.
                    </p>
                </div>
                <div class="col-sm-3">

                    <div class="icon icon-default text-center">
                                    <i class="material-icons  w3-text-white w3-xxxlarge">supervised_user_circle</i>
                                </div>

                    <p>
                        We advice on how to make your profile stand out. If you are a premium customer, we will aid you in search of suitable matches based on your preferences. We will aid you by providing some links of potential bride/groom based on your preference.
                    </p>
                </div>
                <div class="col-sm-3">

                    <div class="icon icon-default text-center">
                                    <i class="material-icons  w3-text-white w3-xxxlarge">check_circle_outline</i>
                                </div>

                    <p>
                        We have a facebook page where our clients may initiate live interaction with us. We try to solve any type of problems and answer any kind of query of our clients. Besides we sometime post our registered clients words about themselves in our page.
                    </p>
                </div>
                <div class="col-sm-3">

                    <div class="icon icon-default text-center">
                                    <i class="material-icons  w3-text-white w3-xxxlarge">lock</i>
                                </div>

                    <p>
                        Your photo, real name and complete profile will not be seen by any other user without your permission. For contact information user have to go through two step security process. We also verify mobile number and take necessary action against doubtful profile.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--//counter-->
