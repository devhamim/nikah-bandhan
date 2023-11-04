@extends('blogAdmin.layouts.blogAdminMaster')

@push('css')
@endpush

@section('content')
  @include('blogAdmin.ad.parts.editAd')
@endsection



@push('js')
{{-- <script src="{{asset('cp/bower_components/ckeditor/ckeditor.js')}}"></script> --}}

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // CKEDITOR.replace('description');
  });
 


</script>
@endpush