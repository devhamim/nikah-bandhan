@extends('admin.master.dashboardmaster')

@push('css')
    <link href="{{ asset('css/cropper.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/userProfile2.css') }}" rel="stylesheet" />

    <style>
        .password-grid {
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
            font-size: 12px;
            line-height: 1;
        }

        dd {
            font-size: 12px;
            line-height: 1;
        }

    </style>
@endpush

@section('content')

    <div class="container py-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header with-border">
                            <h3 class="card-title"><i class="fa fa-th"></i> Edit information of
                                ID:{{ $user->id }}, {{ $user->email }}, {{ $user->name }}
                                @if ($user->isOffline())
                                    | <span class="w3-dark-gray w3-round w3-padding w3-large">Offline Profile</span>
                                @endif
                            </h3>
                            <div class="pull-right">

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-3 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="fb-profile">

                                    <div class="profile-image">
                                        @if ($user->uploadedPP())
                                            <img align="left" class="fb-image-profile w3-animate-zoom img-thumbnail"
                                                src="{{ asset('storage/users/pp/' . $user->uploadedPP()->image_name) }}"
                                                alt="Profile image example" />
                                        @elseif($user->profile_img != null)
                                            <img align="left" class="fb-image-profile w3-animate-zoom img-thumbnail"
                                                src="{{ asset('storage/users/pp/' . $user->profile_img) }}"
                                                alt="Profile image example" />
                                        @else
                                            <img align="left" class="fb-image-profile w3-animate-zoom img-thumbnail"
                                                src="{{ asset('img/vip-user.png') }}" alt="Profile image example" />
                                        @endif
                                    </div>


                                    <div class="crop-profilepic-container">
                                        <img style="display: none;" class="img-responsive" id="crop-profilepic" src="">
                                    </div>


                                    <a id="btn-profilepic" class="btn-profilepic" title="Change Profile Picture">


                                        <span class="fa-stack fa-lg ">
                                            <i class="fa fa-square-o fa-stack-2x "></i>
                                            <i
                                                class="fa fa-camera w3-text-white w3-hover-shadow w3-hover-deep-orange w3-round w3-card-4 w3-blue fa-stack-1x "></i>
                                        </span>

                                    </a>

                                    <form id="form_profilepic_upload" style="" method="post" enctype="multipart/form-data"
                                        action="{{ route('admin.userProfilepicChange', $user) }}">
                                        {{ csrf_field() }}
                                        <input class="form-control" type="file" id="my_profilepic" name="profile_picture"
                                            style="display: none" />
                                        <input class="form-control" style="display: none;" id="off_x" step="any"
                                            type="number" name="off_x" />
                                        <input class="form-control" style="display: none;" id="off_y" step="any"
                                            type="number" name="off_y">
                                        <input class="form-control" style="display: none;" id="change_width" step="any"
                                            type="number" name="change_width">
                                        <input class="form-control" style="display: none;" id="change_height" step="any"
                                            type="number" name="change_height">

                                        <button type="reset"
                                            class="btn-card-4 btn-profilepic-cancel w3-btn w3-round w3-white btn-xs"><i
                                                class="fa ion-android-cancel fa-2x w3-text-red"></i></button>
                                        <button type="submit"
                                            class="btn-card-4 btn-profilepic-submit w3-btn w3-round w3-white btn-xs"><i
                                                class="fa ion-android-checkmark-circle fa-2x w3-text-green"></i></button>
                                    </form>


                                </div>


                                {{-- <div class="row text-center">
                           <div class="col-md-3">
                            @if ($user->profile_img)
                            <img src="{{asset('storage/profile/'. $user->profile_img)}}" alt="" class="img-fluid"
                                style="max-width: 80%;">
                            @else
                            <img src="{{asset('img/vip-user.png')}}" alt="" class="img-fluid" style="max-width: 80%;">
                            @endif
                            <div class="crop-profilepic-container" >
                                <img style="display: none;" class="img-responsive" id="crop-profilepic" src="">
                                </div>

                           </div>
                       </div> --}}
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
                                                <form method="post"
                                                    action="{{ route('admin.newTempPassSendPost', $user) }}">
                                                    {{ csrf_field() }}
                                                    <div
                                                        class="form-group form-group-lg  {{ $errors->has('new_password') ? ' has-error' : '' }}">

                                                        {{-- @if (Auth::user()->email == 'masudbdm@gmail.com') --}}


                                                        <label for="new_password">New Password:</label>


                                                        <input autocomplete="off" type="text"
                                                            placeholder="New Password for {{ $user->username }}"
                                                            name="new_password"
                                                            value="{{ old('new_password') ?: $user->password_temp }}"
                                                            class="form-control" id="new_password">

                                                        <span class="help-block">Previous Temp Pass: <b
                                                                class="w3-text-purple">{{ $user->password_temp }}
                                                            </b></span>



                                                        @if ($errors->has('new_password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('new_password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>



                                                    <button type="submit" class="w3-btn w3-round w3-blue">Click & Send New
                                                        Password</button>
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
                                                <form method="post"
                                                    action="{{ route('admin.upgradeUserForFreePost', $user) }}">
                                                    {{ csrf_field() }}
                                                    <div
                                                        class="form-group form-group-lg  {{ $errors->has('free_membership_duration') ? ' has-error' : '' }}">
                                                        <label for="free_membership_duration">Duration (Days):</label>
                                                        <input autocomplete="off" type="number"
                                                            placeholder="Free Membership Duration"
                                                            name="free_membership_duration" min="1" max="20"
                                                            value="{{ old('free_membership_duration') ?: 2 }}"
                                                            class="form-control" id="free_membership_duration">
                                                        <span class="help-block">Minimum 1 & maximum 20 days</span>


                                                        @if ($errors->has('free_membership_duration'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('free_membership_duration') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <button type="submit" class="w3-btn w3-round w3-blue">Upgrade for
                                                        Free</button>
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
                                            @if ($user->expired_at)
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
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="overflow-hidden mb-4 pb-3">
                </div>
                @include('alerts.alerts')

                <form action="{{ route('profilePost3', $user->id) }}" role="form" method="POST" class="needs-validation"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-12">
                            <h5>My Basic Informations & Appearance</h5>
                            <div class="card card-danger">

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Name</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="name" type="text"
                                                        value="{{ $user->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Date
                                                    of
                                                    Birth</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="dob" type="date"
                                                        value="{{ $user->dob }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Complexion</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="skin_color" id="">
                                                        @if ($user->skin_color != null)
                                                            <option selected value="{{ $user->skin_color }}">
                                                                {{ $user->skin_color }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profile
                                                    Created By</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="profile_created_by" id="">


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
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Marital
                                                    Status</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="marital_status" id="">
                                                        @if ($user->marital_status != null)
                                                            <option selected value="{{ $user->marital_status }}">
                                                                {{ $user->marital_status }}</option>

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
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Mobile</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="mobile" type="text"
                                                        value="{{ $user->mobile }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 ">
                                                    Package
                                                </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control form-group-sm select2" id="package"
                                                    name="package">

                                                    <option value="">Free Package </option>
                                                    @if (old('package'))
                                                        <option selected>{{ old('package') }}</option>
                                                    @elseif($user->package > 0)
                                                        <option selected>{{ $user->package }}</option>
                                                    @endif
                                                    {{-- packages --}}
                                                    @foreach ($packages as $package)
                                                        <option value="{{ $package->id }}"
                                                            {{ $package->id == $user->package ? 'selected' : ' ' }}>
                                                            {{ $package->id }} ({{ $package->package_title }},
                                                            Duration {{ $package->package_duration }} Days,
                                                            {{ $package->package_currency }}
                                                            {{ $package->package_amount }})</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                @if ($errors->has('package'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('package') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Gender</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="gender" id="">
                                                        @if ($user->gender != null)
                                                            <option selected value="{{ $user->gender }}">
                                                                {{ $user->gender }}</option>

                                                            @foreach ($userSettingFields[0]->values as $value)
                                                                @if ($user->gender != $value->title)
                                                                    <option value="{{ $value->title }}">
                                                                        {{ $value->title }}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <option value="">Select...</option>
                                                            @foreach ($userSettingFields[0]->values as $value)
                                                                <option value="{{ $value->title }}">
                                                                    {{ $value->title }}</option>
                                                            @endforeach
                                                        @endif


                                                    </select>

                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children
                                                    Have?</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="children_have" id="">
                                                        @if ($user->children_have != null)
                                                            <option selected value="{{ $user->children_have }}">
                                                                {{ $user->children_have }}</option>

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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Body
                                                    Type</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="body_type" id="">
                                                        @if ($user->body_type != null)
                                                            <option selected value="{{ $user->body_type }}">
                                                                {{ $user->body_type }}
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
                                                    <select class="form-control" name="height" id="">
                                                        @if ($user->height != null)
                                                            <option selected value="{{ $user->height }}">
                                                                {{ $user->height }}</option>
                                                        @else
                                                            <option value="">Select...</option>
                                                        @endif
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="5">5</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Disability</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="disability" id="">
                                                        @if ($user->disability != null)
                                                            <option selected value="{{ $user->disability }}">
                                                                {{ $user->disability }}
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
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Blood
                                                    Group</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="blood_group" id="">
                                                        @if ($user->blood_group != null)
                                                            <option selected value="{{ $user->blood_group }}">
                                                                {{ $user->blood_group }}</option>
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

                                            {{-- Package --}}
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Expired
                                                    Date:</label>

                                                <div class="col-lg-9">
                                                    <input type="date" class="form-control" id="expired_at"
                                                        name="expired_at"
                                                        @if ($user->expired_at)
                                                        value="{{ old('expired_at') ?: date('Y-m-d', strtotime($user->expired_at)) }}"
                                                        @else
                                                        value="{{ old('expired_at') }}"
                                                        @endif
                                                        placeholder="Expired Date" />

                                                    @if ($errors->has('expired_at'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('expired_at') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>MY COMMUNITY & SOCIAL BACKGROUND</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Community</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control fetch_religion" name="religion" id=""
                                                        data-url="{{ route('cast.fetch') }}" data-dependent="fetch_cast">
                                                        @if ($user->religion != null)
                                                            <option selected value="{{ $user->religion }}">
                                                                {{ $user->userReligion ? $user->userReligion->name : $user->religion }}
                                                            </option>
                                                            @foreach ($religions as $value)
                                                                @if ($user->religion != $value->id)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <option value="">Select...</option>
                                                            @foreach ($religions as $value)
                                                                <option value="{{ $value->id }}">{{ $value->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif

                                                    </select>


                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Caste</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control fetch_cast" name="caste" id="">
                                                        @if ($user->caste != null)
                                                            <option selected value="{{ $user->caste }}">
                                                                {{ $user->userCaste ? $user->userCaste->name : $user->caste }}
                                                            </option>

                                                            @foreach ($casts as $value)
                                                                @if ($user->caste != $value->id)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <option value="">Select...</option>

                                                            @foreach ($casts as $value)
                                                                <option value="{{ $value->id }}">{{ $value->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif

                                                    </select>


                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Family
                                                    Value</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="family_value" id="">
                                                        @if ($user->family_value != null)
                                                            <option selected value="{{ $user->family_value }}">
                                                                {{ $user->family_value }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Mother
                                                    Tongue</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="mother_tongue" id="">
                                                        @if ($user->mother_tongue != null)
                                                            <option selected value="{{ $user->mother_tongue }}">
                                                                {{ $user->mother_tongue }}
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
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>MY CULTURAL BACKGROUND</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Country
                                                    of
                                                    Birth </label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="country" id="">
                                                        @if ($user->country != null)
                                                            <option selected value="{{ $user->country }}">
                                                                {{ $user->country }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Grew
                                                    Up
                                                    In</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="grewup_in" id="">
                                                        @if ($user->grewup_in != null)
                                                            <option selected value="{{ $user->grewup_in }}">
                                                                {{ $user->grewup_in }}
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

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Personal
                                                    Values</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="personal_value" id="">
                                                        @if ($user->personal_value != null)
                                                            <option selected value="{{ $user->personal_value }}">
                                                                {{ $user->personal_value }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Can
                                                    Speak</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control select2" name="can_speak[]" id="" multiple>


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
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <h5>MY EDUCATION & CAREER</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Education
                                                    Level</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="education_level" id="">

                                                        @if ($user->education_level != null)
                                                            <option selected value="{{ $user->education_level }}">
                                                                {{ $user->education_level }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">University</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="university" class="form-control"
                                                        placeholder="University Name" value="{{ $user->university }}"
                                                        id="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Major
                                                    Subject</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="major_subject" class="form-control"
                                                        value="{{ $user->major_subject }}" placeholder="Major Subject"
                                                        id="">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Workplace</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="workplace" class="form-control"
                                                        value="{{ $user->workplace }}" placeholder="Workplace">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Designation</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="designation" class="form-control"
                                                        placeholder="Designation..." value="{{ $user->designation }}"
                                                        id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <h5>MY HOBBIES, INTERESTS & MORE</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Music</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control select2 w-100" name="music[]" id=""
                                                        multiple multiple="multiple" data-placeholder="Select a State"
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Book</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control select2" name="book[]" id="" multiple>



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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Cooking</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control select2" name="cooking[]" id="" multiple>




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

                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Movie</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control select2" multiple name="movie[]" id="">



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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Dress
                                                    Style</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control select2" multiple name="dress[]" id="">

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

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5>LIFESTYLE INFO</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Religious
                                                    View</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="religious_view" id="">
                                                        @if ($user->religious_view != null)
                                                            <option selected value="{{ $user->religious_view }}">
                                                                {{ $user->religious_view }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Drink?</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="drink" id="">
                                                        @if ($user->drink != null)
                                                            <option selected value="{{ $user->drink }}">
                                                                {{ $user->drink }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Smoke?</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="smoke" id="">
                                                        @if ($user->smoke != null)
                                                            <option selected value="{{ $user->smoke }}">
                                                                {{ $user->smoke }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Diet</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="diet" id="">
                                                        @if ($user->diet != null)
                                                            <option selected value="{{ $user->diet }}">
                                                                {{ $user->diet }}
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
                            <h5>FAMILY INFORMATION</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Family
                                                    Type</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="family_type" id="">
                                                        @if ($user->family_type != null)
                                                            <option selected value="{{ $user->family_type }}">
                                                                {{ $user->family_type }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Family
                                                    Status</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="family_status" id="">
                                                        @if ($user->family_status != null)
                                                            <option selected value="{{ $user->family_status }}">
                                                                {{ $user->family_status }}
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
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Father
                                                    Profession</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="father_prof"
                                                        value="{{ $user->father_prof }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Mother
                                                    Profession</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="mother_prof"
                                                        value="{{ $user->mother_prof }}" class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Number
                                                    of
                                                    Brothers</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="no_bro" value="{{ $user->no_bro }}"
                                                        class="form-control">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Number
                                                    of
                                                    Brother Married</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="no_bro_m" value="{{ $user->no_bro_m }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Number
                                                    of
                                                    Sisters</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="no_sis" value="{{ $user->no_sis }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Number
                                                    of
                                                    Sisters Married</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="no_sis_m" value="{{ $user->no_sis_m }}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5>CONTACT INFORMAION</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Time
                                                    To
                                                    Call</label>
                                                <div class="col-lg-9">

                                                    <input type="text" class="form-control" name="call_time"
                                                        value="{{ $user->call_time }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Contact
                                                    Person</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="contact_person" class="form-control"
                                                        value="{{ $user->contact_person }}"
                                                        placeholder="Name of Contact Person..." id="">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Relation
                                                    with
                                                    Contact Person</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="relation_with_contact" class="form-control"
                                                        value="{{ $user->relation_with_contact }}"
                                                        placeholder="Workplace">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <h5>PERMANENT ADDRESS</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Country</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="permanent_country"
                                                        id="permanent_country">
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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Division</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control load_division"
                                                            name="parmanent_division" id=""
                                                            data-url="{{ route('load_district.fetch') }}"
                                                            data-dependent="load_district">
                                                            @if ($user->parmanent_division != null)
                                                                <option selected
                                                                    value="{{ $user->parmanent_division }}">
                                                                    {{ $user->userParmanentDivision ? $user->userParmanentDivision->name : $user->parmanent_division }}
                                                                </option>
                                                                @foreach ($divisions as $value)
                                                                    @if ($value->id != $user->parmanent_division)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                                @foreach ($divisions as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">District</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control load_district"
                                                            name="parmanent_district" id=""
                                                            data-url="{{ route('load_thana.fetch') }}"
                                                            data-dependent="load_thana">
                                                            @if ($user->parmanent_district != null)
                                                                <option selected
                                                                    value="{{ $user->parmanent_district }}">
                                                                    {{ $user->userParmanentDistrict ? $user->userParmanentDistrict->name : $user->parmanent_district }}
                                                                </option>
                                                                @foreach ($permanent_districts as $value)
                                                                    @if ($value->id != $user->parmanent_district)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                                @foreach ($permanent_districts as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Thana</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control load_thana" name="parmanent_thana"
                                                            id="">
                                                            @if ($user->parmanent_thana != null)
                                                                <option selected value="{{ $user->parmanent_thana }}">
                                                                    {{ $user->userParmanentThana ? $user->userParmanentThana->name : $user->parmanent_thana }}
                                                                </option>
                                                                @foreach ($permanent_thanas as $value)
                                                                    @if ($value->id != $user->parmanent_thana)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                                @foreach ($permanent_thanas as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
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
                            <h5>PRESENT ADDRESS</h5>
                            <div class="card card-danger">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Country</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="present_country"
                                                        id="present_country">
                                                        @if ($user->present_country != null)
                                                            <option selected value="{{ $user->present_country }}">
                                                                {{ $user->present_country }}
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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Division</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control present_load_division"
                                                            name="present_division" id=""
                                                            data-url="{{ route('load_district.fetch') }}"
                                                            data-dependent="present_load_district">
                                                            @if ($user->present_division != null)
                                                                <option selected value="{{ $user->present_division }}">
                                                                    {{ $user->userPresentDivision ? $user->userPresentDivision->name : $user->present_division }}
                                                                </option>
                                                                @foreach ($divisions as $value)
                                                                    @if ($value->id != $user->present_division)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                                @foreach ($divisions as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">District</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control present_load_district"
                                                            name="present_district" id=""
                                                            data-url="{{ route('load_thana.fetch') }}"
                                                            data-dependent="present_load_thana">
                                                            @if ($user->present_district != null)
                                                                <option selected value="{{ $user->present_district }}">
                                                                    {{ $user->userPresentDistrict ? $user->userPresentDistrict->name : $user->present_district }}
                                                                </option>
                                                                @foreach ($present_districts as $value)
                                                                    @if ($value->id != $user->present_district)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                                @foreach ($present_districts as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Thana</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control present_load_thana"
                                                            name="present_thana" id="">
                                                            @if ($user->present_thana != null)
                                                                <option selected value="{{ $user->present_thana }}">
                                                                    {{ $user->userPresentThana ? $user->userPresentThana->name : $user->present_thana }}
                                                                </option>

                                                                @foreach ($present_thanas as $value)
                                                                    @if ($value->id != $user->present_thana)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                                @foreach ($present_thanas as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Postal
                                                        Code</label>
                                                    <div class="col-lg-9">
                                                        <input type="number" name="present_po" placeholder="Portal Code"
                                                            value="{{ $user->present_po }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <h2 class="text-center">Pertner Preference Part</h2>

                        @if ($user->pertnerPreference)
                            <div class="col-md-12">
                                <div class="card card-danger">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Age
                                                        (min)</label>
                                                    <div class="col-lg-9">


                                                        <select name="age_min" id="" class="form-control">
                                                            @if ($user->pertnerPreference->min_age != null)
                                                                <option selected
                                                                    value="{{ $user->pertnerPreference->min_age }}">
                                                                    {{ $user->pertnerPreference->min_age }} Years
                                                                </option>

                                                                @for ($i = 18; $i < 81; $i++)
                                                                    @if ($user->pertnerPreference->min_age != $i)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }} Year</option>
                                                                    @endif
                                                                @endfor
                                                            @else
                                                                @for ($i = 18; $i < 81; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }} Year</option>
                                                                @endfor
                                                            @endif
                                                        </select>


                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Age
                                                        (max)</label>
                                                    <div class="col-lg-9">

                                                        <select name="age_max" id="" class="form-control">
                                                            @if ($user->pertnerPreference->max_age != null)
                                                                <option selected
                                                                    value="{{ $user->pertnerPreference->max_age }}">
                                                                    {{ $user->pertnerPreference->max_age }} Years
                                                                </option>

                                                                @for ($i = 18; $i < 81; $i++)
                                                                    @if ($user->pertnerPreference->max_age != $i)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }} Year</option>
                                                                    @endif
                                                                @endfor
                                                            @else
                                                                @for ($i = 18; $i < 81; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }} Year</option>
                                                                @endfor
                                                            @endif
                                                        </select>


                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height
                                                        (min)</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" name="height_min"
                                                            value="{{ $user->pertnerPreference->min_height }}"
                                                            type="text" placeholder="Min height...">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height
                                                        (max)</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" name="height_max"
                                                            value="{{ $user->pertnerPreference->max_height }}"
                                                            type="text" placeholder="Max height...">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Religion</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="p_religion" id="">
                                                            @if ($user->pertnerPreference->religion != null)
                                                                <option selected
                                                                    value="{{ $user->pertnerPreference->religion }}">
                                                                    {{ $user->pertnerPreference->religion }}</option>
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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Marital
                                                        Status</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="p_marital_status" id="">
                                                            @if ($user->pertnerPreference->marital_status != null)
                                                                <option selected
                                                                    value="{{ $user->pertnerPreference->marital_status }}">
                                                                    {{ $user->pertnerPreference->marital_status }}
                                                                </option>
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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="p_children" id="">
                                                            @if ($user->pertnerPreference->children != null)
                                                                <option selected
                                                                    value="{{ $user->pertnerPreference->children }}">
                                                                    {{ $user->pertnerPreference->children }}</option>
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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Education</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control select2" name="p_study[]" id=""
                                                            multiple>


                                                            @if ($user->pertnerPreference->study != null)
                                                                <?php
                                                                $arr = explode(', ', $user->pertnerPreference->study);
                                                                ?>

                                                                @foreach ($arr as $element)
                                                                    <option selected value="{{ $element }}">
                                                                        {{ $element }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                            @endif
                                                            @foreach ($userSettingFields[25]->values as $value)
                                                                <option>{{ $value->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profession</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control select2" name="p_profession[]" id=""
                                                            multiple>
                                                            @if ($user->pertnerPreference->profession != null)
                                                                <?php
                                                                $arr = explode(', ', $user->pertnerPreference->profession);
                                                                ?>

                                                                @foreach ($arr as $element)
                                                                    <option selected value="{{ $element }}">
                                                                        {{ $element }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                            @endif
                                                            @foreach ($userSettingFields[26]->values as $value)
                                                                <option>{{ $value->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">SKin
                                                        Color</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control select2" name="p_skin_color[]" id=""
                                                            multiple>
                                                            @if ($user->pertnerPreference->skin_color != null)
                                                                <?php
                                                                $arr = explode(', ', $user->pertnerPreference->skin_color);
                                                                ?>

                                                                @foreach ($arr as $element)
                                                                    <option selected value="{{ $element }}">
                                                                        {{ $element }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="">Select...</option>
                                                            @endif
                                                            @foreach ($userSettingFields[18]->values as $value)
                                                                <option>{{ $value->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Physical
                                                        Disability</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="p_physical_disability" id="">
                                                            @if ($user->pertnerPreference->physical_disability != null)
                                                                <option selected
                                                                    value="{{ $user->pertnerPreference->physical_disability }}">
                                                                    {{ $user->pertnerPreference->physical_disability }}
                                                                </option>
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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Age
                                                        (min)</label>
                                                    <div class="col-lg-9">


                                                        <select name="age_min" id="" class="form-control">

                                                            @for ($i = 18; $i < 81; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                    Year</option>
                                                            @endfor

                                                        </select>


                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Age
                                                        (max)</label>
                                                    <div class="col-lg-9">

                                                        <select name="age_max" id="" class="form-control">

                                                            @for ($i = 18; $i < 81; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                    Year</option>
                                                            @endfor

                                                        </select>


                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height
                                                        (min)</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" name="height_min" type="text"
                                                            placeholder="Min height...">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height
                                                        (max)</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" name="height_max" type="text"
                                                            placeholder="Max height...">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Religion</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="p_religion" id="">

                                                            <option>Select...</option>

                                                            <option value="Muslim">Muslim</option>
                                                            <option value="Hindu">Hindu</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Marital
                                                        Status</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="p_marital_status" id="">

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
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="p_children" id="">

                                                            <option>Select...</option>

                                                            <option value="No">No</option>
                                                            <option value="Yes">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Education</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control select2" name="p_study[]" id=""
                                                            multiple>


                                                            <option value="">Select...</option>

                                                            @foreach ($userSettingFields[25]->values as $value)
                                                                <option>{{ $value->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profession</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control select2" name="p_profession[]" id=""
                                                            multiple>

                                                            <option value="">Select...</option>

                                                            @foreach ($userSettingFields[26]->values as $value)
                                                                <option>{{ $value->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">SKin
                                                        Color</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control select2" name="p_skin_color[]" id=""
                                                            multiple>

                                                            <option value="">Select...</option>

                                                            @foreach ($userSettingFields[18]->values as $value)
                                                                <option>{{ $value->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label
                                                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Physical
                                                        Disability</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="p_physical_disability" id="">

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





                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme" name="final_check"
                                    {{ $user->final_check ? 'checked' : '' }}>
                                <label class="custom-control-label text-2" for="rememberme">Final Check (Approve)</label>
                            </div>
                        </div>

                        <div class="form-group col-lg-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="user_type" {{ $user->isOffline() ? 'checked' : '' }} />
                                    Offline
                                    Profile</label>
                            </div>

                        </div>

                        <div class="form-group col-lg-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="featured" {{ $user->featured ? 'checked' : '' }} />
                                    Active
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
                        <form class="py-2" action="{{ route('admin.uploadNewCv', $user) }}" method="post"
                            enctype="multipart/form-data" style="border: 2px solid gray">
                            <div class="row">
                                <div class="col-md-7">

                                    <input type="file" class="form-control" id="cv" name="cv" multiple>

                                    {{ csrf_field() }}
                                </div>
                                <div class="col-md-5">
                                    <button type="submit"
                                        class="w3-btn w3-white w3-round w3-border w3-border-purple w3-right w3-hover-purple btn-sm"><i
                                            class="fa fa-upload"></i> Upload</button>
                                </div>
                                <div class="col-md-12 ml-2">
                                    <small>If new cv uploaded, Old cv will be replaced by new one.</small>
                                </div>
                            </div>

                        </form>

                        <div class="">
                            @if ($user->file_name)
                                <br>
                                <b>CV / Biodata: </b>
                                <div class="row">
                                    <div class="col-md-8">

                                        @if ($user->fileIsImage())
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
                                        <a class="btn btn-xs  w3-btn w3-blue pull-right"
                                            href="{{ asset('storage/users/cv/' . $user->file_name) }}"
                                            download="id_{{ $user->id }}_email_{{ $user->email }}_mobile_{{ $user->mobile }}_cv.{{ $user->file_ext }}">
                                            Download
                                        </a>
                                    </div>



                                    <div class="checkbox">
                                        <label>
                                            <input class="image-check"
                                                data-url="{{ route('admin.userCvChecked', $user) }}" type="checkbox"
                                                name="cv_checked" {{ $user->cvStatus() }} /> Data Checked (CV)</label>
                                    </div>
                            @endif


                        </div>

                    </div>

                </div>
            </div>


            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5>SMS AREA</h5>
                        <p class="w3-text-green">Name:{{ $user->name }}</p>
                        <form class="py-2" action="{{ route('admin.sendsms') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"><span class="w3-text-red">Message(Max
                                                150 charecter)</span></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="write message" name="message"
                                            class="@error('message') is-invalid @enderror">

                                    </textarea>
                                        @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="w3-btn w3-white w3-round w3-border w3-border-purple w3-hover-purple btn-sm"><i
                                            class="fa fa-paper-plane"></i> Send
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>

    </div>




@endsection
@push('js')
    <script src="{{ asset('js/cropper.js') }}"></script>
    <script src="{{ asset('js/userProfile.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-profilepic-cancel').hide();
            $('.btn-profilepic-submit').hide();
        });
    </script>

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


            $(function() {
                $(document).on('change', '.image-check', function(e) {
                    // alert(1);
                    e.preventDefault();

                    var that = $(this);
                    var url = that.attr("data-url");

                    $.ajax({
                        url: url,
                        type: 'GET',
                        cache: false,
                        dataType: 'json',
                        success: function(response) {
                            // alert('ok');
                        },
                        error: function() {
                            // alert('error');
                        }
                    });
                });
            });

        });
    </script>
@endpush
