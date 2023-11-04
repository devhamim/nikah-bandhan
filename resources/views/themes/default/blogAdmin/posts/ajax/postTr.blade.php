<td>
	                  	@if($post->imgFeature())
	                  		<img class="img-responsive" width="100" src="{{asset($post->fi())}}">
	                  	@endif
	                  	
	                  </td>
	                  <td>
	                  	<b>ID:</b> {{$post->id}} <br> 
	                  	<b>Title:</b> {{$post->title}} <br> 
	                  	<b>Status:</b> {{$post->publish_status}} <br>
	                  	<b>Headline:</b> {{$post->headline ? 'Yes' : 'No'}} <br>
	                  	<b>Front Slider:</b> {{$post->front_slider ? 'Yes' : 'No'}} <br>
	                  	<b>Comment Total:</b> {{$post->comments->count()}}
	                  </td>
	                  <td>
	                  	<b>Cat:</b> {{$post->cats()}} <br>
	                  	<b>Tags:</b> {{$post->tags}}
	                  </td>
	                  {{-- <td>
	                  	<b>Div:</b> {{$post->div()}} <br>
	                  	<b>Dist:</b> {{$post->dist()}} <br>
	                  	<b>Thana:</b> {{$post->thana()}}
	                  </td> --}}
	                  <td>
	                  	 {{str_limit($post->excerpt, $limit = 200, $end = "..")}}
	                  </td>
	                  <td>
	                  	 {{str_limit($post->description, $limit = 200, $end = "..")}}
	                  </td>
	                  <td style="min-width: 100px;">


	              <div class="btn-group btn-group-xs pull-right ">
                  <a class="btn btn-primary" target="_blank" href="{{route('admin.postEdit',$post)}}">Edit</a>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">

                  	<li><a  target="_blank" href="{{route('welcome.postDetailsCheck',[$post,$post->title])}}">Details</a></li>

                    {{-- <li><a class="make-directory-inactive" href="">Make Draft</a></li> --}}
										                   
                    

                    <li><a href="{{route('admin.postDelete',$post)}}" onclick="return confirm('Do you really want to delete this post?');">Delete</a></li>
                  </ul>                  
                </div>

	                  </td>