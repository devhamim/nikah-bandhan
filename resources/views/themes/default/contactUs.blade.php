@extends('user.master.pageMaster')

@push('meta')



 <title> {{$page->meta_title ?: $websiteParameter->title}}</title>

 <meta name="keywords" content="{{ $page->meta_keywords ?: $websiteParameter->meta_keyword }}">
<meta name="description" content="{{ $page->meta_description ?: $websiteParameter->meta_description}}" />

@endpush


@push('css')
@endpush


@section('content')
<div role="main" class="main margin-start">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
    <div class="container">
        <div class="row mr-lg-n5">
            <div class="col-md-9 order-2 order-md-1 align-self-center p-static">                            
            <h1 class="text-danger">{{ $page->page_title }}</h1>                           
            </div>                          
            <div class="col-md-3 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-end">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ $page->page_title }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

    <div class="container main margin-start p-4" style="background-color: #ffff; border-radius:25px">
        <div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.521703501406!2d90.41572041429865!3d23.835601391434636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c660b5100b5d%3A0x1e89b4b978f8cd56!2zUmQgTm8uIDIwLCDgpqLgpr7gppXgpr4gMTIyOQ!5e0!3m2!1sbn!2sbd!4v1641195979328!5m2!1sbn!2sbd"
                width=100% height="300" style="border:1px grey dashed; border-radius:25px" allowfullscreen=""
                loading="lazy"></iframe>
        </div>

        <div class="row">


            <div class="col-lg-7">
                <div class="mt-5 pt-3 text-center">
                    <h3 class="text-center color-vipmm pb-3">Our <span class="color-vipmm2">Office</span></h3>
                    <span class="text-center color-vipmm2 " style="font-size:14px; font-weight:600">Address</span>
                    <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="200">
                        <div class="card border-0 border-radius-0 w3-light-gray ">
                            <div class="card-body text-center">

                                <p class="card-text color-vipmm">Nikunja 2 # Road 20,Plot 14,Dhaka-1229 <br> Bangladesh</p>
                            </div>
                        </div>
                    </div>



                    <span class="text-center color-vipmm2 " style="font-size:14px; font-weight:600">Phone:</span>
                    <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="200">
                        <div class="card border-0 border-radius-0 bg-color-grey">
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">+8801767-506668</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">+8801632-940557</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">+8801933-389773</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">+8801748-827666</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">+8801767-502889</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">+8801927-157200</p>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>



                    <span class="text-center color-vipmm2 " style="font-size:14px; font-weight:600">Email:</span>
                    <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="200">
                        <div class="card border-0 border-radius-0 bg-color-grey">
                            <div class="card-body ">

                                <p class="card-text color-vipmm" style="white-space: nowrap;">vipmarriage.ceo@gmail.com</p>



                            </div>
                        </div>
                    </div>




                    <span class="text-center color-vipmm" style="font-size:14px; font-weight:600">Our <span class="color-vipmm2">Bank
                        Accounts</span></span>
                    <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="200">
                        <div class="card border-0 border-radius-0 bg-color-grey">
                            <div class="card-body ">

                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">1767-506668
                                            <small>(Nagad)</small>
                                        </p>
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">01632-940557
                                            <small>(Bkash)</small>
                                        </p>
                                        <p class="card-text color-vipmm" style="white-space: nowrap;">01857-659958
                                            <small>(Bkash)</small>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="card-text color-vipmm2">
                                            City Bank
                                        </p>
                                        <span class="color-vipmm">
                                            A/c No: 1772303242999001 <br>
                                            Branch Code: 463 <br>
                                            SWIFT Code: CIBLBDDH <br>
                                            Routing Number: 225264634</span>

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-5">
                <div class="mt-5 pt-3">
                    <h3 class="text-center color-vipmm pb-3" >Send us a <span class="color-vipmm2">message</span></h3>
                    <form class="contact-form" action="{{ route('contactUsPost') }}" method="POST">

                        @include('alerts.alerts')
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            data-msg-required="Name.." placeholder="Name" maxlength="100"
                                            class="form-control tarek-input" name="subject" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <input type="email" value="{{ old('business_email') }}"
                                            data-msg-required="Please enter the subject." placeholder="Email"
                                            name="business_email" maxlength="100" class="form-control tarek-input"
                                            name="subject" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <input type="string" value="{{ old('phone_number') }}"
                                            data-msg-required="Please enter the subject." name="phone_number"
                                            placeholder="Phone Number" maxlength="100" class="form-control tarek-input"
                                            name="subject" required>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col">
                                        <textarea maxlength="5000" data-msg-required="Please enter your message."
                                            rows="4" class="form-control tarek-textarea-b-dark" name="message_body"
                                            required>Your Message</textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <input type="submit" value="Send Message"
                                            class="btn bg-color-vipmm btn-rounded btn-block btn-modern"
                                            data-loading-text="Loading...">
                                    </div>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>




</div>
@endsection

@push('js')
 
@endpush
