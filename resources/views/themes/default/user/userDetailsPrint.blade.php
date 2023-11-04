@extends('user.master.usermasterUserPrint')
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
            margin-bottom: 0px !important;
        }

        .profile-card-grid{
            display: grid;
            grid-template-columns: 40% 40% 20%;
            /* text-align: center; */

        }

        .profile-info-grid{
            display: grid;
            grid-template-columns: 40% 60%;
            /* text-align: center; */
        }

    </style>
@endpush
@section('content')
    {{-- @include('alerts.alerts') --}}
    <br>
    <div class="container py-2">

        <div class="row">
            <div class="col-lg-12">

                <div class="container">
                    <div class="row bg-white">
                        <div class="col-lg-12 ">
                          <div class="profile-card-grid ">
                              <div>
                                <a href="">
                                    <img
                                        class=""
                                        alt="Porto"
                                        width="120"
                                        height="50"
                                        data-sticky-width="82"
                                        data-sticky-height="40"
                                        src="{{
                                            asset('img/logo.png')
                                        }}"
                                    />
                                </a>
                              </div>
                              <div class="text-center">
                                  <h3>{{$profile->name}} <small>({{$profile->email}})</small></h3>
                              </div>
                              <div class="text-right">
                                   Date: {{Carbon::now()->format('d-M-Y')}}
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

                        <div class="col-md-3">
                        @if ($profile->profile_img)
                            <img src="{{ route('imagecache', [ 'template'=>'medium','filename' => $profile->fiName() ]) }}" alt=""
                                class="img-fluid" style="border:3px solid gray">
                            @else

                            <img src="{{ asset('img/user.png') }}" alt="" style="border:3px solid gray"
                                class="img-fluid border border-danger">
                            @endif
                        </div>

                        <div class="col-md-5">

                            <div class="profile-card-grid">
                                <div>
                                    <ul>
                                        <li style="white-space: nowrap">Account created by</li>
                                        <li style="white-space: nowrap">Name</li>
                                        <li style="white-space: nowrap">Religion</li>
                                        <li style="white-space: nowrap">Age, Gender</li>
                                        <li style="white-space: nowrap">Marital Status</li>
                                        <li style="white-space: nowrap">Education</li>
                                        <li style="white-space: nowrap">Designation</li>
                                        <li style="white-space: nowrap">Height</li>
                                    </ul>
                                </div>
                                <div>
                                    <ul>
                                        <li style="white-space: nowrap"> : {{ $profile->profile_created_by }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->name }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->religion }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->age() }}, {{ $profile->gender }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->marital_status }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->education_level }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->designation }}</li>
                                        <li style="white-space: nowrap"> : {{ $profile->height }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>

                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>My Basic Informations & Appearance</h4>
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
                                        : {{$profile->age()}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                       Marital Status
                                    </div>
                                    <div>
                                        : {{$profile->marital_status}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Gender
                                    </div>
                                    <div>
                                        : {{$profile->gender}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Height
                                    </div>
                                    <div>
                                        : {{$profile->height}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Children
                                    </div>
                                    <div>
                                        : {{$profile->children_have}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-info-grid">
                                    <div>
                                        Complexion
                                    </div>
                                    <div>
                                        : {{$profile->skin_color}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Body Type
                                    </div>
                                    <div>
                                        : {{$profile->body_type}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Disabilities
                                    </div>
                                    <div>
                                        : {{$profile->disability}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Blood Group
                                    </div>
                                    <div>
                                        : {{$profile->blood_group}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Mobile
                                    </div>
                                    <div>
                                        : {{$profile->mobile}}
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>
                    </div>

                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>My Community & Social Background</h4>
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
                                        : {{ $profile->userReligion ? $profile->userReligion->name  : $profile->religion}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Caste/Social
                                        Order
                                    </div>
                                    <div>
                                        : {{ $profile->userCaste ? $profile->userCaste->name  : $profile->caste}}
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="profile-info-grid">
                                    <div>
                                        Family Value
                                    </div>
                                    <div>
                                        : {{$profile->family_value}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Mother Tongue
                                    </div>
                                    <div>
                                        : {{$profile->mother_tongue}}
                                    </div>
                                </div>

                            </div>
                        </div>
                       </div>
                    </div>

                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>My Cultural Background</h4>
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
                                        : {{$profile->can_speak}}
                                    </div>
                                </div>

                            </div>
                        </div>
                       </div>
                    </div>


                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>My Education & Career</h4>
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
                                        : {{$profile->designation}}
                                    </div>
                                </div>

                            </div>
                        </div>
                       </div>
                    </div>

                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>My Hobbies, Interests & More</h4>
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
                                        : {{$profile->cooking}}
                                    </div>
                                </div>

                            </div>
                        </div>
                       </div>
                    </div>

                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>My Lifestyle</h4>
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
                                        : {{$profile->smoke}}
                                    </div>
                                </div>

                            </div>
                        </div>
                       </div>
                    </div>

                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>My Family Details</h4>
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
                                        : {{$profile->mother_prof}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        No
                                        of Married Brothers
                                    </div>
                                    <div>
                                        : {{$profile->no_bro_m}}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        No
                                    of Married Sisters
                                    </div>
                                    <div>
                                        : {{$profile->no_sis_m}}
                                    </div>
                                </div>


                            </div>
                        </div>
                       </div>
                    </div>

                    @if ($profile->pertnerPreference)
                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>Partner Preferences</h4>
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
                                        : {{ $profile->pertnerPreference->min_height }} to {{ $profile->pertnerPreference->max_height }}
                                    </div>
                                </div>
                                <div class="profile-info-grid">
                                    <div>
                                        Religion
                                    </div>
                                    <div>
                                        : {{ $profile->pertnerPreference->religion }}
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
                                        : {{ $profile->pertnerPreference->min_age }}years to {{ $profile->pertnerPreference->max_age }}years
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
                            <h4>Contact Informaion</h4>
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

                            </div>
                        </div>
                       </div>
                    </div>


                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>Permanent Address</h4>
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
                                @if($profile->permanent_country=="Bangladesh")
                                <div class="profile-info-grid">
                                    <div>
                                        District
                                    </div>
                                    <div>
                                        : {{ $profile->userParmanentDistrict ? $profile->userParmanentDistrict->name  : $profile->parmanent_district}}
                                    </div>
                                </div>
                                @endif

                            </div>
                            <div class="col-md-6">
                                @if($profile->permanent_country=="Bangladesh")
                                <div class="profile-info-grid">
                                    <div>
                                        Division
                                    </div>
                                    <div>
                                        : {{ $profile->userParmanentDivision ? $profile->userParmanentDivision->name  : $profile->parmanent_division}}
                                    </div>
                                </div>

                                <div class="profile-info-grid">
                                    <div>
                                        Upazilla
                                    </div>
                                    <div>
                                        : {{ $profile->userParmanentThana ? $profile->userParmanentThana->name  : $profile->parmanent_thana}}
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                       </div>
                    </div>

                    <div class="row bg-white py-1">
                        <div class="col-md-12">
                            <h4>Present Address</h4>
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
                                @if($profile->present_country=="Bangladesh")
                                <div class="profile-info-grid">
                                    <div>
                                        Division
                                    </div>
                                    <div>
                                        : {{ $profile->userPresentDivision ? $profile->userPresentDivision->name  : $profile->present_division}}
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
                                @if($profile->present_country=="Bangladesh")
                                <div class="profile-info-grid">
                                    <div>
                                        District
                                    </div>
                                    <div>
                                        : {{ $profile->userPresentDistrict ? $profile->userPresentDistrict->name  : $profile->present_district}}
                                    </div>
                                </div>

                                <div class="profile-info-grid">
                                    <div>
                                        Upazilla
                                    </div>
                                    <div>
                                        : {{ $profile->userPresentThana ? $profile->userPresentThana->name  : $profile->present_thana}}
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                       </div>
                    </div>







                </div>


            </div>

            </div>

        </div>

        <br>

        {{-- *********************************************************Modals********************************************************* --}}


    @endsection
