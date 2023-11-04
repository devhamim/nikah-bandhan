@extends('admin.master.dashboardmaster')
@push('css')
<style>
    dl {
        display: grid;
        grid-template-columns: 30% 70%;
        grid-column-gap: 20px;
    }

    dt {
        text-align: right;
    }
</style>


@endpush
@section('content')




<!-- Main content -->
<section class="content">




    <!-- Info cardes -->
    <div class="row">
        <div class="col-md-12">

            @include('alerts.alerts')

            <div class="card card-widget">
                <div class="card-header with-border">
                    <h3 class="card-title"><i class="fa fa-th"></i> All Paid Payments</h3>
                </div>
            </div>
            @foreach($payments as $payment)
            <div class="card card-default bg-white my-4 py-2">
                <div class="card-body">
                    <dl>
                        <dt>User</dt>
                        <dd>{{$payment->user->name}} ({{$payment->user->email}})</dd>
                        <dt>Status</dt>
                        <dd>{{$payment->status}}</dd>
                        <dt>Package</dt>
                        <dd>{{ $payment->membership_package_id }} ({{$payment->package_title}}, Duration {{$payment->package_duration}} Days, {{$payment->package_currency}} {{$payment->package_amount}})</dd>
                        <dt>Paid Amount</dt>
                        <dd>{{$payment->paid_currency}} {{$payment->paid_amount}}</dd>
                        <dt>Payment Method</dt>
                        <dd>{{$payment->payment_method}}</dd>
                        <dt>Payment Details</dt>
                        <dd>{{$payment->payment_details}}</dd>
                        <dt>Admin Comment</dt>
                        <dd>{{$payment->admin_comment}}</dd>
                        <dt>Added By</dt>
                        <dd>{{$payment->addedBy->email}}</dd>
                        <dt>Payment Update Time</dt>
                        <dd>{{$payment->created_at}}</dd>
                   </dl>
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

@endsection
