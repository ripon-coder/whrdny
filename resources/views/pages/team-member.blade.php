@extends('master')

@section('title', "Team Member")
@section('description', 'Team Member')

@section('style')

@endsection

@section('content')
<div class="page team-member">
	<div class="">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 mb-4 mb-md-0">
					<div class="people-img team_img" style="margin-right: 30px">
						<img class="" src="{{asset('dynamic-assets/board-trust/'.$member->image)}}" alt="people image" />
					</div>
				</div>
				<div class="col-lg-6 col-md-6 mb-4 mb-md-0 ps-md-5">
					<div class="people-txt-cnt p-0">
						<div class="text-uppercase people_intro position-static">{{$member->designation}}</div>
						<h2 class="tm_title">{{$member->name}}</h2>
						<p class="line-height-24">{!!$member->details!!}</p>

						<div class="tm_contactinfo">
							<div class="grop-tmsl_conctinfo_single d-flex">
								<div class="grop-float_left  rop-tmsl_conctinfo_icon">
									<img src="{{asset('assets/images/phone.png')}}" alt="Phone">
								</div>
								<div class="grop-tmsl_conctinfo">
									<div class="tm_info_label text-uppercase">Phone:</div>
									<div><a href="tel:10 (010) 512 605">{{$member->phone}}</a></div>
								</div>
							</div>
							<div class="grop-tmsl_conctinfo_single d-flex">
								<div class="grop-float_left  rop-tmsl_conctinfo_icon">
									<img src="{{asset('assets/images/email.png')}}" alt="Email">
								</div>
								<div class="grop-tmsl_conctinfo">
									<div class="tm_info_label text-uppercase">EMAIL:</div>
									<div><a href="mailto:{{$member->email}}">{{$member->email}}</a></div>
								</div>
							</div>
							<div class="grop-tmsl_conctinfo_single d-flex">
								<div class="grop-float_left  rop-tmsl_conctinfo_icon">
									<img src="{{asset('assets/images/world.png')}}" alt="World">
								</div>
								<div class="grop-tmsl_conctinfo">
									<div class="tm_info_label text-uppercase">PROFILES:</div>
									<div class="d-flex align-items-center justify-content-between">
										<div class="social_menu">
											<ul class="nav">
												<li class="nav-item"><a class="nav-link" href="{{$member->facebook}}" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
												<li class="nav-item"><a class="nav-link" href="{{$member->twitter}}" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
												<li class="nav-item"><a class="nav-link" href="{{$member->linkdin}}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('include.volunteer')

@endsection



@section('script')

@endsection