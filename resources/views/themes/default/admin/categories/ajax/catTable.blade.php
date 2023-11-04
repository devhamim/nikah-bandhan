 <tbody>
	<tr>
		<td style="width: 50px;">{{$cat->id}}</td>
		<td >{{$cat->title}}</td>
		<td style="width: 150px;"> <a class="btn btn-xs btn-warning" href="" data-toggle="modal" data-target="#modal-default{{$cat->id}}">Edit</a>

		<div class="btn-group btn-group-xs pull-right">

            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
            </button>
            <ul class="dropdown-menu" role="menu">


              <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red" href="{{route('admin.categoryDelete',$cat)}}" data-url="">Confirm</a></li>
            </ul>
          </div>

		</td>
	</tr>
</tbody>

<div class="modal fade" id="modal-default{{$cat->id}}">
    <div class="modal-dialog">
        <form action="{{route('admin.categoryUpdate',$cat)}}">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

              @csrf
              <input type="text" name="name" class="form-control" value="{{$cat->title}}">

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
