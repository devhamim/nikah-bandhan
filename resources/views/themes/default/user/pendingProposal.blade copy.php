@extends('user.master.usermaster')
@php
$me=auth()->user();
@endphp
@push('css')
<style>
    .profile-image-outer-container .profile-image-inner-container {
        border-radius: 50% !important;
        width: 80px !important;
        height: 80px;
        padding: 5px;
    }
</style>
@endpush
@section('content')
<div class="container py-4" style="background-color: #DADADB;">
    <div class="row">
        <div class="col-lg-3">
            @include('user.parts.leftsidebar')
        </div>
        <div class="col-md-7">

            <div class="row">
                <div class="col-md-12">
                    <h4> @if(isset($approved)) My Connections @else Pending Proposals @endif</h4>
                </div>
                @if(isset($pendings))
                @php
                $approved=$pendings;
                @endphp
                @endif
                @foreach($approved as $user)
                <div class="col-md-12 col-lg-6 mb-5 mb-lg-0 appear-animation pb-2"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">

                    <div class="card flip-card text-center" style="border-radius: 10px;">
                        <div class="flip-front p-5" style="border-radius: 10px;">
                            <div class="flip-content my-4" style="border-radius: 10px;">
                                <strong
                                    class="font-weight-extra-bold text-color-dark line-height-1 text-13 mb-3 d-inline-block">
                                    <div class="profile-image-outer-container">
                                        <div class="bg-color-primary text-center"
                                            style="width: 90px; height:90px; border-radius: 50%;">

                                            @if($user->userFrom->profile_img)

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
                                <h4 class="font-weight-bold text-color-primary text-4">{{$user->userFrom->name}}</h4>
                                <p>Profession: {{$user->userFrom->profession}}</p>
                            </div>
                        </div>
                        <div class="flip-back d-flex align-items-center p-5"
                            style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center; border-radius: 10px;">
                            <div class="flip-content my-4" style="border-radius: 10px;">
                                <h4 class="font-weight-bold text-color-dark">{{$user->userFrom->name}}</h4>
                                <span class="card-text"><strong>DOB</strong>: {{$user->userFrom->dob}}</span> <br>
                                <span class="card-text"><strong>Marital Status</strong>:
                                    {{$user->userFrom->marital_status}}</span> <br>
                                <span class="card-text"><strong>Profession</strong>:
                                    {{$user->userFrom->profession}}</span> <br>
                                <span class="card-text"><strong>Country</strong>: {{$user->userFrom->country}}</span>
                                @if($approved)
                                <a href="{{route('user.profile', $user->userFrom->id)}}"
                                    class="btn btn-light btn-modern text-color-dark font-weight-bold">View Profile</a>
                                @else
                                <a href="{{ route('user.cancelProposal', $user) }}"
                                    class="btn btn-light btn-modern text-color-dark font-weight-bold">Cancel</a>
                                <a href="{{ route('user.acceptProposal', $user) }}"
                                    class="btn btn-light btn-modern text-color-dark font-weight-bold">Accept</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card border-radius-1 bg-color-light border-0 box-shadow-1 mb-3"
                        style="border-radius: 10px;">
                        <a href="{{route('user.profile', $user->id)}}">
                            <div class="card-body">

                                <div class="profile-image-outer-container">
                                    <div class="bg-color-primary text-center"
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

                                <span class="card-text"><strong>DOB</strong>: {{$user->dob}}</span>
                                <span class="card-text"><strong>Marital Status</strong>:
                                    {{$user->marital_status}}</span>
                                <span class="card-text"><strong>Profession</strong>: {{$user->profession}}</span>
                                <span class="card-text"><strong>Country</strong>: {{$user->country}}</span>
                            </div>
                        </a>
                    </div> -->

                </div>
                @endforeach


            </div>

        </div>

    </div>
</div>
@endsection
