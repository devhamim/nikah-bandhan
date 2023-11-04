@php
$me=auth()->user();
@endphp

<aside class="sidebar">
    @if($me->profile_img)
    <img src="{{asset('storage/users/pp/' .$me->profile_img)}}" alt="" class="img-fluid border border-danger mt-3 ml-3"
        style="max-width: 80%; ">

    @elseif($me->uploadedPP() != null)
    {{-- {{dd($me->uploadedPP())}} --}}
 <div class="text-center">
    <img src="{{asset('storage/users/pp/'.$me->uploadedPP()->image_name )}}" alt="tt" class="img-fluid border border-danger mt-3 ml-3"
    style="max-width: 80%; "> <br>
    <small class="btn btn-warning text-center">Pending</small>
 </div>
    @else
    <img src="{{asset('img/vip-user.png')}}" alt="" class="img-fluid border border-danger" style="max-width: 80%; ">
    @endif
    <h4 class="color-vipmm2">Profile Completed {{ $me->profilePoint() }}%</h4>

    <div class="progress mb-2">
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

    <ul class="nav nav-list flex-column mb-5">
        <li class="nav-item"><a class="nav-link text-dark active" href="{{route('user.profile')}}">@if($me->id==auth()->user()->id)My @else
                {{$me->name}}@endif Profile</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('updatePreference')}}">Update Preferences</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.updateprofile')}}">Update Profile</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.gallery')}}">Gallery</a></li>
    </ul>
    <ul class="nav nav-list flex-column mb-5">
        <li class="nav-item"><a class="nav-link" href="{{route('user.favourites')}}">Favourite User ({{
                $me->favs()->count() }})</a>
        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('user.visitors')}}">My Visitors ({{
                $me->visitors()->count() }})</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.myAsset')}}">Pending Proposals ({{
                $me->pendingProposalToMeCount() }})</a></li>
         <li class="nav-item"><a class="nav-link" href="{{route('user.mySentProposal')}}">Proposals Sent by Me ({{ $me->proposalFromMeCount() }})</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('user.myContacts')}}">My Contacts ({{ $me->cont()->count() }}) - <span style="color: red">({{ $me->contactLimit() }} remaining)</span></a>
        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('user.myAssetaccepted')}}">My Conections ({{
            $me->acceptedProposalToMeCount() }}) </a>
    </li>

        <li class="nav-item"><a class="nav-link" href="{{route('my.Block')}}">My block users ({{ $me->blockss()->count() }})</a></li>
    </ul>


</aside>
