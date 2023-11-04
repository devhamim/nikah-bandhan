 

<div class="row">
    <div class="col-sm-9">

        <div class="card card-nav-tabs card-tab-pan-400" style="margin-top: -20px;">
            <div class="card-header card-header-danger">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link  active" href="#home" data-toggle="tab">
                                    <i class="material-icons">home</i> Home
                                    <div class="ripple-container"></div></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pack" data-toggle="tab">
                                        <i class="material-icons">list_alt</i> Packages
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#paymnt" data-toggle="tab">
                                        <i class="material-icons">payment</i> Payment
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#contct" data-toggle="tab">
                                        <i class="material-icons">contact_mail</i> Contact Us
                                    </a>
                                </li>

                                @if (Browser::isDesktop())

                                <li class="nav-item">
                                    <a class="nav-link" href="#abt" data-toggle="tab">
                                        <i class="material-icons">people</i> About Us
                                    </a>
                                </li>

                                @endif

                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#faq" data-toggle="tab">
                                        <i class="material-icons">help_outline</i> FAQ (Help)
                                    </a>
                                </li> --}}


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">


@if (Browser::isDesktop())
                            @if ($pg = $frontPages->where('page_type', 'Part Page')->where('route_name', 'tab_who_we_are')->where('active', true)->first())
                            {!! $pg->content !!}
                            @endif 

                            @if ($pg = $frontPages->where('page_type', 'Part Page')->where('route_name', 'tab_message_of_director')->where('active', true)->first())
                            {!! $pg->content !!}
                            @endif 


@endif




                            <div class="w3-card-4">

                                <div class="box box-widget">
                                    <div class="box-header with-border">
                                     <p class="w3-xlarge w3-padding text-center">
                                         <img width="30" src="{{ asset('img/upgrade.jpg') }}" alt="{{ env('APP_NAME_BIG') }}"> Upgrade Account to contact people you like</p>
                                     </div>
                                     <div class="box-body">

                                         <div class="row">
                                             <div class="col-sm-6">


                                                <div class="box box-widget">
                                                    <div class="box-body">
                                                        <div class="media">
                                                            <img src="{{ asset('img/contact.png') }}" class="align-self-start mr-3 rounded" style="width:60px">
                                                            <div class="media-body">
                                                                <h4 class="no-margin">View Contacts</h4>
                                                                <p>See Mobile & Landline numbers.
                                                                Call directly. Send Text messages.</p>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-sm-6">

                                                <div class="box box-widget">
                                                    <div class="box-body">
                                                        <div class="media">
                                                          <img src="{{ asset('img/sms.png') }}" class="align-self-start mr-3 rounded" style="width:60px">
                                                          <div class="media-body">
                                                            <h4 class="no-margin">Send Messages</h4>
                                                            <p>Send Personalized Messages while expressing Interest.</p>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                     <div class="col-sm-6">
                                      <div class="box box-widget">
                                        <div class="box-body">
                                            <div class="media">
                                              <img src="{{ asset('img/email.png') }}" class="align-self-start mr-3 rounded" style="width:60px">
                                              <div class="media-body">
                                                <h4 class="no-margin">See Email</h4>
                                                <p>Talk via emails. Share more pictures, biodata, cv, video etc.</p>

                                            </div>
                                        </div>

                                    </div>
                                </div>   
                            </div>
                            <div class="col-sm-6">
                                <div class="box box-widget">
                                    <div class="box-body">
                                        <div class="media">
                                          <img src="{{ asset('img/proposal.jpg') }}" class="align-self-start mr-3 rounded" style="width:60px">
                                          <div class="media-body">
                                            <h4 class="no-margin">Send Proposal</h4>
                                            <p>Knock and propose with personal interests using our advanced tools.</p>

                                        </div>
                                    </div>

                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="row d-none d-sm-block">
                        <div class="col-sm-12">


                            <div class="box box-widget w3-border w3-border-purple">
                                <div class="box-body">


                                    <div class="row">
                                        <div class="col-sm-3">

                                            <img style="width: 120px;" src="{{ asset('img/contact-us.jpg') }}" class="align-self-start mr-3 rounded">
                                        </div>
                                        <div class="col-sm-9">

                                            <h4 class="no-margin">To get quick response, Please Contact Us </h4> 


                                            <br>
                                            <p>

                                                @if ($pg = $frontPages->where('page_type', 'Part Page')->where('route_name', 'tab_contact_us')->where('active', true)->first())
                                                {!! $pg->content !!}
                                                @endif 




                                            </p>

                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

@if (Browser::isDesktop())

        @if ($pg = $frontPages->where('page_type', 'Part Page')->where('route_name', 'tab_youtube')->where('active', true)->first())
        {!! $pg->content !!}
        @endif 

