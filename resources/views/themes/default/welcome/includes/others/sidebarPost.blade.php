<div class="attachment-block clearfix">
    <a href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
      <img class="attachment-img" src="{{asset($post->fi())}}" alt="{{$post->title}}">
    </a>

    <div class="attachment-pushed">
      <h4 class="attachment-heading" style="font-size: 14px;line-height: 1.3;">
        <a href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">{{$post->title}}</a></h4>
      <p>{{str_limit($post->excerpt, $limit = 30, $end = "..")}} <a href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">বিস্তারিত</a>

      	@include('welcome.includes.others.readCommentCount')

      </p>
    </div>
  </div>