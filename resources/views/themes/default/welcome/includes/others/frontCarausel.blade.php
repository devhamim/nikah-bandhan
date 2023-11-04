<style>
  .carousel-caption {
    background: rgba(0, 0, 0, 0.3);
    width: 100% !important;
    margin-left: -20%;
    font-size: 22px !important;
    bottom: 0;
}
</style>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  {{-- <ol class="carousel-indicators">

    @foreach($frontSliders as $fs)
    <li data-target="#carousel-example-generic" data-slide-to="{{$loop->index}}" class="active"></li>
    @endforeach


  </ol> --}}
  <div class="carousel-inner">

    @foreach($frontSliders as $fs)    
      <div class="item {{$loop->index == 0 ? 'active' : ''}}">
        <a title="{{$fs->title}}" href="{{route('welcome.postDetails',['post'=>$fs, 'excerpt'=>str_slug($fs->excerpt)])}}">
        <img style="width: 100%;" src="{{asset($fs->fi())}}" alt="{{$fs->title}}">

        <div class="carousel-caption">
          {{str_limit($fs->title,40,'..')}}
        </div>
      </a>
      </div>
    @endforeach


  </div>
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="fa fa-angle-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="fa fa-angle-right"></span>
  </a>
</div>