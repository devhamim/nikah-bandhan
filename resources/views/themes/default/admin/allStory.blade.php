@extends('admin.master.dashboardmaster')
@push('css')

      <style type="text/css">
    .select2-dropdown .select2-search__field:focus, .select2-search--inline .select2-search__field:focus {
        outline: none !important;
        border: none !important;
      }
  </style>
@endpush

@section('content')<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Story <small>New</small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Story</a></li>
            <li class="breadcrumb-item active">New</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">




    <!-- Info cardes -->
          <div class="row">
          <div class="col-md-12">

          @include('alerts.alerts')

            <div class="card card-widget">
                <div class="card-header with-border">
                  <h3 class="card-title"><i class="fa fa-th"></i> All Stories</h3>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50">SL</th>
                  <th width="100">Image</th>
                  <th>Basic</th>
                  <th>Content</th>
                  <th width="100">Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($stories as $story)
                <tr>

                  <td width="50">{{$loop->iteration}}</td>
                  <td width="100"><img width="200" src="{{ asset('/storage/stories/'.$story->image_name) }}" alt="{{ env('APP_NAME_BIG') }}"></td>
                  <td>
                    <b>Title: </b> {{ $story->title }} <br>
                    <b>Location: </b> {{ $story->location }} <br>
                    <b>Bride name: </b> {{ $story->bride_username }} <br>
                    <b>Groom name: </b> {{ $story->groom_username }} <br>
                    <b>Marriage Date: </b> {{ date('d-M-Y', strtotime($story->marriage_date)) }}
                  </td>

                  <td>{{ str_limit($story->description,50) }}</td>
                  <td width="100">




    <div class="btn-group pull-right btn-group-xs">
        @can('stories-edit')
        <a class="btn btn-primary "  href="{{route('admin.editStory',$story)}}">Edit</a>
        @endcan
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
          @can('stories-delete')
        <li>
            <a onclick="return confirm('Do you want to delete this story?');" href="{{route('admin.deleteStory', $story)}}">Delete</a>
        </li>
        @endcan
      </ul>
    </div>







                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
                </div>

                <div class="card-footer text-center">
                  {{$stories->render()}}
                </div>
            </div>

          </div>
          </div>
          <!-- /.row -->



        </section>

  @endsection
