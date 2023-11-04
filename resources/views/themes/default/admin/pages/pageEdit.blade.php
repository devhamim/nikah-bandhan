@extends('admin.master.dashboardmaster')
@section('title', "Update Page")

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
@include('admin.pages.parts.pageEdit')
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