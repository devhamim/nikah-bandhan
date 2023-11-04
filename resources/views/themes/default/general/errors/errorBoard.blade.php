@extends('user.layouts.secondaryLayout')

@section('sitebody')
<h1 class="error-code">{{ $errorCode }}</h1>
<div class="error-graphics"></div>
<p class="error-msg">{{ $errorMsg }}</p>
@endsection
