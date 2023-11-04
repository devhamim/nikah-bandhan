@push('css')
    <style>
        .btn {
            position: relative;
            padding: 1px 1px;
            margin: 0.3125rem 1px;
            font-size: .75rem;
            font-weight: 400;
            line-height: 1.428571;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0;
            cursor: pointer;
            background-color: transparent;
            border: 0;
            border-radius: 0.2rem;
            outline: 0;
            transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: box-shadow, transform;
        }


        .w3-bgred,
        .w3-hover-bgred:hover {
            color: #d81f26 !important;
            background-color: #fff !important;

        }


        .btn.btn-primary {
            color: #9c27b0;
            background-color: #fff;
            border: 0px #fff;
        }

        .btn-primary {
            color: #fff;
            background-color: #0d6efd;
            border: none;
            /* border-color: #0d6efd; */
        }

    </style>

@endpush
<div class="main main-raiseds " style="z-index: 400;margin-top: -20px;">
    <div class="section section-basic" style="min-height: 900px;">

        <div class="container pt-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-widget" style="border-top: 2px solid yellow;">
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

                    @if (!$me->contactInfo or !$me->personalInfo or !$me->personalActivity or !$me->searchTermBasic())
                    @include('user.includes.others.alertMessage')
                @endif
                    <div class="box box-widget mb-3">
                        <div class="box-body box-body-container  " style="background: #fbfbfb;">



                            {{-- @include('alerts.alerts') --}}

                            @if ($me->id == $user->id)
                                {{-- profile details --}}
                                {{-- @include('user.includes.cards.myUserCard') --}}

                                {{-- statistics --}}

                                @include('user.includes.cards.userStatisticsCard')

                            @endif

                            <div class="box box-widget ">
                                {{-- w3-hover-shadow --}}
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        {{ $user->username }}

                                        @if (!$user->active)

                                            @if ($me->isAdmin())
                                                &nbsp; &nbsp;
                                                (<b class="w3-text-red">
                                                    You have seen this inactive profile because you are admin.
                                                </b>)

                                            @endif

                                        @endif


                                    </h3>
                                    <div class="box-tools pull-right">
                                        <!-- only paid user can show this informatios -->
                                        {{-- @if (Auth::user()->package > 0)

                    <a href="#" class="btn btn-link no-padding btn-primary" title="Report about {{ $user->himOrHer() }}"
                      data-toggle="modal" data-target="#reportModal">
                      <i class="fa  fa-warning"></i> Report
                    </a>

                    @endif --}}


                                        {{-- <a class="btn no-padding w3-text-purple btn-link" href=""><i class="fa fa-print"></i> Print</a> --}}

                                    </div>
                                </div>

<!-- <<<<<<<<<<<<<< -->
                                <div class="box-body" style="min-height: 200px;">

                                    @if ($me->isAdmin())

                                        @include('user.includes.data.dataBasic')
                                        {{-- @include('user.includes.data.dataPublicPhotos') --}}
                                        @include('user.includes.data.dataContactInfo')
                                        @include('user.includes.data.dataPersonalInfo')
                                        @include('user.includes.data.dataPersonalActivity')
                                        @include('user.includes.data.dataPartnerPreference')
                                        @include('user.includes.data.dataContactInfooffice')
                                        @include('user.includes.data.dataMyAddress')
                                        @include('user.includes.data.dataDocuments')
                                        @include('user.includes.data.dataImage')
                                        @if ($me->id == $user->id)
                                            @if ($me->final_checked == 0)
                                                <br><br><br>
                                                <div
                                                    style="color: red; padding:2px; border:red 2px solid; background-color:seashell; text-align:center; font:bold; font-size:18px; ">
                                                    Your information isn't approved yet. Please, wait for the
                                                    confirmation.</div>


                                            @else
                                                <div style="text-align: center">
                                                    <div class="btn btn-success center">Approved Profile</div>
                                                </div>

                                            @endif

                                        @else
                                            @if ($user->final_checked == 0)
                                                <br><br><br>
                                                <div
                                                    style="color: red; padding:2px; border:red 2px solid; background-color:seashell; text-align:center; font:bold; font-size:18px; ">
                                                    User information isn't approved yet. Please, wait for the
                                                    confirmation.</div>


                                            @else
                                                <div style="text-align: center">
                                                    <div class="btn btn-success center">Approved Profile</div>
                                                </div>

                                            @endif
                                        @endif
                                    @elseif($me->id == $user->id)

                                        @include('user.includes.data.dataBasic')
                                        {{-- @include('user.includes.data.dataPublicPhotos') --}}
                                        @include('user.includes.data.dataContactInfo')
                                        @include('user.includes.data.dataPersonalInfo')
                                        @include('user.includes.data.dataPersonalActivity')
                                        @include('user.includes.data.dataPartnerPreference')
                                        @include('user.includes.data.dataContactInfooffice')
                                        @include('user.includes.data.dataMyAddress')
                                        @include('user.includes.data.dataDocuments')

                                        @include('user.includes.data.dataImage')

                                        @if ($me->final_checked == 0)
                                            <br><br><br>
                                            <div
                                                style="color: red; padding:2px; border:red 2px solid; background-color:seashell; text-align:center; font:bold; font-size:18px; ">
                                                Your information isn't approved yet. Please, wait for the confirmation.
                                            </div>


                                        @else
                                            <div style="text-align: center">
                                                <div class="btn btn-success center">Approved Profile</div>
                                            </div>

                                        @endif



                                    @else
                                      

                                        @include('user.includes.data.dataBasic')
                                        @if ($me->final_checked == 0)
                                            <br><br><br>
                                            <div
                                                style="color: red; padding:2px; border:red 2px solid; background-color:seashell; text-align:center; font:bold; font-size:18px; ">
                                                Your information isn't approved yet. Please, wait for the confirmation.
                                            </div>
                                        @else
                                            @if ($user->final_checked == 1)
                                                {{-- @include('user.includes.data.dataPublicPhotos') --}}

                                                @include('user.includes.data.dataContactInfo')

                                                @include('user.includes.data.dataPersonalInfo')

                                                @include('user.includes.data.dataPersonalActivity')


                                                @include('user.includes.data.dataPartnerPreference')

                                            @endif
                                        @endif

                                        {{-- @endif --}}
                                    @endif

                                    {{-- @if ($user->isOffline())

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
  <span class="w3-large w3-dark-gray w3-padding w3-round">Please buy a package to see all info</span>

@endif --}}




                                </div>
                            </div>
                        </div>





                        <!-- Loading (remove the following to stop the loading)-->
                        <div class="overlay my-loading-overlay" style="display: none;">
                            <i class="fa fa-circle-o-notch w3-jumbo w3-text-red fa-spin" style="top: 20%;"></i>

                        </div>
                        <!-- end loading -->

                    </div>


                    {{-- @if (Browser::isDesktop())
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
@endif --}}


                </div>
            </div>


        </div>
    </div>
</div>
