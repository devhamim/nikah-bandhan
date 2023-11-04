@extends('admin.master.dashboardmaster')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">User Setting Field
                <small>All</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">All</a></li>
                <li class="breadcrumb-item active">User Setting Field</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>


      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-sm-12">

            @include('alerts.alerts')

            <div class="card card-widget">
             <div class="card-body text-center">

               @include('admin.partials.userSettingFieldForm')

             </div>
           </div>

           <div class="card card-warning">
            <div class="card-header with-border">
              <h3 class="card-title">All User Setting Fields</h3>

              </div>
              <!-- /.box-header -->


              <div class="card-body table-responsive">

                <table class="table table-condensed table-striped table-bordered">
                  <thead>
                    <tr>
                      <th width="50">ID</th>
                      <th>Field Name</th>
                      <th width="150">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($fields as $field)

                    @include('admin.ajax.fieldTr')

                    @endforeach
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
              <div class="box-footer">
                <div class="pull-right">
                  {{$fields->render()}}

                </div>
              </div>




            </div>


          </div>
        </div>


      </section>
      <!-- /.content -->

@endsection
