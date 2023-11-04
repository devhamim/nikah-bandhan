@if($mediaAll->count())

	@foreach($mediaAll as $media)

			<div class="panel panel-default" style="margin-bottom: 5px;">
					<div class="panel-body">

					<div class="media">
				  <div class="media-left">
				    <a href="#">

				    		<img class="media-object" style="width: 80px;height:60px;" src="{{asset($media->file_url)}}" alt="...">


				      
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading">{{url('/'.$media->file_url)}} </h4>
				    Orig.Name: {{$media->file_original_name}},
				    Size: {{human_filesize($media->file_size)}},
				    Width: {{$media->width}}px,
				    Height: {{$media->height}}px
				  </div>
				</div>

				<small><pre>{{url('/'.$media->file_url)}}</pre> </small>	
						
					</div>
				</div>

	@endforeach


<div class="pull-right">
	{{$mediaAll->render()}}
</div>

@endif 
