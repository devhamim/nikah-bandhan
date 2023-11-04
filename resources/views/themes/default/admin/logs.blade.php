@extends('admin.master.dashboardmaster')
@php
$me = Auth::user();
@endphp
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User <small>Logs</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Logs</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-th"></i> Logs of ID: {{ $user->id }},
                        {{ $user->email }}, {{ $user->name }}</h3>
                </div>
            </div><!-- /.container-fluid -->

            <div class="card card-default">
                <div class="card-header">
                    <form action="{{route('admin.logPost', $user)}}" method="POST">
                        @csrf
                        <div class="form-row align-items-center">
                            <div class="col-md-2">
                                <label for="">Description</label>
                            </div>
                          <div class="col-md-8">
                            <input type="text" name="description" class="form-control mb-2" id="inlineFormInput" placeholder="Log Description" required>
                          </div>

                          <div class="col-md-2">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div><!-- /.container-fluid -->

            <div class="card card-default">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Added By</th>
                  </tr>
                  </thead>
                  <tbody>
                      @php
                          $i=0;
                      @endphp
                      @foreach ($logs as $log )
                      <tr>
                        <td>{{++$i}}</td>
                        <td> {{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d') }}
                        </td>
                        <td>{{$log->description}}</td>
                        <td> {{$log->logAddedBy->name}}</td>

                      </tr>

                      @endforeach

                  </tbody>
                </table>
            </div>


    </section>
    <!-- /.content -->
@endsection
