@extends('user.master.usermaster')
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
    }
</style>
@endpush
@section('content')

<br>
<div class="container py-2 bg-white">

    <div class="row">
        <div class="col-md-12 text-center">
            @include('alerts.alerts')
        </div>
        <div class="col-lg-3 mt-4 mt-lg-0">

            @include('user.parts.leftsidebar')

        </div>
        <div class="col-lg-9">

            <div class="overflow-hidden mb-1">
                <h2 class="font-weight-normal text-7 mb-0"><strong
                        class="font-weight-extra-bold">@if($profile->id==auth()->user()->id)My @else
                        {{$profile->name}}@endif</strong> Profile</h2>
            </div>

            <div class="row pt-5">
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li>Account created by</li>
                                        <li>Name</li>
                                        <li>gender</li>
                                        <li>Religion</li>
                                        <li>Date of Birth</li>
                                        <li>Looking For</li>
                                        <li>Country</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li>: {{$profile->profile_created_by}}</li>
                                        <li>: {{$profile->name}}</li>
                                        <li>: {{$profile->gender}}</li>
                                        <li>: {{$profile->religion}}</li>
                                        <li>: {{$profile->dob}}</li>
                                        <li>: {{$profile->looking_for}}</li>
                                        <li>: {{$profile->country}}</li>
                                    </ul>
                                </div>
                                @if($profile->id!=auth()->user()->id)
                                <div class="col-md-4">
                                    @if (auth()->user()->isValidate() or auth()->user()->id == $profile->id)
                                    <ul>
                                        @if (Auth::user()->isMyFavourite($profile))
                                        <li>
                                            <a href="{{ route('user.removeFavourite', $profile) }}"><i
                                                    class="icon-heart icons btn btn-danger"></i> Remove Favourite</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{ route('user.makeFavourite', $profile) }}"><i
                                                    class="icon-heart icons btn btn-danger"></i> Mark Favourite</a>
                                        </li>
                                        @endif
                                        <li>
                                            <form action="{{ route('user.sendProposalPost', $profile) }}" method="post"
                                                style="margin: 0">
                                                {{ csrf_field() }}
                                                <button type="submit" style="border: 0;"><i
                                                        class="icon-cursor icons btn btn-danger"
                                                        style="margin-left: 0;"></i>Send
                                                    Proposal</button>
                                            </form>
                                        </li></a>
                                        <li>
                                            <a href="{{ route('user.messageDashboard', ['user' => $profile]) }}"
                                                class="btn btn-link mb-0  btn-primary no-padding">
                                                <i class="fa fa-envelope"></i> Send Message</a>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <hr>

            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>My Basic Informations & Appearance :</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Age</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Marital Status</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="mobile" type="text" value="{{$profile->marital_status}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Height</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="mobile" type="text" value="{{$profile->height}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Children</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="mobile" type="text" value="{{$profile->children_have}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Height</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="mobile" type="text" value="{{$profile->height}}" readonly>
                        </div>
                    </div>





                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Complexion</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->skin_color}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Body Type</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="mobile" type="text" value="{{$profile->body_type}}" readonly>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Disabilities</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="country" type="text" value="{{$profile->Disabilities}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Blood Group</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="mobile" type="text" value="{{$profile->blood_group}}"
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


            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>My Community & Social Background :</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Community</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->religion}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Cast/Social Order:</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->caste}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Family Value:</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->family_value}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Mother Tongue:</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->family_value}}" readonly>
                        </div>
                    </div>
                </div>


            </div>



            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>My Cultural Background :</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Country of Birth:</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->mobile}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Country of Birth:</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->mobile}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Can Speak:</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->mobile}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Personal Values:</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->email}}" readonly>
                        </div>
                    </div>
                </div>


            </div>


            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Contact Informaion</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Mobile</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->mobile}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">My Education & Career :
                        </label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->email}}" readonly>
                        </div>
                    </div>
                </div>


            </div>



            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Contact Informaion</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Mobile</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->mobile}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Email</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->email}}" readonly>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Present Address</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Village</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->present_vill}}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">District</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->present_district}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Thana</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->present_thana}}"
                                readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Postal
                            Code:</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->present_po}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Division</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->present_division}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Citizenship
                            Status</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->citizenship_status}}"
                                readonly>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Education</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Education
                            Level</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->education_level}}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Education
                            Status</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->education_status}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Major
                            Subject</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->major_subject}}"
                                readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">College/
                            University:</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->university}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Degree
                            Name</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->degree_name}}"
                                readonly>
                        </div>
                    </div>

                </div>


            </div>


            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Career</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Profession</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->profession}}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Work
                            place</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->workplace}}"
                                readonly>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Designation</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->designation}}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Annual
                            Income</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->annual_income}}"
                                readonly>
                        </div>
                    </div>

                </div>


            </div>


            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Permanent Address</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Village</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->parmanent_vill}}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">District</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->parmanent_district}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Thana</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->parmanent_thana}}"
                                readonly>
                        </div>
                    </div>


                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Postal
                            Code:</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->parmanent_po}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Division</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->parmanent_division}}"
                                readonly>
                        </div>
                    </div>


                </div>


            </div>


            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Physical Attributes</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Skin
                            Color</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->skin_color}}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Eye
                            Color</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->eye_color}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Weight</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->weight}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Hair
                            Color</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->hair_color}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Body
                            Type</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->body_type}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Disablity</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->disability}}"
                                readonly>
                        </div>
                    </div>



                </div>


            </div>


            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Lifestyle Info</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Drink
                        </label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->drink}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Smoke</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->smoke}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Diet
                        </label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->diet}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Zodiac
                            Sign</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->zodiac_sign}}"
                                readonly>
                        </div>
                    </div>
                </div>


            </div>



            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Family Information</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Family
                            Type</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->family_type}}"
                                readonly>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Family
                            Status</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->family_status}}"
                                readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Number
                            of members </label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->no_of_member}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Family
                            Value</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->family_value}}"
                                readonly>
                        </div>
                    </div>


                </div>


            </div>


            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Favourite List</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Color</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->color}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Books</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->book}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Movie</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->movie}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Location</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->location}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Interests</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->interests}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2   ">Hobby</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text" value="{{$profile->hobby}}" readonly>
                        </div>
                    </div>



                </div>


            </div>


            @if($profile->pertnerPreference)
            <div class="row pt-5">
                <div class="col-sm-12">
                    <h4>Partner Preferences</h4>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">Looking
                            For</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" type="text" value="{{$profile->looking_for}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height
                            Range</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->min_age}} to {{$profile->pertnerPreference->max_age}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Religion</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->religion}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children?</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->children}}" readonly>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Interest</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->interest}}" readonly>
                        </div>
                    </div>


                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Age
                            Range</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->min_age}} to {{$profile->pertnerPreference->max_age}}"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Study</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->study}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profession</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->profession}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Skin
                            Color</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->skin_color}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Physical
                            Disability</label>
                        <div class="col-lg-9">

                            <input class="form-control" name="mobile" type="text"
                                value="{{$profile->pertnerPreference->physical_disability}}" readonly>
                        </div>
                    </div>


                </div>


            </div>
            @endif


        </div>

        <div class="container mt-5 pt-3">
            <div class="row">
                <div class="col">
                    <h4><strong>@if($profile->id == auth()->user()->id)My @else {{$profile->name}} @endif</strong>
                        Gallery</h4>
                    <div class="owl-carousel owl-theme show-nav-hover"
                        data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-1.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-2.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-1.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-2.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-3.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-4.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-3.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-4.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-5.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-6.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-7.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-1.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-2.jpg')}}">
                        </div>
                        <div>
                            <img alt="" class="img-fluid rounded" src="{{asset('img/projects/project-3.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<br>
@endsection
