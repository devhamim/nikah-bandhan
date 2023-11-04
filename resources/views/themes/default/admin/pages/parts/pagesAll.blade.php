<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pages All</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pages All</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>


<!-- Main content -->
<section class="content">




  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-12">


      <div class="card card-widget" style="background-color: #fff;">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-plus"></i> Add New Page</h3>



        </div>

        <div class="card-body" style="background-color: #fff;">

          @include('admin.pages.includes.pageCreateForm')
        </div>
      </div>
      <div class="card card-widget">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-th"></i> All Pages</h3>
        </div>

        <div class="card-body">
          <div class="card card-widget mb-0" style="background-color: #fff;">
            <div class="card-body w3-gray ">


              @foreach($pages as $page)

              @include('admin.pages.includes.pageSingle')

              @endforeach

            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
  <!-- /.row -->




</section>
