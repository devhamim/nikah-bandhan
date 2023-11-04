   
<div class="main main-raiseds "  style="z-index: 400;margin-top: -20px;">
    <div class="section section-basic" style="min-height: 900px;">

        <div class="container">

            @auth

            <div class="row">
            <div class="col-sm-12">
              <div class="box box-widget " style="border-top: 2px solid purple;">
                <div class="box-header">
                   @include('user.includes.timeline.timelineTopBtns')
                </div>
              </div>
            </div>
          </div>

          @endauth

            <div class="row">
                <div class="col-sm-3">

                    @if (Browser::isDesktop())

                    @auth
                    @include('user.includes.others.myLeftMenu')
                    @else
                    @include('welcome.includes.others.welcomeLeftSidebar')
                    @endauth

                    @endif



                </div>
                <div class="col-sm-9">

                  

                    <div class="box box-widget mb-3">
                        <div class="box-body box-body-container" style="background: #f8f8f8;">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="box box-widget mb-0 w3-hover-shadow">
                                        <div class="box-body">

    @if ($stories)
            @foreach ($stories as $story)



            <h1 style="font-size: 30px;">{{ $story->title }}</h1>

            <br>
 


 

    <div class="page-content" style="min-height: 500px;">

        

        <img src="{{ asset('storage/stories/'. $story->image_name) }}" class="img-fluid img-bordered rounded" alt="{{ $story->title }}">

        <h3>Location: {{ $story->location }}</h3>
        <h4>Marriage Date: {{ $story->marriage_date }}</h4>
        @if ($story->bride_username && $story->groom_username)
            <h4>Bride Username: {{ $story->bride_username }}</h4>
            <h4>Groom Username: {{ $story->groom_username }}</h4>
        @endif

        <div class="box box-widget">
            <div class="box-body pl-0">
                
        {!! $story->description !!}
        
            </div>
        </div>


    </div>


            @endforeach

        @endif
                                            
 
        


                                        </div>
                                        <div class="box-footer">
                                            {{ $stories->render() }}
                                        </div>
                                    </div>



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
