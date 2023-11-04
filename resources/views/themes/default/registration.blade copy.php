@extends('user.master.usermaster')
@php
    $me=auth()->user();
@endphp
@section('content')
<br>
<div class="container py-2 bg-white">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
                <h2 class="font-weight-normal text-7 mb-0">Complete Your Profile </h2>
            </div>
            <form action="{{ route('profilePost2', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 text-center">
                    <h5>My Basic Informations & Appearance</h5>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Name</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" required type="text" placeholder="Your full name..."
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profile
                            Created By</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="profile_created_by" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[1]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Date
                            of birth</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="dob" required type="date" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Complexion</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="skin_color" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[18]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Gender</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="gender" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[0]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="height" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[14]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Marital
                            Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="marital_status" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[10]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children
                            Have?</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="children_have" id="">
                                <option value="">Select...</option>
                                @foreach($userSettingFields[12]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Disability</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="disability" id="" required>

                                <option value="">Select...</option>
                                @foreach($userSettingFields[21]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Body
                            Type</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="body_type" id="" required>

                                <option value="">Select...</option>
                                @foreach($userSettingFields[15]->values as $value)
                                    <option>{{ $value->title }}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Blood
                            Group</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="blood_group" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[24]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>

                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Mobile</label>
                        <div class="col-lg-9">
                            <input type="text" name="mobile" id="" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <h5>My Community & Social Background</h5>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Community</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="religion" required
                                data-url="{{ route('cast.fetch') }}" id="religion"
                                data-dependent="cast">
                                <option value="">Select...</option>
                                @foreach($userSettingFields[3]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Caste</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="caste" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[28]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                            Value</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="family_value" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[43]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mother
                            Tongue</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="mother_tongue" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[30]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <h5>My Cultural Background</h5>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Country
                            of
                            Birth </label>
                        <div class="col-lg-9">
                            <select class="form-control" name="country" id="" required>
                                    <option value="">Select...</option>
                                    @foreach($userSettingFields[2]->values as $value)
                                        <option value="{{ $value->title }}">
                                            {{ $value->title }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Grew
                            Up
                            In</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="grewup_in" id="" required>
                                    <option value="">select...</option>
                                    @foreach($userSettingFields[2]->values as $value)
                                        <option value="{{ $value->title }}">
                                            {{ $value->title }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Personal
                            Values</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="personal_value" id="" required>
                                    <option value="">Select...</option>
                                    @foreach($userSettingFields[45]->values as $value)
                                        <option value="{{ $value->title }}">
                                            {{ $value->title }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Can
                            Speak</label>
                        <div class="col-lg-9">
                            <select class="form-control select2" name="can_speak[]" id="" required multiple>
                                    <option value="">Select...</option>

                                    @foreach($userSettingFields[31]->values as $value)
                                        <option>{{ $value->title }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <h5>My Education & Career</h5>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Education
                            Level</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="education_level" id="" required>
                                    <option value="">Select...</option>
                                    @foreach($userSettingFields[25]->values as $value)
                                        <option>{{ $value->title }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">University</label>
                        <div class="col-lg-9">
                            <input type="text" name="university" class="form-control"
                                placeholder="University Name" required id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Major
                            Subject</label>
                        <div class="col-lg-9">
                            <input type="text" name="major_subject" class="form-control"
                                placeholder="Major Subject" required id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Workplace</label>
                        <div class="col-lg-9">
                            <input type="text" name="workplace" class="form-control"
                                placeholder="Workplace" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Designation</label>
                        <div class="col-lg-9">
                            <input type="text" name="designation" class="form-control"
                                placeholder="Designation..." required id="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <h5>My Hobbies, Interests & More</h5>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Music</label>
                        <div class="col-lg-9">
                            <select class="form-control select2 w-100" name="music[]" id="" required multiple
                                multiple="multiple" data-placeholder="Select a State"
                                data-dropdown-css-class="select2-purple">
                                <option value="">Select...</option>
                                @foreach($userSettingFields[37]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Book</label>
                        <div class="col-lg-9">
                            <select class="form-control select2" name="book[]" id="" required multiple>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[36]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Cooking</label>
                        <div class="col-lg-9">
                            <select class="form-control select2" name="cooking[]" id="" required multiple>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[35]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Movie</label>
                        <div class="col-lg-9">
                            <select class="form-control select2" multiple name="movie[]" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[38]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Dress
                            Style</label>
                        <div class="col-lg-9">
                            <select class="form-control select2" multiple name="dress[]" id="" required>


                                <option value="">Select...</option>

                                @foreach($userSettingFields[19]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach



                            </select>
                        </div>
                    </div>



                </div>

                <div class="col-md-12 text-center">
                    <h5>My Lifestyle</h5>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Religious
                            View</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="religious_view" id="" required>

                                    <option value="">select...</option>
                                <option value="Very Religious">Very Religious</option>

                                <option value="Religious">Religious</option>
                                <option value="Moderator">Moderator</option>

                                <option value="Not to say">Not to say</option>



                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Drink?</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="drink" id="" required>

                                <option value="">Select...</option>
                                @foreach ($userSettingFields[20]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Smoke?</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="smoke" id="" required>

                                <option value="">Select...</option>
                                @foreach ($userSettingFields[20]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Diet</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="diet" id="" required>

                                <option value="">Select...</option>
                                @foreach ($userSettingFields[27]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>



                </div>


                <div class="col-md-12 text-center">
                    <h5>My Family Details</h5>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                            Type</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="family_type" id="" required>

                                <option value="">Select...</option>
                                @foreach ($userSettingFields[42]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                            Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="family_status" id="" required>

                                <option value="">Select...</option>
                                @foreach ($userSettingFields[44]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Father
                            Profession</label>
                        <div class="col-lg-9">
                            <input type="text" name="father_prof"  class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mother
                            Profession</label>
                        <div class="col-lg-9">
                            <input type="text" name="mother_prof"  class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                            Brothers</label>
                        <div class="col-lg-9">
                            <input type="number" name="no_bro"  class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                            Brother Married</label>
                        <div class="col-lg-9">
                            <input type="number" name="no_bro_m"  class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                            Sisters</label>
                        <div class="col-lg-9">
                            <input type="number" name="no_sis"  class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                            Sisters Married</label>
                        <div class="col-lg-9">
                            <input type="number" name="no_sis_m"  class="form-control">
                        </div>
                    </div>




                </div>


                <div class="col-md-12 text-center">
                    <h5>Contact Informaion</h5>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Time To
                            Call</label>
                        <div class="col-lg-9">

                            <input type="text" class="form-control" name="call_time">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Contact
                            Person</label>
                        <div class="col-lg-9">
                            <input type="text" name="contact_person" class="form-control"
                                placeholder="Contact Person name..." required id="">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Relation with
                            Contact Person</label>
                        <div class="col-lg-9">
                            <input type="text" name="relation_with_contact" class="form-control"
                                placeholder="Relation with Contact Person..." required>
                        </div>
                    </div>



                </div>
                <div class="col-md-12 text-center">
                    <h5>Permanent Address</h5>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Country</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="permanent_country" id="" required>

                                <option value="">Select...</option>
                                @foreach($userSettingFields[2]->values as $value)

                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>

                            @endforeach




                            </select>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Division</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="parmanent_division" id="" required>

                                <option value="">Select...</option>

                                <option value="Rangpur">Rangpur</option>
                                <option value="Barisal">Barisal</option>

                                <option value="Khulna">Khulna</option>
                                <option value="Rajshahi">Rajshahi</option>


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">District</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="parmanent_district" id="" required>

                                <option value="">select...</option>
                                <option value="Thakurgaon">Thakurgaon</option>
                                <option value="Dinajpur">Dinajpur</option>
                                <option value="Dhaka">Dhaka</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Thana</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="parmanent_thana" id="" required>

                                <option value="">Select...</option>
                               <option value="Pirganj">Pirganj</option>
                                <option value="Adabar">Adabar</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="col-md-12 text-center">
                    <h5>Present Address</h5>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Country</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="present_country" id="" required>

                                <option value="">Select...</option>
                                @foreach($userSettingFields[2]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>

                            @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Division</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="present_division" id="" required>
                                <option value="">Select...</option>
                                <option value="Dhaka">Dhaka</option>

                                <option value="Rangpur">Rangpur</option>
                                <option value="Barisal">Barisal</option>

                                <option value="Khulna">Khulna</option>
                                <option value="Rajshahi">Rajshahi</option>


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">District</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="present_district" id="" required>
                                <option value="">select...</option>
                                <option value="Thakurgaon">Thakurgaon</option>
                                <option value="Dinajpur">Dinajpur</option>
                                <option value="Dhaka">Dhaka</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Thana</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="present_thana" id="" required>
                                <option value="">select...</option>
                                <option value="Pirganj">Pirganj</option>
                                <option value="Adabar">Adabar</option>
                            </select>
                        </div>
                    </div>




                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Postal
                            Code</label>
                        <div class="col-lg-9">
                            <input type="number" name="present_po" placeholder="Portal Code" required
                                class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-lg-9">

                    </div>
                    <div class="form-group col-lg-3">
                        <input type="submit" value="Save" class="btn btn-primary btn-modern float-right"
                            data-loading-text="Loading...">
                    </div>
                </div>
            </form>
        </div>


    </div>


</div>
<br>

@endsection
