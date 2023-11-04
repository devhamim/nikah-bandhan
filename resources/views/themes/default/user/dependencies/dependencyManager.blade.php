@php
/*
---------------------------------------------------------------------------
Dependecy Manager
---------------------------------------------------------------------------
Responsibilty: it will manage dependecies such as external
stylesheet/font inclusion.
---------------------------------------------------------------------------
*/
@endphp

{{-- conditionally include select2 --}}
@isset($select2)

@if ($select2==true)
@push('styles_inside_head_tag')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/select2/css/select2-bootstrap4.min.css')}}">
@endpush

@push('scripts_before_body_end_tag')
<!-- Select2 -->
<script src="{{ asset('assets/select2/js/select2.full.min.js') }}"></script>
@endpush
@endif

@endisset

{{-- Conditionally include tinyMCE with its configuration --}}
@isset($tinyMCE)
@if ($tinyMCE==true)
@push('scripts_before_body_endtag')
@include('user.dependencies.includes.tinyMCE')
@endpush
@endif
@endisset
