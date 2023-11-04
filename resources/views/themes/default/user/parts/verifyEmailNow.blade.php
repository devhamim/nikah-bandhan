@auth
    <?php $u = Auth::user();
    $me = Auth::user();
    ?>

@endauth


{{-- @if (Session::has('error'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('error') }}</p>
                            </div>
                            @endif


							@if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            @endif --}}

<div class="box box-widget ">
    <div class="box-header with-border">
        <h3 class="box-title" style="font-size:15px;text-align: justify;">
            We have sent an e-mail with the 06 digit verification code to <span
                style="color: #00a65a;font-size: 14px;">{{ $u->email }}</span>
        </h3>
    </div>


    <div class="box-body" style="padding-top:0px !important;min-height: 290px;">
        <div class="row text-center" style="padding-top:15px">
            <div class="col-md-12 ">
                <div class="box-header with-border" style=" border: 1px solid #d3d3d8;">
                    <form role="form" method="POST" action="{{ route('user.verifyEmailNowPost') }}">
                        {{ csrf_field() }}
                        <div style="margin-bottom: 0px;"
                            class="form-group{{ $errors->has('verification_code') ? ' has-error' : '' }}">


                            <div class="col-md-6 col-xs-6 ">
                                <p style="padding-top:3px;" for="verification_code" class="control-label">Verification
                                    Code</p>
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <input id="verification_code" type="number" class="form-control" placeholder="134021"
                                    name="verification_code" value="{{ old('verification_code') }}">

                                @if ($errors->has('verification_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('verification_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4 col-xs-6">

                            </div>
                            <div class="col-md-5 col-xs-6" style="padding-top:5px;">
                                <button type="submit" class="w3-button w3-round bg-purple w3-small w3-hover-green">
                                    <i class="fa fa-check" style="padding-right:3px;" aria-hidden="true"></i> Submit
                                    Code
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>


        <div class="row" style="padding-top:15px">
            <div class="col-md-12">
                <div class="row box-header with-border" style="margin:0px; border: 1px solid #d3d3d8;">


                    <div class="col-md-12" style="padding:0px">
                        <h3 class="box-title" style="font-size:15px;text-align:justify;">
                            N.B. If you don't get any code in e-mail, please recheck e-mail address (<span
                                style="color: red;font-size: 15px;">{{ $u->email }}</span>) spelling whether you put
                            right or wrong.
                        </h3>
                    </div>
                    <div class="col-md-4 col-xs-6" style="padding-left: 0px;">
                    </div>
                    <div class="col-md-6 col-xs-6 ">
                        <p><a href="{{ route('user.updateBasicInfo') }}"
                                class="w3-button w3-round bg-purple w3-small w3-hover-green"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit E-mail</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>


    </div>

</div>
