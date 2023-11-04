@extends('admin.master.dashboardmaster')
@push('css')

    <style type="text/css">
        .select2-dropdown .select2-search__field:focus,
        .select2-search--inline .select2-search__field:focus {
            outline: none !important;
            border: none !important;
        }

    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quick <small>SMS</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item active">Current Balance:<span class="text-danger"><b>({{$balanceData}} Tk)</b> </span></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="container">
       <div class="row d-flex justify-content-center">
           <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-body">
                    @include('alerts.alerts')

                    <div class="row">


                        <div class="col-md-12">
                            <div class="box box-widget">
                              <div class="row">
                                  <div class="col-md-9">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Quick SMS</h3>
                                      </div>
                                      <div class="box-body">

                                          <form class="form-horizontal" method="post"  action="{{route('admin.quickSmsSend')}}">

                                              {{csrf_field()}}
                                              <div class="card-body">
                                                <div class="form-group row">
                                                  <label for="inputEmail3" class="col-sm-3 col-form-label"><small>Recipients <br>(Separate by Comma)</small></label>
                                                  <div class="col-sm-9">
                                                      <textarea class="form-control" name="recipients" placeholder="Type Recipients With Comma">{{old('recipients')}}</textarea>
                                                      @if ($errors->has('recipients'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('recipients') }}</strong>
                                                        </span>
                                                      @endif
                                                  </div>
                                                </div>
                                                {{-- <div class="form-group row">
                                                  <label for="inputPassword3" class="col-sm-3 col-form-label"><small>Sender Number <br> (eg. 01680000000)</small></label>
                                                  <div class="col-sm-9">
                                                      <input type="text" value="{{ old('sender_number') ?: 'Vip M Media'}}" name="sender_number" class="form-control" id="sender_number" placeholder="Sender Number">
                                                      <span>Your Masking Number (Sender Number)</span><br>
                                                      @if ($errors->has('sender_number'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('sender_number') }}</strong>
                                                        </span>
                                                    @endif
                                                  </div>
                                                </div> --}}

                                                <div class="form-group row">
                                                  <div class="col-sm-10">
                                                     <small>  <label><input type="checkbox" name="masking" >  Masking (Vip M Media) </label>
                                                      @if ($errors->has('masking'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('masking') }}</strong>
                                                      </span>
                                                  @endif</small>
                                                  </div>
                                                </div>

                                                 <div class="form-group row">
                                                  <label for="inputPassword3" class="col-sm-3 col-form-label"><small>Message <br>(160 characters)</small></label>

                                                      <div class="col-sm-9">
                                                        <textarea class="form-control" rows="5" name="message" placeholder="Message">{{old('message')}}</textarea>
                                                        @if ($errors->has('message'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('message') }}</strong>
                                                          </span>
                                                      @endif

                                                  </div>

                                              </div>
                                              <!-- /.card-body -->
                                              <div class="card-footer text-right">
                                                  <button type="reset" class="btn btn-default">Cancel</button>

                                                  <button type="submit" class="btn btn-primary pull-right">Send</button>
                                              </div>
                                              <!-- /.card-footer -->
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
       </div>
    </section>



@endsection
