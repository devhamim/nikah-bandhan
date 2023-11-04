@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')

  @include('admin.payments.parts.allPendingPayments')

@endsection


@push('js')

@endpush
