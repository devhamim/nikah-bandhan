<div class="row">
  <div class="col-sm-9">
 
    @if($user->pic_private == 1)

      {{-- <img class="img-bordered rounded mb-4" src="{{ asset($user->pp()) }}" style="width: 100%;" alt="{{ $user->username }}"> --}}
      @if ($me->isValidate() or ($me->id==$user->id))
          <img src="{{ asset($user->latestCheckedPP()) }}" class="rounded img-bordered mb-4 "  alt="{{ $user->username }}" style="max-width: 170px;">
      @else 
          <img class="rounded img-bordered mb-4" style="max-width: 170px;" src="{{ route('imagecache', [ 'template'=>'ppsmbl','filename' => $user->img_name ]) }}" alt="{{ $user->username }}" />
      @endif
      
    @else
      <img class="img-bordered rounded mb-4" src="{{ asset($user->latestCheckedPP()) }}" style="width: 100%;" alt="{{ $user->username }}"> 
    @endif

    
  </div>
  <div class="col-sm-9">



    <div class="row">
      <div class="col-sm-9">

        <!-- Basic ST -->
        <div class="profile_basic">


          <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              User ID : {{ $user->username }} 
              @if($user->isOnline())
              <img src="{{ asset('img/online.svg') }}" alt="Online" style="width: 20px;">
              @else
              <i class="fa fa-circle w3-text-light-gray w3-small"></i>
              @endif
            </div>
            <div class="w3-rest text-left">
              {{-- @include('user.includes.others.stars') --}}
            </div>
          </div>

          <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              Profile created by
            </div>
            <div class="w3-rest text-left">
              : 
              {{ $user->profile_created_by ?: '(Not set yet)' }}
            </div>
          </div>

          <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              Age, Gender
            </div>
            <div class="w3-rest text-left">
              : 
              {{ $user->age() }},   {{ $user->gender }}
            </div>
          </div>

          <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              Height
            </div>
            <div class="w3-rest text-left">
              : 
              {{ $user->personalInfo ? $user->personalInfo->height : '' }}
            </div>
          </div>

          <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              Religion/Community
            </div>
            <div class="w3-rest text-left">
              : 
              {{ $user->religion }}
            </div>
          </div>

          {{-- <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              Education
            </div>
            <div class="w3-rest text-left">
              : 
              {{ $user->educationLevel() }}
            </div>
          </div> --}}

          {{-- <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              Profession
            </div>
            <div class="w3-rest text-left">
              : 
              {{ $user->profession() }}
            </div>
          </div> --}}

          <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              Marital Status
            </div>
            <div class="w3-rest text-left">
              : 
              {{ $user->personalInfo ? $user->personalInfo->marital_status : ''}}
            </div>
          </div>    

          <div class="w3-row">
            <div class="text-left w3-text-gray w3-small w3-col width-140">
              Living Country
            </div>
            <div class="w3-rest text-left">
              : 
              @if($user->country == 'Other' || $user->country == 'Others')
              {{$user->country_other}}
              @else
              {{$user->country}}
              @endif
            </div>
          </div>


          {{-- <div class="w3-border-top w3-border-light-gray">

            <span>{{ str_limit($user->aboutMe(), 300,'..') }}</span>

          </div> --}}


        </div>

      </div>
      <div class="col-sm-3">


        @include('user.includes.others.btnRightArea')


      </div>
    </div>

  </div>
</div>