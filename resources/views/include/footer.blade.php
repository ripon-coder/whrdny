<footer class="footer-area">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 mb-4 mb-md-0">
					<a class="footer_logo" href="{{url('/')}}">
						<img class="img-fluid" src="{{ asset('dynamic-assets/footer_logo/'.$g_settings->footer_logo) }}" alt="logo" />
					</a>
					<div class="">
						<div class="textwidget mt-3">
							<div class="compay_location us-office mb-3">
								<h3>{{@$g_settings->address_one_title}}</h3>
								<div class="d-flex mb-1">
									<i class="fa fa-phone"></i> {{@$g_settings->address_one_mobile}}
								</div>
								<div class="d-flex mb-1">
									<i class="fa fa-envelope-o"></i> <a href="mailto:{{@$g_settings->address_one_email}}">{{@$g_settings->address_one_email}}</a>
								</div>
								<div class="d-flex mb-1">
									<i class="fa fa-map-marker"></i> {{@$g_settings->address_one_address}}
								</div>
							</div>
							<div class="compay_location">
								<h3>{{@$g_settings->address_two_title}}</h3>

								<div class="d-flex mb-1"><i class="fa fa-phone"></i> {{@$g_settings->address_two_mobile}}</div>

								<div class="d-flex mb-1"><i class="fa fa-envelope-o"></i> <a href="mailto:{{@$g_settings->address_two_email}}">{{@$g_settings->address_two_email}}</a></div>

								<div class="d-flex mb-1"><i class="fa fa-map-marker"></i> {{@$g_settings->address_two_address}}</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 mb-4 mb-md-0">
					<h4 class="footer-title">WHO WE ARE</h4>
					<ul class="nav flex-column white-nav">
						<li class="nav-item">
							<a class="nav-link" href="{{url('/mission')}}">Mission</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/vision')}}">Vision</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/objectives')}}">Objectives</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/history')}}">History</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/overview')}}">Overview</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/board-of-trustee')}}">Board of Trustee</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/faqs')}}">FAQs</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 mb-4 mb-md-0">
					<h4 class="footer-title">MORE INFO</h4>
					<ul class="nav flex-column white-nav">
						<li class="nav-item">
							<a class="nav-link" href="{{url('/blog')}}">Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/news-events')}}">Events</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/what-we-do')}}">What We Do</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/how-we-work')}}">How We Work</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/photo-gallery')}}">Photo Gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/video-gallery')}}">Video Gallery</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6">
					<h4 class="footer-title">ABOUT US</h4>
					<p class="mb-1">{{ @$g_settings->about_us }}</p>

					@include('include.social-menu')
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="copyright text-center d-md-flex justify-content-center align-items-center">
				<p class="copyright mb-0"><span class="txt-block copyright_text">Copyright © World human rights development USA {{date('Y')}}. Powerd by</span></p>
				<div class="single-image copyright_img ms-md-1 mt-2 mt-md-0">
					<img src="{{asset('assets/images/bijoytech.png')}}" alt="logo of bijoytech">
				</div>
			</div>
		</div>
	</div>
</footer>
