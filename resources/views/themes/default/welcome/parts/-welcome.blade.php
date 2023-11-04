

{{-- <div class="container-fluid"> --}}
  <section class="content">
    <!-- 3 start -->
    <div class="row">
      {{-- <div class="col-sm-1">
        
      </div> --}}

      <!-- 5 start -->
      <div class="col-sm-12">

        <div class="box box-widget" style="border-radius: 0;">
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

        <div class="row">
          <div class="col-sm-12">
            <div class="box box-widget">
              <div class="box-header">
                <h3 class="box-title">
                  <i class="ion-ios-location"></i> Dhaka &nbsp;&nbsp;
                <i class="fa fa-calendar-alt"></i> {{Carbon\Carbon::now()->toDayDateTimeString()}} &nbsp;&nbsp; <i class="fa fa-clock"></i> Updated: {{$time}}
                </h3>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-sm-9">


            <div class="row">
              <div class="col-sm-7">
              
                {{-- front carausel --}}
                @include('welcome.includes.others.frontCarausel')

                {{-- division news --}}
                @include('welcome.includes.others.divNews')


                {{-- place for add --}}
                <img class="img-responsive" src="{{asset('img/place1.jpg')}}">


                {{-- highlights news --}}
                @include('welcome.includes.others.highlightsNews')

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
        @include('welcome.includes.others.frontLatest')

                
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

            <form class="form-inline" method="get" action="{{route('welcome.postDivisionSearch')}}">
 
 
              
             
         

            <div class="form-group">

              <div class="row">
                  <div class="col-sm-6">
                    <select class="form-control" name="div" style="width: 140px;border-radius: 4px;">
                      <option value="">বিভাগ</option>
                      @foreach($divs as $div)
                      <option value="{{$div->id}}">{{$div->title}}</option>
                      @endforeach
                      
                      
 
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <button class="btn btn-md w3-red w3-round">অনুসন্ধান করুন</button>
                  </div>
              </div>
            </div>
          </form>

              <br>
 
              <div class="box box-solid">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>

                  <h3 class="box-title">আর্কাইভ </h3>
                  <!-- /. tools -->
                </div>
                <div class="box-body" style="min-height: 400px;">



                </div>
              </div>

 

          </div>
          <!-- col 3 12 start -->
        </div>


        
      </div>
      <!-- 5 close -->

      {{-- <div class="col-sm-1">
        
      </div> --}}
    </div>
    <!-- 3 close -->
    



    



    

  </section>

  
{{-- </div> --}}
