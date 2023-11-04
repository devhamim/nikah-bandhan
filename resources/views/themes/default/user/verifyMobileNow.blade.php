@extends('user.master.usermaster')
@php
$me=auth()->user();
@endphp
@push('css')
<style>

</style>
@endpush
@section('content')
<br>
<div class="container py-4 bg-white" >
    <div class="row">
        <div class="col-lg-3">
            @include('user.parts.leftsidebar')
        </div>
        <div class="col-md-9">

            @include('alerts.alerts')



            <div class="row justify-content-md-center">
                <div class="col-md-9">
                    <div class="featured-box featured-box-primary text-left mt-0">
                        <div class="box-content">
                            <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-0">Verify Your Phone Number</h4>
                            <p class="text-2 opacity-7">	We have sent SMS with 04 digit verification code to <span style="color: #00a65a;font-size: 14px;"
                                >{{ $me->mobile }}</span> </p>
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('user.verifyMobileNowPost') }}">
                                    {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label class="font-weight-bold text-dark text-2">Submit Code</label>
                                        <input type="text" value="" name="verification_code" class="form-control form-control-lg" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
<br>
@endsection
