@extends('admin.master.dashboardmaster')
@section('content')
    <section class="content-header">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User <small>New</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">New</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">New User</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data"
                                        action="{{ route('admin.newUserPost') }}">

                                        {{ csrf_field() }}
                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" id="" class="form-control" placeholder="Uer name...">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Email</label>
                                                   <input type="email" name="email" id="" class="form-control" placeholder="User email...">
                                                </div>
                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                   <input type="text" name="mobile" id="" class="form-control" placeholder="User mobile...">
                                                </div>
                                                <!-- /.form-group -->



                                                <div class="form-row">
                                                    <div class="form-group col-lg-6">
                                                        <label class="
                                                                    font-weight-bold
                                                                    text-dark text-2
                                                                ">Password</label>
                                                        <input type="password" value="" name="password" class="
                                                                    form-control
                                                                    form-control-lg
                                                                " required placeholder="Create Password" />
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label class="
                                                                    font-weight-bold
                                                                    text-dark text-2
                                                                ">Re-enter
                                                            Password</label>
                                                        <input type="password" value="" name="password_confirmation" class="
                                                                    form-control
                                                                    form-control-lg
                                                                " required placeholder="Confirm Password" />
                                                    </div>
                                                    @if ($errors->has('password'))
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            <li>
                                                                {{ $errors->first('password') }}
                                                            </li>
                                                        </ul>
                                                    </div>
                    
                                                    @endif
                                                </div>
                                                @if ($errors->has('password_confirmation'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        <li>
                                                            {{ $errors->first('password_confirmation') }}
                                                        </li>
                                                    </ul>
                                                </div>
                    
                                                @endif
                                                <!-- /.form-group -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </form>


                                        <!-- /.row -->
                                </div>
                                <!-- /.card-body -->

                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </section>
    @endsection
