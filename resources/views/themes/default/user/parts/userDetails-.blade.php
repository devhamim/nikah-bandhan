<div class="main main-raiseds " style="z-index: 400;">
    <div class="section section-basic" style="min-height: 900px;">

        <div class="container">

            <div class="row">
                <div class="col-sm-3">

@if (Browser::isDesktop())
@include('user.includes.others.myLeftMenu')
@endif

                </div>
                <div class="col-sm-9">      



                    <div class="box box-widget mb-3">
                        <div class="box-body box-body-container" style="background: #eee;">


                            @include('alerts.alerts')

                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    {{ $user->username }}

                                    @if (!$user->active)

                                    @if($me->isAdmin())
                                    &nbsp; &nbsp; 
                                    (<b class="w3-text-red">
                                        You have seen this inactive profile because you are admin.
                                    </b>)

                                    @endif
                                        
                                    @endif

                                    
                                </h3>
                                <div class="box-tools pull-right">
<!-- only paid user can show this informatios -->
@if(Auth::user()->package>0)

                                        <a href="#"  class="btn btn-link no-padding btn-primary" title="Report about {{ $user->himOrHer() }}" 
                                            data-toggle="modal" 
                                            data-target="#reportModal">
                                        <i class="fa  fa-warning"></i> Report
                                        </a> 

@endif


                                    {{-- <a class="btn no-padding w3-text-purple btn-link" href=""><i class="fa fa-print"></i> Print</a> --}}
                                
                              </div>
                            </div>


                    <div class="box-body" style="min-height: 200px;">

{{-- @if ($me->isAdmin())
    @include('user.includes.data.dataBasic')
    @include('user.includes.data.dataPublicPhotos')
    @include('user.includes.data.dataContactInfo')
    @include('user.includes.data.dataPersonalInfo')
    @include('user.includes.data.dataPersonalActivity')
    @include('user.includes.data.dataPartnerPreference')
@else
@if((!$me->contactInfo) or 
  (!$me->personalInfo) or 
  (!$me->personalActivity) or 
  (!$me->searchTermBasic()))
        @include('user.includes.others.alertMessage')
  @else

  @include('user.includes.data.dataBasic')
  @include('user.includes.data.dataPublicPhotos')
  @include('user.includes.data.dataContactInfo')
  @include('user.includes.data.dataPersonalInfo')
  @include('user.includes.data.dataPersonalActivity')
  @include('user.includes.data.dataPartnerPreference')

  @endif
@endif --}}

@if($user->isOffline())

<br> <br>
<span class="w3-xxlarge w3-dark-gray w3-padding w3-round">Offline Profile</span>
<!-- only paid user can show this informatios -->
@elseif(Auth::user()->package>0)
  @include('user.includes.data.dataBasic')
  @include('user.includes.data.dataPublicPhotos')
  @include('user.includes.data.dataContactInfo')
  @include('user.includes.data.dataPersonalInfo')
  @include('user.includes.data.dataPersonalActivity') 
  @include('user.includes.data.dataPartnerPreference')
@else

  @include('user.includes.data.dataBasic')
  <span class="w3-xxlarge w3-dark-gray w3-padding w3-round">Please buy a package to see all info</span>

@endif                    




                </div>
                            </div>
                        </div>





 <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay my-loading-overlay" style="display: none;">
              <i class="fa fa-circle-o-notch w3-jumbo w3-text-red fa-spin" style="top: 20%;"></i>

            </div>
            <!-- end loading -->
            
                    </div>


@if (Browser::isDesktop())
@else
@include('welcome.includes.others.hotLineImage')
@include('welcome.includes.others.ourWebsiteVisitors')
<div class="w3-card-2">
<div class="box box-widget">         
<div class="box-body">
@include('welcome.includes.others.fbPageArea')
</div>
</div>
</div>
@endif


                </div>
            </div>


        </div>
    </div>
</div>
