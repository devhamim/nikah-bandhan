@extends('admin.master.dashboardmaster')
@section('title', 'Dhaka Metro News')

@push('css')
@endpush

@section('content')
  @include('blogAdmin.divisions.parts.thanaAll')
@endsection


@push('js')
<script>
	$(function(){
		$(document).on('click', '.btn-cat-edit', function(e){
    e.preventDefault();
    var that = $(this),
    url = that.attr('href'),
    table = that.closest('.table-cat');
        // alert(url);
        $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
        })
        .done(function(response) {
         table.empty().append(response);
       })
        .fail(function() {
          alert("error");
        });
      });

    $(document).on('submit','.form-cat-update',function(s){
    s.preventDefault();
    var form = $(this),
    url = form.attr('action'),
    type = form.attr('method'),
    alldata = new FormData( this ),
    table = form.closest('table');
    $.ajax({
      url: url,
      type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,

      }).done(function(response) {
        table.empty().append(response);
      })
      .fail(function() {
        alert("error");
      });
    });


    $(document).on('click', '.btn-cat-delete', function(e){
    e.preventDefault();
    var that = $(this),
    url = that.attr('href'),
    table = that.closest('.table-cat');
        // alert(url);
        $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
        })
        .done(function(response) {
         if(response.success)
         {
          table.remove();
         }
       })
        .fail(function() {
          alert("error");
        });
      });
	});
</script>
@endpush
