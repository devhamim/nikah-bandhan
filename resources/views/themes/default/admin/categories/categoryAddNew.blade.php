@extends('admin.master.dashboardmaster')
@section('content')

    <section class="content">
        <div class="container-fluid">

            <br>
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">
                        Category Create
                    </h4>

                    {{-- <div class="card-tools">
                        <a class="btn btn-primary btn-xs" href="{{ route('permissions.index') }}"> Back</a>
                    </div> --}}

                </div>


                <div class="card-body">

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

                        <form action="{{route('admin.categoryAddNewPost')}}" method="POST">
                            @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="category" placeholder="Name" class="form-control">

                            </div>
                        </div>

                        @if ($errors->has('category'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('category') }}</strong>
	                    </span>
	                @endif

                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </section>

@endsection
