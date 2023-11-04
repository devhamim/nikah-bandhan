<form class="form-inline" method="get" action="{{route('welcome.postDivisionSearch')}}">

  <div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-map-marker"></i> বিভাগের সব খবর</h3>
    </div>
    <div class="box-body">

      <div class="form-group">

    <div class="row">
        <div class="col-sm-6">
          <select class="form-control div-select" data-url="{{route('welcome.divSelected')}}" name="div" style="width: 140px;border-radius: 4px;" required>
            <option value="">বিভাগ</option>
            @foreach($divs as $div)
            <option value="{{$div->id}}">{{$div->title}}</option>
            @endforeach
            
            

          </select>
        </div>
        <div class="col-sm-6">
          <select class="form-control dist-select" data-url="{{route('welcome.distSelected')}}" name="district" style="width: 100%;border-radius: 4px;">
            <option value="">জেলা</option>

          </select>
          
        </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-6">
        <select class="form-control thana-select" name="thana" style="width: 140px;border-radius: 4px;">
            <option value="">উপজেলা</option>
          </select>
      </div>
      <div class="col-sm-6">
        <button class="btn btn-md w3-red w3-round" style="width: 100%;">অনুসন্ধান করুন</button>
      </div>
    </div>
  </div>
      
    </div>
  </div>
  
</form>