<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title> {{$websiteParameter->title}}</title>

    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

    <meta name="keywords"
        content="{{ $websiteParameter->meta_keyword ?:
            'Matrimony Service in Bangladesh
                Marriage Media Service provider in Bangladesh
                Matchmaker Service in Bangladesh' }}">
    <meta name="description" content="{{ $websiteParameter->meta_description ?:
            'Matrimony Service in Bangladesh
                Marriage Media Service provider in Bangladesh
                Matchmaker Service in Bangladesh Looing for Marriage Media In Bangladesh? Matchinglife is the trustworthy media in Dhaka, Bangladesh. We offer you the best matched life parner according to your profile. Create a free account and search your partner.' }}" />
    <meta name="author" content="{{ $websiteParameter->meta_author ?: 'Matchinglife' }}">

    <!-- Favicon -->
    @if ($websiteParameter->favicon)

    <link rel="shortcut icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">

    @else

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    @endif

    @if ($websiteParameter->google_analytics_code)
        {!! $websiteParameter->google_analytics_code !!}
    @endif

    @if ($websiteParameter->facebook_pixel_code)
        {!! $websiteParameter->facebook_pixel_code !!}
    @endif


    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
        rel="stylesheet" type="text/css" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('porto/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/vendor/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/vendor/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{
                asset(
                    'porto/vendor/simple-line-icons/css/simple-line-icons.min.css'
                )
            }}" />
    <link rel="stylesheet" href="{{
                asset('porto/vendor/owl.carousel/assets/owl.carousel.min.css')
            }}" />
    <link rel="stylesheet" href="{{
                asset(
                    'porto/vendor/owl.carousel/assets/owl.theme.default.min.css'
                )
            }}" />
    <link rel="stylesheet" href="{{
                asset('porto/vendor/magnific-popup/magnific-popup.min.css')
            }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('porto/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/css/theme-elements.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/css/theme-blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/css/theme-shop.css') }}" />

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('porto/vendor/rs-plugin/css/settings.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/vendor/rs-plugin/css/layers.css') }}" />
    <link rel="stylesheet" href="{{ asset('porto/vendor/rs-plugin/css/navigation.css') }}" />
    <link rel="stylesheet" href="{{
                asset('porto/vendor/circle-flip-slideshow/css/component.css')
            }}" />

    <!-- Demo CSS -->

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('porto/css/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('porto/css/custom.css') }}" />

    <!-- Head Libs -->
    <script src="{{
                asset('porto/vendor/modernizr/modernizr.min.js')
            }}"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="{{asset('alt3/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('alt3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    @stack('css')
    <style type="text/css">
        .rgba-gradient {
            background: linear-gradient(45deg,
                    rgba(234, 21, 129, 0.6),
                    rgba(10, 23, 187, 0.6));
        }

        .bg-color-vipmm{
    background-color: #0E686D !important;
}

.bg-color-vipmm2{
    background-color: #ED1A37 !important;
}

.color-vipmm{
    color: #0E686D !important;
}

.color-vipmm2{
    color: #ED1A37 !important;
}
.form-control {
    border-color: #0E686D !important;
}


#footer {
    background: #212529;
    border-top: 4px solid #212529;
    font-size: 0.9em;
    margin-top: 0px !important;
    padding: 0;
    position: relative;
    clear: both;
}

hr {
    border: 0;
    border-top: 1px solid #0E686D;
    margin: 10px 0;
}


hr.info {
    border: 0 !important;
    border-top: 1px dotted gray !important;
    margin: 7px 0 !important;
}


.profile-image-outer-container .profile-image-inner-container {
        border-radius: 50% !important;
        width: 80px !important;
        height: 80px;
        padding: 5px;
    }

    .progress {
        border-radius: 25px !important;
        height: 12px !important;
        background: #FAFAFA !important;
        overflow: visible !important;
    }
    .vip-active{
        border-bottom: 2px solid #0e686d;
        background-color:#ebebeb;
    }

  .main a:hover {
        background-color: #ebebeb;
}

.vip-package-Clip{
    clip-path: polygon(0 0, 100% 0, 100% 24%, 0% 100%);

}
.bg-color-vipmm {
    background-color: #F15C62 !important;
}
.viptextcolor {
        color: #F15C62 !important;
    }
    </style>
      @stack('css')
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFJQGGP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@php
    $me=auth()->user();
@endphp
    <div class="body" style="background-color: #e7e6e6">
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





    <!-- Vendor -->
    <script src="{{ asset('porto/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{
                 asset('porto/vendor/jquery.appear/jquery.appear.min.js')
             }}"></script>
    <script src="{{
                 asset('porto/vendor/jquery.easing/jquery.easing.min.js')
             }}"></script>
    <script src="{{
                 asset('porto/vendor/jquery.cookie/jquery.cookie.min.js')
             }}"></script>
    <script src="{{
                 asset('porto/vendor/popper/umd/popper.min.js')
             }}"></script>
    <script src="{{
                 asset('porto/vendor/bootstrap/js/bootstrap.min.js')
             }}"></script>
    <script src="{{ asset('porto/vendor/common/common.min.js') }}"></script>
    <script src="{{
                 asset('vendor/jquery.validation/jquery.validate.min.js')
             }}"></script>
    <script src="{{
                 asset(
                     'porto/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js'
                 )
             }}"></script>
    <script src="{{
                 asset('porto/vendor/jquery.gmap/jquery.gmap.min.js')
             }}"></script>
    <script src="{{
                 asset('porto/vendor/jquery.lazyload/jquery.lazyload.min.js')
             }}"></script>
    <script src="{{
                 asset('porto/vendor/isotope/jquery.isotope.min.js')
             }}"></script>
    <script src="{{
                 asset('porto/vendor/owl.carousel/owl.carousel.min.js')
             }}"></script>
    <script src="{{
                 asset(
                     'porto/vendor/magnific-popup/jquery.magnific-popup.min.js'
                 )
             }}"></script>
    <script src="{{
                 asset('porto/vendor/vide/jquery.vide.min.js')
             }}"></script>
    <script src="{{ asset('porto/vendor/vivus/vivus.min.js') }}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('porto/js/theme.js') }}"></script>

    <!-- Current Page Vendor and Views -->
    <script src="{{
                 asset(
                     'porto/vendor/rs-plugin/js/jquery.themepunch.tools.min.js'
                 )
             }}"></script>
    <script src="{{
                 asset(
                     'porto/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js'
                 )
             }}"></script>
    <script src="{{
                 asset(
                     'porto/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js'
                 )
             }}"></script>
    <script src="{{ asset('porto/js/views/view.home.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('porto/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('porto/js/theme.init.js') }}"></script>
    <script src="{{ asset('porto/js/examples/examples.gallery.js')}}"></script>




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
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

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

</body>

</html>
