@extends('admin.master.dashboardmaster')
@section('content')<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users <small>Pending</small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active">Pending</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                @php
                $i=1;
                @endphp
                <tbody>
               @foreach($pending_user as $user)
               <tr>
                   <td>{{$i++}}</td>
                   <td>
                    @if($user->profile_img)
                    <img src="{{asset('storage/profile/'. $user->profile_img)}}" alt="" class="img-fluid border border-danger"
                        style="max-width: 80px; ">
                    @else
                    <img src="{{asset('img/vip-user.png')}}" alt="" class="img-fluid border border-danger" style="max-width: 80px; ">
                    @endif
                   </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}
                </td>
                <td>{{$user->mobile}}</td>
                @if($user->user_type!=null)
                <th>{{$user->user_type}}</th>
                @else
                <th>n/a</th>
                @endif
                {{-- <td>
                    <a class="btn btn-primary btn-xs" href="{{ route('users.editprofile', $user->id) }}">Edit</a>
                </td> --}}


 <td>

    <div class="btn-group btn-group-xs pull-right">
       {{-- <button type="button" data-url="" class="btn btn-primary">Edit</button> --}}
       <a class="btn btn-primary" href="{{ route('users.editprofile', $user->id) }}">Edit</a>
       <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
       <span class="caret"></span>
       </button>
       <ul class="dropdown-menu pl-2" role="menu">

           <li>
               <a title="User Comment, Admin Comment, comlain, conversation"  href="{{route('admin.logs', $user)}}">Logs ({{$user->countLog()}})</a>
           </li>



       </ul>
   </div>
</td>

              </tr>

              @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
