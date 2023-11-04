@extends('user.master.usermaster')
@php
$me=auth()->user();
@endphp
@push('css')
<style>
    .profile-image-outer-container .profile-image-inner-container {
        border-radius: 50% !important;
        width: 80px !important;
        height: 80px;
        padding: 5px;
    }
</style>
@endpush
@section('content')
<br>
<div class="container py-4" style="background-color: #fff;">
    <div class="row">
        <div class="col-lg-3">
            @include('user.parts.leftsidebar')
        </div>
        <div class="col-md-9">


                <div class="row align-items-center py-2 mr-3 border border-danger">
                    <div class="col-sm-4">

                        <div class="pr-3 pr-sm-5 pb-3 pb-sm-0 border-right-light">
                           <img src="{{asset('img/vip-user.png')}}" class="img-fluid" alt="">
                        </div>

                    </div>
                    <div class="col-sm-4 text-center">
                            <h6>Proposal from <strong> #######</strong> To <strong>#######</strong></h6>
                            <span>Massage</span> <br>
                            ------>> <br>
                            <a href="" class="btn btn-danger">Delete</a>
                    </div>
                    <div class="col-sm-4">

                        <div class="pr-3 pr-sm-5 pb-3 pb-sm-0 border-left-light">
                           <img src="{{asset('img/vip-user.png')}}" class="img-fluid" alt="">
                        </div>

                    </div>
                </div>






        </div>

    </div>
</div>
<br>
@endsection
