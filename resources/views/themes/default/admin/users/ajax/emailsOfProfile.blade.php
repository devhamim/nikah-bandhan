

@foreach($emails as $item)

<tr>
<td width="20"><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td>
<td width="120"><img width="120" src="{{ asset($item->latestCheckedPP()) }}" alt="{{ $item->username }}"></td>
<td style="border:1px solid #dcdcdc; padding: 5px;">

                  <b>Name:</b> {{$item->name}} <br>
                  {{-- <b>Profile created by:</b> {{ $item->profile_created_by or '(Not set yet)' }} <br> --}}

                  @if ($pi = $item->personalInfo)
                  @if($pi->district)
                  <b>Home District:</b> {{ $pi->district }} <br>
                  @endif

                  @if($pi->my_profession)
                  <b>Profession:</b> {{ $pi->my_profession }} <br>
                  @endif

                  @if($pi->education_level)
                  <b>Education Level:</b> {{ $pi->education_level }} <br>
                  @endif

                  @if($pi->marital_status)
                  <b>Marital Status:</b> {{ $pi->marital_status }} <br>
                  @endif
                  
                  @endif
                  <b>Age, Gender, Religion:</b> {{ $item->age() }},   {{ $item->gender }}, {{ $item->religion }}<br> 

                  <a style="color:#333;" href="{{url('/', $item->username)}}">Click to See Details</a>
                  </td></tr>

@endforeach