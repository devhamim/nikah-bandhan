
<div class="main main-raiseds "  style="z-index: 400;">
    <div class="section section-basic" style="min-height: 900px;">

        <div class="container">

            <div class="row">
                <div class="col-sm-3">

@if (Browser::isDesktop())
@include('user.includes.others.myLeftMenu')
@endif

</div>
<div class="col-sm-9">

  @php
  $user = $me;
  @endphp

  





    <div class="box box-widget mb-3" id="no-ads">
        
        <div class="box-body box-body-container" style="background: #eee;">


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