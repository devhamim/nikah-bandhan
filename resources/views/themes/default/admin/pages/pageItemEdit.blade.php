@extends('admin.master.dashboardmaster')
@section('title', "Page Item Edit")

@push('css')

<!-- Select2 -->
{{--
<link rel="stylesheet" href="{{asset('assets/select2/dist/css/select2.min.css')}}"> --}}
<style type="text/css">
  .select2-dropdown .select2-search__field:focus,
  .select2-search--inline .select2-search__field:focus {
    outline: none !important;
    border: none !important;
  }
</style>


<!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
<link rel="stylesheet" type="text/css"
  href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css') }}">
<link rel="stylesheet" type="text/css"
  href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css') }}">



<style>
  .note-group-select-from-files {
    display: none;
  }
</style>

@endpush

@section('content')
@include('admin.pages.parts.pageItemEdit')
@endsection



@push('js')

<script type="text/javascript"
  src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js')}}"></script>
<script type="text/javascript"
  src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js')}}"></script>
<script type="text/javascript"
  src="{{asset('//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js')}}"></script>



{{--
<script src="{{asset('cp/plugins/ckeditor/ckeditor.js')}}"></script> --}}

<!-- Select2 -->
{{--
<script src="{{asset('assets/select2/dist/js/select2.full.min.js')}}"></script> --}}

<script>



  // $(function () {
  //   // Replace the <textarea id="editor1"> with a CKEditor
  //   // instance, using default configuration.
  //   CKEDITOR.replace('description');
  // });

  $(document).ready(function () {
    $('.select2-tags').select2({
      minimumInputLength: 0,
      tags: true,
      tokenSeparators: [','],
      ajax: {
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          // alert(data[0].s);
          var data = $.map(data, function (obj) {
            obj.id = obj.id || obj.title;
            return obj;
          });
          var data = $.map(data, function (obj) {
            obj.text = obj.text || obj.title;
            return obj;
          });
          return {
            results: data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        }
      },
    });
  });





</script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

 

@endpush