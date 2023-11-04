<div class="px-4">
    <section class="content-header">
        <h1>
            Add New
            <small>Payment</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Add New</a></li>
            <li class="active">Payment</li>
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
                        <h3 class="box-title"><i class="fa fa-th"></i> Add New payment</h3>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('admin.payments.includes.forms.paymentAddNewForm')
                    </div>
                </div>





            </div>
        </div>
        <!-- /.row -->



    </section>
</div>
