@if(count($relatedPosts))
<div class="box box-widget">
            <div class="box-header w3-panel w3-leftbar w3-border-green">
              <h3 class="box-title">
                আরো পড়ুন
              </h3>
            </div>
            <div class="box-body">
            	@foreach($relatedPosts->chunk(4) as $r4)
            	<div class="row">
            		@foreach($r4 as $post)
            		 <div class="col-sm-3">
            		 	<a class="text-muted"  href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>str_slug($post->excerpt)])}}">
				              <img class="img-responsive" src="{{asset($post->fi())}}" alt="{{$post->title}}">
				                <div class="w3-container w3-light-gray">
				                  <p style="font-weight: bold;font-size: 16px;">{{$post->title}}</p>
				                  <p>{{str_limit($post->excerpt, 60,'..')}}
				                  	@if($post->div())
				                  	<br><span>{{$post->div()}}</span>
				                  	@endif
				                  	
				                    @include('welcome.includes.others.readCommentCount')

				                  </p>
				                </div>
				              </a>
            		 </div>
            		@endforeach
            	</div>
            	<br>
            	@endforeach

              

 
            </div>
          </div>
@endif