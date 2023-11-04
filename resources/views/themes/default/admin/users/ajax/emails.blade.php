@foreach($emails as $email)

<tr>
<td><input type="checkbox" name="ids[]" value="{{ $email->id }}"></td>
<td>{{ $email->email }}</td>
<td class="mailbox-name">{{ $email->name }}</td>
<td class="mailbox-subject">{{ $email->age() }}</td>
<td></td>
</tr>

@endforeach