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
                <h2 class="font-weight-normal text-7 mb-0">Partner Preference!</h2>
            </div>

            <form action="{{ route('pertnerPost') }}" role="form" method="POST" class="needs-validation"
                enctype="multipart/form-data">
                @csrf

                <div class="row d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="form-group text-left">
                                    <label for="">Age
                                        (min)</label>
                                        <select name="age_min" id="" class="form-control" required>

                                            @for($i=18;$i<81;$i++)

                                            <option value="{{$i}}">{{$i}} Year</option>
                                            @endfor
                                        </select>
                                </div>

                                <div class="form-group text-left">
                                    <label for="">Age
                                        (max)</label>

                                        <select name="age_max" id="" class="form-control" required>

                                            @for($i=18;$i<81;$i++)

                                            <option value="{{$i}}">{{$i}} Year</option>
                                            @endfor
                                        </select>
                                </div>

                                <div class="form-group text-left">
                                    <label for="">Height
                                        (min)</label>
                                        <select class="form-control" name="height_min" id="" required>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[14]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>

                                            @endforeach
                                        </select>
                                </div>

                                <div class="form-group text-left">
                                    <label for="">Height
                                        (max)</label>
                                        <select class="form-control" name="height_max" id="" required>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[14]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>

                                            @endforeach
                                        </select>

                                </div>

                                <div class="form-group text-left">
                                    <label for="">Community</label>
                                    <select class="form-control" name="religion" id="" required>
                                        <option value="">Select...</option>
                                        @foreach($religions as $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->name }}</option>
                                    @endforeach
                                    </select>

                                </div>

                                <div class="form-group text-left">
                                    <label for="">Education</label>
                                    <select class="form-control select2" name="study[]" id="" required multiple>



                                        <option value="">Select...</option>

                                        @foreach($userSettingFields[25]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach
                                </select>
                                </div>

                                <div class="form-group text-left">
                                    <label for="">Profession</label>
                                    <select class="form-control select2" name="profession[]" id="" required multiple>

                                        <option value="">Select...</option>

                                        @foreach($userSettingFields[26]->values as $value)
                                        <option>{{ $value->title }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-left">
                                    <input type="submit" value="Save" class="btn btn-primary btn-modern float-right"
                            data-loading-text="Loading...">
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
