
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
<div class="col-sm-7">

  @php
  $user = $me;
  @endphp

  





    <div class="box box-widget mb-3 " >
        
        <div class="box-body box-body-container" style="background: #9c27b014;">


            @include('user.includes.others.alertMessage')




            @include('alerts.alerts')



            @include('user.includes.cards.userCard')
            @include('user.includes.cards.profileCompletion')

            @include('user.includes.cards.userStatisticsCard')



            



<div class="lazy-load" data-url="{{ route('user.lazyLoadUser') }}">                     {{-- view/user/ajax/lazyload --}}

  <div class="box box-widget mb-3 w3-animate-zoom">
      <div class="box-body" style="min-height: 200px;text-align: center;">

            <i class="fa fa-circle-o-notch w3-jumbo w3-text-light-gray fa-spin" style="margin-top: 50px;"></i>        

      </div>
  </div>
    



</div> 
<!--  lazy-load -->

</div>

        <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay my-loading-overlay" style="display: none;">
              <i class="fa fa-circle-o-notch w3-jumbo w3-text-red fa-spin" style="top: 20%;"></i>

            </div>
            <!-- end loading -->
    </div>



    {{-- <div  align="center">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-3322244656717684"
     data-ad-slot="2385267914"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
  </div> --}}


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

<div class="col-sm-2">
  
 
 

        <div class="box box-widget mb-3 w3-hover-shadow">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Profiles</h3>
                </div>
                <div class="box-body" style="min-height: 200px;">

@foreach($me->latestProfiles() as $user)

<a title="{{ $user->username }}" href="{{ url('/', $user->username) }}" target="_blank">
    
<img width="150" src="{{ $user->latestCheckedPP() }}" class="rounded img-bordered mb-2 img-fluid"  alt="{{ $user->username }}">
</a>

@if ($loop->iteration == 4)
    @break
@endif
@endforeach

@if ($me->latestProfiles()->count() > 4)

  <div class="text-center">
    
    <a href="" data-url="{{ route('user.myAsset', 'search_latest_users') }}" class="w3-btn  btn-menu-to-container w3-round w3-purple btn-sm"> See More <i class="fa  fa-angle-double-right"></i></a>

  </div>
@endif
                    
                     
                </div>
            </div>
 
  

</div>
</div>


</div>
</div>
</div>