    <div class="panel panel-default">
      <div class="panel-body text-center">
        <form class="form-inline" method="get" action="{{route('welcome.postDivisionSearch')}}">

    <div class="form-group form-group-lg">
      <label class="sr-only" for="email">বিভাগ:</label>
      <select class="form-control div-select" data-url="{{route('welcome.divSelected')}}" name="div" style="border-radius: 4px;" required>

            <option value="{{$div->id}}">{{$div->title}}</option>
            @foreach($divs as $division)
            @if($div->id == $division->id)
              @continue
            @endif
            <option value="{{$division->id}}">{{$division->title}}</option>                       
            @endforeach      
          </select>
    </div>

    <div class="form-group form-group-lg">
      <label class="sr-only" for="pwd">জেলা:</label>
      <select class="form-control dist-select" data-url="{{route('welcome.distSelected')}}" name="district" style="border-radius: 4px;">

            @if($dist)
            <option value="">জেলা</option>
            <option value="{{$dist->id}}" selected>{{$dist->title}}</option>
            @else
            <option value="">জেলা</option>
            @endif


            @foreach($div->districts as $district)
            @if($dist)
            @if($district->id == $dist->id)
              @continue
            @endif
            @endif
              <option value="{{$district->id}}">{{$district->title}}</option>
            @endforeach 

          </select>
    </div>


    <div class="form-group form-group-lg">
      <label class="sr-only" for="pwd">জেলা:</label>
      <select class="form-control thana-select" name="thana" style="border-radius: 4px;">

            @if($thana)
            <option value="">উপজেলা</option>
            <option value="{{$thana->id}}" selected>{{$thana->title}}</option>
            @else
            <option value="">উপজেলা</option>
            @endif


            @if($dist)
            @foreach($dist->thanas as $th)
            @if($thana)
            @if($thana->id == $th->id)
              @continue
            @endif
            @endif
              <option value="{{$th->id}}">{{$th->title}}</option>
            @endforeach
            @endif

          </select>
    </div>
    <div class="form-group form-group-lg">
      <label class="sr-only" for="pwd"></label>
      <button type="submit" class="btn w3-red btn-lg">অনুসন্ধান করুন</button>
    </div>
</form>
      </div>
    </div>
<br>