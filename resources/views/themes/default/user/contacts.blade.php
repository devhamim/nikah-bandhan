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

<div class="container py-2 " >
    @include('alerts.alerts')
    <div class="row">
        <div class="col-lg-3">
            @include('user.parts.leftsidebar')
        </div>
        <div class="col-md-9 bg-white">

            <div class="row mx-5">
                <div class="col-md-12">
                    <h4> My Contacts</h4>
                </div>

                @foreach($users as $user)
                <div class="row align-items-center my-2 mr-3 border border-danger py-3" style="width:100%; ">
                    <div class="col-lg-4">

                        <div class="pr-3 pr-sm-5 pb-3 pb-sm-0 border-right-light text-center">
                            @if($user->profile_img)

                            <img src="{{asset('storage/users/pp/'. $user->profile_img)}}"

                                class="img-fluid mt-1" style="max-width:160px; height:100px;{{$user->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                            @else

                            <img src="{{asset('img/vip-user.png')}}"

                                class="img-fluid mt-1" style="max-width:160px; height:100px">
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-4 text-center">
                        <a href="{{route('user.profile', $user->id)}}"> <strong style="color: black"> {{$user->name}}</strong></a>
                          <br>
                           {{$user->mobile}} <br>
                           {{$user->email}}

                    </div>
                    <div class="col-lg-4">

                        <div class="pr-3 pr-sm-5 pb-3 pb-sm-0 border-left-light ">

                                @if (!Auth::user()->isBlockedByMe($user))

                                        @if (auth()->user()->isMyFavourite($user))

                                                <a
                                                    href="{{ route('user.removeFavourite', $user) }}"><i
                                                        class="icon-heart icons btn btn-danger" style="margin:none"></i>
                                                    Remove
                                                    Favourite</a> <br>


                                        @else

                                                <a
                                                    href="{{ route('user.removeFavourite', $user) }}"><i
                                                        class="icon-heart icons btn btn-danger"></i>
                                                    Mark
                                                    Favourite</a> <br>

                                        @endif


                                        @if ($user->isPending())
                                            <button data-toggle="modal" data-target="#largeModal{{$user->id}}"
                                                    class="bg-white"
                                                    style="border: none; margin:0px; padding:0px;"><i
                                                        class="fas fa-check-circle btn btn-danger"></i>
                                                    Accept
                                                    Proposal</button> <br>

                                            {{-- <li><a href="{{route('user.acceptProposal',$user->pendingOther()->id)}}"><i class="fas fa-check-circle btn btn-danger"></i> Accept Proposal</a></li> --}}
                                        @elseif($user->isMyPending())
                                            {{-- <li><a  href="{{route('user.cancelProposal',$user->pendingMy()->id)}}"><i class="far fa-window-close btn btn-danger"></i> Cancel Proposal</a></li> --}}
                                            <button data-toggle="modal" data-target="#largeModal{{$user->id}}"
                                                    class="bg-white"
                                                    style="border: none; margin:0px; padding:0px;"><i
                                                        class="far fa-window-close btn btn-danger"></i>
                                                    Cancel
                                                    Proposal</button> <br>

                                        @elseif($user->isConnected())

                                                <a
                                                    href="{{ route('user.messageDashboard', $user->id) }}">
                                                    <i class="icon-envelope icons btn btn-danger"></i>
                                                    Send
                                                    Message </a> <br>

                                        @else

                                           <button data-toggle="modal" data-target="#largeModal{{$user->id}}"
                                                    class="bg-white"
                                                    style="border: none; margin:0px; padding:0px;"><i
                                                        class="icon-cursor icons btn btn-danger"></i>
                                                    Send
                                                    Proposal</button> <br>
                                        @endif
                                    @endif
                                    @if (Auth::user()->isBlockedByMe($user))


                                            <a href="{{ route('user.blockThisUser', $user) }}">
                                                <i class="icon-close icons btn btn-danger"></i> Unblock
                                                {{ $user->himOrHer() }} </a> <br>



                                    @else

                                            <a href="{{ route('user.blockThisUser', $user) }}" style="margin: 0">
                                                <i class="icon-close icons btn btn-danger"></i> Block
                                                {{ $user->himOrHer() }} </a> <br>



                                    @endif




                        </div>

                    </div>
                </div>



                {{-- *****************************************Modal***************************************** --}}

                <div class="modal fade" id="largeModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    @if ($user->isMyPending())
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Send proposal to
                                <strong>{{ $user->name }}</strong>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-5 text-center">
                                    @if (auth()->user()->profile_img)
                                        <img src="{{ asset('storage/profile/' . auth()->user()->profile_img) }}" alt=""
                                            class="img-fluid text-center" style="height: 200px; border:1px solid gray; {{auth()->user()->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                                    @else
                                        <img src="{{ asset('img/vip-user.png') }}" alt="" class="img-fluid text-center"
                                            style="height: 200px; border:1px solid gray;">
                                    @endif
                                </div>

                                <div class="col-md-2 d-flex align-items-center justify-content-center py-3">
                                    <i class="icon-arrow-right icons " style="color:red"></i><i
                                        class="icon-arrow-right icons " style="color:red"></i><i
                                        class="icon-arrow-right icons " style="color:red"></i>
                                </div>

                                <div class="col-md-5 text-center">

                                    @if ($user->profile_img)
                                        <img src="{{ asset('storage/profile/' . $user->profile_img) }}" alt=""
                                            class="img-fluid text-center" style="height: 200px; border:1px solid gray; {{$user->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                                    @else
                                        <img src="{{ asset('img/vip-user.png') }}" alt="" class="img-fluid text-center"
                                            style="height: 200px; border:1px solid gray;">
                                    @endif

                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12 text-center">
                                    @if ($user->pendingMy())
                                        {{ $user->pendingMy()->message }}
                                    @endif
                                </div>
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('user.cancelProposal', $user->pendingMy()->id) }}"><i
                                            class="far fa-window-close btn btn-danger"></i> Cancel Proposal</a>

                                </div>
                            </div>


                        </div>

                    @elseif($user->isPending())

                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Proposal From<strong>
                                    {{ $user->name }}</strong></h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-5 text-center">
                                    @if (auth()->user()->profile_img)
                                        <img src="{{ asset('storage/profile/' . auth()->user()->profile_img) }}" alt=""
                                            class="img-fluid text-center" style="height: 200px; border:1px solid gray; {{auth()->user()->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                                    @else
                                        <img src="{{ asset('img/vip-user.png') }}" alt="" class="img-fluid text-center"
                                            style="height: 200px; border:1px solid gray; ">
                                    @endif
                                </div>

                                <div class="col-md-2 d-flex align-items-center justify-content-center py-3">
                                    <i class="icon-arrow-left icons " style="color:red"></i><i class="icon-arrow-left icons "
                                        style="color:red"></i><i class="icon-arrow-left icons " style="color:red"></i>
                                </div>

                                <div class="col-md-5 text-center">

                                    @if ($user->profile_img)
                                        <img src="{{ asset('storage/profile/' . $user->profile_img) }}" alt=""
                                            class="img-fluid text-center" style="height: 200px; border:1px solid gray; {{$user->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                                    @else
                                        <img src="{{ asset('img/vip-user.png') }}" alt="" class="img-fluid text-center"
                                            style="height: 200px; border:1px solid gray;">
                                    @endif

                                </div>
                            </div>

                            <div class="row pt-3">

                                <div class="col-md-12 text-center">

                                    {{ $user->pendingOther()->message }}

                                </div>
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('user.acceptProposal', $user->pendingOther()->id) }}"><i
                                            class="fas fa-check-circle btn btn-success"></i> </a>
                                    <a href="{{ route('user.cancelProposal', $user->pendingOther()->id) }}"><i
                                            class="far fa-window-close btn btn-danger"></i> </a>

                                </div>

                            </div>


                        </div>


                    @else
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Send proposal to
                                <strong>{{ $user->name }}</strong>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-5 text-center">
                                    @if (auth()->user()->profile_img)
                                        <img src="{{ asset('storage/profile/' . auth()->user()->profile_img) }}" alt=""
                                            class="img-fluid text-center" style="height: 200px; border:1px solid gray; {{ auth()->user()->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                                    @else
                                        <img src="{{ asset('img/vip-user.png') }}" alt="" class="img-fluid text-center"
                                            style="height: 200px; border:1px solid gray;">
                                    @endif
                                </div>

                                <div class="col-md-2 d-flex align-items-center justify-content-center py-3">
                                    <i class="icon-arrow-right icons " style="color:red"></i><i
                                        class="icon-arrow-right icons  " style="color:red"></i><i
                                        class="icon-arrow-right icons  " style="color:red"></i>
                                </div>

                                <div class="col-md-5 text-center">

                                    @if ($user->profile_img)
                                        <img src="{{ asset('storage/profile/' . $user->profile_img) }}" alt=""
                                            class="img-fluid text-center" style="height: 200px; border:1px solid gray;  {{ $user->profile_public == 1 ? " ":"filter: blur(5px); " }}">
                                    @else
                                        <img src="{{ asset('img/vip-user.png') }}" alt="" class="img-fluid text-center"
                                            style="height: 200px; border:1px solid gray;">
                                    @endif

                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <form class="form-send-proposal"
                                        action="{{ route('user.sendProposalPost', $user) }}" method="post">


                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="comment" id="exampleRadios1"
                                                    value="I like your profile, let me know your interest" checked>
                                                I like your profile, let me know your interest
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="comment" id="exampleRadios2"
                                                    value=" I am serious about your profile. Please respond at the
                                                 earliest">
                                                I am serious about your profile. Please respond at the
                                                earliest
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>

                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="comment" id="exampleRadios2"
                                                    value="We like your profile and would like to communicate
                                                 your parents/guardian.">
                                                We like your profile and would like to communicate
                                                your parents/guardian.
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>

                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="comment" id="exampleRadios3"
                                                    value="I have found your profile to be a good match. Please
                                                 contact for proceeding.">
                                                I have found your profile to be a good match. Please
                                                contact for proceeding.
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>

                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="comment" id="exampleRadios3"
                                                    value="">
                                                None(send interest without a message)
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>


                                        {{ csrf_field() }}



                                        <div class="text-right">
                                            <button type="submit" class="bg-white text-right"
                                                style="border: none; margin:0px; padding:0px;"><i
                                                    class="icon-cursor icons btn btn-danger"></i> Send Proposal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

{{-- *****************************************************************end modal***************************************************************** --}}


                @endforeach


            </div>

        </div>

    </div>
</div>
<br>
@endsection
