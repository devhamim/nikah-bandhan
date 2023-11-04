@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Dhaka Metro News') --}}

@push('css') 
@endpush

@section('content')
@include('welcome.parts.postDivision')
@endsection


@push('js')

<script>
	$(document).ready(function() {
  $(document).on("change", ".div-select", function(e){
    e.preventDefault();

    var that = $( this );
    var q = that.val();
    var url = that.attr("data-url");
    var urls = url+'?q='+q;

    // alert(urls);
    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
       	if(response.success)
       	{
       		$(".dist-select").empty().append($('<option>',{
       			value: '',
       			text: 'জেলা'
       		}));

       		$(".thana-select").empty().append($('<option>',{
       			value: '',
       			text: 'উপজেলা'
       		}));

       		$.each(response.datas, function (i, item) {
					    $('.dist-select').append($('<option>', { 
					        value: item.id,
					        text : item.title 
					    }));
					});
       	}
      },
      error: function(){}
    });
  });
	});
</script>

<script>
	$(document).ready(function() {
  $(document).on("change", ".dist-select", function(e){
    e.preventDefault();

    var that = $( this );
    var q = that.val();
    var url = that.attr("data-url");
    var urls = url+'?q='+q;

    // alert(urls);
    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
       	if(response.success)
       	{
       		$(".thana-select").empty().append($('<option>',{
       			value: '',
       			text: 'উপজেলা'
       		}));

       		$.each(response.datas, function (i, item) {
					    $('.thana-select').append($('<option>', { 
					        value: item.id,
					        text : item.title 
					    }));
					});
       	}
      },
      error: function(){}
    });
  });
	});
</script>
@endpush
