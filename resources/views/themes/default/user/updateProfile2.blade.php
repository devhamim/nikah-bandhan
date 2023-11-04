@extends('user.master.usermaster')
@section('content')


    <div class="container py-2 ">

        <div class="row">

            <div class="col-lg-3 mt-4 mt-lg-0">

                <div class="bg-white">
                    @include('user.parts.leftsidebar')
                </div>

            </div>
            <div class="col-lg-9">

                <div class="bg-white px-3">
                    <div class="overflow-hidden mb-1">
                        <h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">
                            @if ($user->id == auth()->user()->id)My @else
                                    {{ $user->name }}@endif
                            </strong> Profile</h2>

                    </div>
                    <div class="overflow-hidden mb-4 pb-3">
                    </div>
                    @include('alerts.alerts')

                    <form action="{{ route('profilePost', $user->id) }}" role="form" method="POST" class="needs-validation"
                        enctype="multipart/form-data">
                        @csrf
                        <h5 class="text-center">My Basic Informations & Appearance</h5>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="name" required type="text" value="{{ $user->name }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Date of
                                Birth</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="dob" type="date" value="{{ $user->dob }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Complexion</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="skin_color" id="" required>
                                    @if ($user->skin_color != null)
                                        <option selected value="{{ $user->skin_color }}">{{ $user->skin_color }}
                                        </option>
                                        @foreach ($userSettingFields[18]->values as $value)
                                            @if ($user->skin_color != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[18]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif


                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profile
                                Created By</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="profile_created_by" id="" required>


                                    @if ($user->profile_created_by != null)
                                        <option selected value="{{ $user->profile_created_by }}">
                                            {{ $user->profile_created_by }}
                                        </option>

                                        @foreach ($userSettingFields[1]->values as $value)
                                            @if ($user->profile_created_by != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif

                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[1]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>

                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Marital
                                Status</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="marital_status" id="" required>
                                    @if ($user->marital_status != null)
                                        <option selected value="{{ $user->marital_status }}">{{ $user->marital_status }}
                                        </option>

                                        @foreach ($userSettingFields[10]->values as $value)
                                            @if ($user->marital_status != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[10]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif

                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children
                                Have?</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="children_have" id="" required>
                                    @if ($user->children_have != null)
                                        <option selected value="{{ $user->children_have }}">{{ $user->children_have }}
                                        </option>

                                        @foreach ($userSettingFields[12]->values as $value)
                                            @if ($user->children_have != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif

                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[12]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>

                                        @endforeach
                                    @endif


                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Body
                                Type</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="body_type" id="" required>
                                    @if ($user->body_type != null)
                                        <option selected value="{{ $user->body_type }}">{{ $user->body_type }}
                                        </option>
                                        @foreach ($userSettingFields[15]->values as $value)
                                            @if ($user->body_type != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[15]->values as $value)
                                            <option>{{ $value->title }}</option>

                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="height" id="" required>
                                    @if ($user->height != null)
                                        <option selected value="{{ $user->height }}">{{ $user->height }}</option>
                                        @foreach ($userSettingFields[14]->values as $value)
                                            @if ($user->height != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif

                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[14]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>

                                        @endforeach
                                    @endif

                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Disability</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="disability" id="" required>
                                    @if ($user->disability != null)
                                        <option selected value="{{ $user->disability }}">{{ $user->disability }}
                                        </option>
                                        @foreach ($userSettingFields[21]->values as $value)
                                            @if ($user->disability != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[21]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif


                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Blood
                                Group</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="blood_group" id="" required>
                                    @if ($user->blood_group != null)
                                        <option selected value="{{ $user->blood_group }}">{{ $user->blood_group }}
                                        </option>
                                        @foreach ($userSettingFields[24]->values as $value)
                                            @if ($user->blood_group != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[24]->values as $value)
                                            <option>{{ $value->title }}</option>

                                        @endforeach
                                    @endif


                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Mobile</label>
                            <div class="col-lg-9">
                                <input type="text" name="mobile" id="" value="{{ $user->mobile }}" class="form-control">

                            </div>
                        </div>


                        <h5 class="text-center">My Community & Social Background</h5>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Community</label>
                            <div class="col-lg-9">
                                <select class="form-control fetch_religion" name="religion" id="" required
                                    data-url="{{ route('cast.fetch') }}" data-dependent="fetch_cast">
                                    @if ($user->religion != null)
                                        <option selected value="{{ $user->religion }}">{{ $user->userReligion ? $user->userReligion->name  : $user->religion}}
                                        </option>
                                        @foreach ($religions as $value)
                                            @if ($user->religion != $value->id)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($religions as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>

                                        @endforeach
                                    @endif

                                </select>


                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Caste</label>
                            <div class="col-lg-9">
                                <select class="form-control fetch_cast" name="caste" id="" required>
                                    @if ($user->caste != null)
                                        <option selected value="{{ $user->caste }}">{{ $user->userCaste ? $user->userCaste->name  : $user->caste}}</option>

                                        @foreach ($casts as $value)
                                            @if ($user->caste != $value->id)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>

                                        @foreach ($casts as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    @endif

                                </select>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                                Value</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="family_value" id="" required>
                                    @if ($user->family_value != null)
                                        <option selected value="{{ $user->family_value }}">{{ $user->family_value }}
                                        </option>
                                        @foreach ($userSettingFields[43]->values as $value)
                                            @if ($user->family_value != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[43]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mother
                                Tongue</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="mother_tongue" id="" required>
                                    @if ($user->mother_tongue != null)
                                        <option selected value="{{ $user->mother_tongue }}">{{ $user->mother_tongue }}
                                        </option>
                                        @foreach ($userSettingFields[30]->values as $value)
                                            @if ($user->mother_tongue != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[30]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>

                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>





                        <h5 class="text-center">My Cultural Background</h5>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Country
                                of
                                Birth </label>
                            <div class="col-lg-9">
                                <select class="form-control" name="country" id="" required>
                                    @if ($user->country != null)
                                        <option selected value="{{ $user->country }}">{{ $user->country }}
                                        </option>
                                        @foreach ($userSettingFields[2]->values as $value)
                                            @if ($user->country != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[2]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>

                                        @endforeach
                                    @endif
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
                                    @if ($user->grewup_in != null)
                                        <option selected value="{{ $user->grewup_in }}">{{ $user->grewup_in }}
                                        </option>
                                        @foreach ($userSettingFields[2]->values as $value)
                                            @if ($user->grewup_in != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[2]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>

                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Personal
                                Values</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="personal_value" id="" required>
                                    @if ($user->personal_value != null)
                                        <option selected value="{{ $user->personal_value }}">{{ $user->personal_value }}
                                        </option>

                                        @foreach ($userSettingFields[45]->values as $value)
                                            @if ($user->personal_value != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[45]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Can
                                Speak</label>
                            <div class="col-lg-9">
                                <select class="form-control select2" name="can_speak[]" id="" required multiple>


                                    @if ($user->can_speak != null)
                                        <?php
                                        $arr = explode(', ', $user->can_speak);
                                        ?>

                                        @foreach ($arr as $element)
                                            <option selected value="{{ $element }}">
                                                {{ $element }}</option>
                                        @endforeach

                                    @else
                                        <option value="">Select...</option>
                                    @endif
                                    @foreach ($userSettingFields[31]->values as $value)
                                        <option>{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h5 class="text-center">My Education & Career</h5>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Education
                                Level</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="education_level" id="" required>

                                    @if ($user->education_level != null)
                                        <option selected value="{{ $user->education_level }}">{{ $user->education_level }}
                                        </option>

                                        @foreach ($userSettingFields[25]->values as $value)
                                            @if ($user->education_level != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[25]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">University</label>
                            <div class="col-lg-9">


                                    <input class="form-control" list="browsers" name="university"  value="{{ $user->university }}" id="browser" required>
                                    <datalist id="browsers">
                                        @foreach($userSettingFields[41]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    </datalist>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Major
                                Subject</label>
                            <div class="col-lg-9">
                                <input type="text" name="major_subject" class="form-control"
                                    value="{{ $user->major_subject }}" placeholder="Major Subject" required id="">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Workplace</label>
                            <div class="col-lg-9">
                                <input type="text" name="workplace" class="form-control" value="{{ $user->workplace }}"
                                    placeholder="Workplace" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Designation</label>
                            <div class="col-lg-9">
                                <input type="text" name="designation" class="form-control" placeholder="Designation..."
                                    value="{{ $user->designation }}" required id="">
                            </div>
                        </div>


                        <h5 class="text-center">My Hobbies, Interests & More</h5>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Music</label>
                            <div class="col-lg-9">
                                <select class="form-control select2 w-100" name="music[]" id="" required multiple
                                    multiple="multiple" data-placeholder="Select a State"
                                    data-dropdown-css-class="select2-purple">
                                    @if ($user->music != null)
                                        <?php
                                        $arr = explode(', ', $user->music);
                                        ?>

                                        @foreach ($arr as $element)
                                            <option selected value="{{ $element }}">
                                                {{ $element }}</option>
                                        @endforeach

                                    @else
                                        <option value="">Select...</option>
                                    @endif
                                    @foreach ($userSettingFields[37]->values as $value)
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



                                    @if ($user->book != null)
                                        <?php
                                        $arr = explode(', ', $user->book);
                                        ?>

                                        @foreach ($arr as $element)
                                            <option selected value="{{ $element }}">
                                                {{ $element }}</option>
                                        @endforeach

                                    @else
                                        <option value="">Select...</option>
                                    @endif
                                    @foreach ($userSettingFields[36]->values as $value)
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




                                    @if ($user->cooking != null)
                                        <?php
                                        $arr = explode(', ', $user->cooking);
                                        ?>

                                        @foreach ($arr as $element)
                                            <option selected value="{{ $element }}">
                                                {{ $element }}</option>
                                        @endforeach

                                    @else
                                        <option value="">Select...</option>
                                    @endif
                                    @foreach ($userSettingFields[35]->values as $value)
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



                                    @if ($user->cooking != null)
                                        <?php
                                        $arr = explode(', ', $user->movie);
                                        ?>

                                        @foreach ($arr as $element)
                                            <option selected value="{{ $element }}">
                                                {{ $element }}</option>
                                        @endforeach

                                    @else
                                        <option value="">Select...</option>
                                    @endif
                                    @foreach ($userSettingFields[38]->values as $value)
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

                                    @if ($user->dress != null)
                                        <?php
                                        $arr = explode(', ', $user->dress);
                                        ?>

                                        @foreach ($arr as $element)
                                            <option selected value="{{ $element }}">
                                                {{ $element }}</option>
                                        @endforeach

                                    @else
                                        <option value="">Select...</option>
                                    @endif
                                    @foreach ($userSettingFields[19]->values as $value)
                                        <option>{{ $value->title }}</option>
                                    @endforeach



                                </select>
                            </div>
                        </div>



                        <h5 class="text-center">Lifestyle Info</h5>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Religious
                                View</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="religious_view" id="" required>
                                    @if ($user->religious_view != null)
                                        <option selected value="{{ $user->religious_view }}">{{ $user->religious_view }}
                                        </option>
                                    @else
                                        <option value="">Select...</option>
                                    @endif
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
                                    @if ($user->drink != null)
                                        <option selected value="{{ $user->drink }}">{{ $user->drink }}
                                        </option>
                                        @foreach ($userSettingFields[20]->values as $value)
                                            @if ($user->drink != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[20]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Smoke?</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="smoke" id="" required>
                                    @if ($user->smoke != null)
                                        <option selected value="{{ $user->smoke }}">{{ $user->smoke }}
                                        </option>
                                        @foreach ($userSettingFields[20]->values as $value)
                                            @if ($user->smoke != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[20]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Diet</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="diet" id="" required>
                                    @if ($user->diet != null)
                                        <option selected value="{{ $user->diet }}">{{ $user->diet }}
                                        </option>

                                        @foreach ($userSettingFields[27]->values as $value)
                                            @if ($user->diet != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[27]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>


                        <h5 class="text-center">Family Information</h5>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                                Type</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="family_type" id="" required>
                                    @if ($user->family_type != null)
                                        <option selected value="{{ $user->family_type }}">{{ $user->family_type }}
                                        </option>

                                        @foreach ($userSettingFields[42]->values as $value)
                                            @if ($user->family_type != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[42]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                                Status</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="family_status" id="" required>
                                    @if ($user->family_status != null)
                                        <option selected value="{{ $user->family_status }}">{{ $user->family_status }}
                                        </option>

                                        @foreach ($userSettingFields[44]->values as $value)
                                            @if ($user->family_status != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[44]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Father
                                Profession</label>
                            <div class="col-lg-9">
                                <input type="text" name="father_prof" value="{{ $user->father_prof }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mother
                                Profession</label>
                            <div class="col-lg-9">
                                <input type="text" name="mother_prof" value="{{ $user->mother_prof }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number
                                of
                                Brothers</label>
                            <div class="col-lg-9">
                                <input type="number" name="no_bro" value="{{ $user->no_bro }}" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number
                                of
                                Brother Married</label>
                            <div class="col-lg-9">
                                <input type="number" name="no_bro_m" value="{{ $user->no_bro_m }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number
                                of
                                Sisters</label>
                            <div class="col-lg-9">
                                <input type="number" name="no_sis" value="{{ $user->no_sis }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number
                                of
                                Sisters Married</label>
                            <div class="col-lg-9">
                                <input type="number" name="no_sis_m" value="{{ $user->no_sis_m }}" class="form-control">
                            </div>
                        </div>


                        <h5 class="text-center">Contact Informaion</h5>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Time
                                To
                                Call</label>
                            <div class="col-lg-9">

                                <input type="text" class="form-control" name="call_time" value="{{ $user->call_time }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Contact
                                Person</label>
                            <div class="col-lg-9">
                                <input type="text" name="contact_person" class="form-control"
                                    value="{{ $user->contact_person }}" placeholder="Name of Contact Person..." required
                                    id="">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Relation
                                with
                                Contact Person</label>
                            <div class="col-lg-9">
                                <input type="text" name="relation_with_contact" class="form-control"
                                    value="{{ $user->relation_with_contact }}" placeholder="Workplace" required>
                            </div>
                        </div>




                        <h5 class="text-center">Permanent Address</h5>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Country</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="permanent_country" id="permanent_country" required>
                                    @if ($user->permanent_country != null)
                                        <option selected value="{{ $user->permanent_country }}">
                                            {{ $user->permanent_country }}
                                        </option>

                                        @foreach ($userSettingFields[2]->values as $value)
                                            @if ($user->permanent_country != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[2]->values as $value)
                                            @if ($user->permanent_country != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>


                        <div class="other_loc_perm">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Division</label>
                                <div class="col-lg-9">
                                    <select class="form-control load_division" name="parmanent_division" id=""
                                        data-url="{{ route('load_district.fetch') }}" data-dependent="load_district">
                                        @if ($user->parmanent_division != null)
                                            <option selected value="{{ $user->parmanent_division }}">
                                                {{ $user->userParmanentDivision ? $user->userParmanentDivision->name  : $user->parmanent_division}}
                                            </option>
                                            @foreach ($divisions as $value)
                                                @if ($value->id != $user->parmanent_division)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endif

                                            @endforeach
                                        @else
                                            <option value="">Select...</option>
                                            @foreach ($divisions as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>

                                            @endforeach
                                        @endif



                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">District</label>
                                <div class="col-lg-9">
                                    <select class="form-control load_district" name="parmanent_district" id=""
                                        data-url="{{ route('load_thana.fetch') }}" data-dependent="load_thana">
                                        @if ($user->parmanent_district != null)
                                            <option selected value="{{ $user->parmanent_district }}">
                                                {{ $user->userParmanentDistrict ? $user->userParmanentDistrict->name  : $user->parmanent_district}}
                                            </option>
                                            @foreach ($permanent_districts as $value)
                                                @if ($value->id != $user->parmanent_district)


                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endif

                                            @endforeach
                                        @else
                                            <option value="">Select...</option>
                                            @foreach ($permanent_districts as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Thana</label>
                                <div class="col-lg-9">
                                    <select class="form-control load_thana" name="parmanent_thana" id="" >
                                        @if ($user->parmanent_thana != null)
                                            <option selected value="{{ $user->parmanent_thana }}">
                                                {{ $user->userParmanentThana ? $user->userParmanentThana->name  : $user->parmanent_thana}}
                                            </option>
                                            @foreach ($permanent_thanas as $value)
                                                @if ($value->id != $user->parmanent_thana)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Select...</option>
                                            @foreach ($permanent_thanas as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>



                        <h5 class="text-center">Present Address</h5>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Country</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="present_country" id="present_country" required>
                                    @if ($user->present_country != null)
                                        <option selected value="{{ $user->present_country }}">{{ $user->present_country }}
                                        </option>

                                        @foreach ($userSettingFields[2]->values as $value)
                                            @if ($user->present_country != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach ($userSettingFields[2]->values as $value)
                                            @if ($user->present_country != $value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @endif



                                </select>
                            </div>
                        </div>
                        <div class="other_loc">
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Division</label>
                                <div class="col-lg-9">
                                    <select class="form-control present_load_division" name="present_division" id=""
                                        data-url="{{ route('load_district.fetch') }}"
                                        data-dependent="present_load_district">
                                        @if ($user->present_division != null)
                                            <option selected value="{{ $user->present_division }}">
                                                {{ $user->userPresentDivision ? $user->userPresentDivision->name  : $user->present_division}}
                                            </option>
                                            @foreach ($divisions as $value)
                                                @if ($value->id != $user->present_division)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Select...</option>
                                            @foreach ($divisions as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">District</label>
                                <div class="col-lg-9">
                                    <select class="form-control present_load_district" name="present_district" id=""
                                        data-url="{{ route('load_thana.fetch') }}" data-dependent="present_load_thana">
                                        @if ($user->present_district != null)
                                            <option selected value="{{ $user->present_district }}">
                                                {{ $user->userPresentDistrict ? $user->userPresentDistrict->name  : $user->present_district}}
                                            </option>
                                            @foreach ($present_districts as $value)
                                                @if ($value->id != $user->present_district)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>

                                                @endif

                                            @endforeach
                                        @else
                                            <option value="">Select...</option>
                                            @foreach ($present_districts as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Thana</label>
                                <div class="col-lg-9">
                                    <select class="form-control present_load_thana" name="present_thana" id="" >
                                        @if ($user->present_thana != null)
                                            <option selected value="{{ $user->present_thana }}">
                                                {{ $user->userPresentThana ? $user->userPresentThana->name  : $user->present_thana}}</option>

                                            @foreach ($present_thanas as $value)
                                                @if ($value->id != $user->present_thana)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>

                                                @endif

                                            @endforeach
                                        @else
                                            <option value="">Select...</option>
                                            @foreach ($present_thanas as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label
                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Postal
                                    Code</label>
                                <div class="col-lg-9">
                                    <input type="number" name="present_po" placeholder="Portal Code"
                                        value="{{ $user->present_po }}"  class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profile
                                Picture</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="profile_img" type="file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">

                            </div>
                            <div class="col-lg-9">
                                <input class="" name="profile_public" type="checkbox" {{$user->profile_public==1?"checked":null}}> Profile Picture Public
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

    </div>

    <br>
@endsection
@push('js')

    <script>
        $(document).ready(function() {

            $(document).on('change',
                '.fetch_religion,.load_district,.load_thana,.present_load_division,.present_load_district,.unload_thana',
                function(e) {
                    // alert(1);
                    var tgtElm = e.target;
                    // alert(tgtElm);

                    if ($(tgtElm).val() != '') {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dependent = $(this).data('dependent');
                        var _token = $('input[name="_token"]').val();
                        // alert($(tgtElm).data("url"));
                        $.ajax({
                            url: $(tgtElm).data("url"),
                            method: "POST",
                            data: {
                                select: select,
                                value: value,
                                _token: _token,
                                dependent: dependent
                            },
                            success: function(response) {
                                if (response.success) {
                                    // alert(1);

                                    var updatableELm = $(document).find('select' + "." + dependent);
                                    // console.log(updatableELm);
                                    updatableELm.empty().append($('<option>', {
                                        value: '',
                                        text: 'Select'
                                    }));
                                    $.each(response.datas, function(i, item) {
                                        updatableELm.append($('<option>', {
                                            value: item.id,
                                            text: item.name
                                        }));
                                    });
                                }
                            }

                        })
                    }
                });


            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

        });
    </script>

@endpush
@push('js')

    <script>
        $(document).ready(function(e) {

            if ($('#present_country').val() == 'Bangladesh') {
                $('.other_loc').show();
            } else {
                $('.other_loc').hide();
            }

            if ($('#permanent_country').val() == 'Bangladesh') {
                $('.other_loc_perm').show();
            } else {
                $('.other_loc_perm').hide();
            }



            $('#present_country').on('change', function() {
                // alert($(this).val());
                if ($(this).val() == "Bangladesh") {
                    //    alert(1);
                    $('.other_loc').show();
                } else {
                    //    alert(1);
                    $('.other_loc').hide();
                }
            });

            $('#permanent_country').on('change', function() {
                // alert($(this).val());
                if ($(this).val() == "Bangladesh") {
                    //    alert(1);
                    $('.other_loc_perm').show();
                } else {
                    //    alert(1);
                    $('.other_loc_perm').hide();
                }
            });


        });

        $(document).ready(function() {

            $(document).on('change',
                '.load_division,.load_district,.load_thana,.present_load_division,.present_load_district,.unload_thana',
                function(e) {
                    // alert(1);
                    var tgtElm = e.target;
                    // alert(tgtElm);

                    if ($(tgtElm).val() != '') {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dependent = $(this).data('dependent');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: $(tgtElm).data("url"),
                            method: "POST",
                            data: {
                                select: select,
                                value: value,
                                _token: _token,
                                dependent: dependent
                            },
                            success: function(response) {
                                if (response.success) {
                                    // alert(1);

                                    var updatableELm = $(document).find('select' + "." + dependent);
                                    // console.log(updatableELm);
                                    updatableELm.empty().append($('<option>', {
                                        value: '',
                                        text: 'Select'
                                    }));
                                    $.each(response.datas, function(i, item) {
                                        updatableELm.append($('<option>', {
                                            value: item.id,
                                            text: item.name
                                        }));
                                    });
                                }
                            }

                        })
                    }
                });


            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

        });
    </script>

@endpush
