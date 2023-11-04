<tbody>
	<tr>
		<td style="width: 50px;">{{$div->id}}</td>
		<td>

			<form class="form-inline form-cat-update" method="post" action="{{route('admin.divisionUpdate',$div)}}">

			  <div class="form-group">
			    <input type="text" value="{{$div->name}}" name="name" class="form-control input-sm cat-input" style="min-width: 450px;">
			  </div>

			  <button type="submit" class="btn btn-xs btn-warning pull-right">Update</button>
			</form>
 
		
		</td>
		<td style="width: 100px;"></td>
	</tr>
</tbody>