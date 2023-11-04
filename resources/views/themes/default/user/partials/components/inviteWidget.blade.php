{{--------------------------------------------------------------------------
| invitation widget
|---------------------------------------------------------------------------
|
| Responsibility: Displaying Register or login invitation form.
--------------------------------------------------------------------------}}

@php
/*
--------------------------------------------------------------------------
| Categories widget
|---------------------------------------------------------------------------
| Responsibility: Displaying categories of questions.
*/
@endphp
<div class="text-right right-widget branding-border" style="">
    <div class="text-center py-2 b-c-b" style="color:white;">
        Register | Login
    </div>
    <div class="p-3">
        <a class="btn btn-block b-c-b" style="color:white;" href="{{ route('login') }}"><img height="20px" width="20px"
                src="{{asset('images/login.svg')}}" alt=""> Log in</a>

        @if (Route::has('register'))
        <a class="btn btn-block b-c-b" style="color:white;" href="{{ route('register') }}"><img
                src="{{asset('images/signup.svg')}}" height="20px" width="20px" alt=""> Register</a>
        @endif
    </div>
</div>