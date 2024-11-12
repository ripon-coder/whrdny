<ul class="nav">
	<li class="nav-item">
		<a class="nav-link main-a @if(url()->current() == url('/'))active @endif" aria-current="page" href="{{url('/')}}">Home</a>
	</li>
	<li class="nav-item has-children">
		<a  href="{{url('/who-we-are')}}" class="nav-link main-a d-none d-lg-block @if(url()->current() == url('/who-we-are'))active @endif">Who we are</a>
		<a class="nav-link main-a d-block d-lg-none">Who we are</a>
		<ul class="nav flex-column sub-menu">
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
				<a class="nav-link" href="{{url('/board-of-trustee')}}">Board of Trustee</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{url('/faqs')}}">FAQs</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{url('/how-we-work')}}">How We Work</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{url('/overview')}}">Overview</a>
			</li>
		</ul>
	</li>
	<li class="nav-item">
		<a class="nav-link main-a @if(url()->current() == url('/news-events'))active @endif" href="{{url('/news-events')}}">Events</a>
	</li>
	<li class="nav-item">
		<a class="nav-link main-a @if(url()->current() == url('/what-we-do'))active @endif" href="{{url('/what-we-do')}}">What We Do</a>
	</li>
	<li class="nav-item has-children">
		<a class="nav-link main-a">Gallery</a>
		<ul class="nav flex-column sub-menu">
			<li class="nav-item">
				<a class="nav-link" href="{{url('/photo-gallery')}}">Photo Gallery</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{url('/video-gallery')}}">Video Gallery</a>
			</li>
		</ul>
	</li>
	<li class="nav-item">
		<a class="nav-link main-a" href="{{url('/blog')}}">Blog</a>
	</li>
	<li class="nav-item">
		<a class="nav-link main-a" href="{{url('/contact')}}">Contact</a>
	</li>
</ul>