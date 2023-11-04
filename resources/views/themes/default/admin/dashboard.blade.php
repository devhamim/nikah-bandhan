@extends('admin.master.dashboardmaster')
@php
    $me=Auth::user();
@endphp
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{count($pending_user)}}</h3>
              <p>Pending Profiles</p>
            </div>
            <a href="{{route('pendingProfiles')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> {{ $pen_p_t }}<sup style="font-size: 20px"></sup></h3>

                <p> Pen.Pay.Today</p>
              </div>
              <a href="{{route('admin.allPendingPayments')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> {{ $pen_p_t_m }}</h3>

                <p> Pen.Pay.{{ date('M') }}</p>
              </div>

              <a href="{{route('admin.allPendingPayments')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> {{ $paid_p_t }}</h3>

                <p> Paid.Pay.Today</p>
              </div>
              <a href="{{route('admin.allPaidPayments')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3> {{ $paid_p_t_m }}</h3>

                <p>  Paid.Pay.{{ date('M') }}</p>
              </div>
              <a href="{{route('admin.allPaidPayments')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3> {{ $all_u }}</h3>

                <p>   All Users</p>
              </div>
              <a href="{{route('admin.usersAll')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->









      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $m_u }}</h3>
              <p> Male Users</p>
            </div>
            <a href="{{route('admin.usersGroup', 'male_users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>  {{ $f_u }}<sup style="font-size: 20px"></sup></h3>

                <p> Female Users</p>
              </div>
              <a href="{{route('admin.usersGroup', 'female_users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>  {{ $sub_u }}</h3>

                <p>  Subscribers</p>
              </div>

              <a href="{{route('admin.usersGroup', 'subscribers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>  {{ $d_p_u }}</h3>

                <p> Diamond User</p>
              </div>
              <a href="{{route('admin.usersGroup', 'diamond')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3> {{ $g_u }}</h3>

                <p>   Golden Users</p>
              </div>
              <a href="{{route('admin.usersGroup', 'golden')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3> {{ $s_u }}</h3>

                <p>   Silver Users</p>
              </div>
              <a href="{{route('admin.usersGroup', 'silver')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->





      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $p_u }}</h3>
              <p> Platinum Users</p>
            </div>
            <a href="{{route('admin.usersGroup', 'platinum')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>  {{ $me->validity_10_count() }}<sup style="font-size: 20px"></sup></h3>

                <p> Validity < 10 d</p>
              </div>
              <a href="{{route('admin.usersGroup', 'validity_10')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>   {{ $me->final_check_pending_count() }}</h3>

                <p>   Not Checked</p>
              </div>

              <a href="{{route('pendingProfiles')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>  {{ $deac_u }}</h3>

                <p>  Deactivated</p>
              </div>
              <a href="{{route('admin.usersGroup', 'inactive_users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3> {{ $me->pendingPaymentCount() }}</h3>

                <p>   Pending Payment</p>
              </div>
              <a href="{{route('admin.allPendingPayments')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>  {{ $me->proposals_unchecked_count() }}</h3>

                <p>   Proposals</p>
              </div>
              <a href="{{route('admin.proposalsGroup', 'all_proposals')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $logUsers_count }}</h3>
              <p> Logs User</p>
            </div>
            <a href="{{route('admin.usersGroup', 'log_users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>








    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
