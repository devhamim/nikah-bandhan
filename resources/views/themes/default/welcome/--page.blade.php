@extends('welcome.layouts.welcomeMasterForUser')

@push('css') 
@endpush

@section('content')

@auth
<?php $u = Auth::user(); ?>
@endauth
 @include('welcome.parts.page')
@endsection

@push('js') 
@endpush 