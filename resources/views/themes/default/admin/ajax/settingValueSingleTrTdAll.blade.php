<td width="50">{{$i}}</td>
    <td width="450">{{$value->title}}</td>
    <td>
      {{-- <a class="btn btn-xs btn-warning btn-value-edit" href="{{route('admin.userSettingValueEdit',[$value,$i])}}">Edit</a> --}}
            <a class="btn btn-xs btn-warning" href="" data-toggle="modal" data-target="#valueedit{{$value->id}}">Edit </a>

      <div class="btn-group btn-group-xs">

        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">

          <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red" href="{{route('admin.userSettingValueDelete',$value)}}" >Confirm</a></li>
        </ul>
      </div>


    </td>
