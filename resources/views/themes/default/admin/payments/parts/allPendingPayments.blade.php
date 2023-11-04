<section class="content-header">
    <h1>
        Pending Payments
        <small>All</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pending Payments</a></li>
        <li class="active">All</li>
    </ol>
</section>



<!-- Main content -->
<section class="content">




    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12">

            @include('alerts.alerts')

            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th"></i> All Pending Payments</h3>
                </div>
            </div>
            @foreach ($payments as $payment)
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('admin.payments.includes.forms.paymentEditForm')
                    </div>
                </div>
            @endforeach
            <div class=" text-center">
                {{ $payments->render() }}
            </div>


        </div>
    </div>
    <!-- /.row -->



</section>
