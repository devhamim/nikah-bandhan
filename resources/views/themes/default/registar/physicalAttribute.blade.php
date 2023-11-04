@extends('user.master.usermaster')
@php
    $me=auth()->user();
@endphp

@push('css')
<style>
    .form-group row {
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
<div style="background-color: #f9ea8f;
background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('physicalPost', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 text-center">
                    <h5>Update Physical Attribute and Career</h5>

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                           <div class="card mb-4">
                               <div class="card-body">
                                <div class="form-group row">
                                    <label for=""  class="col-md-4">Height</label>
                                    <select class="form-control col-md-8" name="height" id="" required>
                                        <option value="">Select...</option>
                                        @foreach($userSettingFields[14]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for=""  class="col-md-4">Disability</label>
                                    <select class="form-control col-md-8" name="disability" id="" required>
                                        <option value="">Select...</option>
                                        @foreach($userSettingFields[21]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                {{-- <input type="hidden" name="disability" value="no"> --}}

                                <div class="form-group row">
                                    <label for=""  class="col-md-4">Blood Group</label>
                                    <select class="form-control col-md-8" name="blood_group" id="" required>
                                        <option value="">Select...</option>
                                        @foreach($userSettingFields[24]->values as $value)
                                            <option value="{{ $value->title }}">
                                                {{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for=""  class="col-md-4">Education Level</label>
                                    <select class="form-control col-md-8" name="education_level" id="" required>
                                        <option value="">Select...</option>
                                        @foreach($userSettingFields[25]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                </select>
                                </div>
                                <div class="form-group row">
                                    <label for=""  class="col-md-4">University</label>

                                    <input class="form-control col-md-8" list="browsers" name="university" id="browser" required>
                                    <datalist id="browsers">
                                        @foreach($userSettingFields[41]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                    </datalist>

                                </div>
                                <div class="form-group row">
                                    <label for=""  class="col-md-4">Major Subject</label>
                                    <input type="text" name="major_subject" class="form-control col-md-8"
                                    placeholder="Major Subject" required id="">
                                </div>
                                <div class="form-group row">
                                    <label for=""  class="col-md-4">Designation</label>
                                    <input type="text" name="designation" class="form-control col-md-8"
                                    placeholder="Designation..." required id="">
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary btn-modern float-right"
                                    data-loading-text="Loading...">

                                </div>
                               </div>
                           </div>
                        </div>
                    </div>



                </div>


            </form>
        </div>


    </div>


</div>

@endsection
