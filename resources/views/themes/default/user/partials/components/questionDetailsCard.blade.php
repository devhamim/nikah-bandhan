@php
/*
---------------------------------------------------------------------------
Single Question
Responsibility: Displaying categories of questions.
---------------------------------------------------------------------------
*/
@endphp

<div class="question-details-area">
    <div class="question-details-card">

        <div class="question-sections">

            {{--Question Reactions--}}
            <div class="reaction-buttons-container">
                <div class="reaction-buttons" data-modeltype="question" data-modelid="{{$question->id}}">


                    {{-- Upvote Button --}}
                    <button
                        data-route={{route('UDhandler',['model_type' => 'question', 'model_id' => $question->id, 'action' => 'upvote'])}}
                        class="upvote udbtn @auth <?php if($user->hasUpvote('question',$question->id)) echo "upvoted"; else echo "not-upvoted" ?> @else not-upvoted @endauth">
                        <i class="fas fa-arrow-up"></i>
                    </button>

                    {{-- Net Vote-Count --}}
                    <span class="net-vote">{{$question->netvotes($question->id)}}</span>

                    {{-- Downvote Button --}}
                    <button
                        data-route={{route('UDhandler',['model_type' => 'question', 'model_id' => $question->id, 'action' => 'downvote'])}}
                        class="downvote udbtn @auth <?php if($user->hasDownvote('question',$question->id)) echo "downvoted"; else echo "not-downvoted" ?> @else not-downvoted @endauth">
                        <i class="fas fa-arrow-down"></i>
                    </button>

                    {{-- Bookmark Button --}}
                    <button data-route={{route('bookmark',['question_id' => $question->id])}} class="bookmark">
                        <i
                            class="bi @auth <?php if($question->userBookmarked($question->id)) echo "bi-bookmark-fill"; else echo "bi-bookmark"; ?> @else bi-bookmark @endauth">
                        </i>
                    </button>
                </div>
            </div>
            {{--Quesition info--}}
            <div class="question-block">
                {{-- Question title --}}
                <h5>
                    <a href={{route('questions.show',['question'=>$question->id])}}>
                        {{$question->title}}
                    </a>
                </h5>
                <div class="quest-desc">
                    <p>{!!$question->description!!}</p>
                </div>
                {{-- Answer Button --}}
                <a class="ans-btn" href="#ans_form">
                    উত্তর দিন
                </a>
            </div>

        </div>

        {{--Question Meta--}}
        <div class="question-meta">
            <div class="ans-count perfect-center">
                <a href="{{route('questions.show',['question'=>$question->id])}}">
                    <span class="icon-area">
                        <span class="icon-area__icon"><i class="bi bi-chat-left-text"></i>
                            {{$question->answers->count()}}</span>
                        <span class="icon-area__text">টি উত্তর</span>
                    </span>
                </a>
            </div>

            @auth
            @if($question->userIsOwner() || $user->isAdmin())
            <form action="/questions/{{$question->id}}" method="post" style="display:inline-block;">
                @method('DELETE')
                @csrf
                <button class="text-danger" type="submit">
                    <span class="icon-area">
                        <span class="icon-area__icon"><i class="fas fa-trash-alt"></i></span>
                        <span class="icon-area__text">Delete</span>
                    </span>
                </button>
            </form>
            <button>
                <a class="text-info" href="{{route('questions.edit',['question' => $question->id])}}">
                    <span class="icon-area">
                        <span class="icon-area__icon"><i class="fas fa-pen"></i></span>
                        <span class="icon-area__text">Edit</span>
                    </span>
                </a>
            </button>
            @endif

            @if ($user->isAdmin() && $question->approved=='n')
            <button>
                <a class="text-success" href="{{route('questions.approve',['question' => $question->id])}}">
                    <span class="icon-area">
                        <span class="icon-area__icon"><i class="fas fa-check"></i></span>
                        <span class="icon-area__text">Approve</span>
                    </span>
                </a>
            </button>
            @endif
            @endauth

            {{-- Contributor Seal --}}
            <div class="contributor-section">
                @include('user.partials.components.contributorSeal',['model'=>$question])
            </div>
        </div>
    </div>

    @include('user.partials.components.comments',['model'=>$question])
</div>
