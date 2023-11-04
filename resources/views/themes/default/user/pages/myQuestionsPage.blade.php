@php
/*
---------------------------------------------------
My Questions Page
Displays all the questions created by the current
user.
---------------------------------------------------
*/
@endphp

@extends('user.layouts.primaryLayout')

@section('sitebody')
@include('user.partials.components.questions',['model_context' => 'question'])
<div class="text-center p-3">
    <div style="display:inline-block;">{{$questions->links()}}</div>
</div>
@endsection
