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
                    <h1>SMS <small>Analytics</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SMS</a></li>
                        <li class="breadcrumb-item active">Analytics</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="container">
        <div class="card card-primary">
            <div class="card-body">
                @include('alerts.alerts')
                <h3>Quick SMS Bulk</h3>

            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?php $bulks = Auth::user()->quickSmsBulks(); ?>
                @if($bulks->count())
                  @foreach($bulks as $bulk)
                <div class="card card-primary">
                    <a class="quick-sms-bulk" href="{{route('admin.quickSmsBulkItems',$bulk)}}" style="color: #333;">
                    <div class="card-body">
                        <small>  From {{$bulk->sent_from}}, Number of Contacts {{$bulk->contacts->count()}}</small>
                        <div style="background-color: #eee;padding:5px; ">{{$bulk->message}}</div>
                    </div>
                    </a>
                </div>
                @endforeach
                @endif


            </div>

            <div class="col-md-9">
                <div class="quick-sms-items">


                </div>
            </div>
        </div>
    </section>



@endsection
@push('js')

<script>
	$(function(){

		$(document).on("click", ".pagination li a", function(e){
    e.preventDefault();

    var that = $( this );
    var url = that.attr("href");
    var box = that.closest('.box');

    // alert(url);

    $.ajax({
      url: url,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        box.empty().append(response.page);
      },
      error: function(){}
    });
  });
	});

	$(function(){

		$(document).on("click", "a.business-sms-bulk", function(e){
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
              alert('success');
	        // $('.business-sms-items').empty().append(response.page);
	      },
	      error: function(){
              alert('fail');
          }
	    });
  	});
	});


	$(function(){

		$(document).on("click", "a.quick-sms-bulk", function(e){
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
            //   alert(1);

	        $('.quick-sms-items').empty().append(response.page);
	      },
	      error: function(){}
	    });
  	});
	});

	$(function(){

		$(document).on("click", "a.uploaded-sms-bulk", function(e){
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
	        $('.uploaded-sms-items').empty().append(response.page);
	      },
	      error: function(){}
	    });
  	});
	});

	$(function(){
		$(document).on("click", "a.business-sms-file-delete", function(e){
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
	      		$(".business-sms-file-" + response.bulk_id).remove();
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

	$(function(){
		$(document).on("click", "a.uploaded-contact-file-delete", function(e){
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
	      		$(".draft-bulk-" + response.bulk_id).remove();
	      	}
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
