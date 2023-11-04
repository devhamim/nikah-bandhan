@extends('user.master.usermaster')
@php
    $me=auth()->user();
@endphp
@push('css')
<style>
    .form-group {
    margin-bottom: 1px !important;
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
<br>
<div class="container py-2 bg-white">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form action="{{ route('contactInfo', $me->id) }}" role="form" method="POST"
                class="needs-validation" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 text-center">
                    <h5>Contact Informaion</h5>

                    {{-- <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Mobile</label>
                        <div class="col-lg-9">
                            <input type="text" name="mobile" id="" class="form-control" required>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Time To
                            Call</label>
                        <div class="col-lg-9">

                            <input type="text" class="form-control" name="call_time">
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Contact
                            Person</label>
                        <div class="col-lg-9">
                            <input type="text" name="contact_person" class="form-control"
                                placeholder="Contact Person name..." required id="">
                        </div>
                    </div> --}}


                    {{-- <div class="form-group row">
                        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Relation with
                            Contact Person</label>
                        <div class="col-lg-9">
                            <input type="text" name="relation_with_contact" class="form-control"
                                placeholder="Relation with Contact Person..." required>
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Permanent Country</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="permanent_country" id="permanent_country" required>

                                <option value="">Select...</option>
                                @foreach($userSettingFields[2]->values as $value)

                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>

                            @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="other_loc_perm">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Permanent Division</label>
                        <div class="col-lg-9">
                            <select class="form-control dynamic load_division" name="parmanent_division" data-url="{{ route('load_district.fetch') }}" data-dependent="load_district" id=""  >

                                <option value="">Select Division</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Permanent District</label>
                        <div class="col-lg-9">
                            <select class="form-control dynamic load_district" name="parmanent_district"  data-url="{{ route('load_thana.fetch') }}" data-dependent="load_thana" id="" >

                                <option value="">Select District</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Permanent Thana</label>
                        <div class="col-lg-9">
                            <select class="form-control dynamic load_thana" name="parmanent_thana" id="" >

                                <option value="">Select Thana</option>
                            </select>
                        </div>
                    </div>
                </div>




                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Present Country</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="present_country" id="present_country" required>

                                <option value="">Select...</option>
                                @foreach($userSettingFields[2]->values as $value)
                                    <option value="{{ $value->title }}">
                                        {{ $value->title }}</option>

                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="other_loc">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Present Division</label>
                        <div class="col-lg-9">
                            <select class="form-control dynamic present_load_division" name="present_division"  data-url="{{ route('load_district.fetch') }}" data-dependent="present_load_district" id="" >
                                <option value="">Select Division</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Present District</label>
                        <div class="col-lg-9">
                            <select class="form-control present_load_district" name="present_district" data-url="{{ route('load_thana.fetch') }}" data-dependent="present_load_thana" id="" >
                                <option value="">Select District</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Present Thana</label>
                        <div class="col-lg-9">
                            <select class="form-control present_load_thana" name="present_thana" id="" >
                                <option value="">Select Thana</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Present Postal
                            Code</label>
                        <div class="col-lg-9">
                            <input type="number" name="present_po" placeholder="Portal Code"
                                class="form-control">
                        </div>
                    </div> --}}
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
@push('js')

<script>

$(document).ready(function(e) {
    $('#present_country').on('change',function() {
        // alert($(this).val());
       if ($(this).val() == "Bangladesh") {
        //    alert(1);
         $('.other_loc').show();
       } else {
        //    alert(1);
         $('.other_loc').hide();
       }
     });

     $('#permanent_country').on('change',function() {
        // alert($(this).val());
       if ($(this).val() == "Bangladesh") {
        //    alert(1);
         $('.other_loc_perm').show();
       } else {
        //    alert(1);
         $('.other_loc_perm').hide();
       }
     });


        });

    $(document).ready(function () {

        $(document).on('change', '.load_division,.load_district,.load_thana,.present_load_division,.present_load_district,.unload_thana', function (e) {
        // alert(1);
            var tgtElm = e.target;
            // alert(tgtElm);

            if ($(tgtElm).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
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
