@extends('user.master.usermaster')
@php
$me=auth()->user();
@endphp
@push('css')
<style>

    .grid-card-contact{
        display: grid;
        grid-template-columns: 33% 33% 33%;
        text-align: center;

    }

</style>
@endpush
@section('content')
<br>
<div class="container" >
    <div class="row">
        <div class="col-lg-3">
           <div class="bg-white">
            @include('user.parts.leftsidebar')
           </div>
        </div>
        <div class="col-md-9" style="background-color: ">
            @include('alerts.alerts')
            @if ($me->email_verified==null)
            <div class="alert alert-warning">


            Your Email is not verified. Please,  <a class="btn btn-warning btn-xs" href="{{ route('user.verifyEmailCodeGenerate') }}">Click Here</a> to verify now

            </div>
          @endif

          @if ($me->mobile_verified==null)
            <div class="alert alert-warning ">


            Your Mobile is not verified. Please,  <a class="btn btn-warning btn-xs" href="{{ route('user.verifyMobileCodeGenerate') }}">Click Here</a> to verify now

            </div>
          @endif

            <div class="row my-3">
                <div class="col-md-12 bg-white">
                    <h4 class="color-vipmm2">Featured Profiles</h4>
                </div>


                @foreach($users as $user)
                <div class="col-md-12 col-lg-6 mb-5 mb-lg-0 appear-animation pb-2"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">

                    <div class="card text-center" style="border-radius: 10px;">
                        <div class=" p-5" style="border-radius: 10px;">
                            <div class="flip-content my-4" style="border-radius: 10px;">
                                <strong
                                    class="font-weight-extra-bold color-vipmm line-height-1 text-13 mb-3 d-inline-block">
                                    <div class="profile-image-outer-container">
                                        <div class="bg-color-vipmm text-center"
                                            style="width: 90px; height:90px; border-radius: 50%;">

                                            @if($user->profile_img)

                                            <img src="{{asset('storage/profile/'. $user->profile_img)}}"
                                                style="width:80px; height: 80px; border: 5px solid #fff; border-radius: 50%;"
                                                class="img-fluid mt-1">
                                            @else

                                            <img src="{{asset('img/vip-user.png')}}"
                                                style="width:80px; height: 80px; border: 5px solid #fff; border-radius: 50%;"
                                                class="img-fluid mt-1">
                                            @endif



                                        </div>
                                    </div>
                                </strong>
                                <h4 class="font-weight-bold color-vipmm text-4">{{$user->name}}</h4>
                                <p>Profession: {{$user->profession}}</p>
                            </div>
                        </div>
                        {{-- <div class="flip-back d-flex align-items-center p-5"
                            style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center; border-radius: 10px;">
                            <div class="flip-content my-4" style="border-radius: 10px;">
                                <h4 class="font-weight-bold color-vipmm">{{$user->name}}</h4>
                                <span class="card-text color-vipmm2"><strong>DOB</strong>: {{$user->age()}} Years</span> <br>
                                <span class="card-text color-vipmm2"><strong>Marital Status</strong>:
                                    {{$user->marital_status}}</span> <br>
                                <span class="card-text color-vipmm2"><strong>Profession</strong>: {{$user->profession}}</span> <br>
                                <span class="card-text color-vipmm2"><strong>Country</strong>: {{$user->country}}</span>

                                <a href="{{route('user.profile', $user->id)}}"
                                    class="btn btn-light btn-modern color-vipmm font-weight-bold">View Profile</a>
                            </div>
                        </div> --}}
                    </div>

                    <!-- <div class="card border-radius-1 bg-color-light border-0 box-shadow-1 mb-3"
                        style="border-radius: 10px;">
                        <a href="{{route('user.profile', $user->id)}}">
                            <div class="card-body">

                                <div class="profile-image-outer-container">
                                    <div class="bg-color-vipmm text-center"
                                        style="width: 90px; height:90px; border-radius: 50%;">

                                        @if($user->profile_img)

                                        <img src="{{asset('storage/profile/'. $user->profile_img)}}"
                                            style="width:80px; height: 80px; border: 5px solid #fff; border-radius: 50%;"
                                            class="img-fluid mt-1">
                                        @else

                                        <img src="{{asset('img/vip-user.png')}}"
                                            style="width:80px; height: 80px; border: 5px solid #fff; border-radius: 50%;"
                                            class="img-fluid mt-1">
                                        @endif



                                    </div>
                                </div>


                                <h4 class="card-title mb-1 text-4 font-weight-bold"><a href="">{{$user->name}}</a></h4>

                                <span class="card-text color-vipmm2"><strong>DOB</strong>: {{$user->age()}} Years</span>
                                <span class="card-text color-vipmm2"><strong>Marital Status</strong>:
                                    {{$user->marital_status}}</span>
                                <span class="card-text color-vipmm2"><strong>Profession</strong>: {{$user->profession}}</span>
                                <span class="card-text color-vipmm2"><strong>Country</strong>: {{$user->country}}</span>
                            </div>
                        </a>
                    </div> -->

                </div>
                @endforeach


            </div>




            <div class="row my-3">
                <div class="col-md-12 bg-white">
                    <h4 class="color-vipmm2">Visitors</h4>
                </div>
                @php
                $me=auth()->user();
                @endphp
                @foreach($me->visitors()->paginate(6); as $user)

                <div class="col-md-6 my-1">
                    <div class="card py-2" style="">
                       <div class="row">
                           <div class="col-5">
                            @if($user->profile_img)

                            <img src="{{asset('storage/profile/'. $user->profile_img)}}"
                                style="width:100%; height: 100%; border: 5px solid #fff; "
                                class="img-fluid mt-1">
                            @else

                            <img src="{{asset('img/vip-user.png')}}"
                                style="width:100%; height: 100%; border: 5px solid #fff;"
                                class="img-fluid mt-1">
                            @endif
                           </div>

                           <div class="col-7">
                            <h4 class="font-weight-bold text-dark text-4">{{$user->name}}</h4>
                            <small>{{$user->age()}}years, {{$user->gender}}, {{$user->height}}, {{$user->profession}}, {{$user->mother_tongue}}, {{$user->present_district}}, {{$user->profession}}</small> <br>


                            <div class="grid-card-contact py-2">
                                <div>
                                    <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href=""> <i class="icon-call-out icons"></i> </a> <br>
                                    <span style="white-space:nowrap; font-size:9px">Add to contact</span>
                                </div>
                                <div>
                                    <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href=""> <i class="icon-envelope-open icons"></i></a> <br>
                                    <span style="white-space:nowrap; font-size:9px">Message</span>
                                </div>
                                <div>
                                    <a class="card-text py-2 " href="{{route('user.profile', $user->id)}}">More...</a></div>
                                </div>
                           </div>
                       </div>

                    </div>
                </div>
                {{-- <div class="col-md-12 col-lg-6 mb-5 mb-lg-0 appear-animation pb-2"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">

                    <div class="card text-center" style="border-radius: 10px;">

                        <div class="p-5" style="border-radius: 10px;">
                            <div class="flip-content my-4" style="border-radius: 10px;">
                                <strong
                                    class="font-weight-extra-bold color-vipmm line-height-1 text-13 mb-3 d-inline-block">
                                    <div class="profile-image-outer-container">
                                        <div class="bg-color-vipmm text-center"
                                            style="width: 90px; height:90px; border-radius: 50%;">

                                            @if($user->profile_img)

                                            <img src="{{asset('storage/profile/'. $user->profile_img)}}"
                                                style="width:80px; height: 80px; border: 5px solid #fff; border-radius: 50%;"
                                                class="img-fluid mt-1">
                                            @else

                                            <img src="{{asset('img/vip-user.png')}}"
                                                style="width:80px; height: 80px; border: 5px solid #fff; border-radius: 50%;"
                                                class="img-fluid mt-1">
                                            @endif



                                        </div>
                                    </div>
                                </strong>
                                <h4 class="font-weight-bold color-vipmm text-4">{{$user->name}}</h4>
                                <p>Profession: {{$user->profession}}</p>
                            </div>
                        </div>

                        <div class="flip-back d-flex align-items-center p-5"
                            style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center; border-radius: 10px;">
                            <div class="flip-content my-4" style="border-radius: 10px;">
                                <h4 class="font-weight-bold color-vipmm">{{$user->name}}</h4>
                                <span class="card-text color-vipmm2"><strong>DOB</strong>: {{$user->age()}} Years</span> <br>
                                <span class="card-text color-vipmm2"><strong>Marital Status</strong>:
                                    {{$user->marital_status}}</span> <br>
                                <span class="card-text color-vipmm2"><strong>Profession</strong>: {{$user->profession}}</span> <br>
                                <span class="card-text color-vipmm2"><strong>Country</strong>: {{$user->country}}</span>

                                <a href="{{route('user.profile', $user->id)}}"
                                    class="btn btn-light btn-modern color-vipmm font-weight-bold">View Profile</a>
                            </div>
                        </div>
                    </div>




                </div> --}}
                @endforeach


            </div>






            <div class="row my-3">
                <div class="col-md-12 bg-white">
                    <h4 class="color-vipmm2">My Favourites</h4>
                </div>
                @php
                $me=auth()->user();
                @endphp
                @foreach($me->favs()->paginate(4); as $user)

                <div class="col-md-6 my-1">
                    <div class="card py-2" style="">
                       <div class="row">
                           <div class="col-5">
                            @if($user->profile_img)

                            <img src="{{asset('storage/profile/'. $user->profile_img)}}"
                                style="width:100%; height: 100%; border: 5px solid #fff; "
                                class="img-fluid mt-1">
                            @else

                            <img src="{{asset('img/vip-user.png')}}"
                                style="width:100%; height: 100%; border: 5px solid #fff;"
                                class="img-fluid mt-1">
                            @endif
                           </div>

                           <div class="col-7">
                            <h4 class="font-weight-bold text-4">{{$user->name}}</h4>
                            <small>{{$user->age()}}years, {{$user->gender}}, {{$user->height}}, {{$user->profession}}, {{$user->mother_tongue}}, {{$user->present_district}}, {{$user->profession}}</small> <br>


                            <div class="grid-card-contact py-2">
                                <div>
                                    <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href=""> <i class="icon-call-out icons"></i> </a> <br>
                                    <span style="white-space:nowrap; font-size:9px">Add to contact</span>
                                </div>
                                <div>
                                    <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href=""> <i class="icon-envelope-open icons"></i></a> <br>
                                    <span style="white-space:nowrap; font-size:9px">Message</span>
                                </div>
                                <div>
                                    <a class="card-text py-2 " href="{{route('user.profile', $user->id)}}">More...</a></div>
                                </div>
                           </div>
                       </div>

                    </div>
                </div>
                {{-- <div class="col-md-12 col-lg-6 mb-5 mb-lg-0 appear-animation pb-2"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">

                    <div class="card flip-card text-center" style="border-radius: 10px;">

                        <div class="flip-front p-5" style="border-radius: 10px;">
                            <div class="flip-content my-4" style="border-radius: 10px;">
                                <strong
                                    class="font-weight-extra-bold color-vipmm line-height-1 text-13 mb-3 d-inline-block">
                                    <div class="profile-image-outer-container">
                                        <div class="bg-color-vipmm text-center"
                                            style="width: 90px; height:90px; border-radius: 50%;">

                                            @if($user->profile_img)

                                            <img src="{{asset('storage/profile/'. $user->profile_img)}}"
                                                style="width:80px; height: 80px; border: 5px solid #fff; border-radius: 50%;"
                                                class="img-fluid mt-1">
                                            @else

                                            <img src="{{asset('img/vip-user.png')}}"
                                                style="width:80px; height: 80px; border: 5px solid #fff; border-radius: 50%;"
                                                class="img-fluid mt-1">
                                            @endif



                                        </div>
                                    </div>
                                </strong>
                                <h4 class="font-weight-bold color-vipmm text-4">{{$user->name}}</h4>
                                <p>Profession: {{$user->profession}}</p>
                            </div>
                        </div>

                        <div class="flip-back d-flex align-items-center p-5"
                            style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center; border-radius: 10px;">
                            <div class="flip-content my-4" style="border-radius: 10px;">
                                <h4 class="font-weight-bold color-vipmm">{{$user->name}}</h4>
                                <span class="card-text color-vipmm2"><strong>DOB</strong>: {{$user->age()}} Years</span> <br>
                                <span class="card-text color-vipmm2"><strong>Marital Status</strong>:
                                    {{$user->marital_status}}</span> <br>
                                <span class="card-text color-vipmm2"><strong>Profession</strong>: {{$user->profession}}</span> <br>
                                <span class="card-text color-vipmm2"><strong>Country</strong>: {{$user->country}}</span>

                                <a href="{{route('user.profile', $user->id)}}"
                                    class="btn btn-light btn-modern color-vipmm font-weight-bold">View Profile</a>
                            </div>
                        </div>
                    </div>




                </div> --}}
                @endforeach


            </div>

        </div>

        {{-- <div class="col-md-2">
            <h4 class="color-vipmm2">Recent</h4>
            <div class="row">
                @foreach($recent as $user)
                <div class="col-12 mb-3 text-center">
                    <div class="profile-image-outer-container">
                        <div class="bg-color-vipmm text-center" style="width: 90px; height:90px; ">

                            <a href="{{route('user.profile', $user->id)}}">
                                @if($user->profile_img)
                                <img src="{{asset('storage/profile/'. $user->profile_img)}}"
                                    style="width:80px; height: 80px; border: 5px solid #fff; " class="img-fluid mt-1">
                                @else

                                <img src="{{asset('img/vip-user.png')}}"
                                    style="width:80px; height: 80px; border: 5px solid #fff; " class="img-fluid mt-1">
                                @endif
                            </a>




                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div> --}}
    </div>
</div>
<br>
@endsection
