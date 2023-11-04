{{--------------------------------------------------------------------------
| Popular Widget
|---------------------------------------------------------------------------
|
| Responsibility: Displaying popular questions in the website.
--------------------------------------------------------------------------}}

@php
/*
--------------------------------------------------------------------------
| Categories widget
|---------------------------------------------------------------------------
| Responsibility: Displaying categories of questions.
*/
@endphp
<div class="right-widget branding-border" style="">
    <div class="p-2 sidebar-widget b-c-b"
        style="color:white;background-image:url({{asset('images/popular.png')}});background-repeat:no-repeat;background-position:right;">
        <i class="fas fa-users"></i> জনপ্রিয়
    </div>
    <ul class="p-2 list-unstyled">
        @foreach ($popularQuests as $question)
        <li><a href="/questions/{{$question->id}}">{{$question->title}}</a></li>
        @endforeach
    </ul>
</div>

@push('styles_inside_head_tag')
<style>

</style>
@endpush