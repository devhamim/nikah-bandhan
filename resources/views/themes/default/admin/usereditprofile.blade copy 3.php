@extends('admin.master.dashboardmaster')
@push('css')

<style>
    .password-grid{
        display: grid;
        grid-template-columns: 50% 50%;
        grid-column-gap: 4px;
}

dl {
        display: grid;
        grid-template-columns: 60% 40%;
        grid-column-gap: 20px;
    }

    dt {
        text-align: right;
    }
</style>

@endpush
@section('content')

<div class="container py-2">

    <div class="row">

        <div class="col-lg-3 mt-4 mt-lg-0">
            <div class="card">
                <div class="card-body">
                    @include('admin.partials.userProfileparts')
                </div>
            </div>

        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-7">
                    <div class="password-grid">
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card px-3 py-3">
                                        Send temperory password
                                    </div>
                                    <form method="post" action="{{ route('admin.newTempPassSendPost', $user) }}">
                                        {{ csrf_field() }}
                                          <div class="form-group form-group-lg  {{ $errors->has('new_password') ? ' has-error' : '' }}">

                                              {{-- @if(Auth::user()->email == 'masudbdm@gmail.com') --}}


                                            <label for="new_password">New Password:</label>


                                            <input autocomplete="off" type="text" placeholder="New Password for {{ $user->username}}" name="new_password" value="{{ old('new_password') ?: $user->password_temp }}" class="form-control" id="new_password">

                                            <span class="help-block">Previous Temp Pass: <b class="w3-text-purple">{{ $user->password_temp }} </b></span>



                                            @if($errors->has('new_password'))

                                            <span class="help-block">
                                                <strong>{{ $errors->first('new_password') }}</strong>
                                            </span>

                                            @endif
                                          </div>



                                          <button type="submit" class="w3-btn w3-round w3-blue">Click & Send New Password</button>
                                        </form>

                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card px-3 py-3">
                                        Upgrade to Free Package
                                    </div>
                                    <form method="post" action="{{ route('admin.upgradeUserForFreePost', $user) }}">
                                        {{ csrf_field() }}
                                          <div class="form-group form-group-lg  {{ $errors->has('free_membership_duration') ? ' has-error' : '' }}">
                                            <label for="free_membership_duration">Duration (Days):</label>
                                            <input autocomplete="off" type="number" placeholder="Free Membership Duration" name="free_membership_duration" min="1" max="20" value="{{ old('free_membership_duration') ?: 2 }}" class="form-control" id="free_membership_duration">
                                            <span class="help-block">Minimum 1 & maximum 20 days</span>


                                            @if($errors->has('free_membership_duration'))

                                            <span class="help-block">
                                                <strong>{{ $errors->first('free_membership_duration') }}</strong>
                                            </span>

                                            @endif
                                          </div>

                                          <button type="submit" class="w3-btn w3-round w3-blue">Upgrade for Free</button>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card px-3 py-3">
                                User Analytics
                            </div>

                            <dl class="dl-horizontal" style="margin-bottom: 0px;">
                                <dt>Profile created date</dt>
                                <dd>{{ $user->created_at->format('d/m/Y') }}</dd>
                                <dt>Profile created time</dt>
                                <dd>{{ $user->created_at->format('h.m.s') }}</dd>
                             <dt>Visitors</dt>
                             <dd>{{ $user->visitors()->count() }}</dd>
                             <dt>Favourite Users</dt>
                             <dd>{{ $user->favs()->count() }}</dd>
                             <dt>Blocked Users</dt>
                             <dd>{{ $user->blockss()->count() }}</dd>
                             <dt>Proposal Pending to me</dt>
                             <dd>{{ $user->pendingProposalToMeCount() }}</dd>
                             <dt>Proposal to me</dt>
                             <dd>{{ $user->proposalToMeCount() }}</dd>
                             <dt>Proposal sent by me</dt>
                             <dd>{{ $user->proposalFromMeCount() }}</dd>

                             <dt>My Contacts ({{ $user->contactLimit() }})</dt>
                             <dd>{{ $user->cont()->count() }}</dd>

                             <dt>Current Package</dt>
                             <dd>{{ $user->package }}</dd>
                             <dt>Expired at</dt>
                             @if($user->expired_at)
                             <dd>{{ date('d-M-Y', strtotime($user->expired_at)) }}</dd>
                             @else
                             <dd>0</dd>
                             @endif
                             <dt>Duration (Days)</dt>
                             <dd>{{ $user->packageDuration() }}</dd>

                              @if ($user->loggedin_at)
                                <dt>Last Login </dt>
                                <dd>

                                    {{ $user->loggedin_at }}</dd>
                              @endif

                        </dl>



                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        <div class="row">


            <div class="col-lg-12">

                <div class="overflow-hidden mb-1">
                    <h2 class="font-weight-normal text-7 mb-0"><strong
                            class="font-weight-extra-bold">@if($user->id==auth()->user()->id)My @else
                            {{$user->name}}@endif</strong> Profile</h2>
                </div>
                <div class="overflow-hidden mb-4 pb-3">
                </div>
                @include('alerts.alerts')

                <form action="{{ route('profilePost3',$user->id) }}" role="form" method="POST" class="needs-validation"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-12">
                            <h5 >My Basic Informations & Appearance</h5>
                            <div class="card card-danger">

                            <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" required type="text" value="{{$user->name}}" required>
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
                                                @if($user->skin_color!=null)
                                                    <option selected value="{{ $user->skin_color }}">{{ $user->skin_color }}
                                                    </option>
                                                    @foreach($userSettingFields[18]->values as $value)
                                                        @if($user->skin_color != $value->title)
                                                            <option>{{ $value->title }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="">Select...</option>
                                                    @foreach($userSettingFields[18]->values as $value)
                                                        <option>{{ $value->title }}</option>
                                                    @endforeach
                                                @endif


                                            </select>
                                        </div>
                                    </div>



                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profile
                                Created By</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="profile_created_by" id="" required>


                                    @if($user->profile_created_by!=null)
                                        <option selected value="{{ $user->profile_created_by }}">{{ $user->profile_created_by }}
                                        </option>

                                        @foreach($userSettingFields[1]->values as $value)
                                        @if($user->profile_created_by!=$value->title )
                                        <option value="{{ $value->title }}">
                                            {{ $value->title }}</option>
                                            @endif

                                    @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach($userSettingFields[1]->values as $value)
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
                                    @if($user->marital_status!=null)
                                        <option selected value="{{ $user->marital_status }}">{{ $user->marital_status }}</option>

                                        @foreach($userSettingFields[10]->values as $value)
                                            @if($user->marital_status != $value->title)
                                                <option>{{ $value->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">Select...</option>
                                        @foreach($userSettingFields[10]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    @endif

                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Mobile</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="mobile" type="text" value="{{ $user->mobile }}" required>
                            </div>
                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children
                                            Have?</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="children_have" id="" required>
                                                @if($user->children_have!=null)
                                                <option selected value="{{$user->children_have}}">{{$user->children_have}}</option>

                                                @foreach($userSettingFields[12]->values as $value)
                                                @if($user->children_have!=$value->title)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                                    @endif

                                            @endforeach
                                                @else
                                                <option value="">Select...</option>
                                                @foreach($userSettingFields[12]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>

                                            @endforeach
                                                @endif


                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Body
                                            Type</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="body_type" id="" required>
                                                @if($user->body_type!=null)
                                                    <option selected value="{{ $user->body_type }}">{{ $user->body_type }}
                                                    </option>
                                                    @foreach($userSettingFields[15]->values as $value)
                                                        @if($user->body_type != $value->title)
                                                            <option>{{ $value->title }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="">Select...</option>
                                                    @foreach($userSettingFields[15]->values as $value)
                                                        <option>{{ $value->title }}</option>

                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="height" id="" required>
                                                @if($user->height!=null)
                                                    <option selected value="{{ $user->height }}">{{ $user->height }}</option>
                                                @else
                                                    <option value="">Select...</option>
                                                @endif<option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="5">5</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Disability</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="disability" id="" required>
                                                @if($user->disability!=null)
                                                    <option selected value="{{ $user->disability }}">{{ $user->disability }}
                                                    </option>
                                                    @foreach($userSettingFields[21]->values as $value)
                                                        @if($user->disability != $value->title)
                                                            <option>{{ $value->title }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="">Select...</option>
                                                    @foreach($userSettingFields[21]->values as $value)
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
                                            @if($user->blood_group!=null)
                                                <option selected value="{{ $user->blood_group }}">{{ $user->blood_group }}</option>
                                                @foreach($userSettingFields[24]->values as $value)
                                                    @if($user->blood_group != $value->title)
                                                        <option>{{ $value->title }}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="">Select...</option>
                                                @foreach($userSettingFields[24]->values as $value)
                                                    <option>{{ $value->title }}</option>

                                                @endforeach
                                            @endif


                                        </select>

                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 >MY COMMUNITY & SOCIAL BACKGROUND</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Community</label>
                                            <div class="col-lg-9">
                                                <select class="form-control fetch_religion" name="religion" id="" required  data-url="{{ route('cast.fetch') }}" data-dependent="fetch_cast">
                                                    @if($user->religion!=null)
                                                        <option selected value="{{ $user->religion }}">{{ $user->userReligion ? $user->userReligion->name  : $user->religion}}</option>
                                                        @foreach($religions as $value)
                                                            @if($user->religion != $value->id)
                                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">Select...</option>
                                                        @foreach($religions as $value)
                                                                <option value="{{ $value->id }}">{{ $value->name }}</option>

                                                        @endforeach
                                                    @endif

                                                </select>


                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Caste</label>
                                            <div class="col-lg-9">
                                                <select class="form-control fetch_cast" name="caste" id="" required>
                                                    @if($user->caste!=null)
                                                        <option selected value="{{ $user->caste }}">{{ $user->userCaste ? $user->userCaste->name  : $user->caste}}</option>

                                                        @foreach($casts as $value)
                                                            @if($user->caste != $value->id)
                                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">Select...</option>

                                                        @foreach($casts as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                    @endif

                                                </select>


                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                                                Value</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="family_value" id="" required>
                                                    @if($user->family_value!=null)
                                                        <option selected value="{{ $user->family_value }}">{{ $user->family_value }}
                                                        </option>
                                                        @foreach($userSettingFields[43]->values as $value)
                                                            @if($user->family_value != $value->title)
                                                                <option>{{ $value->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">Select...</option>
                                                        @foreach($userSettingFields[43]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mother
                                                Tongue</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="mother_tongue" id="" required>
                                                    @if($user->mother_tongue!=null)
                                                        <option selected value="{{ $user->mother_tongue }}">{{ $user->mother_tongue }}
                                                        </option>
                                                        @foreach($userSettingFields[30]->values as $value)
                                                            @if($user->mother_tongue!=$value->title )
                                                                <option value="{{ $value->title }}">
                                                                    {{ $value->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">Select...</option>
                                                        @foreach($userSettingFields[30]->values as $value)
                                                            <option value="{{ $value->title }}">
                                                                {{ $value->title }}</option>

                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 >MY CULTURAL BACKGROUND</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Country of
                                                Birth </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="country" id="" required>
                                                    @if($user->country!=null)
                                                        <option selected value="{{ $user->country }}">{{ $user->country }}
                                                        </option>
                                                        @foreach($userSettingFields[2]->values as $value)
                                                            @if($user->country!=$value->title )
                                                                <option value="{{ $value->title }}">
                                                                    {{ $value->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">Select...</option>
                                                        @foreach($userSettingFields[2]->values as $value)
                                                            <option value="{{ $value->title }}">
                                                                {{ $value->title }}</option>

                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Grew Up
                                                In</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="grewup_in" id="" required>
                                                    @if($user->grewup_in!=null)
                                                        <option selected value="{{ $user->grewup_in }}">{{ $user->grewup_in }}
                                                        </option>
                                                        @foreach($userSettingFields[2]->values as $value)
                                                            @if($user->grewup_in!=$value->title )
                                                                <option value="{{ $value->title }}">
                                                                    {{ $value->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">Select...</option>
                                                        @foreach($userSettingFields[2]->values as $value)
                                                            <option value="{{ $value->title }}">
                                                                {{ $value->title }}</option>

                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Personal
                                                Values</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="personal_value" id="" required>
                                                    @if($user->personal_value!=null)
                                                        <option selected value="{{ $user->personal_value }}">{{ $user->personal_value }}
                                                        </option>

                                                        @foreach($userSettingFields[45]->values as $value)
                                                            @if($user->personal_value!=$value->title )
                                                                <option value="{{ $value->title }}">
                                                                    {{ $value->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">Select...</option>
                                                        @foreach($userSettingFields[45]->values as $value)
                                                            <option value="{{ $value->title }}">
                                                                {{ $value->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Can
                                                Speak</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="can_speak[]" id="" required multiple>


                                                    @if($user->can_speak!=null)
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
                                                        @foreach($userSettingFields[31]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <h5 >MY EDUCATION & CAREER</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Education
                                                Level</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="education_level" id="" required>

                                                    @if($user->education_level!=null)
                                                        <option selected value="{{ $user->education_level }}">{{ $user->education_level }}
                                                        </option>

                                                        @foreach($userSettingFields[25]->values as $value)
                                                            @if($user->education_level != $value->title)
                                                                <option>{{ $value->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">Select...</option>
                                                        @foreach($userSettingFields[25]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">University</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="university" class="form-control"
                                                    placeholder="University Name" value="{{ $user->university }}" required id="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Major
                                                Subject</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="major_subject" class="form-control" value="{{ $user->major_subject }}"
                                                    placeholder="Major Subject" required id="">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Workplace</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="workplace" class="form-control" value="{{ $user->workplace }}"
                                                    placeholder="Workplace" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Designation</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="designation" class="form-control"
                                                    placeholder="Designation..." value="{{ $user->designation }}" required id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <h5 >MY HOBBIES, INTERESTS & MORE</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Music</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2 w-100" name="music[]" id="" required multiple  multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple">
                                                    @if($user->music!=null)
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
                                                        @foreach($userSettingFields[37]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Book</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="book[]" id="" required multiple>



                                                    @if($user->book!=null)
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
                                                        @foreach($userSettingFields[36]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Cooking</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="cooking[]" id="" required multiple>




                                                    @if($user->cooking!=null)
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
                                                        @foreach($userSettingFields[35]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach



                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Movie</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" multiple name="movie[]" id="" required>



                                                    @if($user->cooking!=null)
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
                                                        @foreach($userSettingFields[38]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach




                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Dress
                                                Style</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" multiple name="dress[]" id="" required>

                                                    @if($user->dress!=null)
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
                                                        @foreach($userSettingFields[19]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach



                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5 >LIFESTYLE INFO</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Religious
                                                View</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="religious_view" id="" required>
                                                    @if($user->religious_view!=null)
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
                                                    @if($user->drink!=null)
                                                    <option selected value="{{$user->drink}}">{{$user->drink}}
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

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Smoke?</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="smoke" id="" required>
                                                    @if($user->smoke!=null)
                                                    <option selected value="{{$user->smoke}}">{{$user->smoke}}
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
                                                    @if($user->diet!=null)
                                                    <option selected value="{{$user->diet}}">{{$user->diet}}
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

                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5 >FAMILY INFORMATION</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                                                Type</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="family_type" id="" required>
                                                    @if($user->family_type!=null)
                                                    <option selected value="{{$user->family_type}}">{{$user->family_type}}
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
                                                    @if($user->family_status!=null)
                                                    <option selected value="{{$user->family_status}}">{{$user->family_status}}
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
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Father
                                                Profession</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="father_prof" value="{{ $user->father_prof }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mother
                                                Profession</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="mother_prof" value="{{ $user->mother_prof }}" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                                                Brothers</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="no_bro" value="{{ $user->no_bro }}" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                                                Brother Married</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="no_bro_m" value="{{ $user->no_bro_m }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                                                Sisters</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="no_sis" value="{{ $user->no_sis }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                                                Sisters Married</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="no_sis_m" value="{{ $user->no_sis_m }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5 >CONTACT INFORMAION</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Time To
                                                Call</label>
                                            <div class="col-lg-9">

                                                <input type="text" class="form-control" name="call_time" value="{{ $user->call_time }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Contact
                                                Person</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="contact_person" class="form-control" value="{{ $user->contact_person }}"
                                                    placeholder="Name of Contact Person..." required id="">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Relation with
                                                Contact Person</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="relation_with_contact" class="form-control" value="{{ $user->relation_with_contact }}"
                                                    placeholder="Workplace" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <h5 >PERMANENT ADDRESS</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Country</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="permanent_country" id="permanent_country" required>
                                                    @if($user->permanent_country!=null)
                                                    <option selected value="{{$user->permanent_country}}">{{$user->permanent_country}}
                                                    </option>

                                                    @foreach($userSettingFields[2]->values as $value)
                                                    @if($user->permanent_country!=$value->title )
                                                        <option value="{{ $value->title }}">
                                                            {{ $value->title }}</option>
                                                    @endif
                                                @endforeach
                                                    @else
                                                    <option value="">Select...</option>
                                                    @foreach($userSettingFields[2]->values as $value)
                                                    @if($user->permanent_country!=$value->title )
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
                                                    <select class="form-control load_division" name="parmanent_division" id="" required
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
                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                        <div class="other_loc_perm">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">District</label>
                                            <div class="col-lg-9">
                                                <select class="form-control load_district" name="parmanent_district" id="" required
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
                                                <select class="form-control load_thana" name="parmanent_thana" id="" required>
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

                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <h5 >PRESENT ADDRESS</h5>
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
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
                                                    <select class="form-control present_load_division" name="present_division" id="" required
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
                                                    <select class="form-control present_load_district" name="present_district" id="" required
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
                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                        <div class="other_loc">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Thana</label>
                                            <div class="col-lg-9">
                                                <select class="form-control present_load_thana" name="present_thana" id="" required>
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
                                                <input type="number" name="present_po" placeholder="Portal Code" value="{{$user->present_po}}"
                                                    required class="form-control">
                                            </div>
                                        </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>

                        <h2 class="text-center">Pertner Preference Part</h2>

                        @if($user->pertnerPreference)
                        <div class="col-md-12">
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Age
                                                (min)</label>
                                            <div class="col-lg-9">


                                                    <select name="age_min" id="" class="form-control" required>
                                                        @if($user->pertnerPreference->min_age!=null)
                                                        <option selected value="{{$user->pertnerPreference->min_age}}">{{$user->pertnerPreference->min_age}} Years</option>

                                                        @for($i=18;$i<81;$i++)
                                                        @if($user->pertnerPreference->min_age!=$i)

                                                        <option value="{{$i}}">{{$i}} Year</option>
                                                        @endif
                                                        @endfor

                                                        @else
                                                        @for($i=18;$i<81;$i++)

                                                        <option value="{{$i}}">{{$i}} Year</option>
                                                        @endfor
                                                        @endif
                                                    </select>


                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Age
                                                (max)</label>
                                            <div class="col-lg-9">

                                                <select name="age_max" id="" class="form-control" required>
                                                    @if($user->pertnerPreference->max_age!=null)
                                                    <option selected value="{{$user->pertnerPreference->max_age}}">{{$user->pertnerPreference->max_age}} Years</option>

                                                    @for($i=18;$i<81;$i++)
                                                    @if($user->pertnerPreference->max_age!=$i)

                                                    <option value="{{$i}}">{{$i}} Year</option>
                                                    @endif
                                                    @endfor

                                                    @else
                                                    @for($i=18;$i<81;$i++)

                                                    <option value="{{$i}}">{{$i}} Year</option>
                                                    @endfor
                                                    @endif
                                                </select>


                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Height
                                                (min)</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="height_min" value="{{$user->pertnerPreference->min_height}}"
                                                    required type="text" placeholder="Min height..." required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Height
                                                (max)</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="height_max" value="{{$user->pertnerPreference->max_height}}"
                                                    required type="text" placeholder="Max height..." required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Religion</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="p_religion" id="" required>
                                                    @if($user->pertnerPreference->religion!=null)
                                                    <option selected value="{{$user->pertnerPreference->religion}}">
                                                        {{$user->pertnerPreference->religion}}</option>
                                                    @else
                                                    <option>Select...</option>
                                                    @endif
                                                    <option value="Muslim">Muslim</option>
                                                    <option value="Hindu">Hindu</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Marital
                                                Status</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="p_marital_status" id="" required>
                                                    @if($user->pertnerPreference->marital_status!=null)
                                                    <option selected value="{{$user->pertnerPreference->marital_status}}">
                                                        {{$user->pertnerPreference->marital_status}}</option>
                                                    @else
                                                    <option>Select...</option>
                                                    @endif
                                                    <option value="Unmarried">Unmarried</option>
                                                    <option value="Married">Married</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Children</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="p_children" id="" required>
                                                    @if($user->pertnerPreference->children!=null)
                                                    <option selected value="{{$user->pertnerPreference->children}}">
                                                        {{$user->pertnerPreference->children}}</option>
                                                    @else
                                                    <option>Select...</option>
                                                    @endif
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Education</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="p_study[]" id="" required multiple>


                                                        @if($user->pertnerPreference->study!=null)
                                                        <?php
                                                        $arr = explode(', ',$user->pertnerPreference->study);
                                                        ?>

                                                        @foreach ($arr as $element)
                                                        <option selected value="{{ $element }}">
                                                            {{ $element }}</option>
                                                        @endforeach

                                                        @else
                                                        <option value="">Select...</option>
                                                    @endif
                                                        @foreach($userSettingFields[25]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profession</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="p_profession[]" id="" required multiple>
                                                    @if($user->pertnerPreference->profession!=null)

                                                    <?php
                                                    $arr = explode(', ',$user->pertnerPreference->profession);
                                                    ?>

                                                    @foreach ($arr as $element)
                                                    <option selected value="{{ $element }}">
                                                        {{ $element }}</option>
                                                    @endforeach

                                                    @else
                                                    <option value="">Select...</option>
                                                    @endif
                                                    @foreach($userSettingFields[26]->values as $value)
                                                    <option>{{ $value->title }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">SKin
                                                Color</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="p_skin_color[]" id="" required multiple>
                                                    @if($user->pertnerPreference->skin_color!=null)
                                                    <?php
                                                    $arr = explode(', ',$user->pertnerPreference->skin_color);
                                                    ?>

                                                    @foreach ($arr as $element)
                                                    <option selected value="{{ $element }}">
                                                        {{ $element }}</option>
                                                    @endforeach

                                                    @else
                                                    <option value="">Select...</option>
                                                    @endif
                                                    @foreach($userSettingFields[18]->values as $value)
                                                    <option>{{ $value->title }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Physical
                                                Disability</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="p_physical_disability" id="" required>
                                                    @if($user->pertnerPreference->physical_disability!=null)
                                                    <option selected value="{{$user->pertnerPreference->physical_disability}}">
                                                        {{$user->pertnerPreference->physical_disability}}</option>
                                                    @else
                                                    <option>Select...</option>
                                                    @endif <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>





                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>

                        @else
                        <div class="col-md-12">
                            <div class="card card-danger">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Age
                                                (min)</label>
                                            <div class="col-lg-9">


                                                    <select name="age_min" id="" class="form-control" required>

                                                        @for($i=18;$i<81;$i++)

                                                        <option value="{{$i}}">{{$i}} Year</option>
                                                        @endfor

                                                    </select>


                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Age
                                                (max)</label>
                                            <div class="col-lg-9">

                                                <select name="age_max" id="" class="form-control" required>

                                                    @for($i=18;$i<81;$i++)

                                                    <option value="{{$i}}">{{$i}} Year</option>
                                                    @endfor

                                                </select>


                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Height
                                                (min)</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="height_min"
                                                    required type="text" placeholder="Min height..." required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Height
                                                (max)</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="height_max"
                                                    required type="text" placeholder="Max height..." required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Religion</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="p_religion" id="" required>

                                                    <option>Select...</option>

                                                    <option value="Muslim">Muslim</option>
                                                    <option value="Hindu">Hindu</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Marital
                                                Status</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="p_marital_status" id="" required>

                                                    <option>Select...</option>

                                                    <option value="Unmarried">Unmarried</option>
                                                    <option value="Married">Married</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Children</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="p_children" id="" required>

                                                    <option>Select...</option>

                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Education</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="p_study[]" id="" required multiple>


                                                        <option value="">Select...</option>

                                                        @foreach($userSettingFields[25]->values as $value)
                                                            <option>{{ $value->title }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profession</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="p_profession[]" id="" required multiple>

                                                    <option value="">Select...</option>

                                                    @foreach($userSettingFields[26]->values as $value)
                                                    <option>{{ $value->title }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">SKin
                                                Color</label>
                                            <div class="col-lg-9">
                                                <select class="form-control select2" name="p_skin_color[]" id="" required multiple>

                                                    <option value="">Select...</option>

                                                    @foreach($userSettingFields[18]->values as $value)
                                                    <option>{{ $value->title }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Physical
                                                Disability</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="p_physical_disability" id="" required>

                                                    <option>Select...</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>





                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>
                        @endif



                    </div>



                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profile
                            Picture</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="profile_img" type="file">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme" name="final_check" {{$user->final_check ? 'checked' : ''}}>
                                <label class="custom-control-label text-2" for="rememberme">Final Check (Approve)</label>
                            </div>
                        </div>

                        <div class="form-group col-lg-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="user_type" {{ $user->isOffline() ? 'checked' : '' }} /> Offline
                                    Profile</label>
                            </div>

                        </div>

                        <div class="form-group col-lg-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="featured" {{ $user->featured ? 'checked' : '' }} /> Active
                                    (Featured)</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 text-right">
                            <input type="submit" value="Save" class="btn btn-primary btn-modern float-right"
                                data-loading-text="Loading...">
                        </div>
                    </div>


                </form>

            </div>
        </div>

        <div class="row bg-white">


                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body pt-3">
                            <h5>Upload CV</h5>
                            <form class="py-2" action="{{ route('admin.uploadNewCv', $user) }}" method="post" enctype="multipart/form-data" style="border: 2px solid gray">
                                <div class="row">
                                <div class="col-md-7">

                                <input type="file" class="form-control" id="cv" name="cv" multiple  required>

                                {{ csrf_field() }}
                            </div>
                                <div class="col-md-5">
                                    <button type="submit" class="w3-btn w3-white w3-round w3-border w3-border-purple w3-right w3-hover-purple btn-sm"><i class="fa fa-upload"></i> Upload</button>
                                </div>
                                <div class="col-md-12 ml-2">
                                    <small>If new cv uploaded, Old cv will be replaced by new one.</small>
                                </div>
                                </div>

                         </form>

                         <div class="">
                            @if($user->file_name)

                                  <br>
                                  <b>CV / Biodata:  </b>
                                  <div class="row">
                                      <div class="col-md-8">

                                  @if($user->fileIsImage())

                                  <img width="50" src="{{ asset('img/image.png') }}" alt="CV">

                              @elseif($user->fileIsPdf())
                              <img width="50" src="{{ asset('img/pdf.png') }}" alt="CV">
                              @elseif($user->fileIsWord())
                              <img width="50" src="{{ asset('img/word.png') }}" alt="CV">
                              @endif &nbsp; &nbsp;
                              <b>Status: {{ $user->cvStatus() }}</b>

                              <br>
                                      </div>
                                      <div class="col-md-4">
                                        <a class="btn btn-xs  w3-btn w3-blue pull-right" href="{{ asset('storage/users/cv/'. $user->file_name) }}" download="id_{{ $user->id }}_email_{{ $user->email }}_mobile_{{ $user->mobile }}_cv.{{ $user->file_ext }}">
                                            Download
                                       </a>
                                      </div>



                              <div class="checkbox">
                          <label>
                              <input class="image-check"
                              data-url="{{ route('admin.userCvChecked',$user)}}"
                              type="checkbox"
                              name="cv_checked"
                              {{$user->cvStatus()}}
                              /> Data Checked (CV)</label>
                          </div>






                              @endif


                                  </div>

                          </div>

                        </div>
                    </div>

                </div>

        </div>

</div>




@endsection
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



    $('#present_country').on('change',function() {
        // alert($(this).val());
       if ($(this).val() == "Bangladesh") {
        //    alert(1);
         $('.other_loc').show();
       } else {
        //    alert(1);
         $('.other_loc').hide();
       }
     });

     $('#permanent_country').on('change',function() {
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

    $(document).ready(function () {

        $(document).on('change', '.load_division,.load_district,.load_thana,.present_load_division,.present_load_district,.unload_thana', function (e) {
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
                    success: function (response) {
                        if (response.success) {
                            // alert(1);

                            var updatableELm = $(document).find('select'+"." + dependent);
                            // console.log(updatableELm);
                            updatableELm.empty().append($('<option>', {
                                value: '',
                                text: 'Select'
                            }));
                            $.each(response.datas, function (i, item) {
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


        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    });
</script>

<script>

    $(document).ready(function () {

        $(document).on('change', '.fetch_religion,.load_district,.load_thana,.present_load_division,.present_load_district,.unload_thana', function (e) {
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
                    success: function (response) {
                        if (response.success) {
                            // alert(1);

                            var updatableELm = $(document).find('select'+"." + dependent);
                            // console.log(updatableELm);
                            updatableELm.empty().append($('<option>', {
                                value: '',
                                text: 'Select'
                            }));
                            $.each(response.datas, function (i, item) {
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


        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });


        $(function(){
    $(document).on('change','.image-check',function(e){
        // alert(1);
    e.preventDefault();

    var that = $( this );
    var url = that.attr("data-url");

    $.ajax({
      url: url,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        // alert('ok');
      },
      error: function(){
        // alert('error');
      }
    });
  });
});

    });
</script>



@endpush
