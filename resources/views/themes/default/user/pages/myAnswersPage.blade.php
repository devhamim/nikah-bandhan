@php
/*
---------------------------------------------------
My Anwers Page
Displays all Answers given by the current user.
---------------------------------------------------
*/
@endphp

@extends('user.layouts.primaryLayout')

@section('sitebody')
@include('user.partials.components.myAnswers')
@if ($myAnswers->count() > $myAnswers->perPage())
<div class="text-center p-3" style="border-top:1px solid lightgray">
    <div style="display:inline-block;">{{$myAnswers->links()}}</div>
</div>
@endif
@endsection
