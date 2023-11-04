@extends('admin.master.dashboardmaster')
@section('title', "Media All")

@push('css')
 
@endpush

@section('content')
  @include('admin.media.parts.mediaAllPart')
@endsection



@push('js')

<script>
  
  $(function(){

$(document).on('click', '.copyboard', function(e) {
  e.preventDefault();


  $(".copyboard").text('Copy to Clipboard');

  $(this).text('Coppied!');
  var copyText = $(this).attr('data-text');

  var textarea = document.createElement("textarea");
  textarea.textContent = copyText;
  textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in MS Edge.
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand("copy"); 

  document.body.removeChild(textarea);
});

  });
</script>
 
@endpush


