@php
/*
--------------------------------------------------------------------------
Categories widget
---------------------------------------------------------------------------
Responsibility: Displaying answers of the current user
along with answer's question.
*/
@endphp

@foreach ($myAnswers as $answer)
@include('user.partials.components.myAnswer')
@endforeach