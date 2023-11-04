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
<div style="background-color: #f9ea8f; background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('socialCulture', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 text-center">
                    <h5>Social, Culture Background and Interests</h5>



                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Mother Tongue</label>
                                        <select class="form-control" name="mother_tongue" id="" required>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[30]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Grew Up In</label>
                                        <select class="form-control" name="grewup_in" id="" required>
                                            <option value="">select...</option>
                                            @foreach($userSettingFields[2]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Can Speak</label>
                                        <select class="form-control select2" name="can_speak[]" id="" required multiple>
                                            <option value="">Select...</option>

                                            @foreach($userSettingFields[31]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Music</label>
                                        <select class="form-control select2 w-100" name="music[]" id="" required multiple
                                            multiple="multiple" data-placeholder="Select Music"
                                            data-dropdown-css-class="select2-purple">
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[37]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Book</label>
                                        <select class="form-control select2" name="book[]" id="" required multiple>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[36]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Cooking</label>
                                        <select class="form-control select2" name="cooking[]" id="" required multiple>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[35]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Movie</label>
                                        <select class="form-control select2" multiple name="movie[]" id="" required>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[38]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
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
