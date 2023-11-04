@php
/*
--------------------------------------------------------------------------
My Answer Card
Responsibility: Displaying answer of the current user
along with answer's question
---------------------------------------------------------------------------
*/
@endphp


<div>
    <div class="myanswer-card mb-3">

        {{-- Question Section --}}
        <div class="p-2" style="border-bottom:1px solid lightgray;">
            <a href="/questions/{{$answer->question->id}}">
                <h5><i class="fas fa-question-circle"></i> {{$answer->question->title}}</h5>
            </a>
        </div>

        {{-- Answer Section --}}
        <div class="p-2">
            <a href="/questions/{{$answer->question->id}}">
                <i class="far fa-comment-alt"></i> {!! $answer->description!!}
            </a>
        </div>

    </div>
</div>

@push('styles_inside_head_tag')
<style>
    .myanswer-card {
        background-color: white;
        cursor: pointer;
        border-radius: 10px;
        box-shadow: 0px 0px 2px 1px rgba(60, 64, 67, 0.15);
    }

    a .myanswer-card:hover {
        text-decoration: none;
        background-image: 0px 1px 1px 1px rgba(255, 255, 255, .8);
    }
</style>
@endpusH