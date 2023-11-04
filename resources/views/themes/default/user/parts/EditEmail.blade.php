@auth
    <?php
    $me = Auth::user();
    ?>
@endauth
@extends('welcome.layouts.welcomeMaster')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.min.css') }}">
@endpush

@section('content')
    <div class="main main-raiseds " style="z-index: 400;margin-top: -20px;">
        <div class="section section-basic" style="min-height: 900px;">

            <div class="container">

                <div class="row">
                    <div class="col-sm-3">
                        <div class="w3-card-2 mb-2">

                            @include('user.includes.cards.profileCompletion')
                        </div>
                        @if (Browser::isDesktop())
                            @include('user.includes.others.myLeftMenu')


                        @endif

                    </div>

                    <div class="col-sm-9">
                        <div class="box-body" style="padding-top:0px !important;min-height: 290px;">
                            <div class="row text-center" style="padding-top:15px">
                                <div class="col-md-12 ">
                                    <div class="box-header with-border" style=" border: 1px solid #d3d3d8;">
                                        <form role="form" method="POST" action="{{ route('user.updateAccount') }}">
                                            {{ csrf_field() }}
                                            <div style="margin-bottom: 0px;"
                                                class="form-group{{ $errors->has('verification_code') ? ' has-error' : '' }}">


                                                <div class="col-md-6 col-xs-6 ">
                                                    <p style="padding-top:3px;" for="verification_code"
                                                        class="control-label">New Email</p>
                                                </div>
                                                <div class="col-md-5 col-xs-6">
                                                    <input id="verification_code" type="email" class="form-control"
                                                        placeholder="eg@example.com" name="email"
                                                        value="{{ old('verification_code') }}">

                                                    @if ($errors->has('verification_code'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('verification_code') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 col-xs-6">

                                                </div>
                                                <div class="col-md-5 col-xs-6" style="padding-top:5px;">
                                                    <button type="submit"
                                                        class="w3-button w3-round bg-purple w3-small w3-hover-green">
                                                        <i class="fa fa-check" style="padding-right:3px;"
                                                            aria-hidden="true"></i> Submite
                                                    </button>
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
        </div>
    </div>


@endsection

@push('js')
@endpush
