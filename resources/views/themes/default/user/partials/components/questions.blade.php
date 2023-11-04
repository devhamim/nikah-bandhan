@php
/*
--------------------------------------------------------------------------
Questions
Responsibility: Displaying questions.
--------------------------------------------------------------------------
*/
@endphp

@isset($questions)
@foreach ($questions as $question)
@include('user.partials.components.question')
@endforeach
@endisset
