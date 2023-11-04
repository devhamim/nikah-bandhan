@if(count($crimePosts))
<div class="box box-widget">
	<div class="box-header with-border text-center">
		<h3>অপরাধ-ক্রাইম সংবাদ</h3>
	</div>
	<div class="box-body">
		<div id="example5" class="slider-pro">

		<div class="sp-slides">

		@foreach($crimePosts as $post)
			<div class="sp-slide">
				<a href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>$post->title])}}">
				<img class="sp-image" src="{{asset('assets/slider/src/css/images/blank.gif')}}"
					data-src="{{asset($post->fi())}}"
					data-retina="{{asset($post->fi())}}"/></a>

				<div class="sp-caption">{{$post->title}}
					@include('welcome.includes.others.readCommentCount')
				</div>
			</div>

		@endforeach

		</div>



		<div class="sp-thumbnails">

			@foreach($crimePosts as $post)
			<div class="sp-thumbnail">
				<div class="sp-thumbnail-image-container">
					<img class="sp-thumbnail-image" src="{{asset($post->fi())}}"/>
				</div>
				<div class="sp-thumbnail-text">
					<div class="sp-thumbnail-title"><b>
						<a href="{{route('welcome.postDetails',['post'=>$post, 'excerpt'=>$post->title])}}">{{str_limit($post->title,35,'..')}}</a></b></div>
					<div class="sp-thumbnail-description">
						{{str_limit($post->excerpt,20,'..')}}					
					</div>
				</div>
			</div>
			@endforeach
 
		</div>
    </div>
	</div>
</div>
@endif