@extends('master')

@section('title', "Who We Are")
@section('description', 'Who We Are')

@section('style')

@endsection

@section('content')
<div class="page who-page">
	<section class="about-section pb-5">
		<div class="container pb-md-4">
			<div class="row">
				<div class="col-md-6 pe-md-4 mb-4 mb-md-0">
					<img class="img-fluid" src="{{asset('assets/images/about.jpg')}}" alt="about image" />
				</div>
				<div class="col-md-6 ps-md-4">
					<div class="about-txt">
						<h3 class="text-uppercase fw-semibold">SAVING LIVES AND BUILDING FUTURE</h3>
						<p><q>Hunger is stalking the globe, 81 Million people are in need of emergency food assistance.In Precision Medicine, Pioneering Young Patient Teaches Veteran Doctor. Take steps to light up the evening skies in celebration and commemoration.</q></p>
						<p>The Boy Scouts of America is one of the nation’s largest and most prominent values-based youth development organizations, providing programs for young people that build character, trains them in the responsibilities of participating citizenship and develops personal fitness. For more than 100 years, Boy Scouts of America has helped build future leaders by combining educational activities and lifelong values with fun.improves health for people affected by poverty or disaster so they can reach their full potential.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="who-ms-section bg-light1">
		<div class="container">
			<div class="row">

				<div class="col-md-4">
					<div class="whoms_single d-flex align-items-start">
						<img class="img-fluid" src="{{asset('assets/images/gift.png')}}" alt="gift logo" />
						<div class="ps-3 ps-md-4">
							<h4 class="text-uppercase"><a href="#">Positive Thoughts</a></h4>
							<p>We aspire to be like hlpers. So we serve all people. No matter their religion, ethnicity, or gender.</p>
						</div>
					</div>
				</div> 

				<div class="col-md-4">
					<div class="whoms_single d-flex align-items-start">
						<img class="img-fluid" src="{{asset('assets/images/gift.png')}}" alt="gift logo" />
						<div class="ps-3 ps-md-4">
							<h4 class="text-uppercase"><a href="#">Heartful Help</a></h4>
							<p>Going after poverty’s symptoms is temporary. Going after its causes is permanent for everyone.</p>
						</div>
					</div>
				</div> 

				<div class="col-md-4">
					<div class="whoms_single d-flex align-items-start">
						<img class="img-fluid" src="{{asset('assets/images/gift.png')}}" alt="gift logo" />
						<div class="ps-3 ps-md-4">
							<h4 class="text-uppercase"><a href="#">Spread To Everyone</a></h4>
							<p>In an effort to ensure volunteering at Foundation events is fulfilling experience for you.</p>
						</div>
					</div>
				</div> 


			</div>
		</div>
	</section>
	<section class="mission-section">
		<div class="container">
			<div class="row">
				<div class="col-md-3 mb-5 mb-md-0">
					<div class="mission-text">
						<h3>ONLY A LIFE LIVED FOR OTHERS IS WORTH</h3>
						<p>Save the Children believes every child deserves a future. In the U.S. and around the world, we give children a healthy start in life.</p>
						<a class="btn btn_overly btn-dark mt-3" href="{{url('/how-we-work')}}"><span>SEE OUR IMPACTS</span></a>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">

						<div class="col-md-4 col-sm-6 mb-4 mb-md-0">
							<div class="mission-card">
								<div class="img-content">
									<img class="cover" src="{{asset('assets/images/gallery-two.jpg')}}" alt="blog images" />
								</div>
								<h4>Social Policy Initiatives</h4>
								<p>Fundraising for local community causes world help received Groppe</p>
								<ul class="list-group list-group-flush mission_list">
									<li class="list-group-item border-0"><i class="fa fa-check"></i>Affordable Housing</li>
									<li class="list-group-item border-0"><i class="fa fa-check"></i>Disaster Operations</li>
									<li class="list-group-item border-0"><i class="fa fa-check"></i>Making an impact</li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-6 mb-4 mb-md-0">
							<div class="mission-card">
								<div class="img-content">
									<img class="cover" src="{{asset('assets/images/gallery-three.jpg')}}" alt="blog images" />
								</div>
								<h4>Youth create waves of change</h4>
								<p>Establishing a Donor Advised Fund is a convenient and simple way</p>
								<ul class="list-group list-group-flush mission_list">
									<li class="list-group-item border-0"><i class="fa fa-check"></i>Help us to help them</li>
									<li class="list-group-item border-0"><i class="fa fa-check"></i>Foundational Services</li>
									<li class="list-group-item border-0"><i class="fa fa-check"></i>Emergency Response</li>
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-sm-6 mb-4 mb-md-0">
							<div class="mission-card">
								<div class="img-content">
									<img class="cover" src="{{asset('assets/images/gallery-two.jpg')}}" alt="blog images" />
								</div>
								<h4>Pioneering From Young Life</h4>
								<p>We want to do more and you can help. By committing a small fraction.</p>
								<ul class="list-group list-group-flush mission_list">
									<li class="list-group-item border-0"><i class="fa fa-check"></i>The need for consensus</li>
									<li class="list-group-item border-0"><i class="fa fa-check"></i>Create waves of change</li>
									<li class="list-group-item border-0"><i class="fa fa-check"></i>Integrated Health & Nutrition</li>
								</ul>
							</div>
						</div>



					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="volunteer-section">
		<div class="container">
			<div class="become-v py-5 px-4">
				<div class="d-lg-flex align-items-center justify-content-between">
					<div class="text-center text-md-start">
						<h3 class="text-uppercase fw-semibold mb-1">PLEASE RAISE YOUR HAND</h3>
						<p class="mb-0 me-0 me-lg-5">For those helpless childrensand people who need it every minitues.</p>
					</div>
					<div class="text-center text-lg-start mt-4 mt-lg-0">
						<a class="btn btn_overly bg-white callout_btn" href="#"><span>BECOME A VOLUNTEER</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="people-section">
		<div class="container">
			<h2 class="text-uppercase people-tlt text-center fw-semibold">Our Groppe People</h2>
			<div class="row">
				@foreach($board_trust as $item)
				<div class="col-lg-3 col-sm-6 mb-4 mb-md-0">
					<div class="card">
						<div class="position-relative people-img">
							<a class="img-content d-block" href="{{url('/team/member')}}">
								<img class="cover" src="{{asset('dynamic-assets/board-trust/'.$item->image)}}" alt="{{$item->name}}" />
							</a>
							<div class="text-uppercase people_intro">{{$item->designation}}</div>
						</div>
						<div class="people-txt-cnt position-relative">
							<h4 class="causes_ps_title px-0">
								<a href="{{route('teamMember',$item)}}">{{$item->name}}</a>
							</h4>
							<p class="">{{\App\Helper\Help::str(strip_tags($item->details),100)}}</p>

							<div class="card-f d-flex align-items-center justify-content-between">
								<div class="mt-txt">
									Meet Me On:
								</div>
								<div class="social_menu">
									<ul class="nav">
										<li class="nav-item"><a class="nav-link" href="{{$item->facebook}}" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
										<li class="nav-item"><a class="nav-link" href="{{$item->twitter}}" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
										<li class="nav-item"><a class="nav-link" href="{{$item->linkdin}}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection



@section('script')

@endsection