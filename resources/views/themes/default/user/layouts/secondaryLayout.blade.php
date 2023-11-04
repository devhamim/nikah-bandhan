@php
/*
---------------------------------------------------------------------------
Secondary Layout, one columns site body. It includes a header and a footer.
---------------------------------------------------------------------------
*/
@endphp

@extends('user.layouts.masterLayout')
@section('viewboard')
{{-- Vue Application Mount/Entry point--}}
<div class="app" id="app">
    {{-- site-header --}}
    @include('user.partials.sections.globalHeader')

    {{-- site-body --}}
    @yield('sitebody')

    {{-- site-footer --}}
    @include('user.partials.sections.globalFooter')

</div>
@endsection
