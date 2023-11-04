<section class="content-header">
  <h1>
    All	
    <small>Categories</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-plus"></i> All </a></li>
    <li class="active">Categories</li>
  </ol>
</section>

<section class="content">
 

    <div class="row">
        <div class="col-sm-12">

        	@include('alerts')

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">All Categories</h3>

              <div class="box-tools">
                {{-- <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default w3-deep-orange w3-border-deep-orange"><i class="fa fa-search"></i></button>
                  </div>
                </div> --}}
                <a class="btn btn-primary btn-sm" href="{{route('admin.categoryAddNew')}}">Add New Category</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive ">
              <table class="table">
              	<thead>
	              	<tr>
	                  <th style="width: 50px;">ID</th>
	                  <th >Category Name</th>
	                  <th style="width: 150px;">Action</th>
	                </tr>
              	</thead>                
              </table>

              </div>
            <!-- /.box-body -->
 
          </div>
          <!-- /.box -->
 
          			
 
 									@if($cats->count())
 									<div class="box box-widget">
 										<div class="box-body">
 											@foreach($cats as $cat)
 
					          <table class="table table-condensed table-cat">
			              	@include('admin.categories.ajax.catTable')
			              </table>
 
		             	 @endforeach
 										</div>
 									</div>
 									@endif
		              
 
              
 
            
        </div>
      </div>
 
	</section>