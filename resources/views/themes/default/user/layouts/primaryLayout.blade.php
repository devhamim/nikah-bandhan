@php
/*
---------------------------------------------------------------------------
Primary Layout, three columns site body left-sidebar, main-bar,
right-sidebar to mention. It includes a header and footer.
---------------------------------------------------------------------------
*/
@endphp

@extends('user.layouts.masterLayout')
@section('viewboard')
{{-- Vue Application Mount/Entry point--}}
<div class="app">
    {{-- site-header --}}
    @include('user.partials.sections.globalHeader')

    {{--Website layout--}}
    <div class="site-body">

        <div class="left-sidebar">
            {{--Left Sidebar--}}
            @include('user.partials.sections.leftSidebar')
        </div>

        <div class="main-bar">
            {{--Main Bar--}}
            @yield('sitebody')
        </div>

        <div class="right-sidebar">
            {{--Right Sidebar--}}
            @include('user.partials.sections.rightSidebar')
        </div>

    </div>


    {{-- site-footer --}}
    @include('user.partials.sections.globalFooter')

</div>
@endsection
