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
                    <h1>SMS <small>Draft</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SMS</a></li>
                        <li class="breadcrumb-item active">Draft</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="container">


                @include('alerts.alerts')

                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-default">
                            <div class="card-header">
                              <h3 class="card-title">Quick SMS</h3>

                              {{-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div> --}}
                            </div>
                        </div>
                            <?php $bulks = Auth::user()->smsDraftBulks();
                            // dd($bulks->count());
                            ?>
                            @if ($bulks->count())
                                @foreach ($bulks as $bulk)
                            <div class="card card-primary">
                                <a class="sms-draft-bulk pull-left w3-btn btn-xs w3-round w3-border w3-white w3-border-blue"
                                href="{{ route('admin.quickSmsDraftSend', $bulk) }}">Send SMS</a>

                                <div class="card-body">
                                    <small>Number of Contacts {{ $bulk->contacts->count() }}</small>
                                    <div style="background-color: #eee;padding:5px; ">{{ $bulk->message }}
                                </div>
                                </a>
                            </div>
                        </div>
                            @endforeach
                            @endif


                    </div>

                    <div class="col-md-9">
                        @include('alerts')

                        <div class="sms-draft">
                        <div class="card card-default">
                            <div class="card-header">
                              <h3 class="card-title">Quick SMS</h3>

                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="{{ route('admin.quickSmsDraftSave') }}">

                                    {{ csrf_field() }}                                    <div class="card-body">
                                      <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><small>Recipients <br>(Separate by Comma)</small></label>
                                        <div class="col-sm-9">

                                            <textarea class="form-control" name="recipients"
                                            placeholder="Type Recipients With Comma">{{ old('recipients') }}</textarea>
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
                                            <input type="text" value="{{ old('sender_number') ?: 'VIP Media' }}"
                                            name="sender_number" class="form-control" id="sender_number"
                                            placeholder="Sender Number">
                                        <span>Your Masking Number (Sender Number)</span><br>
                                        @if ($errors->has('sender_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sender_number') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                      </div> --}}

                                      <div class="form-group row">
                                        <label><input type="checkbox" name="masking"> Masking (Vip M Media) </label>
                                        @if ($errors->has('masking'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('masking') }}</strong>
                                            </span>
                                        @endif                                        <div class="col-sm-10">

                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label"><small>Message <br>(160 characters)</small></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" name="message"
                                                placeholder="Message">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>

                                    </div>
                                    <div class="text-right">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="reset" class="btn btn-default">Cancel</button>

                                            <button type="submit" class="btn btn-primary pull-right">Save as Draft</button>

                                        </div>                                    </div>

                                    <!-- /.card-footer -->
                                  </form>
                              <!-- /.row -->
                            </div>
                        </div>
                    </div>

                    </div>
                </div>




    </section>



@endsection
@push('js')
<script>

	$(function(){
		$(document).on("click", "a.sms-draft-bulk", function(e){
	    e.preventDefault();
        // alert(1);

	    var that = $( this );
	    var url = that.attr("href");

	    // alert(url);

	    $.ajax({
	      url: url,
	      type: 'GET',
	      cache: false,
	      dataType: 'json',
	      success: function(response)
	      {
	        $('.sms-draft').empty().append(response.page);
	      },
	      error: function(){}
	    });
  	});
	});


		$(function(){
		$(document).on("click", "a.quick-sms-file-delete", function(e){
	    e.preventDefault();

	    var that = $( this );
	    var url = that.attr("href");

	    // alert(url);

	    $.ajax({
	      url: url,
	      type: 'GET',
	      cache: false,
	      dataType: 'json',
	      success: function(response)
	      {
	      	if(response.success && response.bulk_deleted)
	      	{
	      		that.closest('tr').remove();
	      		$(".quick-sms-file-" + response.bulk_id).remove();
	      	}
	      	else if(response.success)
	      	{
	      		that.closest('tr').remove();
	      	}

	      },
	      error: function(){}
	    });
  	});
	});

</script>
@endpush
