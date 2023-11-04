@php
/*
---------------------------------------------------
Create Question Page
Displays question creation forms.
---------------------------------------------------
*/
@endphp
@extends('user.layouts.secondaryLayout')

@section('title')
{{__('Create Question')}}
@endsection

@section('sitebody')
@include('user.partials.components.questionForm')
@endsection
