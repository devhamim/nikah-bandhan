 <div class="p-2">
    <section class="content-header">
      <h1>
        Paid Payments
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Paid Payments</a></li>
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
              <h3 class="box-title"><i class="fa fa-th"></i> All Paid Payments</h3>
            </div>
        </div>
        <div class="p-4">
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">user Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Package</th>
                    <th scope="col">Paid Amount</th>
                    <th scope="col">Payment Mehod</th>
                    <th scope="col">Payment Details</th>
                    <th scope="col">Admin Comments</th>
                    <th scope="col">Added By</th>
                    <th scope="col">Payment Update Time</th>
                  </tr>
                </thead>
                <tbody>







                         {{-- <dt>User</dt>
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
     <dd>{{$payment->created_at}}</dd> --}}
            @foreach($payments as $payment)
                  <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$payment->user->name}}</td>
                    <td>{{$payment->user->email}}</td>
                    <td>{{$payment->status}}</td>
                    <td>{{ $payment->membership_package_id }} ({{$payment->package_title}}, Duration {{$payment->package_duration}} Days, {{$payment->package_currency}} {{$payment->package_amount}})</td>
                    <td>{{$payment->paid_currency}} {{$payment->paid_amount}}</td>
                    <td>{{$payment->payment_method}}</td>
                    <td>{{$payment->payment_details}}</td>
                    <td>{{$payment->admin_comment}}</td>
                    <td>{{$payment->addedBy->email}}</td>
                    <td>{{$payment->created_at}}</td>
                  </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
        <div class=" text-center">
              {{$payments->render()}}
            </div>
      </div>
      </div>
      <!-- /.row -->



    </section>
</div>
