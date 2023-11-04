@php
/*
---------------------------------------------------
Home Page
Displays the Home page of the website.
---------------------------------------------------
*/
@endphp

@extends('user.layouts.primaryLayout')

@section('title')
{{config('specify.title')}}
@endsection

@section('sitebody')
<div id="questions">
    @include('user.partials.components.questions',['model_context'=>'question'])
</div>
{{-- conditionally include paginator if there are items to paginate --}}
@isset($questions)
@include('general.partials.components.paginator',['paginable'=>$questions])
@endisset
@endsection


{{-- Left sidebar contents --}}
@section('leftSidebarContents')
@include('user.partials.components.importantLinksWidget')
@endsection

{{-- right sidebar contents --}}
@section('rightSidebarContents')

@include('user.partials.components.askQuestionWidget')
{{-- @include('user.partials.components.popularTagsWidget') --}}
{{-- @include('user.partials.components.categoriesWidget') --}}
{{-- @include('user.partials.components.popularQuestionsWidget') --}}
@include('user.partials.components.recentQuestionsWidget')
@include('user.partials.components.recentAnswersWidget')

@endsection

@push('scripts_before_body_endtag')
<script src="{{ asset('/js/questions.js') }}"></script>
@endpush
