
    <section class="content-header">
      <h1>
        Blog
        <small>Parameters</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Blog</a></li>
        <li class="active">Parameters</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content"> 




<!-- Info boxes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts')

        <div class="box box-widget">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-th"></i> All Blog Parameters</h3>
              {{-- <div class="pull-right">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">Add New Dist Repr.</a>

              </div> --}}

              
            </div>

            <div class="box-body">

              @include('blogAdmin.includes.forms.blogParameterForm')

            </div>

            <div class="box-footer text-center">
              
            </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->

    </section>
