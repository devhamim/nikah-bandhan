@php
/*
---------------------------------------------------------------------------
TinyMCE is a injectable view dependency
---------------------------------------------------------------------------
Responsibility: takes a $device parameter and then inject tinyMCE
dependencies with device specific settings.

# Master layout can't include it,but others can.
---------------------------------------------------------------------------
*/
@endphp

{{-- tinyMCE Script--}}
<script src="{{asset('assets/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{asset('assets/tinymce/tinymce.min.js')}}"></script>

{{-- tinyMCE device-agnostic configuaration --}}
@if ($device=='all')
<script>
    $(document).ready(function(){
            tinymce.init({
                selector: '#{{ $txtarea_id }}', //embed id using laravel,
                height: 200,
                plugins: 'link image placeholder code',
                placeholder: "test",
                contextmenu: false,
                menubar: false,
                branding: false,
                statusbar: false,
                toolbar: 'undo redo bold italic image link code',
                mobile: {theme: 'silver'},
                images_upload_handler: function(blobInfo, success, failure) {
                    var url = $("#ask_form").attr("data-imgurl");
                    var xhr, formData;

                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open("POST", url);

                    var token = $('meta[name="csrf-token"]').attr("content");

                    xhr.setRequestHeader("X-CSRF-TOKEN", token);

                    xhr.onload = function() {
                        var json;
                        if (xhr.status != 200) {
                            failure("HTTP Error: " + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.location != "string") {
                            failure("Invalid JSON: " + xhr.responseText);
                            return;
                        }
                        success(json.location);
                        $("img").css("max-width", "100%");
                    };
                    formData = new FormData();
                    formData.append("_token", token);
                    formData.append("file", blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                }
            });
        });
</script>
@endif

{{-- tinyMCE device-aware configuaration --}}
@if ($device=='mobile')
@endif

@if($device=='tablet')
@endif

@if ($device=="desktop")
@endif
