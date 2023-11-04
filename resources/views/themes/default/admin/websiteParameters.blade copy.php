@extends('admin.master.dashboardmaster')
@section('content')
  



      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"> Website</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Website</a></li>
                <li class="breadcrumb-item active">Parameters</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
  
  
  
      <!-- Main content -->
      <section class="content"> 
  
  
  <!-- Info card -->
        <div class="row">
        <div class="col-md-12">
  
        @include('alerts.alerts')
  
          <div class="card card-widget">
              <div class="card-header with-border">
                <h3 class="card-title"><i class="fa fa-th"></i> All Website Parameters</h3>
                {{-- <div class="pull-right">
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">Add New Dist Repr.</a>
  
                </div> --}}
  
                
              </div>
  
              <div class="card-body">
  
                @include('admin.partials.websiteParameterForm')
  
              </div>
  
              <div class="card-footer text-center">
                
              </div>
          </div>
          
        </div>        
        </div>
        <!-- /.row -->
  
      </section>
  @endsection