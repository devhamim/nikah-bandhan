<div class="main main-raiseds "  style="z-index: 400;margin-top: -20px;">
    <div class="section section-basic" style="min-height: 900px;">

        <div class="container">




<div class="row">
            <div class="col-sm-12">
              <div class="box box-widget" style="border-top: 2px solid purple;">
                <div class="box-header">
                   @include('user.includes.timeline.timelineTopBtns')
                </div>
              </div>
            </div>
          </div>





            <div class="row">
                <div class="col-sm-3">

@if (Browser::isDesktop())
@include('user.includes.others.myLeftMenu')
@endif

                </div>
                <div class="col-sm-9">                  

                    <div class="box box-widget mb-3">
                        <div class="box-body box-body-container" style="background: #fbfbfb;">

                            <div class="row">
                                <div class="col-sm-12">

                                    @include('alerts.alerts')

                                    @if(                                         
                                        (!$me->personalInfo) or
                                        (!$me->searchTerm)
                                        ) 
                                        <div class="box box-widget">
                                                                                    
                                            @include('user.settings.includes.forms.afterRegistrationForm')
                                        </div>

                                        @endif
                                    
                                    <div class="box box-widget">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Upload Profile Picture</h3>
                                        </div>
                                        <div class="box-body">


                                            
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    {{-- @include('user.photos.includes.profilePictureForUpdate') --}}

                                                    @include('user.photos.includes.profilePictureForUpdate2')

                                                    @if ($me->uploadedPP())
                                                         
                                                    
                                                    <br>

                                                    <img src="{{asset($me->userProfilePic)}}" alt="{{ $me->username }}" class="rounded img-bordered" width="160">

                                                    @endif

                                                    <div style="">
                                                        @if ($me->userProfilePics()->count())
                                                        @if($me->ppStatus() == 'Pending')
                                                        Profile Picture <span class="w3-text-red">Pending</span>
                                                        @elseif($me->ppStatus() == 'Checked')
                                                        Profile Picture <span class="w3-text-green">Checked</span>
                                                        @endif 

                                                        @endif

                                                        <br> <br>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul>
                                                        <li>Upload Clear Photo.</li>
                                                        
                                                        <li>Size: Minimum Width: 160px; Minimum Height: 160px</li>
                                                        <li>Upload Best Looking Face photo.</li>
                                                        <li>Upload Complete Photo, Avoid partial photos.</li>
                                                        <li>Upload your real Photo, Don't use photos from other website.</li>

                                                        <li>If you need any help, please contact us at <b><a href="tel:+{{ bdMobile(env('CONTACT_MOBILE1')) }}">+{{ bdMobile(env('CONTACT_MOBILE1')) }}</a></b>.</li>

                                                        @if($me->atLeastOneCheckedPP())
                                                        <li>
                                                            <img class="img-bordered rounded mb-4" src="{{ asset($me->latestCheckedPP()) }}" style="width: 80px;" alt="{{ $me->username }}"> is currently live & checked Profile picture.
                                                        </li>
                                                        @endif
                                                    </ul>




                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                 
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    @include('user.photos.includes.uploadMyPublicPhotos')

                                </div>
                            </div>




                        </div>

                        {{-- overlay here --}}

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
