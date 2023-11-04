@php
/*
---------------------------------------------------------------------------
TinyMCE is a injectable view dependency
---------------------------------------------------------------------------
Responsibility: takes a $device parameter and then inject tinyMCE
dependencies with device specific settings.
---------------------------------------------------------------------------
*/
@endphp

{{-- tinyMCE script and stylesheet --}}
<script src="{{asset('assets/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/tinymce/jquery.tinymce.min.js')}}"></script>

{{-- tinyMCE Configuaration --}}
@push('scripts_before_body_endtag')
<script>
    $(document).ready(function(){
            tinymce.init({
                selector: '#quest_desc',
                height: 200,
                plugins: 'link image placeholder code',
                placeholder: "test",
                contextmenu: false,
                menubar: false,
                branding: false,
                statusbar: false,
                toolbar: 'undo redo bold italic image link code',
                mobile: {
                            theme: 'silver'
                        },
            });
        });
</script>
@endpush