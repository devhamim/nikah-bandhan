<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
  	<thead>
    	<tr>
        <th>Feature Image</th>
        <th>ID, Title & Status</th>
        <th width="200">Category & Tags</th>
        {{-- <th width="120">Div, Dist & Thana</th> --}}
        <th>Excerpt</th>
        <th>Content</th>
        <th>Action</th>
      </tr>
  	</thead>
  	<tbody>
  	@foreach($posts as $post)
  		<tr class="post-tr-{{$post->id}}">
        @include('blogAdmin.posts.ajax.postTr')
      </tr>
  @endforeach             		
  	</tbody>
    
    
  </table>
</div>
<!-- /.box-body -->
<div class="box-footer">
	<div class="pull-right">
		{{$posts->links()}}            		
	</div>
</div>