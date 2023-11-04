
  <section class="content">
    <div class="row">

     <div class="col-sm-12">

        <div class="box box-widget" style="border-radius: 0;margin-bottom: 0;">
          <div class="box-body" style="padding-bottom: 0;">

            <div class="row">
              <div class="col-sm-2">
                <a href="{{ url('/') }}">
             <img src="{{asset('img/logo_bn.jpg')}}" class="img-responsive" alt="Dhaka Metro News" style="">
          </a>
              </div>
              <div class="col-sm-10">

                {{-- top ad --}}
            @include('welcome.includes.adv.topAdd')
            
              </div>
            </div>


 
            {{-- top menubar --}}
            @include('welcome.includes.menubars.topMenubar')


            {{-- news scroll --}}
            @include('welcome.includes.others.newsScroll')
          </div>
        </div>



        @include('welcome.includes.others.update')

        <div class="row">
          <div class="col-sm-9">


            <div class="row">
              <div class="col-sm-7">
              
                {{-- front carausel --}}
                @include('welcome.includes.others.frontCarausel')

                {{-- division news --}}
                @include('welcome.includes.others.divNews')


                {{-- place for add --}}
                <img class="img-responsive" style="border: 1px solid lightgray;" src="{{asset('img/place1.jpg')}}">


                {{-- crime news --}}
                @include('welcome.includes.others.crimeNews')

                {{-- place for add --}}
                <img class="img-responsive" src="{{asset('img/place1.jpg')}}" style="border-bottom: 1px solid #ddd;">

                {{-- place for add --}}
                <img class="img-responsive" src="{{asset('img/place1.jpg')}}"  style="border-bottom: 1px solid #ddd;">



              </div>

              <!-- 18 start -->
              <div class="col-sm-5">


          {{-- popular and latest --}}
        @include('welcome.includes.others.popularAndLatest')



          {{-- front latest --}}
        {{-- @include('welcome.includes.others.frontLatest') --}}

        @include('welcome.includes.others.videoGallery')  

                
              </div>
            </div>

        <div class="row">
          <div class="col-sm-12">
            
          {{-- country area --}}
            @include('welcome.includes.others.countryArea')
            

          {{-- highlight area --}}
          @include('welcome.includes.others.highlightArea')

          </div>
        </div>



          
          

          </div>

          <!-- col 3 12 start -->
          <div class="col-sm-3">

            <div class="video">
              <iframe style="width: 100%;height: 250px;"  src="https://www.youtube.com/embed/MYARqU5zUrs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

            <div class="w3-border">
              <img class="img-responsive" src="{{asset('img/place1.jpg')}}">
            </div>

            <img class="img-responsive" src="{{asset('img/map.jpg')}}">


            @include('welcome.includes.search.divDistThanaSearch')



              <br>

              @include('welcome.includes.others.archive')
 
              
 

          </div>
          <!-- col 12 start -->
        </div>


        @include('welcome.includes.others.catPostsFrontBottomForArchive')

        
      </div>
    </div>
  </section>

  
 
