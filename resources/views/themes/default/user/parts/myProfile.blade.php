<div class="main main-raiseds "  style="z-index: 400;margin-top: -20px;">
    <div class="profile-content">
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
        <div class="col-sm-12">
            

@include('user.includes.others.profileHeadForUpdate')

<br> 

<div class="row">
    <div class="col-sm-3">

@include('user.includes.others.myLeftLinks')
        
    </div>
    <div class="col-sm-9">

        @include('alerts.alerts')

        <div class="row">
            <div class="col-sm-6">
                @include('user.photos.includes.myPublicPhotos')
            </div>
            <div class="col-sm-6">
                @include('user.photos.includes.myPrivatePhotos')
            </div>
        </div>



        
    </div>
</div>
 

</div>
</div>
</div>
        </div>
    </div>
