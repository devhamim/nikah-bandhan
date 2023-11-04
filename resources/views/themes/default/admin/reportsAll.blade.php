@extends('admin.master.dashboardmaster')
@section('content')
<div class="container">
    <div class="container-fluid">
        <br>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('alerts.alerts')
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h2>All Reports</h2>
                </div>
            </div>
            <div class="card-body">

                <div class="box box-widget">
                    <div class="box-header with-border">
                      <h3 class="box-title"><i class="fa fa-th"></i> All Reports</h3>
                    </div>

                    <div class="box-body">
                      <table class="table table-bordered ">
                  <thead>
                    <tr>
                      <th>Report About</th>

                      <th>Comment</th>
                      <th>Report By</th>
                      <th>Status</th>
                      <th width="150">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($reports as $report)
                    <tr>
                      <td>
                        @if($report->reportAbout)
                        ID: {{ $report->reportAbout->id }} <br>
                        Name: {{ $report->reportAbout->name }}<br>
                        Username: {{ $report->reportAbout->username }}<br>
                        Email: {{ $report->reportAbout->email }} <br>
                        <a target="_blank" href="{{ url('/', $report->reportAbout->username) }}">Details</a>
                        @endif
                      </td>
                      <td>
                        {{ $report->comment }}
                      </td>

                      <td>
                        @if($report->reportBy)
                        ID: {{ $report->reportBy->id }}<br>
                        Name: {{ $report->reportBy->name }}<br>
                        Username: {{ $report->reportBy->username }}<br>
                        Email: {{ $report->reportBy->email }}<br>
                        <a target="_blank" href="{{ url('/', $report->reportBy->username) }}">Details</a>
                        @endif
                      </td>

                      <td>
                        @if ($report->status == 'pending')
                          <span class="label label-default">{{ $report->status }}</span>
                        @else
                          <span class="label label-success">{{ $report->status }}</span>
                        @endif

                      </td>

                      <td width="150">

                    <div class="btn-group btn-group-xs">
                        <a class="btn btn-primary" href="{{ route('admin.reportChecked', $report) }}">Checked</a>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li><a onclick="return confirm('Do you really want to delete?');" class="w3-btn w3-round w3-red w3-small" href="{{ route('admin.reportDelete', $report) }}">Delete</a></li>

                        </ul>
                      </div>

                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                    </div>

                    <div class="box-footer text-center">
                      {{$reports->render()}}
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
