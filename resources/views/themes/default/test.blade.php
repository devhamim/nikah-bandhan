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
                        <h3 class="mb-5">About Us</h3>
                        <div class="row">
                            <div class="col-6 col-md-8">

                             <p class="text-center" style="line-height: 18px"> With 15+ years of experience, We are very selective and our focus is best matchmaking elite matrimony service for eligible singles & affluent families in Bangladesh and other countries who finding the finest matches. Our confidential Matrimonial network of the most successful, educated, and most attractive Bachelors who looking for perfect match. In Bangladesh and others countries.</p>
                             <p class="w3-text-sm mt-4"  style="line-height: 18px"><small>You are part or Vip matchmaking services till you get married . Vip experienced team will handle all your communication between prospective matches behalf of you. One - on- One meeting with your matchmaker for yoyr In-person interview and personally assessment. We make sure to give you our 100% service and support from the beginning to the the very last stage till your marriage got fixed Dedicated matchmaking experts working exclusively tor you. Assured meetings with handpicked matches every week. 100% discretion and complete confidentiality of your profile </small></p>
                            </div>
                            <div class="col-6 col-md-4">
                            <div class="" style="border:2px solid red">
                                <img src="{{ asset('images/v2.jpeg') }}" class="img-fluid img-thumbnail" alt=""   style="border:2px solid red">
                              </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
