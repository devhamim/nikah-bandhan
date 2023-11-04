
    <td width="50">{{$i}}</td>
    
    <td width="540">
        <form class="form-inline form-value-update" method="post" action="{{route('admin.userSettingValueUpdate',[$value,$i])}}">

            

              <div class="form-group">
                <input type="text" value="{{$value->title}}" name="name" class="form-control input-sm" style="min-width: 450px;">
              </div>

              
            
 <button type="submit" class="btn btn-xs btn-warning up">Update</button>
            </form>
        </td>
    <td>
 

    </td>

