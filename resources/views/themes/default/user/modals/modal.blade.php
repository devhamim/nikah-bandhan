{{-- ***************************************Proposal relate modal*************************************** --}}
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        @if ($profile->isMyPending())
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Send proposal to
                    <strong>{{ $profile->name }}</strong>
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-5 text-center">
                        @if (auth()->user()->profile_img)
                            <img src="{{ asset('storage/profile/' . auth()->user()->profile_img) }}" alt=""
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

                        @if ($profile->profile_img)
                            <img src="{{ asset('storage/profile/' . $profile->profile_img) }}" alt=""
                                class="img-fluid text-center" style="height: 200px; border:1px solid gray;">
                        @else
                            <img src="{{ asset('img/vip-user.png') }}" alt="" class="img-fluid text-center"
                                style="height: 200px; border:1px solid gray;">
                        @endif

                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-md-12 text-center">
                        @if ($profile->pendingMy())
                            {{ $profile->pendingMy()->message }}
                        @endif
                    </div>
                    <div class="col-md-12 text-right">
                        <a href="{{ route('user.cancelProposal', $profile->pendingMy()->id) }}"><i
                                class="far fa-window-close btn btn-danger"></i> Cancel Proposal</a>

                    </div>
                </div>


            </div>

        @elseif($profile->isPending())

            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Proposal From<strong>
                        {{ $profile->name }}</strong></h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-5 text-center">
                        @if (auth()->user()->profile_img)
                            <img src="{{ asset('storage/profile/' . auth()->user()->profile_img) }}" alt=""
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

                        @if ($profile->profile_img)
                            <img src="{{ asset('storage/profile/' . $profile->profile_img) }}" alt=""
                                class="img-fluid text-center" style="height: 200px; border:1px solid gray;">
                        @else
                            <img src="{{ asset('img/vip-user.png') }}" alt="" class="img-fluid text-center"
                                style="height: 200px; border:1px solid gray;">
                        @endif

                    </div>
                </div>

                <div class="row pt-3">

                    <div class="col-md-12 text-center">

                        {{ $profile->pendingOther()->message }}

                    </div>
                    <div class="col-md-12 text-right">
                        <a href="{{ route('user.acceptProposal', $profile->pendingOther()->id) }}"><i
                                class="fas fa-check-circle btn btn-success"></i> </a>
                        <a href="{{ route('user.cancelProposal', $profile->pendingOther()->id) }}"><i
                                class="far fa-window-close btn btn-danger"></i> </a>

                    </div>

                </div>


            </div>


        @else
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Send proposal to
                    <strong>{{ $profile->name }}</strong>
                </h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-5 text-center">
                        @if (auth()->user()->profile_img)
                            <img src="{{ asset('storage/profile/' . auth()->user()->profile_img) }}" alt=""
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

                        @if ($profile->profile_img)
                            <img src="{{ asset('storage/profile/' . $profile->profile_img) }}" alt=""
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
                            action="{{ route('user.sendProposalPost', $profile) }}" method="post">


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

{{-- *****************************************end proposal relate modals***************************************** --}}


{{-- *************************************************start report modal************************************************* --}}
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Report about <span class="badge badge-default w3-large"> {{ $profile->username }} </span></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">



<form action="{{ route('user.reportPost', $profile) }}" method="post">

<div class="form-group {{ $errors->has('comment') ? ' has-danger' : '' }}">
<label for="comment">Why Do you want to report? </label>
<textarea class="form-control w3-border w3-padding {{ $errors->has('comment') ? ' w3-border-red' : '' }}" name="comment" rows="3" placeholder="Write details about {{ $profile->username }}" id="comment">{{ old('comment') }}</textarea>
@if ($errors->has('comment'))
<span class="help-block">
    <strong>{{ $errors->first('comment') }}</strong>
</span>
@endif
</div>

{{ csrf_field() }}



<button type="submit" class="btn btn-primary">Submit</button>
</form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- **********************************************************end report modal********************************************************** --}}
{{-- ***********************************************************Package Modal*********************************************************** --}}
<div class="modal fade" id="packageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    {{-- <i class="material-icons">clear</i> --}}
                </button>
            </div>
            <div class="modal-body" style="background-color: #f9ea8f;
            background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">

           <div class="row">
               <div class="col-md-12 text-center">
                @if ($profile->profile_img)
                <img src="{{asset('storage/users/pp/' .$profile->profile_img)}}" alt=""
                    class="img-fluid" style="border:3px solid gray max-width: 120px">
                @else
                <img src="{{ asset('img/vip-user.png') }}" alt=""
                    style="border:3px solid gray; max-width: 120px" class="img-fluid">
                @endif
               </div>

               <div class="col-md-12 d-flex justify-content-center my-1">


                                <p class="text-center">
                                    <strong>Email: xxxxx@gmail.com</strong> <br>
                                <strong>Mobile: 013xxxxxxx</strong>
                                </p>


               </div>
               <div class="col-md-12 d-flex justify-content-center">


                <h4><a class="btn btn-danger" href="{{url('/packages')}}">Upgrade Your Profile</a> </h4>


</div>


           </div>



            </div>
        </div>
    </div>
</div>
