@extends('master.master')

@push('css')
    <style>
        ul.list li {
            font-size: 12px !important;
            font-weight: 400 !important;
            line-height: 24px !important;
            white-space: nowrap !important;
        }

        .list.list-icons li {
            position: relative !important;
            padding-left: 15px !important;
            color: black;
        }

        .list li {
            margin-bottom: 0px !important;

        }

        .li-uniq-pri {
            color: #0274CB !important;
        }

        .viptextcolor {
            color: #A2248E !important;
        }

        html .featured-box-effect-3.featured-box-secondary:hover .icon-featured {
            background: #FFF !important;
        }

        .featured-box-effect-3:hover .icon-featured {
            color: var(--branding-color) !important;
        }
    </style>

    <style>
        .cta-box-wrapper {
            margin: 0 25px;


        }

        .cta-box {

            border: none;
            box-shadow: none;
        }

        .cta-box .box-content {
            cursor: pointer;
            background-color: var(--branding-color) !important;
            border-radius: 45px;
            display: inline-block;
            min-width: 250px;
        }

        .iti__country {
            padding: 5px 10px;
            outline: none;
            /* background: var(--blue); */
            color: var(--branding-color);
            z-index: 101000;
        }
    </style>
@endpush
@section('content')
    @include('alerts.alerts')
        <!-- ================> header section start here <================== -->
    
    <!-- ================> header section end here <================== -->


    <!-- ================> Banner section start here <================== -->
	
	@include('partials.homeOverlay')
    <!-- ================> Banner section end here <================== -->


    <!-- ================> road section start here <================== -->
	<div class=" padding-top padding-bottom" style="background-color: #fff;">
		<div class="container">
			<div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
				<h2>Road map</h2>
			</div>
			<div class="section__wrapper">
				<div class="row g-4 justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
					<div class="col px-4">
                        <a href="{{ url('register') }}">
						<div class="about__item text-center">
							<div class="">
								<div class="about__thumb">
									<img src="{{ asset('frontend') }}/images/road-map/1.png" alt="dating thumb">
								</div>
								<div class="about__content">
									<h4>Register</h4>
									<p>
										Most trusted plateform in our country, Sign up to find the best partner for your life.
									</p>
								</div>
							</div>
						</div>
                        </a>
					</div>
					<div class="col px-4">
						<div class="about__item text-center">
							<a href="{{ url('packages') }}">
							<div class="">
								<div class="about__thumb">
									<img src="{{ asset('frontend') }}/images/road-map/4.png" alt="dating thumb">
								</div>
								<div class="about__content">
									<h4>Partner Preference</h4>
									<p>
										Most trusted plateform in our country, Sign up to find the best partner for your life.
									</p>
								</div>
							</div>
							</a>
						</div>
					</div>
					<div class="col px-4">
						<a href="{{ url('page/contact-us') }}">
						<div class="about__item text-center">
							<div class="">
								<div class="about__thumb">
									<img src="{{ asset('frontend') }}/images/road-map/2.png" alt="dating thumb">
								</div>
								<div class="about__content">
									<h4>Contact</h4>
									<p>
										Feeling connected to each other is a basic human need.
									</p>
								</div>
							</div>
						</div>
						</a>
					</div>
					<div class="col px-4">
						<div class="about__item text-center">
							<a href="{{ url('https://www.facebook.com/vipmarriagemedia/') }}">
							<div class="">
								<div class="about__thumb">
									<img src="{{ asset('frontend') }}/images/road-map/3.png" alt="dating thumb">
								</div>
								<div class="about__content">
									<h4>Message</h4>
									<p>
										Good communication is the bridge between confusion and clarity.
									</p>
								</div>
							</div>
							</a>
						</div>
					</div>
					
				</div>
				<div class="row mt-5">
					<div class="col-lg-6 col-sm-6 col-md-6 col-6 m-auto">
						<div class="text-center">
							<a class="btn btn-danger py-3 px-5 rounded" style="background-color: #E31190;" href="{{ url('register') }}">Register</a>
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</div>
    <!-- ================> road section end here <================== -->

	<!-- ================> About section start here <================== -->
	<div class="about padding-top padding-bottom">
		<div class="container">
			<div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
				<h2>Why Nikah Bandhan?</h2>
				<p>Our marrige platform is like a breath of fresh air. Clean and trendy design with ready to use features we are sure you will love.</p>
			</div>
			<div class="section__wrapper">
				<div class="row g-4 justify-content-center row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 row-cols-1">
					<div class="col wow fadeInUp" data-wow-duration="1.5s">
						<div class="about__item text-center">
							<div class="about__inner">
								<div class="about__thumb">
									<img src="{{ asset('frontend') }}/images/about/1.png" alt="dating thumb">
								</div>
								<div class="about__content">
									<h4>Years of Trust</h4>
									<p>Simple steps to follow to have a matching connection.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col wow fadeInUp" data-wow-duration="1.5s">
						<div class="about__item text-center">
							<div class="about__inner">
								<div class="about__thumb">
									<img src="{{ asset('frontend') }}/images/about/2.png" alt="dating thumb">
								</div>
								<div class="about__content">
									<h4>Active Profiles</h4>
									<p>Create connections with users that are like you.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col wow fadeInUp" data-wow-duration="1.5s">
						<div class="about__item text-center">
							<div class="about__inner">
								<div class="about__thumb">
									<img src="{{ asset('frontend') }}/images/about/3.png" alt="dating thumb">
								</div>
								<div class="about__content">
									<h4>Member Visits Everyday</h4>
									<p>Don’t waste your time! Find only what you are interested</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col wow fadeInUp" data-wow-duration="1.5.5s">
						<div class="about__item text-center">
							<div class="about__inner">
								<div class="about__thumb">
									<img src="{{ asset('frontend') }}/images/about/4.png" alt="dating thumb">
								</div>
								<div class="about__content">
									<h4>Cool Community</h4>
									<p>BuddyPress network is full of cool members.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</div>
    <!-- ================> About section end here <================== -->


    <!-- ================> Work section start here <================== -->
	<div class="work padding-top padding-bottom bg_img" style="background-image: url({{ asset('frontend') }}/images/bg-img/01.jpg);">
		<div class="container">
			<div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
				<h2>Our Success Stories</h2>
				<p>Listen and learn from our community members and find out tips and tricks to meet your love. Join us and be part of a bigger family.</p>
			</div>
			<div class="section__wrapper wow fadeInUp" data-wow-duration="1.5s">
				<div class="row g-4 justify-content-center autoplay">
                    @foreach ($stories as $post)
					<div class="col">
						<div class="story__item">
							<div class="story__inner">
								<div class="story__thumb">
									<a href="{{ route('success.stories_details', $post->id) }}">
										<img src="{{ route('imagecache', ['template' => 'medium', 'filename' => $post->fiName()]) }}" alt="dating thumb">

									</a>
									
								</div>
								<div class="story__content">
									<a href="{{ route('success.stories_details', $post->id) }}"><h4> {{ Str::limit($post->title, 40, '...') }}</h4></a>
									<div class="story__content--author">
                                        <p>{{ Str::limit($post->description, 80, '...') }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
				<div class="row mt-5">
					<div class="col-lg-6 col-sm-6 col-md-6 col-6 m-auto">
						<div class="text-center">
                                <button type="button" class="btn btn-danger text-white py-3 px-5 rounded"  style="background-color: #E31190;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Login
                                  </button>
							<a class="btn btn-danger py-3 px-5 rounded" style="background-color: #E31190;" href="{{ url('register') }}">Register</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- ================> Work section end here <================== -->
    @endsection
    @push('js')
    @endpush

	