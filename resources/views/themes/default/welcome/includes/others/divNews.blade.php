{{-- top of details 1 ad --}}
@include('welcome.includes.adv.topOfDetails1')

{{-- <img class="img-responsive" style="margin-top: 10px;" src="{{asset('img/bivag.jpg')}}"> --}}
<div class="panel panel-default">

    <div style="background-color: ;" class="panel-body">

@if($divPosts->count())
  @foreach($divPosts->chunk(2) as $p2)
  <div class="row">
    @foreach($p2 as $post)
      <div class="col-sm-6">

<a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
  <div class="user-block" style="margin-bottom: 3px;">
    <img src="{{asset($post->fi())}}" alt="{{$post->title}}">
    <span class="username"><a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">&nbsp; {{str_limit($post->title,20,'..')}}</a></span>
    <span class="description">{{$post->div()}}, {{$post->created_at->diffForHumans()}}

      
      @include('welcome.includes.others.readCommentCount')
      @include('welcome.includes.others.fbLikePart')

      

    </span>
  </div>
</a>

    </div>
    @endforeach
  </div>
  @endforeach

  @endif
      

</div>
</div>

