@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Dhaka Metro News') --}}

@push('css') 
<link rel="stylesheet" type="text/css" href="{{asset('assets/slideshow/pgwslideshow.css')}}" media="screen"/>

@endpush

@section('content')
@include('welcome.parts.gallery')
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

 

<script type="text/javascript" src="{{asset('assets/slideshow/pgwslideshow.min.js')}}"></script>

<script>
	$(document).ready(function() {
    	$('.pgwSlideshow').pgwSlideshow();
	});
</script>
 
@endpush
