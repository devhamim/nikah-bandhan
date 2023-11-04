@if(count($highlightPosts))
<img class="img-responsive" src="{{asset('img/high.jpg')}}">
<div class="box box-widget">
	<div class="box-body">


      @foreach($highlightPosts->chunk(4) as $p4)
      <div class="row">
        @foreach($p4 as $post)
          <div class="col-sm-3">
          <a title="{{$post->title}}" href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
            <div class="box box-widget" style="padding: 0;margin-bottom: {{$loop->parent->last ? 0 : '10px'}};">
                  <div class="box-body box-profile" style="padding: 0;">
                    <img class="img-responsive" src="{{asset($post->fi())}}" alt="{{$post->title}}">
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <h3 class="profile-username"  style="font-size: 12px;line-height: 1.3;margin-bottom: 0;">{{str_limit($post->title,50,'..')}}
                      @include('welcome.includes.others.readCommentCount')
                    </h3>
                    {{-- <span class="text-muted" style="font-size: 11px !important;">{{$post->div()}}</span> --}}
                  </div>
               </div>
          </a>
        </div>
        @endforeach
      </div>
      @endforeach

		
	</div>
</div>
@endif













