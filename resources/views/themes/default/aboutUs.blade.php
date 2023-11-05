@extends('user.master.usermaster')
@push('css')
    <style>
        html .featured-box-primary .box-content {
            border-top-color: #f05b62;
        }
    </style>
@endpush

@section('content')
<!-- ================> Page Header section start here <================== -->
<div class="pageheader bg_img" style="background-image: url(assets/images/bg-img/pageheader.jpg);">
    <div class="container">
        <div class="pageheader__content text-center">
            <h2>About Our Ollya</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Page</a></li>
                  <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- ================> Page Header section end here <================== -->


<!-- ================> About section start here <================== -->
<div class="about about--style5 padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center g-4 align-items-center">
            <div class="col-lg-6 col-12">
                <div class="about__thumb">
                    <img src="assets/images/about/01.png" alt="dating thumb">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about__content">
                    <h2>Hello My Friend</h2>
                    <h5>We are here to build emotion, connect people and create happy stories.</h5>
                    <p>Seeko is a friendly dating theme based on BuddyPress for the community functionality. It allows you to easily create and community for dating. You can add your own branding text and images right away.</p>
                    <a href="membership.html" class="default-btn reverse"><span>Get A Membership</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
