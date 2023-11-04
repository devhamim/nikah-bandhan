<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belaobela</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- aiz core css -->
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            line-height: 1.42857143;
            font-size: 13px;
            -webkit-print-color-adjust: exact !important;
            color: #333;
        }
        .container {
            max-width: 1150px;
        }
        p {
            margin-top: 0;
            margin-bottom: .6rem;
            font-size: 13px ;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 7px;
        }


        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 2px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #776e6e;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 0px;
        }

        table {

            border-collapse: collapse;
            border-spacing: 0;
        }

        td, th { border: 1px solid #776e6e; }

        @media print{
            body {
                -webkit-print-color-adjust: exact !important;
            }

            @page{
                margin-top: .2cm !important;
                margin-bottom: .2cm !important;
                margin-left: .3cm !important;
                margin-right: .3cm !important;
            }

            .noprint{
                display:none;
            }
            p {
                margin-top: 0;
                margin-bottom: .6rem;
                font-size: 13px ;
            }
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 7px;
            }


        }
        .btn-primary, .btn-soft-primary:hover, .btn-outline-primary:hover {
            background-color: #f16522;
            border-color:#f16522;
            color: #FFFFFF;
        }
        .btn-primary, .btn-soft-primary:hover, .btn-outline-primary:hover {
            background-color: #f14212;
            border-color: #f14212;
            color: #FFFFFF;
        }

    </style>
     <style>
        ul {
            list-style: none !important;
        }

        .form-group {
            margin-bottom: 0rem;
        }

        ul li {
            color: black !important;
            margin-bottom: 0px !important;
        }

        .profile-card-grid {
            display: grid;
            grid-template-columns: 50% 50%;
            /* text-align: center; */

        }

        .profile-info-grid {
            display: grid;
            grid-template-columns: 40% 60%;
            color: black;
            /* text-align: center; */
        }

    </style>
