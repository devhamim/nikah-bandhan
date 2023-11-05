@extends('master.master')
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
<div style="background-color: #f9ea8f; background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('familyDetails', $me->id) }}" role="form" method="POST"
                class="needs-validation mt-5 py-5" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12 text-center">
                    <h5>My Family Details</h5>


                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-body" >
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Family
                                            Type</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="family_type" id="" required>

                                                <option value="">Select...</option>
                                                @foreach ($userSettingFields[42]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach

                                            </select>
                                    </div>

                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Family
                                            Status</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="family_status" id="" required>

                                                <option value="">Select...</option>
                                                @foreach ($userSettingFields[44]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach

                                            </select>

                                    </div>

                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Father
                                            Profession</label>
                                            <input type="text" name="father_prof" style="width: 80%; margin: 0 auto" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Mother
                                            Profession</label>
                                            <input type="text" name="mother_prof" style="width: 80%; margin: 0 auto" class="form-control col-md-8">
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Number of
                                            Brothers</label>
                                            <input type="number" name="no_bro" style="width: 80%; margin: 0 auto" class="form-control col-md-8">

                                    </div>

                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Number of
                                            Sisters</label>
                                            <input type="number" name="no_sis" style="width: 80%; margin: 0 auto" class="form-control col-md-8">
                                    </div>

                                    <div class="form-group my-3">
                                        <input type="submit" value="Save" style="width: 83%; margin: 0 auto; background-color: #E31190;" class="btn btn-primary btn-modern"
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
