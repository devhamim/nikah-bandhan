@if($mediaAll->count())
@foreach($mediaAll->chunk(2) as $media2)
<div class="row">
	@foreach($media2 as $media)
		<div class="col-sm-6">
			<div class="panel panel-default" style="margin-bottom: 5px;">
					<div class="panel-body">

					<div class="media">
				  <div class="media-left">
				    <a href="#">
				    	<div class="w3-display-container">
				    		<img class="media-object" style="width: 120px;height:100px;" src="{{asset($media->file_url)}}" alt="...">
				    		<div class="w3-display-topright"><a onclick="return confirm('Do you really want to delete this media?');" style="margin-right: 4px;margin-top: 3px;" class="btn btn-default btn-xs" title="Delete" href="{{route('admin.mediaDelete',$media)}}"><i class="fa fa-times"></i></a></div>
				    	</div>
				      
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading">{{url('/'.$media->file_url)}} </h4>
				    Orig.Name: {{$media->file_original_name}} <br>
				    Size: {{human_filesize($media->file_size)}} <br>
				    Width: {{$media->width}}px <br>
				    Height: {{$media->height}}px			    		     

				  </div>
				</div>

				<small><pre>{{url('/'.$media->file_url)}}</pre> </small>	
						
					</div>
				</div>
		</div>
	@endforeach
</div>
@endforeach

<div class="pull-right">
	{{$mediaAll->render()}}
</div>

@endif 
