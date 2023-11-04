


<div class="page-headers header-filters clear-filters purple-filters" data-parallax="true" 

>
<div class="slide" style="width: 100%;margin-top: 65px;">

  <ul>
    @if (count($sliders))
    @foreach($sliders as $slider)
    <li data-bg="{{ asset($slider->image_url) }}"></li>
    @endforeach
    @else
    <li data-bg="{{ asset('img/pic1.jpg') }}"></li>
    <li data-bg="{{ asset('img/pic2.jpg') }}"></li>
    <li data-bg="{{ asset('img/pic3.jpg') }}"></li>
    <li data-bg="{{ asset('img/pic4.jpg') }}"></li>
    <li data-bg="{{ asset('img/pic5.jpg') }}"></li>
    <li data-bg="{{ asset('img/pic6.jpg') }}"></li>
    @endif

</ul>

</div>
<div class="welcome-front-cover">
    <div class="welcome-front-cover-inner">
        <div class="container ">

            <div class="site-title brand custom-shadow">
              <div class="row">
                <div class="col-md-12 ">


                    <h1 class="site-title-details text-center ">
                        @if($websiteParameter->h1)
                        {{ $websiteParameter->h1 }}
                        @else
                        {{ env('APP_NAME_BIG') }}
                        @endif
                    </h1>
                    <h3>

                        @if($websiteParameter->slogan)
                        {{ $websiteParameter->slogan }}
                        @else
                        {{ env('APP_DESC') }}
                        @endif

                    </h3>



                </div>
            </div>
        </div>      
        {{-- <div class="d-none d-sm-block">      

            @include('welcome.includes.forms.welcomeForm')
        </div> --}}
    </div>
</div>

</div>
</div>




<div class="main main-raiseds" style="margin-top: -120px;z-index: 400;">
    <div class="section section-basic" style="padding: 20px;">

        {{-- @include('welcome.includes.others.usersOnline') --}}


    @include('welcome.includes.others.homeTabs')
 
    @include('welcome.includes.others.success_story')


</div>
</div>