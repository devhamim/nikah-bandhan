@extends('master.master')
@php
    $me=auth()->user();
@endphp
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<style>
    .form-group row {
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
<div  style="background-color: #f9ea8f; background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
            </div>
            <form id="userform" action="{{ route('contactInfo', $me->id) }}" role="form" method="POST"
                class="needs-validation mt-5 py-5" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12 text-center">
                    <h5>Contact Informaion</h5>


                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-body" >
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Permanent Country</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="permanent_country" id="permanent_country" required>

                                                <option value="">Select...</option>
                                                @foreach($userSettingFields[2]->values as $value)
                                                    <option value="{{ $value->title }}">
                                                        {{ $value->title }}</option>
                                                @endforeach

                                            </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="mobile" class="col-md-4">Gradient Mobile</label>
                                            <input type="tel" required id="input-user-mobile" name="gradient_mobile" style="width: 80%; margin: 0 auto" class="form-control col-md-8">
                                            <span class="text-danger msg" ></span>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Permanent Division</label>
                                            <select class="form-control col-md-8 dynamic load_division" style="width: 80%; margin: 0 auto" name="parmanent_division" data-url="{{ route('load_district.fetch') }}" data-dependent="load_district" id="">

                                            <option value="">Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Permanent District</label>
                                            <select class="form-control col-md-8 dynamic load_district" style="width: 80%; margin: 0 auto" name="parmanent_district"  data-url="{{ route('load_thana.fetch') }}" data-dependent="load_thana" id="" >
                                                <option value="">Select District</option>
                                            </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Permanent Thana</label>
                                            <select class="form-control col-md-8  dynamic load_thana" style="width: 80%; margin: 0 auto" name="parmanent_thana" id="">
                                                <option value="">Select Thana</option>
                                            </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Present Country</label>
                                            <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="present_country" id="present_country" required>
                                                <option value="">Select...</option>
                                                @foreach($userSettingFields[2]->values as $value)
                                                    <option value="{{ $value->title }}">{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Present Division</label>
                                            <select class="form-control col-md-8 dynamic present_load_division" style="width: 80%; margin: 0 auto" name="present_division"  data-url="{{ route('load_district.fetch') }}" data-dependent="present_load_district" id="">
                                                <option value="">Select Division</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Present District</label>
                                            <select class="form-control col-md-8 present_load_district" style="width: 80%; margin: 0 auto" name="present_district" data-url="{{ route('load_thana.fetch') }}" data-dependent="present_load_thana" id="">
                                                <option value="">Select District</option>
                                            </select>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4">Present Thana</label>
                                            <select class="form-control col-md-8 present_load_thana" style="width: 80%; margin: 0 auto" name="present_thana" id="">
                                                <option value="">Select Thana</option>
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
@push('js')
<script>
    function getIp(callback) {
        var ip = $(".ip").val();
        // var ip = '72.229.28.185';
        var infoUrl = 'https://ipinfo.io/json?ip=' + ip;
        fetch(infoUrl, {
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then((resp) => resp.json())
            .catch(() => {
                return {
                    country: '',
                };
            })
            .then((resp) => callback(resp.country));
    }
    const phoneInputField = document.querySelector(".input-mobile");
    // get the country data from the plugin
    // const countryData = window.intlTelInputGlobals.getCountryData();
    // console.log(countryData);
    const phoneInput = window.intlTelInput(phoneInputField, {
        //  initialCountry: "auto",
        initialCountry: "bd",
        geoIpLookup: getIp,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        preferredCountries: ["bd", "us", "gb"],
        placeholderNumberType: "MOBILE",
        nationalMode: true,
        // separateDialCode:true,
        // autoHideDialCode:true,
        customContainer: "w-100",
        autoPlaceholder: "polite",
        //  customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData)
        // {
        //     return "e.g. " + selectedCountryPlaceholder;
        // },
    });
    //country changed event
    phoneInputField.addEventListener("countrychange", function() {
        // do something with iti.getSelectedCountryData()
        // console.log(phoneInput.getSelectedCountryData().iso2);
        // console.log(phoneInput.getSelectedCountryData());
        $(".country_name").val(phoneInput.getSelectedCountryData().name);
        $(".mobile_country").val(phoneInput.getSelectedCountryData().iso2);
        $(".calling_code").val(phoneInput.getSelectedCountryData().dialCode);
    });
</script>
<script type="text/javascript">
    /// some script
    // jquery ready start $(document).ready(function () {
    $(document).on("submit", ".user-mobile-check-form", function(e) {
        e.preventDefault();
        var that = $(this);
        var formData = that.serialize();
        if (phoneInput.isValidNumber()) {
            $(".msg").text("");
            $('#hidden').val(phoneInput.getNumber());
            document.getElementById('userform').submit();
        // $('form.user-mobile-check-form').submit();
        } else {

            $(".msg").text("Your Mobile number is wrong");
        }


    }); // jquery end
</script>

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

