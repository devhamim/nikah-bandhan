<footer class="footer overflow-hidden">
	<div class="footer__top bg_img" style="background:#000 ">
		{{-- <div class="footer__newsletter wow fadeInUp" data-wow-duration="1.5s">
			<div class="container">
				<div class="row g-4 justify-content-center">
					<div class="col-lg-6 col-12">
						<div class="footer__newsletter--area">
							<div class="footer__newsletter--title">
								<h4>Newsletter Sign up</h4>
							</div>
							<div class="footer__newsletter--form">
								<form action="#">
									<input type="email" placeholder="Your email address">
									<button type="submit" class="default-btn"><span>Subscribe</span></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="footer__newsletter--area justify-content-xxl-end">
							<div class="footer__newsletter--title me-xl-4">
								<h4>Join Community</h4>
							</div>
							<div class="footer__newsletter--social">
								<ul>
									<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-twitch"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa-brands fa-facebook-messenger"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<div class="footer__toparea padding-top padding-bottom wow fadeInUp" data-wow-duration="1.5s">
			<div class="container">
				<div class="row g-5 g-lg-0">
					<div class="col-lg-3 col-sm-6 col-12">
						<div class="footer__item">
							<div class="footer__inner">
								<div class="footer__content">
									<div class="footer__content--title">
										<h4>Our Information</h4>
									</div>
									<div class="footer__content--desc">
										
										<h3 class="text-5 mb-3 " style="color: white">24 hours service</h3>
										<ul class="list list-icons list-icons-lg">
			
			
			
										<a class="m-0 text-color-light text-white" href="https://wa.me/+8801751216771">+8801751216771 (Whatsapp)</a> <br>
										{{-- <a class="m-0 text-color-light text-white" href="https://wa.me/+8801751216771">+8801751216771 (Whatsapp)</a> <br> --}}
			
			
										</ul>
			
			
										<div class="alert alert-success d-none" id="newsletterSuccess">
											<strong>Success!</strong> You've been added to our email list.
										</div>
										<div class="alert alert-danger d-none" id="newsletterError"></div>
										<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="mr-4 mb-3 mb-md-0 mt-4">
											<div class="input-group input-group-rounded" style="width: 85%">
												<input class="form-control form-control-sm bg-light" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
												<span class="input-group-append">
													<button class="btn btn-light text-color-dark" type="submit"><strong>GO!</strong></button>
												</span>
											</div>
										</form>
					
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-12">
						<div class="footer__item">
							<div class="footer__inner">
								<div class="footer__content">
									<div class="footer__content--title">
										<h4>My Account</h4>
									</div>
									<div class="footer__content--desc">
										<ul>
											<li><a class="m-0 text-color-light" href="{{ url('/') }}"><i class="far fa-dot-circle text-color-light"></i> Home</a></li>
											<li class="pb-0 mb-0">
												@foreach($menupages as $page)
													<a class="mb-3 text-color-light" href="{{ route('page',$page->route_name) }}"><i class="far fa-dot-circle text-color-light"></i> {{$page->page_title}}</a> <br>
												@endforeach
											</li>
											<li class="py-0 my-0"><a class="m-0 text-color-light" href="{{ url('/packages')}}"><i class="far fa-dot-circle text-color-light"></i> Our Packages</a></li>

											<li ><a class="m-0 text-color-light" href="{{ url('/blog') }}"><i class="far fa-dot-circle text-color-light"></i> Blog</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-12">
						<div class="footer__item">
							<div class="footer__inner">
								<div class="footer__content">
									<div class="footer__content--title">
										<h5 class="text-3 mb-3 text-white">FOLLOW US</h5>
									</div>
									<div class="footer__content--desc">
										<ul class="social-icons">
											<li class="social-icons-facebook">
												<a href="{{$websiteParameter->fb_page_link}}" target="_blank" title="Facebook"><i
														class="fab fa-facebook-f"></i></a>
											</li>
											<li class="social-icons-twitter">
												<a href="{{$websiteParameter->twitter_url}}" target="_blank" title="Twitter"><i
														class="fab fa-twitter"></i></a>
											</li>
											<li class="social-icons-linkedin">
												<a href="{{$websiteParameter->linkedin_url}}" target="_blank" title="Linkedin"><i
														class="fab fa-linkedin-in"></i></a>
											</li>
			
											<li class="social-icons-linkedin">
												<a href="{{$websiteParameter->instagram_url}}" target="_blank" title="Instagram"><i
														class="fab fa-instagram"></i></a>
											</li>
			
											<li class="social-icons-linkedin">
												<a href="{{$websiteParameter->pinterest_url}}" target="_blank" title="Pinterest"><i
														class="fab fa-pinterest"></i></a>
											</li>
			
										</ul>
										<style>
											.footer__content--desc .social-icons li{
												display: inline-block;
											}
										</style>
										<a type="button" href="{{ url('/register') }}" class="btn btn-rounded btn-primary mt-3" style="background-color: #E31190">Registration</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-12">
						<div class="footer__item">
							<div class="footer__inner">
								<div class="footer__content">
									
									<div class="footer__content--desc">
										<img src="{{ asset('img/pay3.png') }}" alt="" class="img-fluid" style="margin-left: -30px">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="footer__bottom wow fadeInUp" data-wow-duration="1.5s">
		<div class="container">
			<div class="footer__content text-center">
				<p class="mb-0">All Rights Reserved &copy; <a href="{{ url('/') }}">Nickah Bandhan</a> || Design By: nugortechit</p>
			</div>
		</div>
	</div>
</footer>