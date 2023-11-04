<form class="form-horizontal" role="form" method="post" action="{{ route('admin.pendingPaymentUpdatePost', $payment) }}">

    {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-6">

            <div class="form-group">
                <label class="control-label col-sm-3" for="email">User:</label>
                <div class="col-sm-9">
                    <p class="form-control-static">{{ $payment->user->email }}</p>
                </div>
            </div>

            <div class="form-group form-group-sm {{ $errors->has('package') ? ' has-error' : '' }}">
                <label class="control-label col-sm-3" for="package">Package:</label>

                <div class="col-sm-9">
                    <select class="form-control form-group-sm select2" id="package" name="package">
                        <option value="">Select Package </option>
                        @if (old('package'))
                            <option selected>{{ old('package') }}</option>
                        @else
                            <option selected value="{{ $payment->membership_package_id }}">
                                {{ $payment->membership_package_id }} ({{ $payment->package_title }}, Duration
                                {{ $payment->package_duration }} Days, {{ $payment->package_currency }}
                                {{ $payment->package_amount }})</option>
                        @endif
                        {{-- packages --}}
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->id }} ({{ $package->package_title }},
                                Duration {{ $package->package_duration }} Days, {{ $package->package_currency }}
                                {{ $package->package_amount }})</option>
                        @endforeach
                    </select>
                    @if ($errors->has('package'))
                        <span class="help-block">
                            <strong>{{ $errors->first('package') }}</strong>
                        </span>
                    @endif
                </div>


            </div>



            <div class="form-group form-group-sm {{ $errors->has('paid_amount') ? ' has-error' : '' }}">
                <label class="control-label col-sm-3" for="paid_amount">Paid Amount:</label>

                <div class="col-sm-9">

                    <input type="number" id="paid_amount" class="form-control" name="paid_amount"
                        value="{{ old('paid_amount') ?: $payment->paid_amount }}" placeholder="Paid Amount" step="1" />

                </div>


                @if ($errors->has('paid_amount'))

                    <span class="help-block">
                        <strong>{{ $errors->first('paid_amount') }}</strong>
                    </span>

                @endif
            </div>


            <div class="form-group form-group-sm {{ $errors->has('paid_currency') ? ' has-error' : '' }}">
                <label class="control-label col-sm-3" for="paid_currency">Currency:</label>

                <div class="col-sm-9">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="paid_currency" id="exampleRadios1"
                                value="BDT" {{ $payment->paid_currency == 'BDT' ? 'checked' : '' }} /> BDT
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="paid_currency" id="exampleRadios2"
                                value="USD" {{ $payment->paid_currency == 'USD' ? 'checked' : '' }} /> USD
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>



                </div>


                @if ($errors->has('paid_currency'))

                    <span class="help-block">
                        <strong>{{ $errors->first('paid_currency') }}</strong>
                    </span>

                @endif
            </div>


        </div>
        <div class="col-sm-6">


            <div class="form-group form-group-sm {{ $errors->has('payment_method') ? ' has-error' : '' }}">
                <label class="control-label col-sm-3" for="payment_method">Payment Method:</label>

                <div class="col-sm-9">
                    <select class="form-control form-group-sm select2" id="payment_method" name="payment_method">
                        <option value="">Select Payment Method </option>
                        @if (old('payment_method'))
                            <option selected>{{ old('payment_method') }}</option>
                        @else
                            <option selected>{{ $payment->payment_method }}</option>
                        @endif

                        <option>bKash</option>
                        <option>Rocket</option>
                        <option>Bank</option>
                        <option>Money Gram</option>
                        <option>Western Union</option>

                    </select>
                </div>


                @if ($errors->has('payment_method'))
                    <span class="help-block">
                        <strong>{{ $errors->first('payment_method') }}</strong>
                    </span>
                @endif
            </div>



            <div class="form-group {{ $errors->has('payment_details') ? ' has-error' : '' }}">
                <label class="control-label col-sm-3" for="payment_details">Payment Details:</label>

                <div class="col-sm-9">
                    <textarea class="form-control" name="payment_details" id="payment_details" cols="30" rows="3"
                        placeholder="Payment Details with transaction information" />{{ old('payment_details') ?: $payment->payment_details }}</textarea>
                </div>


                @if ($errors->has('payment_details'))

                    <span class="help-block">
                        <strong>{{ $errors->first('payment_details') }}</strong>
                    </span>

                @endif
            </div>


            <div class="form-group form-group-sm {{ $errors->has('admin_comment') ? ' has-error' : '' }}">
                <label class="control-label col-sm-3" for="admin_comment">Admin Comment:</label>

                <div class="col-sm-9">

                    <input type="text" id="admin_comment" class="form-control" name="admin_comment"
                        value="{{ old('admin_comment') ?: $payment->admin_comment }}"
                        placeholder="Comment Submitted by Admin" step="1" />

                </div>


                @if ($errors->has('admin_comment'))

                    <span class="help-block">
                        <strong>{{ $errors->first('admin_comment') }}</strong>
                    </span>

                @endif


            </div>

            <p>(New Package Duration (days) will be added with previous duration)</p>




            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary pull-right">Update & Validate</button>

                <a class="btn btn-warning" onclick="return confirm('Do you really want to delete this payment info?');"
                    href="{{ route('admin.paymentDelete', $payment) }}">Delete</a>

            </div>


        </div>
    </div>





</form>
