@extends('user.master.usermaster')
@section('content')

@php
$me=auth()->user();
@endphp

<div class="container py-2">

    <div class="row text-center">

        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
                <h2 class="font-weight-normal text-7 mb-0">Update Your Preference!</h2>
            </div>

            <form action="{{ route('pertnerPost') }}" role="form" method="POST" class="needs-validation"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Age
                        (min)</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="age_min" required type="text" placeholder="Min age..."
                            value="{{$me->pertnerPreference->min_age}}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Age
                        (max)</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="age_max" value="{{$me->pertnerPreference->max_age}}" required
                            type="text" placeholder="Max age..." required>
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
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Age
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
                            <option selected value="{{$me->pertnerPreference->religion}}">
                                {{$me->pertnerPreference->religion}}</option>
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
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Interests</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="interest" id="" required>
                            @if($me->pertnerPreference->interest!=null)
                            <option selected value="{{$me->pertnerPreference->interest}}">
                                {{$me->pertnerPreference->interest}}</option>
                            @else
                            <option>Select...</option>
                            @endif <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Study</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="study" id="" required>
                            @if($me->pertnerPreference->study!=null)
                            <option selected value="{{$me->pertnerPreference->study}}">
                                {{$me->pertnerPreference->study}}</option>
                            @else
                            <option>Select...</option>
                            @endif <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profession</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="profession" id="" required>
                            @if($me->pertnerPreference->professtion!=null)
                            <option selected value="{{$me->pertnerPreference->professtion}}">
                                {{$me->pertnerPreference->professtion}}</option>
                            @else
                            <option>Select...</option>
                            @endif
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">SKin
                        Color</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="skin_color" id="" required>
                            @if($me->pertnerPreference->skin_color!=null)
                            <option selected value="{{$me->pertnerPreference->skin_color}}">
                                {{$me->pertnerPreference->skin_color}}</option>
                            @else
                            <option>Select...</option>
                            @endif <option value="Black">Black</option>
                            <option value="Shamla">Shamla</option>
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


@endsection