@extends('user.master.usermaster')
@section('content')

@php
$me=auth()->user();
@endphp

<div class="container py-2">

    <div class="row">

        <div class="col-lg-3 mt-4 mt-lg-0">

            @include('user.parts.leftsidebar')

        </div>
        <div class="col-lg-9 bg-white">

            <div class="overflow-hidden mb-1">
                <h2 class="font-weight-normal text-7 mb-0"><strong
                        class="font-weight-extra-bold">@if($me->id==auth()->user()->id)My @else
                        {{$me->name}}@endif</strong> Profile</h2>
            </div>
            <div class="overflow-hidden mb-4 pb-3">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            @include('alerts.alerts')
            <h5 class="text-center">Update Pertner Preferences</h5>
            <form action="{{ route('pertnerPost') }}" role="form" method="POST" class="needs-validation"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Age
                        (min)</label>
                    <div class="col-lg-9">


                            <select name="age_min" id="" class="form-control" required>
                                @if($me->pertnerPreference->min_age!=null)
                                <option selected value="{{$me->pertnerPreference->min_age}}">{{$me->pertnerPreference->min_age}} Years</option>

                                @for($i=18;$i<81;$i++)
                                @if($me->pertnerPreference->min_age!=$i)

                                <option value="{{$i}}">{{$i}} Year</option>
                                @endif
                                @endfor

                                @else
                                @for($i=1;$i<81;$i++)

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
                            @if($me->pertnerPreference->max_age!=null)
                            <option selected value="{{$me->pertnerPreference->max_age}}">{{$me->pertnerPreference->max_age}} Years</option>

                            @for($i=18;$i<81;$i++)
                            @if($me->pertnerPreference->max_age!=$i)

                            <option value="{{$i}}">{{$i}} Year</option>
                            @endif
                            @endfor

                            @else
                            @for($i=1;$i<81;$i++)

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
                        <input class="form-control" name="height_min" value="{{$me->pertnerPreference->min_height}}"
                            required type="text" placeholder="Min height..." required>
                    </div>
                </div>


                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Height
                        (max)</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="height_max" value="{{$me->pertnerPreference->max_height}}"
                            required type="text" placeholder="Max height..." required>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Religion</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="religion" id="" required>
                            @if($me->pertnerPreference->religion!=null)


                                @foreach($religions as $value)
                                @if($me->pertnerPreference->religion != $value->id)
                                <option value="{{ $value->id }}">
                                    {{ $value->name }}</option>
                                    @endif
                            @endforeach
                            @endif

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Marital
                        Status</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="marital_status" id="" required>
                            @if($me->pertnerPreference->marital_status!=null)
                            <option selected value="{{$me->pertnerPreference->marital_status}}">
                                {{$me->pertnerPreference->marital_status}}</option>
                            @else
                            <option>Select...</option>
                            @endif
                            <option value="Unmarried">Unmarried</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Children</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="children" id="" required>
                            @if($me->pertnerPreference->children!=null)
                            <option selected value="{{$me->pertnerPreference->children}}">
                                {{$me->pertnerPreference->children}}</option>
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
                        <select class="form-control select2" name="study[]" id="" required multiple>


                                @if($me->pertnerPreference->study!=null)
                                <?php
                                $arr = explode(', ',$me->pertnerPreference->study);
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
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profession </label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="profession[]" id="" required multiple>
                            @if($me->pertnerPreference->profession!=null)

                            <?php
                            $arr = explode(', ',$me->pertnerPreference->profession);
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
                        <select class="form-control select2" name="skin_color[]" id="" required multiple>
                            @if($me->pertnerPreference->skin_color!=null)
                            <?php
                            $arr = explode(', ',$me->pertnerPreference->skin_color);
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
                        <select class="form-control" name="physical_disability" id="" required>
                            @if($me->pertnerPreference->physical_disability!=null)
                            <option selected value="{{$me->pertnerPreference->physical_disability}}">
                                {{$me->pertnerPreference->physical_disability}}</option>
                            @else
                            <option>Select...</option>
                            @endif <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
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

