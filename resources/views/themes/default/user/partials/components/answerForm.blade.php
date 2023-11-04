@php
/*
--------------------------------------------------------------------------
Answer Submit Form
Responsibility: Responsibility: Displaying the answerform for the provided question.
---------------------------------------------------------------------------
*/
@endphp

@include('user.dependencies.dependencyManager',['tinyMCE'=>true,'device'=>"all",'txtarea_id'=>"answer_form"])

<div class="p-2 p-md-3 ans-form-container">

    <div class="ans-form-title">আপনার উত্তরটি লিখুন :</div>

    <form class="ans-form" id="ans_form" data-imgurl="/image/ajaj/upload" action="/questions/{{$question->id}}/answer"
        method="post">
        @csrf
        <textarea class="answer-form" name="ansdesc" id="answer_form" @guest disabled @endguest></textarea>
        <button class="ans-submit-btn bg-info text-white" type="submit">সাবমিট</button>
    </form>

    @guest
    <div class="ans-form-overlay perfect-center">
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
            to answer.
        </div>
    </div>
    @endguest
</div>
