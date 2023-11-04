{{--------------------------------------------------------------------------
| Profile widget
|---------------------------------------------------------------------------
|
| Responsibility: Displaying important profile info and setting in a
| widget.
--------------------------------------------------------------------------}}

@php
/*
--------------------------------------------------------------------------
| Categories widget
|---------------------------------------------------------------------------
| Responsibility: Displaying categories of questions.
*/
@endphp
{{-- User Profile picture for himself/herself --}}
<div class="left-widget branding-border" style="">
    {{-- user profile picture and cover picture --}}
    <div class="py-3 px-2" style="color:white;font-weight:bold;border-bottom:1px solid #1ba0f2;text-align:center">
        @if ($user->profpic!=NULL)
        <img width="100" height="100" style="display:inline-block;" class="rounded-circle"
            src="{{asset('storage/profile_pictures/'.$user->profpic)}}" alt="">
        @endif
    </div>
    {{-- Some user details --}}
    <div class="user-details p-2" style="color:black;font-size:1.3em;">
        <div class="text-center">
            <div class="">{{Auth::user()->name}}</div>
            Points: 61.4K <br>
        </div>
    </div>
    <div class="row p-0 m-0 text-center" style="color:black;font-size:1.3em;">
        <div class="col-md 4"><a href="/ianswered">Answers<br>{{$user->answers->count()}}</a></div>
        <div class="col-md 4"><a href="/questions/myquestions/">Questions<br>{{$user->questions->count()}}</a></div>
    </div>
    <hr>
    <div class="row p-0 m-0">
        <div class="col-md-12 pb-3 text-center">
            <div class="p-2 b-c-b" style="color:white;font-size:1.5em;"><a style="color:white"
                    href="/profile">প্রোফাইল</a></div>
        </div>
    </div>
</div>
