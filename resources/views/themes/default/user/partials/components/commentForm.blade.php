{{--------------------------------------------------------------------------
| Comment Form
|---------------------------------------------------------------------------
| Responsibility: Displaying a comment form.
--------------------------------------------------------------------------}}

@php
/*
--------------------------------------------------------------------------
| Categories widget
|---------------------------------------------------------------------------
| Responsibility: Displaying categories of questions.
*/
@endphp
<form class="cmt-form pl-5 pr-2 py-2" method="POST"
    data-route="{{route('comment.store',['model_type' => $model_type ,'model_id' => $model_id])}}">
    @csrf
    <div class="input-group br-5">
        <input class="form-control" style="border-top-right-radius:0;border-bottom-right-radius:0;"
            name="<?php if($model_type=='Answer') echo "a"; else if($model_type == 'Question') echo 'q';?>comment_{{$model_id}}"
            id="" rows="1">
        <button class="cmt-submit btn btn-secondary input-group-append"
            style="border-top-left-radius:0;border-bottom-left-radius:0;" type="submit">সাবমিট</button>
    </div>
</form>