</head>
<body>
@php
use Carbon\Carbon;
$me = auth()->user();
@endphp
    <div class="container py-2">

        <div class="row">
          
            </div>
            <div class="col-lg-12">

                <div class="container">
                    <div class="row bg-white">
                        <div class="col-lg-12 ">
                            <div class="profile-card-grid">
                                <div>
                                    <h3> {{ $me->isValidate() ? $profile->name : ($me->id == $profile->id ? $profile->name : $profile->username) }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <div class="row bg-white py-3">
       
                        <div class="col-lg-3">
                        <!-- @if ($profile->profile_img)
                            <img src="{{asset('storage/users/pp/'.$profile->profile_img)}}" alt=""
                                class="img-fluid" style="border:3px solid gray">
                            @else -->

                            <img src="{{ asset('img/user.png') }}" alt="" style="border:3px solid gray"
                                class="img-fluid border border-danger">
                            <!-- @endif -->
                        </div>

                        <div class="col-lg-5">

                            <div class="profile-card-grid">
                                <div>
                                    <ul>
                                        <li style="white-space: nowrap">Account created by</li>
                                        <li style="white-space: nowrap">
                                            {{ $me->isValidate() ? 'Name' : ($me->id == $profile->id ? 'Name' : 'Username') }}
                                        </li>
                                        <li style="white-space: nowrap">Religion</li>
                                        <li style="white-space: nowrap">Age, Gender</li>
                                        <li style="white-space: nowrap">Marital Status</li>
                                        <li style="white-space: nowrap">Education</li>
                                        <li style="white-space: nowrap">Designation</li>
                                        <li style="white-space: nowrap">Height</li>
                                        <li style="white-space: nowrap">Country</li>


                                    </ul>
                                </div>
                                <div>
                                    <ul>
                                        <li style="white-space: nowrap"> : {{ $profile->profile_created_by }}</li>
                                        <li style="white-space: nowrap"> :
                                            {{ $me->isValidate() ? $profile->name : ($me->id == $profile->id ? $profile->name : $profile->username) }}
                                        </li>
                                        <li style="white-space: nowrap"> :
                                            {{ $profile->userReligion ? $profile->userReligion->name : $profile->religion }}
                                        </li>
                                        <li style="white-space: nowrap"> : {{ $profile->age() }},
                                            {{ $profile->gender }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->marital_status }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->education_level }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->designation }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->height }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->present_country }}</li>
                                    </ul>
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    @if ($me->isValidate())
                                    @else
                                        <a href="{{ url('/packages') }}" class="text-danger"> See more...</a>
                                    @endif

                                </div>
                            </div> --}}
                        </div>
                        @if ($profile->id != auth()->user()->id)
                            <div class="col-lg-4">

                                <ul>
                                    {{-- <li>
                                    <a href="#" data-toggle="modal"
                                    data-target="#reportModal"><i
                                            class="fas fa-exclamation-triangle btn btn-danger"></i> Report</a>
                                </li> --}}
                                    @if (!Auth::user()->isBlockedByMe($profile))
                                        @if (Auth::user()->isMyContact($profile))
                                            {{-- <a href="#"  class="btn btn-link no-padding btn-primary" title="Report about {{ $profile->himOrHer() }}"
                                        data-toggle="modal"
                                        data-target="#reportModal">
                                    <i class="fa  fa-warning"></i> Report
                                    </a> --}}


                                            <li>
                                                <a href="{{ $me->isValidate() ? route('user.makeContact', $profile) : '' }}"
                                                    data-toggle={{ $me->isValidate() ? '' : 'modal' }}
                                                    data-target="#packageModal"><i
                                                        class="icon-phone icons btn btn-danger btn-sm"></i> Added to
                                                    Contact ({{ Auth::user()->contactLimit() }})</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $me->isValidate() ? route('user.makeContact', $profile) : '' }}"
                                                    data-toggle={{ $me->isValidate() ? '' : 'modal' }}
                                                    data-target="#packageModal"><i
                                                        class="icon-phone icons btn btn-danger btn-sm"></i> Add to
                                                    Contact ({{ Auth::user()->contactLimit() }})</a>
                                            </li>
                                        @endif
                                        @if (auth()->user()->isMyFavourite($profile))
                                            <li>
                                                <a href="{{ $me->isValidate() ? route('user.removeFavourite', $profile) : '' }}"
                                                    data-toggle={{ $me->isValidate() ? '' : 'modal' }}
                                                    data-target="#packageModal"><i
                                                        class="icon-heart icons btn btn-danger btn-sm"></i>
                                                    Remove
                                                    Favourite</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $me->isValidate() ? route('user.removeFavourite', $profile) : '' }}"
                                                    data-toggle={{ $me->isValidate() ? '' : 'modal' }}
                                                    data-target="#packageModal"><i
                                                        class="icon-heart icons btn btn-danger btn-sm"></i>
                                                    Mark
                                                    Favourite</a>
                                            </li>
                                        @endif


                                        @if ($profile->isPending())
                                            <li><button data-toggle="modal"
                                                    data-target="#{{ $me->isValidate() ? 'largeModal' : 'packageModal' }}"
                                                    class="bg-white" style="border: none; margin:0px; padding:0px;"><i
                                                        class="fas fa-check-circle btn btn-danger btn-sm"></i>
                                                    Accept
                                                    Proposal</button></li>

                                            {{-- <li><a href="{{route('user.acceptProposal',$profile->pendingOther()->id)}}"><i class="fas fa-check-circle btn btn-danger"></i> Accept Proposal</a></li> --}}
                                        @elseif($profile->isMyPending())
                                            {{-- <li><a  href="{{route('user.cancelProposal',$profile->pendingMy()->id)}}"><i class="far fa-window-close btn btn-danger"></i> Cancel Proposal</a></li> --}}
                                            <li><button data-toggle="modal"
                                                    data-target="#{{ $me->isValidate() ? 'largeModal' : 'packageModal' }}"
                                                    class="bg-white" style="border: none; margin:0px; padding:0px;"><i
                                                        class="far fa-window-close btn btn-danger btn-sm"></i>
                                                    Cancel
                                                    Proposal</li></button>
                                        @elseif($profile->isConnected())
                                        @else
                                            <li><button data-toggle="modal"
                                                    data-target="#{{ $me->isValidate() ? 'largeModal' : 'packageModal' }}"
                                                    class="bg-white" style="border: none; margin:0px; padding:0px;"><i
                                                        class="icon-cursor icons btn btn-danger btn-sm"></i>
                                                    Send
                                                    Proposal</li></button>
                                        @endif
                                    @endif

                                    <li>
                                        <a href="{{ $me->isValidate() ? route('user.messageDashboard', $profile->id) : '' }} "
                                            data-toggle={{ $me->isValidate() ? '' : 'modal' }} data-target="#packageModal">
                                            <i class="icon-envelope icons btn btn-danger btn-sm"></i>
                                            Send
                                            Message </a>
                                    </li>
                                    @if (Auth::user()->isBlockedByMe($profile))
                                        <li>
                                            <a href="{{ route('user.blockThisUser', $profile) }}">
                                                <i class="icon-close icons btn btn-danger btn-sm"></i> Unblock
                                                {{ $profile->himOrHer() }} </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('user.blockThisUser', $profile) }}">
                                                <i class="icon-close icons btn btn-danger btn-sm"></i> Block
                                                {{ $profile->himOrHer() }} </a>
                                        </li>
                                    @endif


                                </ul>


                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>

                    {{-- @if ($profile->id != auth()->user()->id || $me->isAdmin()) --}}
                    @if (auth()->user()->isValidate() ||
    $me->isAdmin() ||
    $profile->id == $me->id)
                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> My Basic Informations & Appearance</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Age
                                            </div>
                                            <div>
                                                : {{ $profile->age() }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Marital Status
                                            </div>
                                            <div>
                                                : {{ $profile->marital_status }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Gender
                                            </div>
                                            <div>
                                                : {{ $profile->gender }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Height
                                            </div>
                                            <div>
                                                : {{ $profile->height }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Children
                                            </div>
                                            <div>
                                                : {{ $profile->children_have }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Complexion
                                            </div>
                                            <div>
                                                : {{ $profile->skin_color }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Body Type
                                            </div>
                                            <div>
                                                : {{ $profile->body_type }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Disabilities
                                            </div>
                                            <div>
                                                : {{ $profile->disability }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Blood Group
                                            </div>
                                            <div>
                                                : {{ $profile->blood_group }}
                                            </div>
                                        </div>


                                      @hasrole('Admin')
                                      <div class="profile-info-grid">
                                            <div>
                                                Mobile
                                            </div>
                                            <div>
                                                : {{ $profile->mobile }}(only admin seen)
                                            </div>
                                        </div>

                                        <div class="profile-info-grid">
                                            <div>
                                                Gmail
                                            </div>
                                            <div>
                                                : {{ $profile->email }}(only admin seen)
                                            </div>
                                        </div>
                                      @else
                                    
                                   @if(auth()->user()->checkContactUserPack($profile->id) > 0 )
                                    
                                        <div class="profile-info-grid">
                                            <div>
                                                Mobile
                                            </div>
                                            <div>
                                                : {{ $profile->mobile }}
                                            </div>
                                        </div>

                                        <div class="profile-info-grid">
                                            <div>
                                                Gmail
                                            </div>
                                            <div>
                                                : {{ $profile->email }}
                                            </div>
                                        </div>
                                        @endif
                                 @endif
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> My Community & Social Background</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Community
                                            </div>
                                            <div>
                                                :
                                                {{ $profile->userReligion ? $profile->userReligion->name : $profile->religion }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Caste/Social
                                                Order
                                            </div>
                                            <div>
                                                : {{ $profile->userCaste ? $profile->userCaste->name : $profile->caste }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Family Value
                                            </div>
                                            <div>
                                                : {{ $profile->family_value }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Mother Tongue
                                            </div>
                                            <div>
                                                : {{ $profile->mother_tongue }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> My Cultural Background</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Country of Birth
                                            </div>
                                            <div>
                                                : {{ $profile->country }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Grew Up In
                                            </div>
                                            <div>
                                                : {{ $profile->grewup_in }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Personal Values
                                            </div>
                                            <div>
                                                : {{ $profile->personal_value }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Can Speak
                                            </div>
                                            <div>
                                                : {{ $profile->can_speak }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> My Education & Career</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Education
                                            </div>
                                            <div>
                                                : {{ $profile->education_level }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                University
                                            </div>
                                            <div>
                                                : {{ $profile->university }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Organization
                                            </div>
                                            <div>
                                                : {{ $profile->workplace }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Major Subject
                                            </div>
                                            <div>
                                                : {{ $profile->major_subject }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Designation
                                            </div>
                                            <div>
                                                : {{ $profile->designation }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> My Hobbies, Interests & More</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Favourite Music
                                            </div>
                                            <div>
                                                : {{ $profile->music }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Preferred
                                                Movie
                                            </div>
                                            <div>
                                                : {{ $profile->movie }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Dress
                                                Style
                                            </div>
                                            <div>
                                                : {{ $profile->dress }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Favourite
                                                Reads
                                            </div>
                                            <div>
                                                : {{ $profile->book }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Favourite
                                                Cooking
                                            </div>
                                            <div>
                                                : {{ $profile->cooking }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> My Lifestyle</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Religious
                                                View
                                            </div>
                                            <div>
                                                : {{ $profile->religious_view }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Diet
                                            </div>
                                            <div>
                                                : {{ $profile->diet }}
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Drink
                                            </div>
                                            <div>
                                                : {{ $profile->drink }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Smoke
                                            </div>
                                            <div>
                                                : {{ $profile->smoke }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> My Family Details</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Family Type
                                            </div>
                                            <div>
                                                : {{ $profile->family_type }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Father
                                                Prof
                                            </div>
                                            <div>
                                                : {{ $profile->father_prof }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                No
                                                of Brothers
                                            </div>
                                            <div>
                                                : {{ $profile->no_bro }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                No
                                                of Sisters
                                            </div>
                                            <div>
                                                : {{ $profile->no_sis }}
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Family
                                                Status
                                            </div>
                                            <div>
                                                : {{ $profile->family_status }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Mother
                                                Prof
                                            </div>
                                            <div>
                                                : {{ $profile->mother_prof }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                No
                                                of Married Brothers
                                            </div>
                                            <div>
                                                : {{ $profile->no_bro_m }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                No
                                                of Married Sisters
                                            </div>
                                            <div>
                                                : {{ $profile->no_sis_m }}
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($profile->pertnerPreference)
                            <div class="row bg-white py-1">
                                <div class="col-md-12">
                                    <h6 class="text-dark font-weight-bold"> Partner Preferences</h6>
                                    <hr class="info">
                                </div>
                                <div class="col-md-12">
                                    <div class="row py-3">
                                        <div class="col-md-6">
                                            <div class="profile-info-grid">
                                                <div>
                                                    Looking
                                                    For
                                                </div>
                                                <div>
                                                    : {{ $profile->looking_for }}
                                                </div>
                                            </div>
                                            <div class="profile-info-grid">
                                                <div>
                                                    Height
                                                    Range
                                                </div>
                                                <div>
                                                    : {{ $profile->pertnerPreference->min_height }} to
                                                    {{ $profile->pertnerPreference->max_height }}
                                                </div>
                                            </div>
                                            <div class="profile-info-grid">
                                                <div>
                                                    Religion
                                                </div>
                                                <div>
                                                    :{{ $profile->pertnerPreference->ppReligion? $profile->pertnerPreference->ppReligion->name: $profile->pertnerPreference->religion }}
                                                </div>
                                            </div>
                                            <div class="profile-info-grid">
                                                <div>
                                                    Children?
                                                </div>
                                                <div>
                                                    : {{ $profile->pertnerPreference->children }}
                                                </div>
                                            </div>
                                            <div class="profile-info-grid">
                                                <div>
                                                    Physical
                                                    Disability
                                                </div>
                                                <div>
                                                    : {{ $profile->pertnerPreference->physical_disability }}
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-info-grid">
                                                <div>
                                                    Age
                                                    Range
                                                </div>
                                                <div>
                                                    : {{ $profile->pertnerPreference->min_age }}years to
                                                    {{ $profile->pertnerPreference->max_age }}years
                                                </div>
                                            </div>
                                            <div class="profile-info-grid">
                                                <div>
                                                    Study
                                                </div>
                                                <div>
                                                    : {{ $profile->pertnerPreference->study }}
                                                </div>
                                            </div>
                                            <div class="profile-info-grid">
                                                <div>
                                                    Profession
                                                </div>
                                                <div>
                                                    : {{ $profile->pertnerPreference->profession }}
                                                </div>
                                            </div>
                                            <div class="profile-info-grid">
                                                <div>
                                                    Skin
                                                    Color
                                                </div>
                                                <div>
                                                    : {{ $profile->pertnerPreference->skin_color }}
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> Contact Informaion</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Time
                                                To Call
                                            </div>
                                            <div>
                                                : {{ $profile->call_time }}
                                            </div>
                                        </div>
                                        <div class="profile-info-grid">
                                            <div>
                                                Relation
                                            </div>
                                            <div>
                                                : {{ $profile->relation_with_contact }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Contact
                                                Person
                                            </div>
                                            <div>
                                                : {{ $profile->contact_person }}
                                            </div>
                                        </div>


                                        @hasrole('Admin')
                                        <div class="profile-info-grid">
                                            <div>
                                            Guardian Number
                                            </div>
                                            <div>
                                                : {{ $profile->guardian_mobile }}(only Admin Seen)
                                            </div>
                                        </div>
                                        @else
                                        @if(auth()->user()->checkContactUserPack($profile->id) > 0 )  
                                        <div class="profile-info-grid">
                                            <div>
                                            Guardian Number
                                            </div>
                                            <div>
                                                : {{ $profile->guardian_mobile }}
                                            </div>
                                        </div>
                                        @endif
                                        @endif
                                       
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> Permanent Address</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Country
                                            </div>
                                            <div>
                                                : {{ $profile->permanent_country }}
                                            </div>
                                        </div>
                                        @if ($profile->permanent_country == 'Bangladesh')
                                            <div class="profile-info-grid">
                                                <div>
                                                    District
                                                </div>
                                                <div>
                                                    :
                                                    {{ $profile->userParmanentDistrict ? $profile->userParmanentDistrict->name : $profile->parmanent_district }}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        @if ($profile->permanent_country == 'Bangladesh')
                                            <div class="profile-info-grid">
                                                <div>
                                                    Division
                                                </div>
                                                <div>
                                                    :
                                                    {{ $profile->userParmanentDivision ? $profile->userParmanentDivision->name : $profile->parmanent_division }}
                                                </div>
                                            </div>

                                            <div class="profile-info-grid">
                                                <div>
                                                    Upazilla
                                                </div>
                                                <div>
                                                    :
                                                    {{ $profile->userParmanentThana ? $profile->userParmanentThana->name : $profile->parmanent_thana }}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bg-white py-1">
                            <div class="col-md-12">
                                <h6 class="text-dark font-weight-bold"> Present Address</h6>
                                <hr class="info">
                            </div>
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6">
                                        <div class="profile-info-grid">
                                            <div>
                                                Country
                                            </div>
                                            <div>
                                                : {{ $profile->present_country }}
                                            </div>
                                        </div>
                                        @if ($profile->present_country == 'Bangladesh')
                                            <div class="profile-info-grid">
                                                <div>
                                                    Division
                                                </div>
                                                <div>
                                                    :
                                                    {{ $profile->userPresentDivision ? $profile->userPresentDivision->name : $profile->present_division }}
                                                </div>
                                            </div>
                                            <div class="profile-info-grid">
                                                <div>
                                                    Postal
                                                    Code
                                                </div>
                                                <div>
                                                    : {{ $profile->present_po }}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                        @if ($profile->present_country == 'Bangladesh')
                                            <div class="profile-info-grid">
                                                <div>
                                                    District
                                                </div>
                                                <div>
                                                    :
                                                    {{ $profile->userPresentDistrict ? $profile->userPresentDistrict->name : $profile->present_district }}
                                                </div>
                                            </div>

                                            <div class="profile-info-grid">
                                                <div>
                                                    Upazilla
                                                </div>
                                                <div>
                                                    :
                                                    {{ $profile->userPresentThana ? $profile->userPresentThana->name : $profile->present_thana }}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row bg-white mt-3">
                            <div class="col-md-12">
                                <p><strong>{{ $profile->name }}</strong> Images</p>

                                <div class="lightbox mb-4 px-2 text-center"
                                    data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}"
                                    style="border: 3px solid gray">

                                    @foreach ($profile->userGallery6() as $img)
                                        <a class="img-thumbnail img-thumbnail-no-borders d-inline-block mb-1 mr-1"
                                            href="{{ asset('storage/users/gallery/' . $img->file_name) }}"
                                            title="Public Image">
                                            <img class="img-fluid"
                                                src="{{ asset('storage/users/gallery/' . $img->file_name) }}" width="110"
                                                height="110" alt="Public Image">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <a class="btn btn-danger" href="{{ url('/packages') }}">Upgrade</a> your profile
                                        to view details.
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif




                </div>


            </div>


        </div>




    </div>

    <br>


</body>
</html>