@extends('user.master.usermaster')
@push('css')
    <style>
        html .featured-box-primary .box-content {
            border-top-color: #f05b62;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <div class="row justify-content-md-center">
                    <div class="col-md-9 py-5">
                        <div class="featured-box featured-box-primary text-left mt-0">

                            <div class="box-content">
                                <div class="text-center">
                                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-1">Log In
                                    </h4>
                                    <img src="{{ asset('images/icon.jpeg') }}" alt="" height="60">
                                </div>
                                <form action="{{ route('login.custom') }}" id="frmSignIn" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="font-weight-bold text-dark text-2">E-mail Address</label>
                                            <input type="text" value="" name="email"
                                                class="form-control form-control-lg" required="">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">

                                            <label class="font-weight-bold text-dark text-2">Password</label>
                                            <input type="password" value="" name="password"
                                                class="form-control form-control-lg" required="">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                                <label class="custom-control-label text-2" for="rememberme">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="submit" value="Login"
                                                class="btn btn-primary btn-modern float-right"
                                                data-loading-text="Loading...">
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
@endsection
