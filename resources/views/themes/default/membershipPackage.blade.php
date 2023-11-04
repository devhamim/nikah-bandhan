@extends('user.master.pageMaster')

@push('meta')

<title>Packages - VIP Marriage Media | Marriage Media in Dhaka</title>
<meta name="keywords" content="Marriage Media, Bengali Matrimony, Bangladeshi Matrimony, Matrimony 
Service">
<meta name="description" content="VIP Marriage Media is a Successful Marriage Media in Dhaka. Create a 
free Matrimony profile and search for your partner. Contact Us +880 1767-
506668" />

@endpush


@push('css')
<link rel="stylesheet" href="{{asset('alt3/dist/css/adminlte.min.css')}}">

@endpush
@section('content')
@include('membershipPackage2')
@endsection
