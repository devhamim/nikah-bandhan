<div class="panel panel-default">
    <div class="panel-heading">
      <img class="img-responsive" src="{{asset('img/high.jpg')}}">
    </div>
    <div style="background-color: #efefef;" class="panel-body">

@if($highlightPosts->count())
  @foreach($highlightPosts->chunk(2) as $p2)
  <div class="row">
    @foreach($p2 as $post)
      <div class="col-sm-6">

<a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
  <div class="user-block" style="margin-bottom: 3px;">
    <img src="{{asset($post->fi())}}" alt="{{$post->title}}">
    <span class="username"><a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">&nbsp; {{str_limit($post->title,20,'..')}}</a></span>
    <span class="description">{{$post->div()}}, {{$post->created_at->diffForHumans()}}</span>
  </div>
</a>

    </div>
    @endforeach
  </div>
  @endforeach

  @endif
      

</div>
</div>

