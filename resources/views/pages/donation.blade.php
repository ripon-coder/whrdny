
@extends('master')

@section('title', "Blog")
@section('description', 'Blog')

@section('style')

@endsection

@section('content')

@php 
$percentange = ($fund_rise->donation_sum_raise/$fund_rise->goal)*100;
$final_percentage = round($percentange);
@endphp

<div class="page donation-page">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9 pe-lg-4">
				<article>
					<header class="post_header sigl_header">
						<div class="img-content-ripon">
							<img class="" src="{{asset('dynamic-assets/fund-raise/'.$fund_rise->image)}}" alt="{{$fund_rise->title}}">
							<div class="doner_count">
								<i class="fa fa-heart"></i>{{$fund_rise->donation_count}} Donor(s)
							</div>
						</div>
						<p class="post_meta mb-3">
							<span class="post_date"><i class="fa fa-clock-o"></i>- @if ($fund_rise->end_date < now()) 0 @else {{App\Helper\Help::DaysCount($fund_rise->end_date)}} @endif Days Left</span>
						</p>
						<h2 class="post_title">{{$fund_rise->title}}</h2>
						<div class="progressBar progressCounter">
							<div class="progressBarcontainer">
								<div class="speech-bubble"><span class="progress-count" progress-value="{{$final_percentage}}">{{$final_percentage}}</span>%</div>
								<div class="progressBarValue"></div>
							</div>
						</div>
						<div class="d-md-flex justify-content-between pb-3">
							<p class="donation_stats mb-4 mb-md-0">Raised: <strong class="rasd_amount">${{number_format($fund_rise->donation_sum_raise,2, '.', ',')}}</strong> / Goal: ${{$fund_rise->goal}}</p>
							<a class="btn btn_overly btn-dark" href="{{route('donate',$fund_rise->slug)}}">
								<span>Donate Now</span>
							</a>
						</div>
					</header>

					<div class="blog_content">
						{!!$fund_rise->details!!}
					</div>

					@include('include.share')
					<div class="blog-nav my-4 my-md-5">
						<ul class="next-prev-nav d-flex justify-content-between">
							
							<li class="nav-previous">
								<a class="btn btn_overly" href="@if ($previous_post) {{route("donation_details",$previous_post->slug)}} @else # @endif"><span class="np-ar">«</span>  <span>Prev Post</span></a>
							</li>
							
							
							<li class="nav-next">
								<a class="btn btn_overly" href="@if($next_post) {{route("donation_details",$next_post->slug)}} @else # @endif"> <span>Next Post</span> <span class="np-ar">»</span></a>
							</li>
							
						</ul>
					</div>
				</article>
			</div>
			@include('include.sidebar')
		</div>
	</div>
</div>
@endsection



@section('script')
<script type="text/javascript">
	var skills = {
		ht: $('.progress-count').attr("progress-value")
	};
	var i=0;
	if($('.progressCounter').length>0) {
		var counted = 0;
		$(window).scroll(function() {
			var oTop = $('.progressCounter').offset().top - window.innerHeight;
			if (counted == 0 && $(window).scrollTop() > oTop) {

				$.each(skills, function(key, value) {
					$(".speech-bubble").eq(i).animate(
					{
						left: (value - 2) + "%"
					},
					3000
					);
					$(".progressBarValue").eq(i).animate(
					{
						width: value + "%"
					},
					3000
					);
					i++;
				});
				
				$('.progress-count').each(function() {
					var $this = $(this),
					countTo = $this.attr('progress-value');
					$({
						countNum: $this.text()
					}).animate({
						countNum: countTo
					},

					{

						duration: 3000,
						easing: 'swing',
						step: function() {
							$this.text(Math.floor(this.countNum));
						},
						complete: function() {
							$this.text(this.countNum);
						}

					});
				});
				counted = 1;
			}
		});
	}
</script>
@endsection