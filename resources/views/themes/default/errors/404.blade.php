@extends('user.master.usermaster')
@section('content')
<br>
<div class="container bg-white py-3">
    <div class="row pt-4">
        <div class="col-12 text-center pt-4">

            <div class="card">
                <div class="card-body">
                    <h2><i class="fas fa-info-circle text-danger"></i> <span class="text-danger"><b>Sorry!</b></span> <span class="w3-xlarge">The page you are looking for is not available</span></h2>
                    <h4 class="w3-large">Are you in search of a life partner? Please <a class="btn btn-danger bg-danger py-1" href="{{ url('register') }}">Register Here</a></h4>

                    <h4 class="w3-large">Do you have account here? <a class="btn btn-danger bg-danger py-1" href="{{ url('login') }}">Login</a></h4>


                </div>
            </div>
            
            <a class="btn btn-danger mt-3" href="{{ url('/') }}">Go back to homepage</a>
        </div>

    </div>
</div>
<br>
@endsection
