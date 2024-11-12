<div class="card event-card">
	<div class="img-content">
		<img class="cover" src="{{asset('dynamic-assets/event/'.$item->image)}}" alt="{{$item->title}}" />
	</div>
	<div class="event_text_cnt">
		<div class="ucoming_evnt_txt_cont">
			<div class="ucoming_evnt_date">{{ date('F d, Y @ h:i A', strtotime($item->end_date_time)) }}</div>

			<h4 class="ucoming_evnt_title"><a href="{{route('event',$item->slug)}}">{{$item->title}}</a></h4>

			<p class="ucoming_evnt_location">
				<i class="fa fa-map-marker"></i>
				{{$item->location}}
			</p>

			<a class="btn btn-light mt-2" href="{{route('event',$item->slug)}}">
				<span>Details</span>
			</a>
		</div>

		<div class="ucoming_evnt_footr d-flex justify-content-between">
			<div class="ucoming_evnt_social">
				<div class="ucoevnt_socil d-flex">
					<a href="#" class="evs_evpop"><i class="fa fa-envelope-o"></i></a>
					<div class="evshare_warp">
						<a class="evshare_share" href="#"><i class="fa fa-share-alt"></i></a>
						<div class="evshare_icon">
							<a class="ev-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{request()->url()}}"><i class="fa fa-facebook"></i></a>
							<a class="ev-twitter" href="https://twitter.com/intent/tweet?text={{request()->url()}}"><i class="fa fa-twitter"></i></a>
						</div>
					</div>
				</div>
			</div>
			@isset($item->time)
			<div class="ucoming_evnt_time"><i class="fa fa-clock-o me-1"></i>{{$item->time}}</div>
			@endisset
		</div>
	</div>
</div>