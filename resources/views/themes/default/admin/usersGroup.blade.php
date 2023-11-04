@extends('admin.master.dashboardmaster')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users <small>{{ str_replace('_', ' ', $type) }}</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">{{ str_replace('_', ' ', $type) }}</li>
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
                            <form class="pull-right">
                                <div class="box-tools">
                                    <div class="input-group input-group-sm" style="width: 280px;">
                                        <input type="text" name="q" class="form-control input-xs pull-right user-search"
                                            placeholder="Search By ID, Email,name, mobile"
                                            data-url="{{ route('admin.userSearchAjax') }}">

                                        <div class="input-group-btn">
                                            {{-- <button type="button" class="btn btn-warning"><i
                                                    class="fa fa-search"></i></button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Pending Image</th>
                                        <th>User Basic</th>
                                        <th>User Details</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp



                                <tbody class="user-table-body">


                                    @include('admin.users.ajax.usersTbody')

                                </tbody>



                            </table>
                            <div class="pagination text-center">
                                {{ $users->links('pagination::bootstrap-4') }}

                            </div>
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


@push('js')

    <script>
        $(function() {
            $('.slim-media').slimScroll({
                height: '500px'
            });
        });


        $(document).ready(function() {

            $(document).on('keypress', '.user-search', function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                }
            });


            /////////////////////////////////////

            var delay = (function() {
                var timer = 0;
                return function(callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            $(document).on("keyup", ".user-search", function(e) {
                e.preventDefault();
                // alert('ok');
                var that = $(this);
                var q = e.target.value;
                var url = that.attr("data-url");
                var urls = url + '?q=' + q;
                // var datalist = $("#products");
                // datalist.empty();
                // alert(urls);


                delay(function() {
                    $.ajax({
                        url: urls,
                        type: 'GET',
                        cache: false,
                        dataType: 'json',
                        success: function(response) {
                            //   alert('ok');
                            console.log(response);
                            $(".pagination").remove();
                            $(".user-table-body").empty().append(response.page);
                        },
                        error: function() {
                            //   alert('no');
                        }
                    });
                }, 999);
            });


        });
    </script>

@endpush
