@foreach($users as $user)
<tr>
    <td>{{$i++}}</td>
    <td>
     @if($user->profile_img)
     <img src="{{asset('storage/users/pp/' .$user->profile_img)}}" alt="" class="img-fluid border border-danger"
         style="max-width: 80px; ">
     @else
     <img src="{{asset('img/vip-user.png')}}" alt="" class="img-fluid border border-danger" style="max-width: 80px; ">
     @endif
    </td>
 <td>
     @if($user->uploadedPP())
     {{-- {{dd($user->hasPictures1())}} --}}
    <img class="img-fluid border border-danger" style="max-width: 80px; " src="{{asset('storage/users/pp/'.$user->uploadedPP()->image_name )}}" alt="Profile image example"/>
    @endif
 </td>
 <td> <strong>ID:</strong> {{$user->id}} <br>
    <strong>Name:</strong> {{$user->name}} <br>
    <strong>Username:</strong> {{$user->username}} <br>
    <strong>Mobile:</strong> {{$user->mobile}} <br>
    <strong>Guardian Mobile:</strong> {{$user->guardian_mobile}} <br>
    <strong>Email:</strong> {{$user->email}} <br>
    <strong>Age:</strong> {{$user->age()}} <br>
    <strong>Package:</strong> {{ $user->package }} <br>
    <strong>Expire Date:</strong>@if($user->expired_at) {{ date('d-M-Y', strtotime($user->expired_at)) }} @endif<br>
    <strong>Validity (Days):</strong> {{ $user->packageDuration() }} <br>
     {{-- {{$user->name}}, {{$user->age()}}, {{$user->height}}, {{$user->userReligion ? $user->userReligion->name : $user->religion}}, {{$user->designation}}, {{$user->height}}, {{ $user->userParmanentDistrict ? $user->userParmanentDistrict->name  : $user->parmanent_district}} --}}
    </td>
 <td>
    <strong>Gender:</strong> {{$user->gender}} <br>
    <strong>Date of Birth:</strong> {{$user->dob}} <br>
    <strong>Country:</strong> {{$user->present_country}} <br>
    <strong>Profile Created By:</strong> {{$user->profile_created_by}} <br>
    <strong>Looking For:</strong> {{$user->looking_for}} <br>
    <strong>Religion:</strong> {{$user->userReligion ? $user->userReligion->name : $user->religion}} <br>
    <strong>Social Order:</strong> {{$user->religious_view}} <br>
    <strong>Profile Created At:</strong>  {{date('d-M-Y', strtotime($user->created_at))}} <small>( {{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}}) </small>  <br>
    <strong>Proposal Pending:</strong> {{$user->pendingProposalToMeCount()}} <br>
    <strong>Proposal to Me:</strong> {{$user->proposalToMe->count()}} <br>
    <strong>Proposal Sent by Me:</strong> {{$user->proposalByMe->count()}} <br>
    {{-- <strong>Last Login:</strong> {{ $user->loggedin_at }} ( {{ Carbon\Carbon::parse($user->loggedin_at)->diffForHumans()}})<br> --}}
    <strong>Last Login:</strong>  {{($user->loggedin_at)?(  Carbon\Carbon::parse($user->loggedin_at)->diffForHumans()):''}} <br>
    

    <!-- <strong>Edited By:</strong> @if($user->editedBy)  {{$user->editedBy->email}} @endif -->











     {{-- {{$user->email}},{{$user->mobile}} <br>
    Edited By: {{$user->editedBy ? $user->editedBy->email : ""}} <br>
   
    Loged By: {{$user->firstLog() ? $user->firstLog()->logAddedBy->email : ""}} --}}

 </td>
 {{-- <td>{{$user->user_type}}</td> --}}

 <td>

     <div class="btn-group btn-group-xs pull-right w-100">
        {{-- <button type="button" data-url="" class="btn btn-primary">Edit</button> --}}
        @can('user-edit')
        <a class="btn btn-primary" href="{{ route('users.editprofile', $user->id) }}">Edit</a>
        @endcan
        
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu pl-2" role="menu">
            
            {{-- <li>
                <a title="User Comment, Admin Comment, comlain, conversation"  href="{{route('admin.logs', $user)}}">Logs ({{$user->countLog()}})</a>
            </li> --}}

            @can('user-edit')
            <li>
                <a href="{{ route('admin.makeUserActive', $user) }}">{{ $user->active ? 'Deactive' : 'Active' }}</a>
            </li>
            @endcan
            @can('user-log')
            <li>
                <a target="_blank" href="{{ route('user.userDetailsPrint', $user) }}">Print</a>
            </li>
            @endcan
          

            
           
        </ul>
    </div>
    <div class="m-0">
        {{-- <small class="btn  btn-sm {{ $user->active ? 'btn-success' : 'btn-default' }}">
        {{ $user->active ? 'Active' : 'Deactivated' }}
        </small> --}}
        <small class=" badge badge-dark {{ $user->active ? 'text-success' : 'text-danger' }}">
        {{ $user->active ? 'Active' : 'Deactivated' }}
        </small>
    </div>
    <div class="btn-group btn-group-xs pull-right w-100">
        {{-- <button type="button" data-url="" class="btn btn-primary">Edit</button> --}}
        <a class="btn btn-success" href="{{route('admin.logs', $user)}}">Logs({{ $user->countLogs()}})</a>
        
    </div>
    <div class="mt-2">
        @if($user->editedby_id)
        @if($user->editedby_id and ($user->editedby_id != $user->id))

        <p class="text-dark w-100"><span class="badge badge-dark">{{ $user->active ? 'Active' : 'Deactivated' }} By:</span>{{ $user->editedBy->name }}</p>

        @endif
        @endif
        @if($user->countLogs())
        @php

       $userId= $user->lastLogsName()->addedby_id;
      
        @endphp

        <p class="text-dark w-100"><span class="badge badge-dark">Last Logs By:</span>{{ $user->firstLog()->logAddedBy->name }}</p>
        @endif
    </div>
 </td>

</tr>

@endforeach

