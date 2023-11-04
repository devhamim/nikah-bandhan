
@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')
<section class="content-header">
    <h1>
      Invoice
      <small>All</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Invoice</a></li>
      <li class="active">All</li>
    </ol>
  </section>
  <section class="content"> 




    <!-- Info boxes -->
          <div class="row">
          <div class="col-md-12">
    
          @include('alerts.alerts')
    
            <div class="box box-widget">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> All Invoice</h3>
                </div>
        </div>




  @foreach($payments as $payment)

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="head-clip-pdf d-flex align-items-center" style="height: 200px">
         <div class="" style="width: 80%; margin:0 auto">
          <img
          src="{{ asset($websiteParameter->logo ? 'storage/logo/' . $websiteParameter->logo : 'img/logo.jpg') }}"
          alt="{{ env('APP_NAME_BIG') }}" class="img-fluid" style="width: 300px">
  
         </div>
        </div>
      </div>
    </div>
  
    <div class="row py-3">
      <div class="col">
        <div style="width: 80%; margin:0 auto">
          <div class="row">
            <div class="col-4">
              <p>Invoice No:</p>
              <p>Date:</p>
            </div>
            <div class="col-5"></div>
            <div class="col-3 text-center">
              <p style="font-size: 48px; font-weight:bold; color:red">Invoice</p>
              <p>Name: {{auth()->user()->name}}</p>
              {{-- <p>Street:</p> --}}
            </div>
          </div>
          
  
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div style="width: 80%; margin:0 auto">       
    <table class="table table-striped">
      <thead style="background-color: red">
        <tr>
          <th style="width: 40%">Package</th>
          <th>Status</th>
          <th>Paid Amount</th>
          <th>Payment Method</th>
          <th>Payment Time:</th>
        </tr>
      </thead>
      <tbody>
       
        <tr>
          <td> {{ $payment->membership_package_id }} ({{$payment->package_title}}, Duration {{$payment->package_duration}} Days, {{$payment->package_currency}} {{$payment->package_amount}})</td>
          <td>{{$payment->status}}</td>
          <td> {{$payment->paid_currency}} {{$payment->paid_amount}}</td>
          <td>{{$payment->payment_method}} </td>
          <td>{{$payment->created_at}}</td>
        </tr>
        
      
       
      </tbody>
    </table>
  
    </div>
  </div>
  
  <div class="container pt-3">
    <div class="row">
      <div class="col-9">
        <div class="footer-clip-path d-flex align-items-center" style="height: 150px">
         <div class="" style="width: 50%; margin:0 auto">
        <div class="row">
          <div class="col-4">
          <small class="font-weight-bold" style="color: #fff">  +{{ bdMobile(env('CONTACT_MOBILE1')) }} <br>
            www.bridegroombd.com <br>
            info@bridegroombd.com</small>
          </div>
          
        </div>
        <div class="row">
          <div class="col-4"></div>
          <div class="col-8">
            <small class="font-weight-bold" style="color: #fff">24/1 Chamelibag, Shan Tower(4th Floor) Shantinagar mor
              Dhaka-1217.</small>
                      </div>
        </div>
      
         </div>
        </div>
      </div>
      <div class="col-3">
        <img
        src="{{ asset('img/pdfoot1.jpg') }}"
         class="img-fluid pt-5 mt-2" style="height: 130px">
      </div>
    </div>
  </div>

  @endforeach

  <div class=" text-center">
    {{$payments->render()}}
  </div>   

          </div>
          </div>
  </section>
  @endsection
