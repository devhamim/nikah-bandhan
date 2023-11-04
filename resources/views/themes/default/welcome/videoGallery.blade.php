@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Dhaka Metro News') --}}

@push('css') 

@endpush

@section('content')
@include('welcome.parts.videoGallery')
@endsection

@push('js')
<script>
function myFunction() {
    var x = document.getElementById("topmenu");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}


$(document).ready(function() {
$(".btn-group-custom .btn").click(function () {
    $(".btn-group-custom .btn").removeClass("btn-success").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-success");   
});
});

</script>


@endpush
