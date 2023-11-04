@php /*
---------------------------------------------------------------------------
Tertiary Layout, one column with no header of footer
--------------------------------------------------------------------------- */
@endphp @extends('user.layouts.masterLayout') @section('viewboard')
{{-- Vue Application Mount/Entry point--}}
<div class="app" id="app">@yield('sitebody')</div>
@endsection
