@extends('user.master.usermaster')
@php
use Carbon\Carbon;
$me = auth()->user();
@endphp
@push('css')
    <style>
        ul {
            list-style: none !important;
        }

        .form-group {
            margin-bottom: 0rem;
        }

        ul li {
            color: black !important;
            margin-bottom: 5px !important;
        }

    </style>
@endpush
@section('content')
    {{-- @include('alerts.alerts') --}}
    <br>
    <div class="container py-2">

        <div class="row">
            <div class="col-md-12 text-center">
                @include('alerts.alerts')
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">

                <div class="bg-white">
                    @include('user.parts.leftsidebar')
                </div>

            </div>
            <div class="col-lg-9">



                <div class="row bg-white">
                    <div class="col">
                        @if ($profile->id == auth()->user()->id)
                            <div class="overflow-hidden mb-1">
                                <h2 class="font-weight-normal text-7  mb-0"><strong class="font-weight-extra-bold">My
                                    </strong> Profile </h2>
                            </div>
                        @endif
                        <div class="row align-items-center">

                            @if (auth()->user()->id != $profile->id)
                                <div class="row my-3">

                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="col-sm-12 text-center">

                                            @if ($profile->profile_img)
                                                <img src="{{ asset('storage/profile/' . $profile->profile_img) }}" alt=""
                                                    class="img-fluid">
                                            @else
                                                <img src="{{ asset('img/vip-user.png') }}" alt=""
                                                    style="border:1px solid gray" class="img-fluid">
                                            @endif
                                            <h2 class="font-weight-normal  mb-0">{{ $profile->name }} </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            @endif

                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul>
                                                    <li>Account created by</li>
                                                    <li>Name</li>
                                                    <li>Religion</li>
                                                    <li>Marital Status</li>
                                                    <li>Height</li>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul>
                                                    <li> : {{ $profile->profile_created_by }}</li>
                                                    <li> : {{ $profile->name }}</li>
                                                    <li> : {{ $profile->religion }}</li>
                                                    <li> : {{ $profile->marital_status }}</li>

                                                    <li> : {{ $profile->height }}</li>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($profile->id != auth()->user()->id)
                                        <div class="col-md-4">
                                            @if (auth()->user()->isValidate())
                                                <ul>
                                                    <li>
                                                        <a href="#" data-toggle="modal"
                                                        data-target="#reportModal"><i
                                                                class="fas fa-exclamation-triangle btn btn-danger"></i> Report</a>
                                                    </li>
                                                    @if (!Auth::user()->isBlockedByMe($profile))
                                                        @if (Auth::user()->isMyContact($profile))
                                                        {{-- <a href="#"  class="btn btn-link no-padding btn-primary" title="Report about {{ $profile->himOrHer() }}"
                                                            data-toggle="modal"
                                                            data-target="#reportModal">
                                                        <i class="fa  fa-warning"></i> Report
                                                        </a> --}}


                                                        <li>
                                                            <a href="{{ route('user.makeContact', $profile) }}"><i
                                                                    class="icon-phone icons btn btn-danger"></i> Added to
                                                                Contact ({{ Auth::user()->contactLimit() }})</a>
                                                        </li>
                                                        @else
                                                            <li>
                                                                <a href="{{ route('user.makeContact', $profile) }}"><i
                                                                        class="icon-phone icons btn btn-danger"></i> Add to
                                                                    Contact ({{ Auth::user()->contactLimit() }})</a>
                                                            </li>
                                                            @endif
                                                            @if (auth()->user()->isMyFavourite($profile))
                                                                <li>
                                                                    <a
                                                                        href="{{ route('user.removeFavourite', $profile) }}"><i
                                                                            class="icon-heart icons btn btn-danger"></i>
                                                                        Remove
                                                                        Favourite</a>
                                                                </li>

                                                            @else
                                                                <li>
                                                                    <a
                                                                        href="{{ route('user.removeFavourite', $profile) }}"><i
                                                                            class="icon-heart icons btn btn-danger"></i>
                                                                        Mark
                                                                        Favourite</a>
                                                                </li>
                                                            @endif


                                                            @if ($profile->isPending())
                                                                <li><button data-toggle="modal" data-target="#largeModal"
                                                                        class="bg-white"
                                                                        style="border: none; margin:0px; padding:0px;"><i
                                                                            class="fas fa-check-circle btn btn-danger"></i>
                                                                        Accept
                                                                        Proposal</button></li>

                                                                {{-- <li><a href="{{route('user.acceptProposal',$profile->pendingOther()->id)}}"><i class="fas fa-check-circle btn btn-danger"></i> Accept Proposal</a></li> --}}
                                                            @elseif($profile->isMyPending())
                                                                {{-- <li><a  href="{{route('user.cancelProposal',$profile->pendingMy()->id)}}"><i class="far fa-window-close btn btn-danger"></i> Cancel Proposal</a></li> --}}
                                                                <li><button data-toggle="modal" data-target="#largeModal"
                                                                        class="bg-white"
                                                                        style="border: none; margin:0px; padding:0px;"><i
                                                                            class="far fa-window-close btn btn-danger"></i>
                                                                        Cancel
                                                                        Proposal</li></button>

                                                            @elseif($profile->isConnected())
                                                                <li>
                                                                    <a
                                                                        href="{{ route('user.messageDashboard', $profile->id) }}">
                                                                        <i class="icon-envelope icons btn btn-danger"></i>
                                                                        Send
                                                                        Message </a>
                                                                </li>
                                                            @else

                                                                <li><button data-toggle="modal" data-target="#largeModal"
                                                                        class="bg-white"
                                                                        style="border: none; margin:0px; padding:0px;"><i
                                                                            class="icon-cursor icons btn btn-danger"></i>
                                                                        Send
                                                                        Proposal</li></button>
                                                            @endif
                                                        @endif
                                                        @if (Auth::user()->isBlockedByMe($profile))

                                                            <li>
                                                                <a href="{{ route('user.blockThisUser', $profile) }}">
                                                                    <i class="icon-close icons btn btn-danger"></i> Unblock
                                                                    {{ $profile->himOrHer() }} </a>
                                                            </li>


                                                        @else
                                                            <li>
                                                                <a href="{{ route('user.blockThisUser', $profile) }}">
                                                                    <i class="icon-close icons btn btn-danger"></i> Block
                                                                    {{ $profile->himOrHer() }} </a>
                                                            </li>


                                                        @endif


                                                </ul>
                                            @endif

                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>



                    </div>
                </div>



                @hasrole('Admin')
                    <div class="row mt-2 pb-2 bg-white">
                        <div class="col-sm-12">
                            <h4>My Basic Informations & Appearance </h4>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Age</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->age() }} Years"
                                        readonly>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Marital
                                    Status</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->marital_status }}" readonly>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Gender</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->gender }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Height</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->height }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Children</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->children_have }}" readonly>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Complexion</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->skin_color }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Body
                                    Type</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->body_type }}"
                                        readonly>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Disabilities</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="country" type="text"
                                        value="{{ $profile->disability }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Blood
                                    Group</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->blood_group }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Mobile</label>
                                <div class="col-lg-9">
                                    <input class="form-control " name="mobile" type="text" value="{{ $profile->mobile }}"
                                        readonly>
                                </div>
                            </div>


                            {{-- <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Weight</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="mobile" type="text" value="{{$profile->weight}}" readonly>
                        </div>
                    </div> --}}


                        </div>


                    </div>

                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>My Community & Social Background </h4>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Community</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->userReligion ? $profile->userReligion->name  : $profile->religion}}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Caste/Social
                                    Order</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->userCaste ? $profile->userCaste->name  : $profile->caste}}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Family
                                    Value</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->family_value }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Mother
                                    Tongue</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->mother_tongue }}" readonly>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>My Cultural Background </h4>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Country
                                    of Birth</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->country }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Grew
                                    Up In</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->grewup_in }}"
                                        readonly>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Personal
                                    Values</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->personal_value }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Can
                                    Speak</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->can_speak }}"
                                        readonly>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>My Education & Career </h4>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Education</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->education_level }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">University
                                </label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->university }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Organization
                                </label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->workplace }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Major
                                    Subject
                                </label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->major_subject }}" readonly>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Designation
                                </label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->designation }}" readonly>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>My Hobbies, Interests & More</h4>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Favourite
                                    Music:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->music }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Preferred
                                    Movie
                                </label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->movie }}"
                                        readonly>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Dress
                                    Style
                                </label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->dress }}"
                                        readonly>
                                </div>
                            </div>


                        </div>


                        <div class="col-md-6">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Favourite
                                    Reads
                                </label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->book }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Favourite
                                    Cooking
                                </label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->cooking }}"
                                        readonly>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>My Lifestyle : </h4>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Religious
                                    View</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->religious_view }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Diet</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->diet }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Drink</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->drink }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Smoke</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text" value="{{ $profile->smoke }}"
                                        readonly>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>My Family Details</h4>
                        </div>


                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Family
                                    Type</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->family_type }}" readonly>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Father
                                    Prof:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->father_prof }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">No
                                    of Brothers</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->no_bro }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">No
                                    of Sisters</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->no_sis }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Family
                                    Status</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->family_status }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Mother
                                    Prof:</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->mother_prof }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">No
                                    of Married Brothers</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->no_bro_m }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">No
                                    of Married Sisters</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->no_sis_m }}"
                                        readonly>
                                </div>
                            </div>
                        </div>


                    </div>

                    @if ($profile->pertnerPreference)
                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>Partner Preferences</h4>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Looking
                                        For</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $profile->looking_for }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height
                                        Range</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->pertnerPreference->min_height }} to {{ $profile->pertnerPreference->max_height }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Religion</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->pertnerPreference->religion }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children?</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->pertnerPreference->children }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Physical
                                        Disability</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->pertnerPreference->physical_disability }}" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Age
                                        Range</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->pertnerPreference->min_age }} to {{ $profile->pertnerPreference->max_age }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Study</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->pertnerPreference->study }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profession</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->pertnerPreference->profession }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Skin
                                        Color</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->pertnerPreference->skin_color }}" readonly>
                                    </div>
                                </div>




                            </div>


                        </div>
                    @endif

                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>Contact Informaion</h4>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Time
                                    To Call</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{ $profile->call_time }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Relation</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->relation_with_contact }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Contact
                                    Person</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->contact_person }}" readonly>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>Permanent Address</h4>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Country</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->permanent_country }}" readonly>
                                </div>
                            </div>



                            @if($profile->permanent_country=="Bangladesh")

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">District</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->userParmanentDistrict ? $profile->userParmanentDistrict->name  : $profile->parmanent_district}} " readonly>
                                </div>
                            </div>
                            @endif





                        </div>

                        <div class="col-md-6">
                            @if($profile->permanent_country=="Bangladesh")

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Division</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->userParmanentDivision ? $profile->userParmanentDivision->name  : $profile->parmanent_division}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Upazilla</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->userParmanentThana ? $profile->userParmanentThana->name  : $profile->parmanent_thana}}" readonly>
                                </div>
                            </div>
                            @endif


                        </div>

                    </div>

                    <div class="row mt-2 bg-white pb-2">
                        <div class="col-sm-12">
                            <h4>Present Address</h4>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Country</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->present_country }}" readonly>
                                </div>
                            </div>
                            @if($profile->present_country=="Bangladesh")
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Division</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->userPresentDivision ? $profile->userPresentDivision->name  : $profile->present_division}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Postal
                                    Code</label>
                                <div class="col-lg-9">

                                    <input class="form-control" name="mobile" type="text"
                                        value="{{ $profile->present_po }}" readonly>
                                </div>
                            </div>
                            @endif



                        </div>

                        <div class="col-md-6">
                            @if($profile->present_country=="Bangladesh")
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">District</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->userPresentDistrict ? $profile->userPresentDistrict->name  : $profile->present_district}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Upazilla</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $profile->userPresentThana ? $profile->userPresentThana->name  : $profile->present_thana}}" readonly>
                                </div>
                            </div>
                            @endif



                        </div>




                        </div>
                    </div>
                @else
                    @if ($me->final_check == true or $me->id == $profile->id)
                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>My Basic Informations & Appearance </h4>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Age</label>
                                    <div class="col-lg-9">
                                        @if ($me->isPaidAndValidate() or $me->id === $profile->id)
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->age() }} Years" readonly>
                                        @else
                                            <span class="form-control text-center btn btn-danger"> <a
                                                    href="{{ url('/packages') }}">Upgrade Profile</a></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Marital
                                        Status</label>
                                    <div class="col-lg-9">
                                        @if ($me->isPaidAndValidate() or $me->id === $profile->id)
                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->marital_status }}" readonly>
                                        @else
                                            <span class="form-control text-center btn btn-danger"> <a
                                                    href="{{ url('/packages') }}">Upgrade Profile</a></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Gender</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->gender }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Height</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->height }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Children</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->children_have }}" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Complexion</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->skin_color }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Body
                                        Type</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->body_type }}" readonly>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Disabilities</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="country" type="text"
                                            value="{{ $profile->disability }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Blood
                                        Group</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->blood_group }}" readonly>
                                    </div>
                                </div>
                                @if ($me->isPaidAndValidate() or $me->id === $profile->id)

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Mobile</label>
                                        <div class="col-lg-9">
                                            <input class="form-control " name="mobile" type="text"
                                                value="{{ $profile->mobile }}" readonly>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Mobile</label>
                                        <div class="col-lg-9">
                                            <span class="form-control text-center btn btn-danger">
                                                {{ custom_title($profile->mobile, 4) }}XXXXXXXX (<a
                                                    href="{{ url('/packages') }}">Upgrade Profile</a>)</span>
                                        </div>
                                    </div>
                                @endif

                                {{-- <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Weight</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="mobile" type="text" value="{{$profile->weight}}" readonly>
                        </div>
                    </div> --}}


                            </div>


                        </div>

                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>My Community & Social Background </h4>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Community</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $profile->userReligion ? $profile->userReligion->name  : $profile->religion}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Caste/Social
                                        Order</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->userCaste ? $profile->userCaste->name  : $profile->caste}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Family
                                        Value</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->family_value }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Mother
                                        Tongue</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->mother_tongue }}" readonly>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>My Cultural Background </h4>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Country
                                        of Birth</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $profile->country }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Grew
                                        Up In</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $profile->grewup_in }}" readonly>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Personal
                                        Values</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->personal_value }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Can
                                        Speak</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $profile->can_speak }}" readonly>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>My Education & Career </h4>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Education</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $profile->education_level }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">University
                                    </label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->university }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Organization
                                    </label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->workplace }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Major
                                        Subject
                                    </label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->major_subject }}" readonly>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Designation
                                    </label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->designation }}" readonly>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>My Hobbies, Interests & More</h4>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Favourite
                                        Music:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text" value="{{ $profile->music }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Preferred
                                        Movie
                                    </label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->movie }}" readonly>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Dress
                                        Style
                                    </label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->dress }}" readonly>
                                    </div>
                                </div>


                            </div>


                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Favourite
                                        Reads
                                    </label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->book }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Favourite
                                        Cooking
                                    </label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->cooking }}" readonly>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>My Lifestyle : </h4>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Religious
                                        View</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $profile->religious_view }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Diet</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text" value="{{ $profile->diet }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Drink</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->drink }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Smoke</label>
                                    <div class="col-lg-9">

                                        <input class="form-control" name="mobile" type="text"
                                            value="{{ $profile->smoke }}" readonly>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>My Family Details</h4>
                            </div>
                            @if ($me->isPaidAndValidate() or $me->id === $profile->id)

                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Family
                                            Type</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->family_type }}" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Father
                                            Prof:</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->father_prof }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">No
                                            of Brothers</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->no_bro }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">No
                                            of Sisters</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->no_sis }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Family
                                            Status</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->family_status }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Mother
                                            Prof:</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->mother_prof }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">No
                                            of Married Brothers</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->no_bro_m }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">No
                                            of Married Sisters</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->no_sis_m }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row align-items-center py-5" style="border: 1px red solid">

                                            <div class="col-sm-12 text-center">

                                                <span class="badge badge-secondary text-light badge-md"><a
                                                        href="{{ url('/packages') }}">Upgrade Profile</a></span> To view
                                                contact information

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif


                        </div>

                        @if ($profile->pertnerPreference)
                            <div class="row mt-2 bg-white pb-2">
                                <div class="col-sm-12">
                                    <h4>Partner Preferences</h4>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Looking
                                            For</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->looking_for }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height
                                            Range</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->pertnerPreference->min_age }} to {{ $profile->pertnerPreference->max_age }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Religion</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->pertnerPreference->religion }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children?</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->pertnerPreference->children }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Physical
                                            Disability</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->pertnerPreference->physical_disability }}" readonly>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Age
                                            Range</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->pertnerPreference->min_age }} to {{ $profile->pertnerPreference->max_age }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Study</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->pertnerPreference->study }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profession</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->pertnerPreference->profession }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Skin
                                            Color</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->pertnerPreference->skin_color }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>Contact Informaion</h4>
                            </div>
                            @if ($me->isPaidAndValidate() or $me->id === $profile->id)
                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Time
                                            To Call</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->call_time }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Relation</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->relation_with_contact }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Contact
                                            Person</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->contact_person }}" readonly>
                                        </div>
                                    </div>

                                </div>

                            @else

                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row align-items-center py-5" style="border: 1px red solid">

                                            <div class="col-sm-12 text-center">

                                                <span class="badge badge-secondary text-light badge-md"><a
                                                        href="{{ url('/packages') }}">Upgrade Profile</a></span> To view
                                                contact information

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif


                        </div>

                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>Permanent Address</h4>
                            </div>
                            @if ($me->isPaidAndValidate() or $me->id === $profile->id)
                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Country</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->permanent_country }}" readonly>
                                        </div>
                                    </div>



                                    @if($profile->permanent_country=="Bangladesh")

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">District</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->userParmanentDistrict ? $profile->userParmanentDistrict->name  : $profile->parmanent_district}}" readonly>
                                        </div>
                                    </div>
                                    @endif





                                </div>

                                <div class="col-md-6">
                                    @if($profile->permanent_country=="Bangladesh")

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Division</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->userParmanentDivision ? $profile->userParmanentDivision->name  : $profile->parmanent_division}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Upazilla</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->userParmanentThana ? $profile->userParmanentThana->name  : $profile->parmanent_thana}}" readonly>
                                        </div>
                                    </div>
                                    @endif


                                </div>

                            @else
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row align-items-center py-5" style="border: 1px red solid">

                                            <div class="col-sm-12 text-center">

                                                <span class="badge badge-secondary text-light badge-md"><a
                                                        href="{{ url('/packages') }}">Upgrade Profile</a></span> To view
                                                parmanent address

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif


                        </div>

                        <div class="row mt-2 bg-white pb-2">
                            <div class="col-sm-12">
                                <h4>Present Address</h4>
                            </div>
                            @if ($me->isPaidAndValidate() or $me->id === $profile->id)
                                <div class="col-md-6">

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Country</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->present_country }}" readonly>
                                        </div>
                                    </div>
                                    @if($profile->present_country=="Bangladesh")
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Division</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value=" {{ $profile->userPresentDivision ? $profile->userPresentDivision->name  : $profile->present_division}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Postal
                                            Code</label>
                                        <div class="col-lg-9">

                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ $profile->present_po }}" readonly>
                                        </div>
                                    </div>
                                    @endif



                                </div>

                                <div class="col-md-6">
                                    @if($profile->present_country=="Bangladesh")
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">District</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->userPresentDistrict ? $profile->userPresentDistrict->name  : $profile->present_district}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Upazilla</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $profile->userPresentThana ? $profile->userPresentThana->name  : $profile->present_thana}}" readonly>
                                        </div>
                                    </div>
                                    @endif



                                </div>

                            @else
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row align-items-center py-5" style="border: 1px red solid">

                                            <div class="col-sm-12 text-center">

                                                <span class="badge badge-secondary text-light badge-md"><a
                                                        href="{{ url('/packages') }}">Upgrade Profile</a></span> To view
                                                present address

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif


                        </div>

                    @else
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row align-items-center py-5" style="border: 1px red solid">

                                    <div class="col-sm-12 text-center">

                                        <span class="badge badge-secondary text-light badge-md">Your information isn't approved
                                            yet. Please, wait for the confirmation.</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    @endif
                </div>

            </div>

        </div>

        <br>

        {{-- *********************************************************Modals********************************************************* --}}
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

    @endsection
