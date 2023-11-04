@php
/*
--------------------------------------------------------------------------
Responsibility: Displaying a comment form.
---------------------------------------------------------------------------
*/
@endphp
@auth
<div class="comment-form-container">
    <form class="comment-form" id="comment_form" method="POST"
        data-route="{{route('comment.store',['model_type' => get_class($model) ,'model_id' => $model->id])}}">
        @csrf
        <input class="form-control comment-input" name="comment" id="comment" autocomplete="off">
        <button class="comment-submit-btn" id="comment_submit_btn" type="submit">
            সাবমিট
        </button>

    </form>
</div>

@else
<div class="comment-form-alt" id="comment_form_alt">
    <div>
        <span class="d-inline-block p-1 mx-1" style="border:1px solid lightgray; border-radius:7px;">
            <a class="text-info px-1" href="{{ route('register') }}">
                <i aria-hidden="true" class="fas fa-user-plus"></i> Join
            </a>
        </span>
        or
        <span class="d-inline-block p-1 mx-1" style="border:1px solid lightgray; border-radius:7px;">
            <a class="text-primary px-1" href="{{ route('login') }}">
                <i aria-hidden="true" class="fas fa-sign-in-alt"></i> Log in
            </a>
        </span>
        to comment.
    </div>
</div>
@endauth
