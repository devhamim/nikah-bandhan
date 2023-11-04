@php
/*
--------------------------------------------------------------------------
Categories widget
Responsibility: Displaying a single comment.
-------------------------------------------------------------------------
*/
@endphp

<div class="comment-card">
    <img class="commenter-pic" src="https://via.placeholder.com/35x35/16babb/ffffff?Text=ProfileCover" alt="">
    {{$comment->comment}} - {{$comment->user->name}} -
    {{$comment->created_at->diffForHumans()}}
    @auth
    @if ($comment->userIsOwner())
    <button data-route="/comments/{{$comment->id}}/delete" class="cmt-del text-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
    @endif
    @endauth
</div>
