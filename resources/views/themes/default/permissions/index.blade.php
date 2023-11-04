@extends('admin.master.dashboardmaster')
@section('content')
    <section class="content">
        <div class="container-fluid">

            <br>

            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">
                        Permission Management
                    </h4>
                    <div class="card-tools">
                        {{-- @can('permission-create') --}}
                        <a class="btn btn-success btn-xs" href="{{ route('permissions.create') }}"> Create New Permission</a>
                        {{-- @endcan --}}

                    </div>
                </div>

                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                            </tr>
                            @foreach ($permissions as $key => $permission)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $permission->name }}</td>
                                    {{-- <td>
                                        {{-- <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a> --}}
                                        {{-- @can('role-edit')
                                            <a class="btn btn-primary btn-xs"
                                                href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                                        @endcan --}}
                                        {{-- @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'style' => 'display:inline', 'onsubmit' => 'return confirm("are you sure ?")']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
                                        @endcan --}}
                                    {{-- </td> --}}
                                </tr>
                            @endforeach
                        </table>


                    </div>


                    {!! $permissions->render() !!}

                </div>

            </div>









        </div>
    </section>
@endsection
