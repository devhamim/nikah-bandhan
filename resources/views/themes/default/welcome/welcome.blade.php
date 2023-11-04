
@extends('welcome.layouts.welcomeMaster')

@push('css')

    @auth
        {{-- <link href="{{asset('css/user.css')}}" rel="stylesheet" /> --}}


    @endauth

@endpush

@section('content')
    @auth

        @include('user.parts.timeline')

        {{-- modal is outside of .main .main-raised class --}}
        {{-- @include('user.includes.modal.reportModal') --}}

    @else
        @include('welcome.parts.wcPart')
    @endauth
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '.change-with-other', function(e) {
                // e.preventDefault();
                // alert('ok');
                var that = $(this);
                var val = that.val();
                if ((val == 'Other') || (val == 'Others')) {
                    that.closest('.other-area').find('.other-value-field').slideDown();
                } else {
                    that.closest('.other-area').find('.other-value-field').slideUp();
                }
            });
        });
    </script>

    @auth

        <script>
            $(document).ready(function() {


                function loadajax() {
                    var url = $('.lazy-load').attr('data-url');
                    $.ajax({
                        url: url,
                        type: "get",
                        success: function(response) {
                            $('.lazy-load').empty().append(response);
                        }
                    });
                }


                setTimeout(loadajax, 200);


            });
        </script>

        {{-- <script>
 document.addEventListener("contextmenu", function (e) {
        e.preventDefault();
    }, false);

document.onkeypress = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
 //alert(‘No F-12’);
 return false;
 }
 }
 document.onmousedown = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
 //alert(‘No F-keys’);
 return false;
 }
 }
document.onkeydown = function (event) {
 event = (event || window.event);
 if (event.keyCode == 123) {
 //alert(‘No F-keys’);
 return false;
 }
 }

</script> --}}




    @endauth
@endpush