@endif











    </div>
    <div class="tab-pane" id="pack">




        @include('welcome.includes.others.tabMembershipPackages')











    </div>
    <div class="tab-pane" id="paymnt">




        <div class="box box-widget w3-border w3-border-purple">
            <div class="box-body">


                <div class="row">
                    <div class="col-sm-3">

                        <img style="width: 120px;" src="{{ asset('img/paymentoptions.png') }}" class="align-self-start mr-3 rounded">
                    </div>
                    <div class="col-sm-9">

                        <h4 class="no-margin">Send Money to any account below and click the <u>Pay Now</u> button to submit the payment form. </h4> 


                        <br>
                        <p>

                            @if ($pg = $frontPages->where('page_type', 'Part Page')->where('route_name', 'tab_payment')->where('active', true)->first())
                            {!! $pg->content !!}
                            @endif 


                            <br>

                            <br>



                            <a class="btn btn-warning" href="{{route('user.payNow')}}">Pay Now &nbsp; <i class="fa fa-credit-card"></i></a> <br>

                            


                        </p>

                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="tab-pane" id="contct">


        <div class="box box-widget w3-border w3-border-purple">
            <div class="box-body">


                <div class="row">
                    <div class="col-sm-3">

                        <img style="width: 120px;" src="{{ asset('img/contact-us.jpg') }}" class="align-self-start mr-3 rounded">
                    </div>
                    <div class="col-sm-9">

                        <h4 class="no-margin">To get quick response, Please Contact Us </h4> 


                        <br>
                        <p>

                            @if ($pg = $frontPages->where('page_type', 'Part Page')->where('route_name', 'tab_contact_us')->first())
                            {!! $pg->content !!}
                            @endif 


                        </p>

                    </div>
                </div>


            </div>
        </div>





@if (Browser::isDesktop())

        <iframe class="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.5822849285446!2d90.39793801422259!3d23.868962384531027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c424c4ef2d05%3A0x611d9d0fb5237c8a!2sTaslima+Marriage+Media!5e0!3m2!1sen!2sbd!4v1532548886935" style="border-radius: 4px !important;border:1px solid purple;padding:4px;" width="100%" height="450" allowfullscreen></iframe>

@endif



    </div>

    @if (Browser::isDesktop())

    <div class="tab-pane" id="abt">

        @if ($pg = $frontPages->where('page_type', 'Part Page')->where('route_name', 'tab_about_us')->first())
        <h2>{{ $pg->title_hide ? '' : $pg->page_title }}</h2>
        {!! $pg->content !!}
        @endif 
    </div>

    @endif

        {{-- <div class="tab-pane" id="faq">
            <p>Help</p>
        </div> --}}

    </div>
</div>
</div>




</div>
<div class="col-sm-3">


    <div class="card card-nav-tabs" style="margin-top: -20px;">
        <div class="card-header card-header-danger">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link  active" href="#reg" data-toggle="tab">
                              Join Now
                              <div class="ripple-container"></div></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link s-story" href="#success-story" data-toggle="tab">
                                Success Story
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="reg">
                    <p>
                        <a href="{{ url('/signup') }}"> 
                            <?php $rand = 'img/r9.gif'; ?>
                            <img class="img-responsive" src="{{ asset($rand) }}" alt="{{ env('APP_NAME_BIG') }}" style="width: 100%;">
                        </a>
                    </p>
                </div>

                <div class="tab-pane" id="success-storys">
                    <p> I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could  e level that things could be at.</p>
                </div>

            </div>
        </div>
    </div>


    @include('welcome.includes.others.hotLineImage')


@if (Browser::isDesktop())
 
 <br> 

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Membership for Bangladesh</h3>

    </div>
    <div class="box-body" style="background: #eee;">

        @foreach ($mPackage1 as $package)

        <div class="box box-widget mb-1">
            <div class="box-body">

                <!-- Media top -->
                <div class="media">
                  <img src="{{ asset('storage/package/' .$package->image_name) }}" class="align-self-start mr-3 rounded" style="width:60px">
                  <div class="media-body">
                    <h4 class="no-margin">{{ $package->package_title }}</h4>


                    <hr class="no-margin"> 

                    <div class="clearfix">
                      <span class="float-left"> Price: <b>{{ $package->package_amount }} {{ $package->package_currency }}</b></span>
                  </div>
                  <div class="clearfix">
                      <span class="float-left"> Duration: <b>{{ $package->package_duration }} Days</b></span>
                  </div>

              </div>
          </div>


      </div>
  </div>

  @endforeach
</div>
</div>




<br>  
{{-- <div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"> Membership for Foreigners</h3>

    </div>
    <div class="box-body" style="background: #eee;">

        @foreach ($mPackage2 as $package)

        <div class="box box-widget mb-1">
            <div class="box-body">

                <!-- Media top -->
                <div class="media">
                  <img src="{{ asset('storage/package/' .$package->image_name) }}" class="align-self-start mr-3 rounded" style="width:60px">
                  <div class="media-body">
                    <h4 class="no-margin">{{ $package->package_title }}</h4>


                    <hr class="no-margin"> 

                    <div class="clearfix">
                      <span class="float-left"> Price: <b>{{ $package->package_amount }} {{ $package->package_currency }}</b></span>
                  </div>
                  <div class="clearfix">
                      <span class="float-left"> Duration: <b>{{ $package->package_duration }} Days</b></span>
                  </div>

              </div>
          </div>


      </div>
  </div>

  @endforeach
</div>
</div> --}}
<div class="box box-widget">
    <div class="box-body">

        @include('welcome.includes.others.fbPageArea')
    </div>
</div>
@endif


<br>

@include('welcome.includes.others.ourWebsiteVisitors')


<br> 
<div class="w3-card w3-container">
    
<img class="img-responsive rounded" width="100%" src="{{ asset('img/disabled.webp') }}" alt="T M Media">
</div>

</div>
</div>
