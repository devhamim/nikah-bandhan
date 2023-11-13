@extends('user.master.usermaster')
@push('css')
<style>
    .form-group text-left {
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


<div style="background-color: #f9ea8f; background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('pertnerPost') }}" role="form" method="POST" class="needs-validation mt-5 py-5" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 text-center">
                    <h5>Partner Preference!</h5>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-body" >
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Age (min)</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="age_min" id="" required>
                                                @for($i=18;$i<81;$i++)
                                                    <option value="{{$i}}">{{$i}} Year</option>
                                                @endfor
                                            </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Age (max)</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="age_max" id="" required>
                                                @for($i=18;$i<81;$i++)
                                                    <option value="{{$i}}">{{$i}} Year</option>
                                                @endfor
                                            </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Height (min)</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="height_min" id="">
                                                <option value="">Select...</option>
                                                @foreach($userSettingFields[14]->values as $value)
                                                    <option value="{{ $value->title }}">{{ $value->title }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Height (max)</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="height_max" id="">
                                                <option value="">Select...</option>
                                                @foreach($userSettingFields[14]->values as $value)
                                                    <option value="{{ $value->title }}">{{ $value->title }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Community</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="religion" id="" required >
                                                <option value="">Select...</option>
                                                @foreach($religions as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group row my-3 multisele">
                                        <label for="" class="col-md-4">Education</label>
                                        <select class="form-control select2" style="width: 80%; margin: 0 auto" name="study[]" id="" required multiple>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[25]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row my-3 multisele">
                                        <label for="" class="col-md-4">Profession</label>
                                            <select class="form-control select2" style="width: 80%; margin: 0 auto" name="profession[]" id="" required multiple>
                                                <option value="">Select...</option>
                                                @foreach($userSettingFields[26]->values as $value)
                                                    <option>{{ $value->title }}</option>
                                                @endforeach
                                            </select>
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
