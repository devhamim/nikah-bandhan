@php /*
---------------------------------------------------------------------------
Global Script Dependecies
---------------------------------------------------------------------------
Responsibilty: it will inject script dependencies needed everywhere and shoud be
included in layout files.
--------------------------------------------------------------------------- */
@endphp

{{-- jQuery --}}
{{--
<!-- <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"
></script> -->
--}}

{{-- Font Awesome js --}}
{{--
<!-- <script
    src="https://kit.fontawesome.com/2c0314d744.js"
    crossorigin="anonymous"
></script> -->
--}}

{{-- Bootstrap JS --}}
{{--
<!-- <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"
></script> -->
--}}

{{-- *****************************************Porto Script***************************************** --}}
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
<script src="{{ asset('porto/vendor/popper/umd/popper.min.js') }}"></script>
<script src="{{
        asset('porto/vendor/bootstrap/js/bootstrap.min.js')
    }}"></script>
<script src="{{ asset('porto/vendor/common/common.min.js') }}"></script>
<script src="{{
        asset('vendor/jquery.validation/jquery.validate.min.js')
    }}"></script>
<script src="{{
        asset('porto/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')
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
        asset('porto/vendor/magnific-popup/jquery.magnific-popup.min.js')
    }}"></script>
<script src="{{ asset('porto/vendor/vide/jquery.vide.min.js') }}"></script>
<script src="{{ asset('porto/vendor/vivus/vivus.min.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('porto/js/theme.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{
        asset('porto/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')
    }}"></script>
<script src="{{
        asset('porto/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')
    }}"></script>
<script src="{{
        asset('porto/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js')
    }}"></script>
<script src="{{ asset('porto/js/views/view.home.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ asset('porto/js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('porto/js/theme.init.js') }}"></script>
{{-- *********************************Porto Script End********************************* --}}
