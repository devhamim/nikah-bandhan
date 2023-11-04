@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Dhaka Metro News') --}}

@push('css') 


@endpush

@section('content')
@include('welcome.parts.search')
@endsection

@push('js')

@endpush
