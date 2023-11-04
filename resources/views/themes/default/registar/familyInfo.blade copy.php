@extends('user.master.usermaster')
@php
    $me=auth()->user();
@endphp
@push('css')
<style>
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
<div class="container py-2 bg-white">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('familyDetails', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf




                <div class="col-md-12 text-center">
                    <h5>My Family Details</h5>

                    {{-- <div class="form-group row">
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
                    </div> --}}
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

{{--
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                            Brother Married</label>
                        <div class="col-lg-9">
                            <input type="number" name="no_bro_m"  class="form-control">
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                            Sisters</label>
                        <div class="col-lg-9">
                            <input type="number" name="no_sis"  class="form-control">
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number of
                            Sisters Married</label>
                        <div class="col-lg-9">
                            <input type="number" name="no_sis_m"  class="form-control">
                        </div>
                    </div> --}}




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
