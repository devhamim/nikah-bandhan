@php
/*
----------------------------------------------------------------------------
Responsibility: Displaying all the comments associated to the provided
question or answer.
----------------------------------------------------------------------------
*/
@endphp
<div class="comment-area">

    <div class="comments-header">
        @if ($model->comments->count()>0)
        <div>Comments&nbsp;:</div>
        @else
        <div>
            no comments yet!
        </div>
        @endif
    </div>

    <div class="comment-cards-container">
        <div class="comment-cards">
            @foreach ($model->comments as $comment)
            @include('user.partials.components.comment')
            @endforeach
        </div>
    </div>

    @include('user.partials.components.commentInput')
</div>
