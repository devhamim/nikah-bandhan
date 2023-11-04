@php /*
---------------------------------------------------------------------------
Global Style Dependecies
---------------------------------------------------------------------------
Responsibilty: it will inject style dependencies needed everywhere and shoud be
included in layout files.
--------------------------------------------------------------------------- */
@endphp

{{-- Bootstrap CSS --}}
{{--
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    --}}
    {{--
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
    crossorigin="anonymous"
/>
--}}

{{-- Boostrap Icon CSS --}}
{{--
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
/>
--}}

{{-- ****************************Porto CSS**************************** --}}

<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
    rel="stylesheet"
    type="text/css"
/>

<!-- Vendor CSS -->
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/bootstrap/css/bootstrap.min.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/fontawesome-free/css/all.min.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/animate/animate.min.css') }}"
/>
<link
    rel="stylesheet"
    href="{{
        asset('porto/vendor/simple-line-icons/css/simple-line-icons.min.css')
    }}"
/>
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/owl.carousel/assets/owl.carousel.min.css') }}"
/>
<link
    rel="stylesheet"
    href="{{
        asset('porto/vendor/owl.carousel/assets/owl.theme.default.min.css')
    }}"
/>
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/magnific-popup/magnific-popup.min.css') }}"
/>

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('porto/css/theme.css') }}" />
<link rel="stylesheet" href="{{ asset('porto/css/theme-elements.css') }}" />
<link rel="stylesheet" href="{{ asset('porto/css/theme-blog.css') }}" />
<link rel="stylesheet" href="{{ asset('porto/css/theme-shop.css') }}" />

<!-- Current Page CSS -->
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/rs-plugin/css/settings.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/rs-plugin/css/layers.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/rs-plugin/css/navigation.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ asset('porto/vendor/circle-flip-slideshow/css/component.css') }}"
/>

<!-- Demo CSS -->

<!-- Skin CSS -->
<link rel="stylesheet" href="{{ asset('porto/css/skins/default.css') }}" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="{{ asset('porto/css/custom.css') }}" />

<!-- Head Libs -->
<script src="{{ asset('porto/vendor/modernizr/modernizr.min.js') }}"></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

{{-- ************************************Porto CSS End************************************ --}}

{{--
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/custom.css') }}" /> --}}
