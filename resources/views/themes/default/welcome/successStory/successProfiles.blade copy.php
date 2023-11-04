@extends('welcome.layouts.welcomeMaster')

@push('css') 
@endpush

@section('content')
@auth
<?php $me = Auth::user(); ?>
@endauth
 @include('welcome.successStory.parts.successProfiles')
@endsection

@push('js') 
@endpush