@php
$me=auth()->user();
@endphp


<aside class="sidebar bg-white py-2 px-3">
    @if($me->profile_img)
    @if($me->profile_public)
    <img src="{{asset('storage/users/pp/' .$me->profile_img)}}" alt="" class="img-fluid border border-danger mt-3 "
        style="max-width: 80%; ">
    @else
    <img src="{{asset('storage/users/pp/' .$me->profile_img)}}" alt="" class="img-fluid border border-danger mt-3 "
    style="max-width: 80%; filter: blur(5px); ">

    @endif

    @elseif($me->uploadedPP() != null)
    {{-- {{dd($me->uploadedPP())}} --}}

 <div class="text-center">
    <img src="{{asset('storage/users/pp/'.$me->uploadedPP()->image_name )}}" alt="tt" class="img-fluid border border-danger mt-3 "
    style="max-width: 80%; "> <br>
    <small class="btn btn-warning text-center">Pending</small>
 </div>

    @else
    <img src="{{asset('img/vip-user.png')}}" alt="" class="img-fluid border border-danger" style="max-width: 80%; ">
    @endif
    <h4 class="color-vipmm2 ">Profile Completed {{ $me->profilePoint() }}%</h4>

    <div class="progress mb-2 ">
        <div class="progress-bar bg-color-vipmm progress-bar-striped progress-bar-animated active"
            role="progressbar" aria-valuenow="{{
                $me->profilePoint() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{
                    $me->profilePoint() }}%">
            <span class="sr-only">{{
                $me->profilePoint() }}% Complete</span>
        </div>
    </div>

    @if($me->profile_img)
    @if($me->havePendingcImg() && $me->uploadedPP() != $me->profile_img)
    {{-- {{dd($me->uploadedPP())}} --}}
 <div class="text-center">
    <img src="{{asset('storage/users/pp/'.$me->uploadedPP()->image_name )}}" alt="tt" class="img-fluid border border-danger mt-3 ml-3"
    style="max-width: 80%; "> <br>
    <small class="btn btn-warning text-center">Pending</small>
 </div>
    @endif
    @endif




</aside>
