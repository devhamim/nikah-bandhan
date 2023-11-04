@extends('welcome.layouts.welcomeMaster2')
{{-- @section('title', 'Banglali Muslim Marriage Media') --}}

@push('css')
<style>
    .abc table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    .abc  td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
   ..abc tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
{{-- <link href="{{asset('css/user.css')}}" rel="stylesheet" /> --}}
<link href="{{asset('css/userProfile.css')}}" rel="stylesheet" />
@endpush

@section('content')
<?php $me = Auth::user(); ?>


@include('user.parts.userDetails2')


{{-- modal is outside of .main .main-raised class --}}
@include('user.includes.modal.reportModal')
{{-- @include('user.includes.modal.settingModal') --}}

@endsection

@push('js') 

{{-- <script src="{{asset('js/userProfile.min.js')}}"></script> --}}
@endpush