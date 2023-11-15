@extends('master.master')

@push('meta')



 <title> {{$page->meta_title ?: $websiteParameter->title}}</title>

 <meta name="keywords" content="{{ $page->meta_keywords ?: $websiteParameter->meta_keyword }}">
<meta name="description" content="{{ $page->meta_description ?: $websiteParameter->meta_description}}" />

@endpush


@push('css')
@endpush


@section('content')
<div role="main" class="main margin-start">

 <!-- ================> Page Header section start here <================== -->
 <div class="pageheader bg_img" style="background-image: url({{ asset('frontend') }}/images/bg-img/pageheader.jpg);">
    <div class="container">
        <div class="pageheader__content text-center">
            <h1 class="text-danger">{{ $page->page_title }}</h1>  
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="active">/{{ $page->page_title }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- ================> Page Header section end here <================== -->

<!-- ===========Info Section Ends Here========== -->
<div class="info-section padding-top padding-bottom">
    <div class="container">
        <div class="section__header style-2 text-center">
            <h2>Contact Info</h2>
            <p>Let us know your opinions. Also you can write us if you have any questions.</p>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center g-4">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="contact-item text-center">
                        <div class="contact-thumb mb-4">
                            <img src="{{ asset('frontend') }}/images/contact/icon/01.png" alt="contact-thumb">
                        </div>
                        <div class="contact-content">
                            <h6 class="title">Office Address</h6>
                            <p>1201 park street, Fifth Avenue</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="contact-item text-center">
                        <div class="contact-thumb mb-4">
                            <img src="{{ asset('frontend') }}/images/contact/icon/02.png" alt="contact-thumb">
                        </div>
                        <div class="contact-content">
                            <h6 class="title">Phone number</h6>
                            <p>01751-216771</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="contact-item text-center">
                        <div class="contact-thumb mb-4">
                            <img src="{{ asset('frontend') }}/images/contact/icon/03.png" alt="contact-thumb">
                        </div>
                        <div class="contact-content">
                            <h6 class="title">Send Email</h6>
                            <p>nikahbandhan.ceo@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===========Info Section Ends Here========== -->



<!-- ================> contact section start here <================== -->
<div class="contact-section bg-white">
    <div class="contact-top padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="contact-form-wrapper text-center">
                        <h2>Feedback</h2>
                        <p class="mb-5">Let us know your opinions. Also you can write us if you have any questions.</p>
                        <form class="contact-form" action="{{ route('contactUsPost') }}" method="POST">

                            @include('alerts.alerts')
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" value="{{ old('name') }}" data-msg-required="Name.." placeholder="Name" maxlength="100" class="form-control tarek-input" name="subject" required>
                            </div>
                            <div class="form-group">
                                <input type="string" value="{{ old('phone_number') }}"data-msg-required="Please enter the subject." name="phone_number" placeholder="Phone Number" maxlength="100" class="form-control tarek-input" name="subject" required>
                            </div>
                            <div class="form-group w-100" >
                                <input type="email" value="{{ old('business_email') }}" data-msg-required="Please enter the subject." placeholder="Email" name="business_email" maxlength="100" class="form-control tarek-input" name="subject" required>
                            </div>
                            
                            <div class="form-group w-100">
                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="4" class="form-control tarek-textarea-b-dark" name="message_body" required>Your Message</textarea>
                            </div>
                            <div class="form-group w-100 text-center">
                                <input type="submit" style="background-color: #E31190;" value="Send Message" class="btn bg-color-vipmm btn-rounded btn-block btn-modern text-white" data-loading-text="Loading...">
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-bottom">
        <div class="contac-bottom">
            <div class="row justify-content-center g-0">
                <div class="col-12">
                    <div class="location-map">
                        <div id="map">
                            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.521703501406!2d90.41572041429865!3d23.835601391434636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c660b5100b5d%3A0x1e89b4b978f8cd56!2zUmQgTm8uIDIwLCDgpqLgpr7gppXgpr4gMTIyOQ!5e0!3m2!1sbn!2sbd!4v1641195979328!5m2!1sbn!2sbd"
                width=100% height="300" style="border:1px grey dashed; border-radius:25px" allowfullscreen=""
                loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================> contact section end here <================== -->




</div>
@endsection

@push('js')
 
@endpush
