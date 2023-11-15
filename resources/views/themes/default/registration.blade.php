@extends('user.master.usermaster')
@php

$me = auth()->user();
@endphp
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <style>
        .col-form-label {
            padding-top: calc(0.375rem + 1px);
            padding-bottom: 0px !important;
            margin-bottom: 0;
            font-size: inherit;
            line-height: 1.5;
        }

        .form-group row {
            margin-bottom: 2px !important;
        }
 
    </style>
@endpush
@section('content')
<div style="background-color: #f9ea8f; background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);" class="pt-5">
    <div class="row text-center">
        <div class="col-md-12 text-center">
            <div class="overflow-hidden mb-1">
                {{-- <h2 class="font-weight-normal text-7 mb-0">Complete Your Profile </h2> --}}
            </div>
            
            <form action="{{ route('profilePost2', $me->id) }}" role="form" method="POST" class="needs-validation mt-5 py-5" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 text-center">
                    <h5>My Basic Informations & Appearance</h5>

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="card mb-4">
                                <div class="card-body">
                                    {{-- <div class="form-group row">
                                        <label for="" class="col-md-4">Name</label>
                                        <input type="text" class="form-control col-md-8" name="name" id=""
                                            value="{{ old('name') }}" required>
                                    </div> --}}
                                    <div class=" row my-3">
                                        <label for="" class="col-md-4 form-label">Created By</label>
                                        <select name="profile_created_by" id="" class="form-control col-md-8" style="width: 80%; margin: 0 auto" required>
                                            <option value="">Select...</option>
                                            {{ $userSettingFields }}
                                            
                                            @foreach ($userSettingFields[1]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endforeach 
                                        </select>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="mobile" class="">Mobile</label>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <input type="tel" required class="form-control input-mobile " id="input-user-mobile" name="mobile">
                                            <span class="text-danger msg" ></span>
                                        </div>

                                    </div> --}}

                                    {{-- <div class="form-group">
                                   <label for="mobile"class="col-form-label">Mobile:</label>
                                   <input type="tel" required class="form-control input-mobile" id="input-user-mobile" name="mobile">
                                    </div> --}}
                                    {{-- <input type="hidden" name="full_mobile" id="hidden"> --}}

                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4 form-label">Date of birth</label>
                                        <input type="date" class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="dob" id=""
                                            value="{{ old('dob') }}" required>
                                    </div>
                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4 form-label">Gender</label>
                                        <select class="form-control col-md-8" name="gender" style="width: 80%; margin: 0 auto" id="" required>
                                            <option value="">Select...</option>
                                            @foreach ($userSettingFields[0]->values as $value)
                                                <option value="{{ $value->title }}">
                                                    {{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4 form-label">Religion</label>
                                        <select class="form-control col-md-8 fetch_religion" style="width: 80%; margin: 0 auto" name="religion"
                                            id="religion" data-url="{{ route('cast.fetch') }}"
                                            data-dependent="fetch_cast" required>
                                            <option value="">Select...</option>
                                            @foreach ($religions as $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row my-3">
                                        <label for="" class="col-md-4 form-label">Caste</label>
                                        <select class="form-control col-md-8 fetch_cast" style="width: 80%; margin: 0 auto" name="caste" id="" required>
                                            <option value="">Select Caste</option>
                                        </select>
                                    </div>

                                    <div class="form-group row my-3">
                                        <label class="col-md-4 form-label">Marital
                                            Status</label>
                                        <select class="form-control col-md-8" style="width: 80%; margin: 0 auto" name="marital_status" id="" required>

                                            <option value="">Select...</option>
                                            @foreach ($userSettingFields[10]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach


                                        </select>

                                    </div>

                                    <div class="form-group my-3">
                                        <input type="submit" style="width: 83%; margin: 0 auto; background-color: #E31190;" value="Save" class="btn btn-primary btn-modern float-right"
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
        $(document).ready(function() {

            $(document).on('change',
                '.fetch_religion,.load_district,.load_thana,.present_load_division,.present_load_district,.unload_thana',
                function(e) {
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
                            success: function(response) {
                                if (response.success) {
                                    // alert(1);

                                    var updatableELm = $(document).find('select' + "." + dependent);
                                    // console.log(updatableELm);
                                    updatableELm.empty().append($('<option>', {
                                        value: '',
                                        text: 'Select'
                                    }));
                                    $.each(response.datas, function(i, item) {
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


            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

        });
    </script>
@endpush
