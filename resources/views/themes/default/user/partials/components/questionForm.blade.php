@php
/*
--------------------------------------------------------------------------
| Question Submit Form
|---------------------------------------------------------------------------
| Responsibility: Displaying question submit form to the authenticated
| user.
*/
@endphp


@include('user.dependencies.dependencyManager',['tinyMCE'=>true,'device'=>'all','txtarea_id'=>'qdesc'])
@include('user.dependencies.dependencyManager',['select2'=>true])

<div class="py-2">
    <form id="ask_form" class="question-form" data-imgurl="/image/ajaj/upload" action="{{route('questions.store')}}"
        method="post">
        @csrf
        <input class="mb-2" type="text" name="title" id="" placeholder="আপনার সমস্যাটি কী?" style="">

        <div class="mb-2" id="editor">
            <textarea id="qdesc" name="qdesc" class="form-control" style="width:100%;" rows="15"
                placeholder="প্রয়োজনে  বিস্তারিত লিখুন"></textarea>
        </div>

        <div class="text-right mt-3">
            <button type="submit" class="btn btn-block btn-primary">সাবমিট</button>
        </div>
    </form>
</div>

@push('styles_inside_head_tag')
<style>
    .question-form {}
</style>
@endpush

@push('scripts_before_body_endtag')
<script>

</script>
@endpush
