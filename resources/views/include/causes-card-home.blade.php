<div class="card causes-card text-center">
	<div class="position-relative cause-img">
		<a class="img-content d-block" href="{{url('/donation/url')}}">
			<img class="cover" src="{{asset('assets/images/blog-one.jpg')}}" alt="blog images" />
		</a>

		@if(url()->current() != url('/causes-list'))
		<div class="causes-btn">
			<a class="btn btn_overly btn-yellow" href="{{url('/donation/url')}}"><span>Donate Now</span></a>
		</div>
		@endif
		
		<div class="progressbar-circle" data-animate="false">
			<div class="circle" data-percent="10">
				<div>0%</div>
			</div>
		</div>
		
	</div>
	<div class="causes_text_cnt position-relative">
		<div class="causes_text">
			<h4 class="causes_ps_title">
				<a href="{{url('/donation/url')}}">Donate For Mother & Child Health</a>
			</h4>
			<p class="donation_stats">Raised: <span class="fw-5">$35.00</span> / Goal: $20,000.00</p>

			@if(url()->current() != url('/'))
			<p class="cause-txt">All children have a right to survive, thrive and fulfill their potential – to the benefit of a better world.</p>
			@endif

			@if(url()->current() == url('/causes-list'))
			<a class="btn btn_overly btn-yellow" href="{{url('/donation/url')}}"><span>Donate Now</span></a>
			@endif
			
		</div>
		@if(url()->current() != url('/causes-list'))
		<div class="card-f">
			<div class="causes_ps_date fs-13">
				<i class="fa fa-clock-o"></i> - 616 Days Left
			</div>
		</div>
		@endif
	</div>
</div>