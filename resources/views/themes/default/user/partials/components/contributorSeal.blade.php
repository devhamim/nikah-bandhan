@php
/*
--------------------------------------------------------------------------
| Contributor seal
|---------------------------------------------------------------------------
|
| Responsibility: Displaying a seal of question creator or answer giver.
--------------------------------------------------------------------------
*/
@endphp

<div class="contributor-seal-wrapper">
    <div class="contributor-seal">
        <span class="contributor-image">
            @if ($model->user->profpic)
            <img class="contributor-picture" src="{{asset('storage/profile_pictures/'.$model->user->profpic)}}">
            @else
            <img class="contributor-picture" src="https://via.placeholder.com/50/555a5f/fff?text=U">
            @endif
        </span>
        <div class="contributor-details">
            <span>
                {{$model->user->name}}
            </span>
            <span>
                @if ($model->user->points=1>0)
                {{$model->user->points}}
                @else
                0
                @endif
                points.
            </span>
        </div>
    </div>
</div>
