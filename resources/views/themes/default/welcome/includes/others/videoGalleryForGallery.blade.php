@if($latestGallery) 

<div class="row">
  <div class="col-sm-12">

 

    <div class="box box-widget">
            <div class="box-header w3-panel w3-leftbar w3-border-green">
              <h3 class="box-title">
                 ভিডিও গ্যালারি
              </h3>
            </div>
            <div class="box-body w3-topbar">


              <div class="row">
                <div class="col-sm-7">

                  <a href="{{route('welcome.videoGallery',$latestGallery)}}"> 

                      <iframe style="width: 100%;height: 400px;" src="{{asset($latestGallery->video_url)}}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>

                    <div class="w3-container">
                      <p class="w3-text-gray">{{str_limit($latestGallery->title.'asdf asdfasdf asdfasdf sdfgsdfg',35,'..')}}</p>
                    </div>
                  </a>

                </div>
                <div class="col-sm-5">


                  @foreach($galleries->chunk(2) as $gallery2)
                  <div class="row">
                    @foreach($gallery2 as $gallery)
                      <div class="col-sm-6">

                        <iframe style="width: 100%;height: 150px;" src="{{asset($gallery->video_url)}}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                        <div class="w3-container">
                      <p class="w3-text-gray">{{str_limit($gallery->title.'asdf asdfasdf asdfasdf sdfgsdfg',25,'..')}}</p>
                    </div>
                         
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
 

 