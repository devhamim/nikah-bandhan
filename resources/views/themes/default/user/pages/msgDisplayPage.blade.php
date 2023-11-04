@php
/*
---------------------------------------------------
Message Display Page
Displays messages to the user of the website.
---------------------------------------------------
*/
@endphp
@extends('user.layouts.primaryLayout')

@section('title')
{{$short_msg}}
@endsection

@section('sitebody')
<div class="p-5">
    <div class="display-4">
        {{$full_msg}}
    </div>
</div>
@endsection
