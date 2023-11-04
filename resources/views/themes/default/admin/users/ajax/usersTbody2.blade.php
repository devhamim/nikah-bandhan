@foreach($users as $user)
<tr>
    <td>{{$i++}}</td>
    
 <td>{{$user->name}}</td>

 <td>{{$user->mobile}}</td>


</tr>

@endforeach

