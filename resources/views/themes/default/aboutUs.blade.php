@extends('user.master.usermaster')
@push('css')
    <style>
        html .featured-box-primary .box-content {
            border-top-color: #f05b62;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row my-5 ">

        <div class="col-12 col-md-3">
            <div class="card">
                <div class="image">
                    <img src="{{ asset('images/v1.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>

        </div>
        <div class="col-12 col-md-9">
            <div class="card" style="border-radius:25px">

                <div class="card-body">
                    <h3 class="mb-5">The VIP Advantage</h3>
                    <div class="row">
                        <div class="col-8">

                         <p class="text-center" style="line-height: 18px"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius nobis facere quae maxime porro esse, veritatis asperiores, deleniti ipsum culpa sapiente perferendis labore consequuntur quam repellat est adipisci, .</p>
                         <p class="w3-text-sm mt-4"  style="line-height: 18px"><small>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius nobis facere quae maxime porro esse, veritatis asperiores, deleniti ipsum culpa sapiente perferendis labore consequuntur quam repellat est adipisci, .</small></p>
                        </div>
                        <div class="col-3">
                            <img src="{{ asset('images/v2.jpeg') }}" class="rounded-circle" alt="" height="220" width="220">
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>
</div>
@endsection
