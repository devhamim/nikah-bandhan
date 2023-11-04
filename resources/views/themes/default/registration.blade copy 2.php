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
.form-group {
    margin-bottom: 2px !important;
}
</style>

@endpush
@section('content')
<br>
<div class="container py-2 bg-white">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
                {{-- <h2 class="font-weight-normal text-7 mb-0">Complete Your Profile </h2> --}}
            </div>
            <form action="{{ route('profilePost2', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 text-center">
                    <h5>My Basic Informations & Appearance</h5>

                    <div class="row d-flex justify-content-center">
                        {{-- <div class="col-md-4"></div> --}}
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Profile  Created By</label>
                                        <select name="profile_created_by" id="" class="form-control" required>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[1]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Mobile</label>
                                        <input type="text" class="form-control" name="mobile" id="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Date of birth</label>
                                        <input type="date" class="form-control" name="dob" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select class="form-control" name="gender" id="" required>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[0]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select class="form-control" name="gender" id="" required>
                                            <option value="">Select...</option>
                                            @foreach($userSettingFields[0]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4"></div> --}}
                    </div>
                    {{-- <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Name</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="name" required type="text" placeholder="Your full name..."
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profile
                            Created By</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="profile_created_by" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[1]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mobile</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="mobile" id="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Date
                            of birth</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="dob" required type="date" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Gender</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="gender" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[0]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Community</label>
                        <div class="col-lg-9">
                            <select class="form-control fetch_religion" name="religion" required id="religion"
                                data-url="{{ route('cast.fetch') }}" data-dependent="fetch_cast">
                                <option value="">Select...</option>
                                @foreach($religions as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Caste</label>
                        <div class="col-lg-9">
                            <select class="form-control fetch_cast" name="caste" id="" required>
                                <option value="">Select Caste</option>
                            </select>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Marital
                            Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="marital_status" id="" required>
                                <option value="">Select...</option>
                                @foreach($userSettingFields[10]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children
                            Have?</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="children_have" id="">
                                <option value="">Select...</option>
                                @foreach($userSettingFields[12]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>
                                @endforeach
                            </select>
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
<br>

@endsection

@push('js')

<script>

    $(document).ready(function () {

        $(document).on('change', '.fetch_religion,.load_district,.load_thana,.present_load_division,.present_load_district,.unload_thana', function (e) {
        // alert(1);
            var tgtElm = e.target;
            // alert(tgtElm);

            if ($(tgtElm).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                // alert($(tgtElm).data("url"));
                $.ajax({
                    url: $(tgtElm).data("url"),
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function (response) {
                        if (response.success) {
                            // alert(1);

                            var updatableELm = $(document).find('select'+"." + dependent);
                            // console.log(updatableELm);
                            updatableELm.empty().append($('<option>', {
                                value: '',
                                text: 'Select'
                            }));
                            $.each(response.datas, function (i, item) {
                                updatableELm.append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }));
                            });
                        }
                    }

                })
            }
        });


        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    });
</script>

@endpush
