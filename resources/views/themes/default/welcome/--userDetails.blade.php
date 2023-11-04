@extends('welcome.layouts.welcomeMasterForUser')
{{-- @section('title', 'Banglali Muslim Marriage Media') --}}

@push('css') 
<link href="{{asset('css/user.css')}}" rel="stylesheet" />

@endpush

@section('content')
@include('user.parts.userDetails')

{{-- modal is outside of .main .main-raised class --}}
@include('user.includes.modal.reportModal')
{{-- @include('user.includes.modal.settingModal') --}}

@endsection

@push('js') 
<script src="{{asset('js/user.js')}}"></script>
@endpush

