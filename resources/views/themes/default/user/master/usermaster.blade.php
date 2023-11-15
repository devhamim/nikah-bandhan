
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<title>Nikah Bandhan</title>
	{{-- <title>
        @if ($websiteParameter->title)
            {!! $websiteParameter->title !!}
        @else
            {{ env('APP_NAME_BIG') }} | Matrimony Service in Bangladesh | Marriage Media Service provider in
            Bangladesh |
            Matchmaker Service in Bangladesh
        @endif
    </title> --}}
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- site favicon -->
	<link rel="icon" type="image/png" href="{{ asset('frontend') }}/images/favicon.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- All stylesheet and icons css  -->
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/swiper.min.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/lightcase.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">
	<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">

    {{-- select2 --}}
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" /> --}}
    <link rel="stylesheet" href="{{asset('alt3/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('alt3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <style>
        .multisele span{
            margin: 0 auto;
            padding: 0;
        }
    </style>
</head>

<body>
	<!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
	<!-- preloader ending here -->


	<!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="fa-solid fa-angle-up"></i></a>
    <!-- scrollToTop ending here -->


    
    @include('partials.header')
    <div role="main" class="main">
       


        @yield('content')


    </div>

    @include('partials.footer')


    <!-- ================> Footer section start here <================== -->
	

	<div class="side_button">
		<a class="btn btn-success py-3 px-1 rounded fa-beat" style="background-color: #E31190;" href="{{ url('register') }}"><p><i class="fa-solid fa-user-tie fa-beat"></i></p> Register</a>
	</div>
    <!-- ================> Footer section end here <================== -->

    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div
                        class="
                                featured-box featured-box-default
                                text-left
                                mt-0
                            ">
                        <div class="box-content">
                            <h4
                                class="
                                        color-primary
                                        font-weight-semibold
                                        text-4 text-uppercase
                                        mb-3
                                    ">
                                Login
                            </h4>
                            <form action="{{ route('login.custom') }}" method="POST" class="needs-validation">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label
                                            class="
                                                    font-weight-bold
                                                    text-dark text-2
                                                ">E-mail
                                            Address</label>
                                        <input type="text" value="" name="email"
                                            class="
                                                    form-control form-control-lg
                                                "
                                            required />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label
                                            class="
                                                    font-weight-bold
                                                    text-dark text-2
                                                ">Password</label>
                                        <input type="password" value="" name="password"
                                            class="
                                                    form-control form-control-lg
                                                "
                                            required />
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="form-group col-6">
                                        <div class="checkbox">
                                            <div class="row">
                                                <div class="col-2"><input type="checkbox" name="remember" /></div>
                                                <div class="col-9"> <label class="form-label">Remember Me</label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6 text-end">
                                        <a href="{{ route('forget.password.get') }}" class="float-right">Forgot
                                            Password</a>
                                    </div>

                                </div>

                                <div
                                    class="row">
                                        <div class="col-lg-6">
                                            <input type="submit" value="Login"
                                        class="
                                                btn btn-primary btn-modern
                                                float-right
                                            "
                                        data-loading-text="Loading..." style="background-color: #E31190;" />
                                        </div>
                                        <div class="col-lg-6 m-auto text-center">
                                            <a href="{{ url('register') }}" class="" >Register Now</a>
                                        </div>
                                    


                                    <div class="text-right mt-2" >
                                        

                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade py-3 px-3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ route('login.custom') }}" method="POST" class="needs-validation">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label
                            class="
                                    font-weight-bold
                                    text-dark text-2
                                ">E-mail
                            Address</label>
                        <input type="text" value="" name="email"
                            class="
                                    form-control form-control-lg
                                "
                            required />
                    </div>
                </div>
        
                <div class="form-row">
                    <div class="form-group col">
                        <label
                            class="
                                    font-weight-bold
                                    text-dark text-2
                                ">Password</label>
                        <input type="password" value="" name="password"
                            class="
                                    form-control form-control-lg
                                "
                            required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" />
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6 ">
                        <a href="{{ route('forget.password.get') }}" class="float-right">Forgot
                            Password</a>
                    </div>
        
                </div>
        
                <div
                    class="
                            form-row
                            d-fled
                            justify-content-center
                        ">
                    <input type="submit" value="Login"
                        class="
                                btn btn-primary btn-modern
                                float-right
                            "
                        data-loading-text="Loading..." />
        
        
                    <div class="text-right mt-2" >
                        <a href="{{ url('register') }}" class="" style="margin-left: 20px !important;" >Register Now</a>
        
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div> --}}

	
	<!-- All Needed JS -->
	<script src="{{ asset('frontend') }}/js/vendor/jquery-3.6.0.min.js"></script>
	<script src="{{ asset('frontend') }}/js/vendor/modernizr-3.11.2.min.js"></script>
	<script src="{{ asset('frontend') }}/js/isotope.pkgd.min.js"></script>
	<script src="{{ asset('frontend') }}/js/slick.min.js"></script>
	<script src="{{ asset('frontend') }}/js/swiper.min.js"></script>
	<!-- <script src="assets/js/all.min.js"></script> -->
	<script src="{{ asset('frontend') }}/js/wow.js"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
	<script src="{{ asset('frontend') }}/js/lightcase.js"></script>
	<script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
	<script src="{{ asset('frontend') }}/js/waypoints.min.js"></script>
	<script src="{{ asset('frontend') }}/js/vendor/bootstrap.bundle.min.js"></script>
	<script src="{{ asset('frontend') }}/js/plugins.js"></script>
	<script src="{{ asset('frontend') }}/js/main.js"></script>

    

	<!-- SLIder -->
	<script>
		$('.autoplay').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: false,
		});
	</script>


	<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
	<script>
		window.ga = function () {
			ga.q.push(arguments)
		};
		ga.q = [];
		ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto');
		ga('set', 'anonymizeIp', true);
		ga('set', 'transport', 'beacon');
		ga('send', 'pageview')
	</script>

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
  <!-- Select2 -->
  <script src="{{asset('alt3/plugins/select2/js/select2.full.min.js')}}"></script>
  <!-- Bootstrap4 Duallistbox -->

  <script>
      (function (window, document) {
          var loader = function () {
              var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
              script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
              tag.parentNode.insertBefore(script, tag);
          };

          window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
      })(window, document);
  </script>
@stack('js')
<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
    
    
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    // $('.select2').select2()

    //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start 
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })
  
  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
  <script src="../../../../www.google-analytics.com/analytics.js" async></script>
</body>
</html>