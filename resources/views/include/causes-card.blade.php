@php 
$percentange = ($item->donation_sum_raise/$item->goal)*100;
$final_percentage = round($percentange);
@endphp
<div class="card causes-card text-center">
	<div class="position-relative cause-img">
		<a class="img-content d-block" href="{{route('donation_details',$item->slug)}}">
			<img class="cover" src="{{asset('dynamic-assets/fund-raise/'.$item->image)}}" alt="{{$item->title}}" />
		</a>

		@if(url()->current() != url('/causes-list'))
		<div class="causes-btn">
			<a class="btn btn_overly btn-yellow" href="{{route('donation_details',$item->slug)}}"><span>Donate Now</span></a>
		</div>
		@endif
		
		<div class="progressbar-circle" data-animate="false">
			<div class="circle" data-percent="{{$final_percentage}}">
				<div>{{$final_percentage}}%</div>
			</div>
		</div>
		
	</div>
	<div class="causes_text_cnt position-relative">
		<div class="causes_text">
			<h4 class="causes_ps_title">
				<a href="{{route('donation_details',$item->slug)}}">{{$item->title}}</a>
			</h4>
			<p class="donation_stats">Raised: <span class="fw-5">${{number_format($item->donation_sum_raise,2, '.', ',')}}</span> / Goal: ${{$item->goal}}</p>

			@if(url()->current() != url('/'))
			<p class="cause-txt">{{App\Helper\Help::str(strip_tags($item->details),150)}}</p>
			@endif

			@if(url()->current() == url('/causes-list'))
			<a class="btn btn_overly btn-yellow" href="{{route('donation_details',$item->slug)}}"><span>Donate Now</span></a>
			@endif
			
		</div>
		@if(url()->current() != url('/causes-list'))
		<div class="card-f">
			<div class="causes_ps_date fs-13">
				<i class="fa fa-clock-o"></i> - @if ($item->end_date < now()) 0 @else {{App\Helper\Help::DaysCount($item->end_date)}} @endif  Days Left
			</div>
		</div>
		@endif
	</div>
</div>