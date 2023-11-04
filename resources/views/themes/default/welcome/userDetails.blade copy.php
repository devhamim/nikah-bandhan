@extends('welcome.layouts.welcomeMasterForUser')
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

img{
 width: 100%;
    border-radius: 4px;

}

img:hover{
  transform: scale(1.3,1.3);
  transition: .3s transform;

}
.btn.btn-primary.btn-link {
    background-color: transparent;
    color: red;
    box-shadow: none;
}


</style>
    
{{-- <link href="{{asset('css/user.css')}}" rel="stylesheet" /> --}}
<link href="{{asset('css/userProfile.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">

@endpush

@section('content')
<?php $me = Auth::user(); ?>


@include('user.parts.userDetails')


{{-- modal is outside of .main .main-raised class --}}
@include('user.includes.modal.reportModal')
{{-- @include('user.includes.modal.settingModal') --}}

@endsection

@push('js') 

{{-- <script src="{{asset('js/userProfile.min.js')}}"></script> --}}
@endpush