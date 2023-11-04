@php
/*
---------------------------------------------------
Question Details Page.
Displays Details of a question with the belongings
such as answers, comments etc.
---------------------------------------------------
*/
@endphp

@extends('user.layouts.primaryLayout')

@section('sitebody')
{{-- setting model_context to the main model variable name in a specific scope --}}
@include('user.partials.components.questionDetailsCard')
@include('user.partials.components.answers')

@isset($answers)
@include('general.partials.components.paginator',['paginable'=>$answers])
@endisset

{{-- display answer form if current user has no answer on this question --}}
@if (!(Auth::check() && $question->userHasAnswer($question->id)))
@include('user.partials.components.answerForm')
@endif
@endsection

@section('leftSidebarContents')
@include('user.partials.components.importantLinksWidget')
@endsection


@section('rightSidebarContents')
@include('user.partials.components.askQuestionWidget')
{{-- @include('user.partials.components.popularTagsWidget') --}}
{{-- @include('user.partials.components.categoriesWidget') --}}
{{-- @include('user.partials.components.popularQuestionsWidget') --}}
@include('user.partials.components.recentQuestionsWidget')
@include('user.partials.components.recentAnswersWidget')
@endsection
