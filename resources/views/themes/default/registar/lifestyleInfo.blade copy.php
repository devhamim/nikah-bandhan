@extends('user.master.usermaster')
@php
    $me=auth()->user();
@endphp
@section('content')
<br>
<div class="container py-2 bg-white">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('lifestyleInfo2', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf


                <div class="col-md-12 text-center">
                    <h5>Lifestyle Information</h5>
                    <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Religious
                            View</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="religious_view" id="" required>

                                    <option value="">select...</option>
                                <option value="Very Religious">Very Religious</option>

                                <option value="Religious">Religious</option>
                                <option value="Moderator">Moderator</option>

                                <option value="Not to say">Not to say</option>



                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Drink?</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="drink" id="" required>

                                <option value="">Select...</option>
                                @foreach ($userSettingFields[20]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Smoke?</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="smoke" id="" required>

                                <option value="">Select...</option>
                                @foreach ($userSettingFields[20]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Diet</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="diet" id="" required>

                                <option value="">Select...</option>
                                @foreach ($userSettingFields[27]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach

                            </select>
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
