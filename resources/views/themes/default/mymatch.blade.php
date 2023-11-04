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
<div class="container py-4 bg-white" >
    <div class="row">
        <div class="col-lg-3">
            @include('user.parts.leftsidebar')
        </div>
        <div class="col-md-9">

            <div class="row">
                <div class="col-md-12">
                    <h4 class="color-vipmm2">Matches</h4>
                </div>
                @php
                $me=auth()->user();
                @endphp
                @foreach($me->searchPreferenceUsers(1000) as $user)

                <div class="col-md-6 my-1">
                    <div class="card py-2" style="">
                       <div class="row">
                           <div class="col-5">
                            @if($user->profile_img)

                            <img src="{{asset('storage/users/pp/' .$user->profile_img)}}"
                                style="width:100%; height: 100%; border: 5px solid #fff; "
                                class="img-fluid mt-1">
                            @else

                            <img src="{{asset('img/vip-user.png')}}"
                                style="width:100%; height: 100%; border: 5px solid #fff;"
                                class="img-fluid mt-1">
                            @endif
                           </div>

                           <div class="col-7">
                            <h4 class="font-weight-bold text-4">{{$me->isValidate() ? $user->name : $user->username}}</h4>
                            <small>{{$user->age()}}years, {{$user->gender}}, {{$user->height}}, {{$user->profession}}, {{$user->mother_tongue}}, {{$user->present_district}}, {{$user->profession}}</small> <br>


                            <div class="grid-card-contact py-2">
                                <div>
                                    @if (auth()->user()->isMyFavourite($user))

                                    <a class="btn btn-rounded card-text py-2" style="border: 1px solid red" href="{{$me->isValidate() ? route('user.removeFavourite', $user)  : url('/packages')}}"> <i class="icon-heart icons text-danger font-weight-bold"></i> </a> <br>
                                    <span style="white-space:nowrap; font-size:9px"> Unfavourite</span>

                                    @else
                                    <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href="{{$me->isValidate() ? route('user.removeFavourite', $user)  : url('/packages')}}"> <i class="icon-heart icons"></i> </a> <br>
                                    <span style="white-space:nowrap; font-size:9px">Favourite</span>
                                    @endif

                                </div>
                                <div>
                                    @if ($user->isPending())


                                        <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href="{{$me->isValidate() ? ""  : url('/packages')}}" data-toggle={{$me->isValidate() ? "modal" : ""}} data-target="#fav_largeModal{{$user->id}}"> <i class="fas fa-check-circle"></i></a> <br>
                                        <span style="white-space:nowrap; font-size:9px">Accept
                                            Proposal</span>


                                    @elseif($user->isMyPending())



                                        <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href="{{$me->isValidate() ? ""  : url('/packages')}}" data-toggle={{$me->isValidate() ? "modal" : ""}} data-target="#fav_largeModal{{$user->id}}"> <i class="far fa-window-close"></i></a> <br>
                                        <span style="white-space:nowrap; font-size:9px">Cancel
                                            Proposal</span>


                                    @elseif($user->isConnected())



                                    <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href="{{$me->isValidate() ? route('user.messageDashboard', $user->id)  : url('/packages')}}" > <img src="{{asset('icon/message.svg')}} " class="filter-green" alt="" width="15" style="color:red"></a> <br>
                                    <span style="white-space:nowrap; font-size:9px">Chat
                                     </span>

                                    @else
                                    <a class="btn btn-rounded card-text py-2 " style="border: 1px solid gray" href="{{$me->isValidate() ? ""  : url('/packages')}}" data-toggle={{$me->isValidate() ? "modal" : ""}} data-target="#fav_largeModal{{$user->id}}"> <i class="icon-cursor icons"></i></a> <br>
                                    <span style="white-space:nowrap; font-size:9px"> Send
                                        Proposal</span>

                                    @endif
                                </div>
                                <div>
                                    <a class="card-text py-2 " href="{{route('user.profile', $user->id)}}">More...</a></div>
                                </div>
                           </div>
                       </div>

                    </div>
                </div>





                <div class="modal fade" id="fav_largeModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
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
                                            <img src="{{ asset('storage/users/pp/' . auth()->user()->profile_img) }}" alt=""
                                                class="img-fluid text-center" style="height: 200px; border:1px solid gray;">
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
                                            <img src="{{ asset('storage/users/pp/' . $user->profile_img) }}" alt=""
                                                class="img-fluid text-center" style="height: 200px; border:1px solid gray;">
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
                                            <img src="{{ asset('storage/users/pp/' . auth()->user()->profile_img) }}" alt=""
                                                class="img-fluid text-center" style="height: 200px; border:1px solid gray;">
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
                                            <img src="{{ asset('storage/users/pp/' . $user->profile_img) }}" alt=""
                                                class="img-fluid text-center" style="height: 200px; border:1px solid gray;">
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
                                            <img src="{{ asset('storage/users/pp/' . auth()->user()->profile_img) }}" alt=""
                                                class="img-fluid text-center" style="height: 200px; border:1px solid gray;">
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
                                            <img src="{{ asset('storage/users/pp/' . $user->profile_img) }}" alt=""
                                                class="img-fluid text-center" style="height: 200px; border:1px solid gray;">
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

                @endforeach


            </div>


        </div>
    </div>
</div>
<br>
@endsection
