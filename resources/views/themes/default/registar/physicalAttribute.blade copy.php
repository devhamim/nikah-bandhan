@extends('user.master.usermaster')
@php
    $me=auth()->user();
@endphp

@push('css')
<style>
    .form-group {
    margin-bottom: 4px !important;
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
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('physicalPost', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 text-center">
                    <h5>Update Physical Attribute and Career</h5>

                    {{-- <div class="form-group row">
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
                    </div> --}}

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

                    {{-- <div class="form-group row">
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
                    </div> --}}

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
                    {{-- <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Workplace</label>
                        <div class="col-lg-9">
                            <input type="text" name="workplace" class="form-control"
                                placeholder="Workplace" required>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Designation</label>
                        <div class="col-lg-9">
                            <input type="text" name="designation" class="form-control"
                                placeholder="Designation..." required id="">
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
