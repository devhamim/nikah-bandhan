@extends('user.master.usermaster')
@push('css')
<link rel="stylesheet" href="{{asset('alt3/dist/css/adminlte.min.css')}}">
@endpush
@section('content')
<div class="container">
    <h4 class="text-center py-3">Membership Packages</h4>
    <section class="content">
        <div class="container-fluid">
            @foreach($packages->chunk(4) as $package4)
            <div class="row">
                @foreach($package4 as $package)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-title text-dark" href="{{ route('admin.membershipPackageEdit',$package) }}">
                                <h3 class="card-title">{{$package->package_title}}</h3>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="panel panel-default" style="margin-bottom: 0px;">
                                <div class="panel-body" style="padding: 5px;">

                                    {{ $package->package_description }}
                                    <hr style="margin: 3px;">
                                    <div class="w3-large">
                                        <b>Price: </b> {{ $package->package_amount }} {{ $package->package_currency }}
                                        <br>
                                        <b>Duration: </b> {{ $package->package_duration }} Days <br>
                                        <b>Proposal Daily: </b> {{ $package->proposal_send_daily_limit }} <br>

                                        <b>Proposal Total: </b> {{ $package->proposal_send_total_limit }}
                                        <br>
                                        <b>Contact View: </b> {{ $package->contact_view_limit }}

                                        @if($package->image_name)
                                        <div class="pull-right">
                                            <img class="img-circle" width="40"
                                                src="{{ asset('img/package/' . $package->image_name) }}" alt="Package">
                                        </div>
                                        @endif

                                    </div>



                                </div>
                                <div class="text-center">
                                    <a class="btn btn-success" href="{{route('payNow',$package->id)}}">Pay Now</a>
                                </div>

                                <!-- <button class="your-button-class" id="sslczPayBtn"
                                    token="if you have any token validation"
                                    postdata="your javascript arrays or objects which requires in backend"
                                    order="If you already have the transaction generated for current order"
                                    endpoint="/pay-via-ajax"> Pay Now
                                </button> -->
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
                @endforeach


            </div>
            @endforeach


        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection