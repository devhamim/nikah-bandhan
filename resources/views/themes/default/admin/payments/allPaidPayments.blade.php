@extends('admin.master.dashboardmaster')

@push('css')
@endpush

@section('content')

  @include('admin.payments.parts.allPaidPayments')

@endsection


@push('js')

@endpush
