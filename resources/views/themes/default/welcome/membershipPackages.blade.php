@extends('bgbd.master')

@push('css')

<style>
    .w3-purple,
    .w3-hover-purple:hover {
        color: #fff !important;
        background-color: #990000 !important;
    }

    .w3-text-purple,
    .w3-hover-text-purple:hover {
        color: #990000 !important;
    }
</style>

@endpush

@section('content')

@include('welcome.parts.membershipPackages')

@endsection

@push('js')


@endpush