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
<div style="background-color: #f9ea8f; background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('familyDetails', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf




                <div class="col-md-12 text-center">
                    <h5>My Family Details</h5>


                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Family
                                            Type</label>
                                            <select class="form-control col-md-8" name="family_type" id="" required>

                                                <option value="">Select...</option>
                                                @foreach ($userSettingFields[42]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach

                                            </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Family
                                            Status</label>
                                            <select class="form-control col-md-8" name="family_status" id="" required>

                                                <option value="">Select...</option>
                                                @foreach ($userSettingFields[44]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach

                                            </select>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Father
                                            Profession</label>
                                            <input type="text" name="father_prof"  class="form-control col-md-8">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Mother
                                            Profession</label>
                                            <input type="text" name="mother_prof"  class="form-control col-md-8">
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Number of
                                            Brothers</label>
                                            <input type="number" name="no_bro"  class="form-control col-md-8">

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-md-4">Number of
                                            Sisters</label>
                                            <input type="number" name="no_sis"  class="form-control col-md-8">
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
