@php
/*
---------------------------------------------------
Profile Header
User Profile Page Header
---------------------------------------------------
*/
@endphp
<section class="profile-header">
    <div class="profile-header-content">
        <img class="profile-cover-pic" src="https://via.placeholder.com/600x350/16babb/ffffff?Text=ProfileCover">
        <img class="profile-pic" src="https://via.placeholder.com/150/c6d2de/555a5f?Text=Profile-Cover">
    </div>
    <div class="little-info">
        <span class="user-name">
            User Name
            <button><i class="bi bi-pen text-primary" style="font-size: .7em"></i></button>
        </span>
    </div>
</section>
{{-- Profile Navigation --}}
@include('user.partials.sections.profileNav')
