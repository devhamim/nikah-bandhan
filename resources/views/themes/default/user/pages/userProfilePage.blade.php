@php
/*
---------------------------------------------------
User Profile page
Displays a user Profile page .
---------------------------------------------------
*/
@endphp

@extends('user.layouts.secondaryLayout')

@section('sitebody')
{{-- Profile Header --}}
@include('user.partials.sections.profileHeader')
{{-- User's Questions and Questions User has answer in --}}
@include('user.partials.sections.profileQueAns')
{{-- User's Stats --}}
@include('user.partials.sections.profileStats')
{{-- User's Badges --}}
@include('user.partials.sections.profileBadges')
@endsection

@push('inside_head_tag')
<link rel="stylesheet" href="./css/profile.css">
@endpush
