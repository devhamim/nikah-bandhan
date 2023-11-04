@php
/*
--------------------------------------------------------------------------
Important links Widget
Responsibility: Displaying some important links;
---------------------------------------------------------------------------
*/
@endphp


<div class="right-sidebar-widget sidebar-widget imp-link-widget">

    {{-- widget header --}}
    <div class="b-c-f sidebar-widget-header">
        <i class="bi bi-text-left"></i> Links
    </div>

    {{-- widget body/content --}}
    <div class="imp-link-menu sidebar-widget-body">
        <a href="#" class="like-a-table-row">
            <span class="like-a-table-col text-center"><i style="width:22px;" class="fas fa-home"></i></span>
            <span class="like-a-table-col">Home</span>
        </a>

        <a href="#" class="like-a-table-row">
            <span class="like-a-table-col text-center"><i style="width:22px;"
                    class="bi bi-question-circle-fill"></i></span>
            <span class="like-a-table-col">My questions</span>
        </a>

        <a href="#" class="like-a-table-row">
            <span class="like-a-table-col text-center"><i style="width:22px;" class="bi bi-chat-left-text"></i></span>
            <span class="like-a-table-col">My Answers</span>
        </a>

        <a href="#" class="like-a-table-row">
            <span class="like-a-table-col text-center"><i style="width:22px;" class="fas fa-bookmark"></i></span>
            <span class="like-a-table-col"> Bookmarks</span>
        </a>

    </div>
</div>
