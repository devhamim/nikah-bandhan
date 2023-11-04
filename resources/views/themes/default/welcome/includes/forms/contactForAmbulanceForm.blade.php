<form class="form-horizontal" method="post" action="{{route('welcome.contactForAmbulancePost', $place)}}" >

  {{csrf_field()}}

  <div class="form-group {{ $errors->has('fullName') ? ' has-error' : '' }}">
    <label for="fullName" class="col-sm-3 control-label">Your Full Name</label>
    <div class="col-sm-9">
      <input type="text" name="fullName" class="form-control" value="{{old('fullName')}}" id="fullName" placeholder="Your Full Name">
      @if ($errors->has('fullName'))
      <span class="help-block">
        <strong>{{ $errors->first('fullName') }}</strong>
      </span>
      @endif
    </div>                  
  </div>


  <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
    <label for="mobile" class="col-sm-3 control-label">Mobile</label>
    <div class="col-sm-9">

      <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}" id="mobile" placeholder="Mobile Number">
      @if ($errors->has('mobile'))
      <span class="help-block">
        <strong>{{ $errors->first('mobile') }}</strong>
      </span>
      @endif
    </div>
  </div>



  <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="col-sm-3 control-label">Description</label>
    <div class="col-sm-9">
      <textarea name="description" class="form-control" rows="5" id="description" placeholder="Description">{{old('description')}}</textarea>
      @if ($errors->has('description'))
      <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
      </span>
      @endif

    </div>
  </div>

  <hr>        

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="reset" class="btn btn-default">Cancel</button> &nbsp;



      <button type="submit" class="w3-btn w3-blue w3-round pull-right">Submit</button>



    </div>
  </div>

</form>