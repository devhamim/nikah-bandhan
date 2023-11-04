<section class="content-header">
    <h1>
      Package
      <small>Add New</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Package</a></li>
      <li class="active">Add New</li>
    </ol>
  </section>


     <section class="content">

     <div class="box box-widget">
     	<div class="box-header with-border">
     		<h3 class="box-title">
     			New Category
     		</h3>
     	</div>

              <div class="box-body">
              <div class="row">
              	<div class="col-md-7">
                <form class="form-horizontal" method="post" action="{{route('admin.categoryAddNewPost')}}">

								@include('alerts')

              	{{csrf_field()}}






                <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                  <label for="category" class="col-sm-3 control-label">Category</label>
                  <div class="col-sm-9">
                    <input type="text" name="category" class="form-control" value="{{old('category')}}" id="category" placeholder="Category" autocomplete="off">
                    @if ($errors->has('category'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('category') }}</strong>
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

