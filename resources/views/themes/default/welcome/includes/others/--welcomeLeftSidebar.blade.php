{{-- <div class="w3-card-2">
<div class="box box-widget">
  <div class="box-body">
    <a href="{{ url('/signup') }}"> 
                <?php $rand = 'img/r9.gif'; ?>
        <img class="img-responsive" src="{{ asset($rand) }}" alt="{{ env('APP_NAME_BIG') }}" style="width: 100%;">
    </a>
  </div>
</div>
</div> --}}


@include('welcome.includes.others.hotLineImage')

<div align="center">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-3322244656717684"
     data-ad-slot="7937748008"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

{{-- <div class="w3-card-2">
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Membership for Bangladesh</h3>

    </div>
    <div class="box-body" style="background: #eee;">

        @foreach ($mPackage1 as $package)

        <div class="box box-widget mb-1">
            <div class="box-body">

                <!-- Media top -->
                <div class="media">
                  <img src="{{ asset('storage/package/' .$package->image_name) }}" class="align-self-start mr-3 rounded" style="width:60px">
                  <div class="media-body">
                    <h4 class="no-margin">{{ $package->package_title }}</h4>
                    

                    <hr class="no-margin"> 

                    <div class="clearfix">
                      <span class="float-left"> Price: <b>{{ $package->package_amount }} {{ $package->package_currency }}</b></span>
                  </div>
                  <div class="clearfix">
                      <span class="float-left"> Duration: <b>{{ $package->package_duration }} Days</b></span>
                  </div>

              </div>
          </div>


      </div>
  </div>

  @endforeach

</div>
</div>
</div> --}}

<div class="w3-card-2">
<div class="box box-warning">
<div class="box-header with-border">
<h3 class="box-title"> Membership for Foreigners</h3>

</div>
<div class="box-body" style="background: #eee;">

@foreach ($mPackage2 as $package)

<div class="box box-widget mb-1">
    <div class="box-body">

        <!-- Media top -->
        <div class="media">
          <img src="{{ asset('storage/package/' .$package->image_name) }}" class="align-self-start mr-3 rounded" style="width:60px">
          <div class="media-body">
            <h4 class="no-margin">{{ $package->package_title }}</h4>
            

            <hr class="no-margin"> 

            <div class="clearfix">
              <span class="float-left"> Price: <b>{{ $package->package_amount }} {{ $package->package_currency }}</b></span>
          </div>
          <div class="clearfix">
              <span class="float-left"> Duration: <b>{{ $package->package_duration }} Days</b></span>
          </div>

      </div>
  </div>


</div>
</div>

@endforeach

</div>
</div>
</div>




@if (env('APP_ENV') == 'production')

 @include('welcome.includes.others.ourWebsiteVisitors')

@endif



<div class="w3-card-2">
<div class="box box-widget">         
<div class="box-body">

@include('welcome.includes.others.fbPageArea')


</div>
</div>
</div>

 