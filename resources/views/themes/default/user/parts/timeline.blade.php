<div class="main main-raiseds " style="z-index: 400;margin-top: -20px;">
  <div class="section section-basic" style="min-height: 900px;">

    <div class="container">


      <div class="row">
        <div class="col-sm-12">
          <div class="box box-widget" style="border-top: 2px solid #f09f1f;">
            <div class="box-header">
              @include('user.includes.timeline.timelineTopBtns')
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-sm-3">
          <div class="w3-card-2 mb-2">

            @include('user.includes.cards.profileCompletion')
          </div>
          @if (Browser::isDesktop())
          @include('user.includes.others.myLeftMenu')
          @endif

        </div>


        <div class="col-sm-9">

          @php
          $user = $me;
          @endphp




          <div class="box box-widget mb-3">

            <div class="box-body box-body-container p-0" style="background: #fbfbfb;">
              <div class="p-2">

                {{-- @if (!$user->email_verified or $user->email_verified==0)
            <div class="alert alert-warning alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> <i class="fa fa-warning"></i>  
            
            </strong> 

            Your Email is not verified. Please,  <a class="btn btn-warning btn-xs" href="{{ route('user.verifyEmailCodeGenerate') }}">Click Here</a> to verify now

            </div> 
          @endif --}}
                @if (!$user->email_verified)
                @include('user.includes.others.alertMessage')

                @endif

                {{-- @include('user.includes.others.alertMessage') --}}

                @include('alerts.alerts')
                {{-- @include('user.includes.cards.userCard') --}}
                <div class="row">
                  <div class="col-sm-9">
                    {{-- @include('user.includes.cards.myUserCard') --}}
                    <div class="lazy-load" data-url="{{ route('user.lazyLoadUser') }}">
                      {{-- view/user/ajax/lazyload --}}

                      <div class="box box-widget mb-3 w3-animate-zoom">
                        <div class="box-body" style="min-height: 200px;text-align: center;">

                          <i class="fa fa-circle-o-notch w3-jumbo w3-text-light-gray fa-spin"
                            style="margin-top: 50px;"></i>

                        </div>
                      </div>
                    </div>
                    <!--  lazy-load -->
                  </div>
                  <div class="col-sm-3">

                    @include('user.includes.timeline.newUsers')

                    {{-- @include('user.includes.timeline.timelineAd') --}}
                    {{-- @include('user.includes.timeline.timelineSearch') --}}


                  </div>
                </div>





              </div>




            </div>

            <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay my-loading-overlay" style="display: none;">
              <i class="fa fa-circle-o-notch w3-jumbo w3-text-purple fa-spin" style="top: 20%;"></i>

            </div>
            <!-- end loading -->
          </div>








        </div>

      </div>


    </div>
  </div>
</div>