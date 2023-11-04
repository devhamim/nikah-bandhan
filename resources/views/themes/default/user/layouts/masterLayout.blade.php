<!DOCTYPE html>
{{-- Setting Document's language --}}
<html lang="en">
    <head>
        {{-- Global Meta --}}
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        {{-- Laravel CSRF Token  --}}
        <meta name="csrf-token" content="{{" csrf_token() }} />

        {{--meta stack--}}
        @stack('meta')

        <title>@yield('title')</title>

        {{-- Global Style Dependencies --}}
        @include('user.dependencies.globalStyleDependencies')

        {{-- Stack for arbitrary content pushing --}}
        @stack('inside_head_tag')

        {{--app's main stylesheet--}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        {{--in-page styles--}}
        <style></style>

        {{-- Pushed Styles --}}
        @stack('styles_inside_head_tag')

        {{-- Pushed Scripts --}}
        @stack('scripts_inside_head_tag')

        {{--in-page scripts--}}
        <script></script>
    </head>

    <body>
        {{-- Responsible for total viewport compising --}}
        @yield('viewboard')

        {{-- Global Script dependencies --}}
        @include('user.dependencies.globalScriptDependencies')

        {{-- Pushed styles for final render modifying --}}
        @stack('styles_before_body_endtag')

        {{-- app's main js file --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- Pushed scripts --}}
        @stack('scripts_before_body_endtag')

        {{--in-page scripts --}}
        <script></script>
    </body>
</html>
