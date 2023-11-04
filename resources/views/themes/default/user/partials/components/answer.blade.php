@php
/*
---------------------------------------------------------------------------
Single Question
Responsibility: Displaying categories of questions.
---------------------------------------------------------------------------
*/
@endphp

<div class="answer-area">

    <div class="answer-card">

        <div class="question-sections">
            <div class="reaction-buttons-container">
                {{--Question Reactions--}}
                <div class="reaction-buttons" data-modeltype="answer" data-modelid="{{$answer->id}}">
                    {{-- Upvote Button --}}
                    <button
                        data-route={{route('UDhandler',['model_type' => 'question', 'model_id' => $answer->id, 'action' => 'upvote'])}}
                        class="upvote udbtn @auth <?php if($user->hasUpvote('answer',$answer->id)) echo "upvoted"; else echo "not-upvoted" ?> @else not-upvoted @endauth">
                        <i class="fas fa-arrow-up"></i>
                    </button>

                    {{-- Net Vote-Count --}}
                    <span class="net-vote">{{$answer->netvotes($answer->id)}}</span>

                    {{-- Downvote Button --}}
                    <button
                        data-route={{route('UDhandler',['model_type' => 'question', 'model_id' => $answer->id, 'action' => 'downvote'])}}
                        class="downvote udbtn @auth <?php if($user->hasDownvote('answer',$answer->id)) echo "downvoted"; else echo "not-downvoted" ?> @else not-downvoted @endauth">
                        <i class="fas fa-arrow-down"></i>
                    </button>
                </div>
            </div>
            {{--Quesition info--}}
            <div class="question-block">
                <p>
                    {!!$answer->description!!}
                </p>
            </div>

        </div>

        {{--Question Meta--}}
        <div class="question-meta">
            <div class="ans-count perfect-center">
                @auth
                @if($answer->userIsOwner())
                <form action="/questions/{{$answer->id}}" method="post" style="display:inline-block;">
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
                    <a class="text-info" href="#">
                        <span class="icon-area">
                            <span class="icon-area__icon"><i class="fas fa-pen"></i></span>
                            <span class="icon-area__text">Edit</span>
                        </span>
                    </a>
                </button>
                @endif
                @endauth
            </div>
            {{-- Contributor Seal --}}
            <div class="contributor-section">
                @include('user.partials.components.contributorSeal',['model'=>$answer])
            </div>
        </div>
    </div>
    @include('user.partials.components.comments',['model'=>$answer])
</div>
