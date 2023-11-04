    <section class="content-header">
      <h1>
        New Division
        <small>Create</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-plus"></i> New Division</a></li>
        <li class="active">create</li>
      </ol>
    </section>

     <section class="content">

     <div class="box box-widget">
     	<div class="box-header with-border">
     		<h3 class="box-title">
     			New Division 
     		</h3>
     	</div>
     	
              <div class="box-body">
              <div class="row">
              	<div class="col-md-7">
                <form class="form-horizontal" method="post" action="{{route('admin.divisionAddNewPost')}}">

								@include('alerts')

              	{{csrf_field()}}

              	



                
                <div class="form-group {{ $errors->has('division') ? ' has-error' : '' }}">
                  <label for="division" class="col-sm-3 control-label">Division</label>
                  <div class="col-sm-9">
                    <input type="text" name="division" class="form-control" value="{{old('division')}}" id="division" placeholder="Division" autocomplete="off">
                    @if ($errors->has('division'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('division') }}</strong>
	                    </span>
	                @endif
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="reset" class="btn btn-default">Cancel</button>

                	<button type="submit" class="btn btn-primary pull-right">Create</button>

                  </div>
                </div> 
                </form> 		
              	</div>
              	<div class="col-md-5">

                </div>
              </div>
              </div>
            
     </div>

     </section>

