@extends('master.master')
@push('css')
    <style>
        html .featured-box-primary .box-content {
            border-top-color: #f05b62;
        }
    </style>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
@endpush

@section('content')

<!-- ================> login section start here <================== -->
<section class="log-reg">
   
    <div class="container">
        <div class="row">
            <div class="image">
            </div>
            <div class="col-lg-7 mt-3">
                <div class="log-reg-inner">
                    <div class="section-header mt-5">
                        <h2 class="title">REGISTER AN ACCOUNT</h2>
                       
                    </div>
                    <div class="main-content">
                        <form id="userform" action="{{ route('register.custom') }}"  method="post" class="user-mobile-check-form">
                            @csrf
                            <div class="form-group">
                                <label>Username*</label>
                                <input type="text" name="name" class="form-control form-control-lg"
                                                required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                <label>Phone*</label>
                                <input type="tel" required class="form-control input-mobile " id="input-user-mobile" name="full_mobile" placeholder="Phone">
                                            <span class="text-danger msg" ></span>
                                            @if ($errors->has('full_mobile'))
                                                <span class="text-danger">{{ $errors->first('full_mobile') }}</span>
                                            @endif
                                            {{-- <input type="hidden" name="full_mobile" id="hidden"> --}}
                            </div>
                            <div class="form-group">
                                <label>Email Address*</label>
                                <input type="email" value="" name="email"
                                                class="form-control form-control-lg" required>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" value="" class="form-control form-control-lg"
                                                name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                <label>Confirm Password*</label>
                                <input type="password" value="" class="form-control form-control-lg"
                                                name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span
                                                    class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-1 col-sm-1 text-end">
                                    <input type="checkbox" class="custom-control-input" id="terms">
                                </div>
                                <div class="col-lg-11 col-sm-11">
                                    <label class="custom-control-label text-2" for="terms" required="">I have read and agree to the 
                                        <a href="#" style="color:var(--branding-color); text-decoration: underline">terms of service</a>
                                    </label>
                                </div>
                            </div>
                            
                            <input type="submit" style="background-color: #E31190;" value="Next" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================> login section end here <================== -->
@endsection


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


