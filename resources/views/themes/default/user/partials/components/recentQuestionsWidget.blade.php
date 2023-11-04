@php
/*
--------------------------------------------------------------------------
| Recent Questions widget
|---------------------------------------------------------------------------
| Responsibility: Displaying recent questions.
*/
@endphp
<div class="right-sidebar-widget sidebar-widget">
    <div class="sidebar-widget-header">
        <i class="bi bi-question-circle"></i> সাম্প্রতিক প্রশ্নসমূহ
    </div>
    <div class="sidebar-widget-body">
        <ul class="p-2 list-unstyled">
            @foreach ($latestQuests as $lquest)
            <li><a href="/questions/{{$lquest->id}}">{{$lquest->title}}</a></li>
            @endforeach
        </ul>
    </div>

</div>

@push('styles_inside_head_tag')
<style>

</style>
@endpush
