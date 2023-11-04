@extends('user.master.usermaster')
@push('css')
<style>
    .form-group {
    margin-bottom: 2px !important;
}
.col-form-label {
    padding-top: calc(0.375rem + 1px);
    padding-bottom: 0px !important;
    margin-bottom: 0;
    font-size: inherit;
    line-height: 1.5;
}
</style>

@endpush
@section('content')

<br>

<div class="container py-2 bg-white">


    <div class="row text-center">

        <div class="col-md-12 text-center">
            {{-- @include('alerts.alerts') --}}
            <div class="overflow-hidden mb-1">
                <h2 class="font-weight-normal text-7 mb-0">Partner Preference!</h2>
            </div>

            <form action="{{ route('pertnerPost') }}" role="form" method="POST" class="needs-validation"
                enctype="multipart/form-data">
                @csrf
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
                        {{-- <input class="form-control" name="age_min" required type="text" placeholder="Min age..."
                            required> --}}
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
                        <select class="form-control" name="height_min" id="" required>
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
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Height
                        (max)</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="height_max" id="" required>
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
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Community</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="religion" id="" required>
                            <option value="">Select...</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Hindu">Hindu</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Marital
                        Status</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="marital_status" id="" required>
                            <option value="">Select...</option>
                            <option value="Unmarried">Unmarried</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                </div> --}}

{{--
                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Children</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="children" id="" required>
                            <option value="">Select...</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div> --}}




                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Education</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="study[]" id="" required multiple>



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
                        <select class="form-control select2" name="profession[]" id="" required multiple>

                            <option value="">Select...</option>

                            @foreach($userSettingFields[26]->values as $value)
                            <option>{{ $value->title }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
{{--
                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">SKin
                        Color</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="skin_color[]" id="" required multiple>

                            <option value="">Select...</option>

                            @foreach($userSettingFields[18]->values as $value)
                            <option>{{ $value->title }}</option>
                        @endforeach
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Physical
                        Disability</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="physical_disability" id="" >
                            <option value="">Select...</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div> --}}





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
