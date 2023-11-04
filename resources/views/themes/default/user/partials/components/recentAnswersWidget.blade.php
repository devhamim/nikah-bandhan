@php
/*
--------------------------------------------------------------------------
Recent answers widget
Responsibility: Displaying questions recently answered.
--------------------------------------------------------------------------
*/
@endphp
<div class="right-sidebar-widget sidebar-widget">
    <div class="sidebar-widget-header">
        <i class="d-inline-block mr-2 bi bi-chat-left-text"></i> সাম্প্রতিক সমাধানসমূহ
    </div>
    <div class="sidebar-widget-body">
        <ul class="p-2 list-unstyled">
            @foreach ($recentAnswered as $answer)
            <li>
                @if ($answer->question)
                <a href="/questions/{{$answer->question->id}}">{{$answer->question->title}}</a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>

</div>

@push('styles_inside_head_tag')
<style>

</style>
@endpush
