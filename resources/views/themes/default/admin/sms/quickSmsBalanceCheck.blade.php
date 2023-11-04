@extends('admin.master.dashboardmaster')
@push('css')

    <style type="text/css">
        .select2-dropdown .select2-search__field:focus,
        .select2-search--inline .select2-search__field:focus {
            outline: none !important;
            border: none !important;
        }

    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Number of SMS <small>Remaining</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Number of SMS</a></li>
                        <li class="breadcrumb-item active">Remaining</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="container">
        <div class="row d-flex justify-content-center">


            <div class="col-md-9">
                 @include('alerts.alerts')



                 <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Number of SMS Remaining</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h3>{{ $balance }}</h3>
                    </div>
                 </div>


            </div>

        </div>
    </section>



@endsection
