@extends('admin.master.dashboardmaster')
@section('content')
<section class="content-header">
    <h1>
    Packages
    <small>All</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Packages</a></li>
      <li class="active">All</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-widget">
          <div class="box-header">
            <h3 class="box-title">
            All Membership Packages
            </h3>
          </div>
        </div>
        @include('alerts.alerts')
        @foreach($packages->chunk(4) as $package4)
        <div class="row">
          @foreach($package4 as $package)
          <div class="col-sm-3">
            <a class="w3-text-dark-gray" href="{{ route('admin.membershipPackageEdit',$package) }}">
              <div class="box box-widget w3-hover-shadow">
                <div class="box-header with-border">
                  <h3 class="box-title">
                      {{ $package->package_title }}

                    </h3>
                </div>
                <div class="box-body">
                  <div class="panel panel-default" style="margin-bottom: 0px;">
                    <div class="panel-body" style="padding: 5px;">

                      {{ $package->package_description }} <hr style="margin: 3px;">
                      <div class="w3-large">
                        <b>Price: </b> {{ $package->package_amount }} {{ $package->package_currency }} <br>
                        <b>Duration: </b> {{ $package->package_duration }} Days <br>
                        <b>Proposal Daily: </b> {{ $package->proposal_send_daily_limit }} <br>

                        <b>Proposal Total: </b> {{ $package->proposal_send_total_limit }}
                        <br>
                        <b>Contact View: </b> {{ $package->contact_view_limit }}

                        @if($package->image_name)
                        <div class="pull-right">
                      <img class="img-circle" width="40" src="{{ asset('storage/package/' . $package->image_name) }}" alt="{{ env('APP_NAME_BIG') }}">
                    </div>
                      @endif

                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
        @endforeach


      </div>
    </div>
    <!-- /.row -->
  </section>
  @endsection
