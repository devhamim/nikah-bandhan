@extends('admin.master.dashboardmaster')
@section('content')

    <section class="container">
        <div class="container-fluid">
            <br>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Role Management</h4>
                    <div class="card-tools">
                        @can('role-create')
                            <a class="btn btn-success btn-xs" href="{{ route('roles.create') }}"> Create New Role</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $per)
                                        <label class="label label-success">{{ $per->name }},</label>
                                        @endforeach

                                    </td>
                                    <td>
                                        <!-- <a class="btn btn-info btn-xs" href="{{ route('roles.show', $role->id) }}">Show</a> -->
                                       
                                            <a class="btn btn-primary btn-xs" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                       
                                        <!--@can('role-delete')-->
                                        <!--    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline', 'onsubmit' => 'return confirm("are you sure ?")']) !!}-->
                                        <!--    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}-->
                                        <!--    {!! Form::close() !!}-->
                                        <!--@endcan-->
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {!! $roles->render() !!}
                </div>

            </div>
        </div>
    </section>



@endsection

