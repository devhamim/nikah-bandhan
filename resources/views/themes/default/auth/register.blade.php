@extends('user.master.usermaster')
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

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
    <div class="container">
        <div class="row mr-lg-n5">
            <div class="col-md-9 order-2 order-md-1 align-self-center p-static">                                <h1 class="text-danger">Register Account</h1>                            </div>                          <div class="col-md-3 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-end">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>
    </div>
</section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <div class="row justify-content-md-center">
                    <div class="col-md-9 py-5">
                        <div class="featured-box featured-box-primary text-left mt-0">
                            <div class="box-content">
                                <div class="text-center">
                                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-1">Register An
                                        Account</h4>
                                        <img src="{{ asset('images/icon.jpeg')}}" alt="" height="60">
                                </div>

                                <form id="userform" action="{{ route('register.custom') }}"  method="post" class="user-mobile-check-form">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="font-weight-bold text-dark text-2">Name</label>
                                            <input type="text" name="name" class="form-control form-control-lg"
                                                required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="font-weight-bold text-dark text-2">Phone</label>
                                            <input type="tel" required class="form-control input-mobile " id="input-user-mobile" name="">
                                            <span class="text-danger msg" ></span>
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                            <input type="hidden" name="full_mobile" id="hidden">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="font-weight-bold text-dark text-2">E-mail Address</label>
                                            <input type="email" value="" name="email"
                                                class="form-control form-control-lg" required>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-dark text-2">Password</label>
                                            <input type="password" value="" class="form-control form-control-lg"
                                                name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-dark text-2">Re-enter Password</label>
                                            <input type="password" value="" class="form-control form-control-lg"
                                                name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span
                                                    class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-9">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="terms">
                                                <label class="custom-control-label text-2" for="terms" required="">I
                                                    have read and agree to the <a href="#" style="color:var(--branding-color); text-decoration: underline">terms of
                                                        service</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <input type="submit" value="Next"
                                                class="btn btn-primary btn-modern float-right"
                                                data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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

@endpush
