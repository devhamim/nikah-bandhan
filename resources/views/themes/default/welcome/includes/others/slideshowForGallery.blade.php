@if($latestGallery) 

<style>
  .pgwSlideshow .ps-caption {
    font-size: 16px;
  }
</style>

<div class="row">
  <div class="col-sm-12">

 

    <div class="box box-widget">
            <div class="box-header w3-panel w3-leftbar w3-border-green">
              <h3 class="box-title">
                 ফটো গ্যালারি
              </h3>
            </div>
            <div class="box-body w3-topbar">


              <div class="row">
                <div class="col-sm-7">
                  <ul class="pgwSlideshow">

            @foreach($latestGallery->activeItems() as $item)
                <li><img  src="{{asset($item->fi())}}" alt="{{$item->title}}" data-description="{{$item->description}} {{$item->photo_credit ? 'ছবিঃ '.$item->photo_credit : ''}}"></li>
                @endforeach
            </ul>

                </div>
                <div class="col-sm-5">


                  @foreach($galleries->chunk(2) as $gallery2)
                  <div class="row">
                    @foreach($gallery2 as $gallery)
                      <div class="col-sm-6">
                        <a href="{{route('welcome.gallery',$gallery)}}"> 
                      <div class="w3-display-container">
                      <img src="{{asset($gallery->fi())}}"  alt="{{$gallery->title}}" style="width:100%;height: 150px;">
                      <div class="w3-padding w3-display-topleft">
                        <button class="btn btn-default"><i class="fa fa-camera-retro fa-2x"></i></button>                        
                      </div>                     
                    </div>
                    <div class="w3-container">
                      <p class="w3-text-gray">{{$gallery->created_at->toFormattedDateString()}}</p>
                    </div>
                  </a>
                      </div>
                    @endforeach
                  </div>
                  @endforeach

                  {{$galleries->links()}}


                </div>

              </div>

              
               
            </div>
          </div>
              
 
              
            </div>
          </div>
@endif   
 

 