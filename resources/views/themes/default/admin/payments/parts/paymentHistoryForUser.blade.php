
    <section class="content-header">
      <h1>
         Payment History for
        <small>{{$user->username}} ({{$user->email}})</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Payment History for</a></li>
        <li class="active">{{$user->username}} ({{$user->email}})</li>
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
              <h3 class="box-title"><i class="fa fa-th"></i> Payment History for {{$user->username}} ({{$user->email}})</h3>
            </div>
    </div>
 

          @foreach($payments as $payment)
 
   
              <div class="panel panel-default">
                <div class="panel-body">
                  @include('admin.payments.includes.paymentDetails')
                </div>
              </div>
 
            
          @endforeach
 
 
        <div class=" text-center">
              {{$payments->render()}}
            </div> 
 
        
      </div>        
      </div>
      <!-- /.row -->

      

    </section>