@extends('admin.master.dashboardmaster')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Packages <small>All</small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Packages All</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        @foreach($packages->chunk(4) as $package4)
      <div class="row">
        @foreach($package4 as $package)
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <a class="card-title text-dark" href="{{ route('admin.membershipPackageEdit',$package) }}">
                <h3 class="card-title">
                    {{$package->package_title}}
                    <span class="badge badge-primary -right">Edit</span>
                </h3>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="panel panel-default" style="margin-bottom: 0px;">
                    <div class="panel-body" style="padding: 5px;">

                      {!! $package->package_description !!} <hr style="margin: 3px;">
                      <div class="w3-large">
                        <b>Price: </b> {{ $package->package_amount }} {{ $package->package_currency }} <br>
                        <b>Duration: </b> {{ $package->package_duration }} Days <br>
                        <b>Proposal Daily: </b> {{ $package->proposal_send_daily_limit }} <br>

                        <b>Proposal Total: </b> {{ $package->proposal_send_total_limit }}
                        <br>
                        <b>Contact View: </b> {{ $package->contact_view_limit }}

                     {{-- @if($package->image_name)
                        <div class="pull-right">
                            <img class="img-circle" width="50" height="50" src="{{ asset('storage/package/' . $package->image_name) }}" alt="Package" height="">
                        </div>
                      @endif --}}

                      </div>

                    </div>
                  </div>
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
        @endforeach


      </div>
      @endforeach


    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  @endsection
