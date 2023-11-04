@extends('admin.master.dashboardmaster')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home <small>Email Numbers All </small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Email Numbers All </li>
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
                            <div class="box-tools text-right">
                                <a class="btn btn-primary btn-sm" href="" onclick="return window.print();"> <i class="fa fa-print"></i> Print</a>
                                <button class="btn btn-info btn-sm"
                                onclick="exportTableToCSV('users.csv')">Export To CSV</button>
                              </div>
                              {{-- <a  class="btn btn-info btn-sm" href="{{route('export')}}">Export To Excel</a> --}}
                            <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="pagination text-center">
                                {{ $users->links('pagination::bootstrap-4') }}

                            </div>
                            <div class="table-responsive">

                                <table class="table table-bordered table-sm table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>

                                        <th>Email</th>

                                    </tr>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>

                                            <td>{{ $user->email }}</td>


                                        </tr>
                                    @endforeach
                                </table>



                            </div>
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


<script>
    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {
            type: "text/csv"
        });

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Hide download link
        downloadLink.style.display = "none";

        // Add the link to DOM
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
    }

    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");
        // alert(rows);

        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++)
                row.push("\"" + cols[j].innerText + "\"");

            csv.push(row.join(","));
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }
</script>

@endpush
