@php
/*
---------------------------------------------------
My Bookmarks Page
Displays all the bookmarks marked by the current
user.
---------------------------------------------------
*/
@endphp
@extends('user.layouts.primaryLayout')

@section('sitebody')
@include('user.partials.components.questions',['model_context' => 'question'])
@if ($questions->count() > $questions->perPage())
<div class="text-center p-3">
    <div style="display:inline-block;">{{$questions->links()}}</div>
</div>
@endif
@endsection
