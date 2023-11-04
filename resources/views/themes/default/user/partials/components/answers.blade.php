@php
/*
---------------------------------------------------------------------------
Answers
Responsibility: Displaying all the answers of the provided question.
---------------------------------------------------------------------------
*/
@endphp

{{-- Displaying current user's answer at first if he/she is logged in and there is any. --}}
@auth
@isset($userAns)
@foreach ($userAns as $answer)
@include('user.partials.components.answer')
@endforeach
@endisset
@endauth

{{-- Displaying all answers of a question other than current user's answers,
 if he/she is logged in and there is any. --}}
@isset($answers)
@foreach ($answers as $answer)
@include('user.partials.components.answer')
@endforeach
@endisset
