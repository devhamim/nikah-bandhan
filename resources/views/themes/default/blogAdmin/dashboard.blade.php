@extends('blogAdmin.layouts.blogAdminMaster')

@push('css')
@endpush

@section('content')

  @include('blogAdmin.parts.dashboard')

@endsection


@push('js')
{{-- <script type="text/javascript">
  alert('ok');
</script> --}}
@endpush
