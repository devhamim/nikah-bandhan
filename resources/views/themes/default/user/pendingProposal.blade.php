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
<div class="container py-2" >
    <div class="row">
        <div class="col-lg-3">
            @include('user.parts.leftsidebar')
        </div>
        <div class="col-md-9 bg-white">

            <div class="row mx-5">
                <div class="col-md-12">
                    <h4> @if(isset($approved)) My Connections @else Proposals @endif</h4>
                </div>
                @if(isset($pendings))
                @php
                $approved=$pendings;
                @endphp
                @endif
                @foreach($approved as $user)
                <div class="row align-items-center my-2 mr-3 border border-danger">
                    <div class="col-sm-4">

                        <div class="pr-3 pr-sm-5 pb-3 pb-sm-0 border-right-light text-center">
                            @if($user->userFrom->profile_img)

                            <img src="{{asset('storage/users/pp/'. $user->userFrom->profile_img)}}"

                                class="img-fluid mt-1" style="max-height:160px;{{  $user->userFrom->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                            @else

                            <img src="{{asset('img/user.png')}}"

                                class="img-fluid mt-1" style="max-height:160px">
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-4 text-center">
                            <h6>Proposal from <strong> <a href="{{route('user.profile', $user->userFrom->id)}}">{{$user->userFrom->name}}</a></strong> To <strong><a href="{{route('user.profile', $user->userTo->id)}}">{{$user->userTo->name}}</a> </strong></h6>
                            <span> {{$user->message}}</span> <br>
                            >>>> <br>
                            @if($user->userFrom->isPending())
                            <a href="{{route('user.acceptProposal',$user->id)}}"><i class="fas fa-check-circle btn btn-success"></i> </a>
                            <a  href="{{route('user.cancelProposal',$user->id)}}"><i class="far fa-window-close btn btn-danger"></i> </a>
                            @elseif($user->userTo->isMyPending())
                            <a  href="{{route('user.cancelProposal',$user->id)}}"><i class="far fa-window-close btn btn-danger"></i> </a>
                            @endif

                    </div>
                    <div class="col-sm-4">

                        <div class="pr-3 pr-sm-5 pb-3 pb-sm-0 border-left-light text-center">
                            @if($user->userTo->profile_img)

                            <img src="{{asset('storage/users/pp/'. $user->userTo->profile_img)}}"

                                class="img-fluid mt-1" style="max-height:160px; {{  $user->userFrom->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                            @else

                            <img src="{{asset('img/vip-user.png')}}"

                                class="img-fluid mt-1" style="max-height:160px">
                            @endif
                        </div>

                    </div>
                </div>

                @endforeach


            </div>

        </div>

    </div>
</div>
<br>
@endsection
