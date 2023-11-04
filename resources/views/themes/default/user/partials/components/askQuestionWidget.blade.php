@php
/*
--------------------------------------------------------------------------
| Ask Question Widget
|---------------------------------------------------------------------------
| Responsibility: Displaying widget with create question page link.
*/
@endphp

<div class="ask-section mb-3">
    {{-- Display when ask button is clicked --}}
    <div class="ask-card" id="ask_card" style="display:none;">
        {{-- Loading animation --}}
        <div class="qform-loading-anim perfect-center">
            <span class="b-c-f">
                <i class="fas fa-spinner fa-spin"></i>&nbsp;Loading
            </span>
        </div>
    </div>

    @auth
    {{-- attach question create page link if the user is authenticated --}}
    <a href="{{route('questions.create')}}">
        @else
        <a href="{{route('login')}}">
            @endauth
            <button class="ask-btn" id="ask_btn">
                <i class="fas fa-plus-circle"></i> প্রশ্ন করুন
            </button>
        </a>
</div>
