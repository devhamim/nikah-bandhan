<div class="row">
	<div class="col-sm-8">
		@foreach($searchPosts as $post)
			@include('welcome.includes.others.sidebarPost')
		@endforeach

		{{$searchPosts->render()}}
	</div>

	<div class="col-sm-4">
		@include('welcome.includes.others.rightPopular')

    @include('welcome.includes.others.rightLatest')
	</div>
</div>