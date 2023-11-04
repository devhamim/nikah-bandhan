         <!-- /basic start -->
      <div class="panel panel-default" style="margin-bottom: 0; margin-top: -12px;">
       <div class="panel-body">
         <div class="w3-row">
           <div class="w3-col" style="width:180px">
            <img class="img-bordered img-rounded" src="{{ asset($user->latestCheckedPP()) }}" style="width: 100%;" alt="{{ $user->username }}">
          </div>
          <div class="w3-rest">

            <div class="profile_basic" style="margin-left: 20px;">
              <div class="w3-row">
                <div class="text-left w3-text-gray w3-small w3-col width-140">
                  {{ $user->username }} 

                </div>
                <div class="w3-rest text-left">
                  @include('user.includes.others.stars')
                </div>
              </div>

              <div class="w3-row">
                <div class="text-left w3-text-gray w3-small w3-col width-140">
                  Profile created by
                </div>
                <div class="w3-rest text-left">
                  : 
                  {{ $user->profile_created_by or '(Not set yet)' }}
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
                  @if($user->personalInfo)
                  {{ $user->personalInfo->height }}
                  @endif
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

              <div class="w3-row">
                <div class="text-left w3-text-gray w3-small w3-col width-140">
                  Education
                </div>
                <div class="w3-rest text-left">
                  : 
                  @if ($user->personalInfo)
                  {{ $user->personalInfo->educationLevel() }}
                  @endif
                </div>
              </div>

              <div class="w3-row">
                <div class="text-left w3-text-gray w3-small w3-col width-140">
                  Profession
                </div>
                <div class="w3-rest text-left">
                  : 
                  @if ($user->personalInfo)
                  {{ $user->personalInfo->profession() }}
                  @endif
                </div>
              </div>

              <div class="w3-row">
                <div class="text-left w3-text-gray w3-small w3-col width-140">
                  Marital Status
                </div>
                <div class="w3-rest text-left">
                  : 
                  @if ($user->personalInfo)
                  {{ $user->personalInfo->marital_status}}
                  @endif
                </div>
              </div>    

              <div class="w3-row">
                <div class="text-left w3-text-gray w3-small w3-col width-140">
                  Country
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


              <div class="w3-border-top w3-border-light-gray">
                <span>{{ str_limit($user->aboutMe(), 60,'...') }}</span>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /basic end -->