@extends('user.master.usermaster')
@php
    $me=auth()->user();
@endphp
@section('content')
<div  style="background-color: #f9ea8f; background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('lifestyleInfo2', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf


                <div class="col-md-12 text-center">
                    <h5>Lifestyle Information</h5>

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Religious
                                            View</label>
                                            <select class="form-control" name="religious_view" id="" required>
                                                <option value="">select...</option>
                                            <option value="Very Religious">Very Religious</option>
                                            <option value="Religious">Religious</option>
                                            <option value="Moderator">Moderator</option>
                                            <option value="Not to say">Not to say</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Drink?</label>
                                        <select class="form-control" name="drink" id="" required>

                                            <option value="">Select...</option>
                                            @foreach ($userSettingFields[20]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Smoke?</label>
                                        <select class="form-control" name="smoke" id="" required>

                                            <option value="">Select...</option>
                                            @foreach ($userSettingFields[20]->values as $value)
                                            <option>{{ $value->title }}</option>
                                        @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Diet</label>
                                        <select class="form-control" name="diet" id="" required>

                                            <option value="">Select...</option>
                                            @foreach ($userSettingFields[27]->values as $value)
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
