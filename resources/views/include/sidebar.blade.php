<div class="col-12 col-lg-3 ps-lg-3 mt-5 mt-lg-0">
    <aside class="sidebar">
        <aside id="search-2" class="side-widget">
            <form method="get" id="searchform" action="{{ url('/blog') }}" class="position-relative wigt_search_form">
                <input class="form-control" required type="search" name="s" id="s"
                    value="{{ request()->s }}" placeholder="Looking For Something?">
                <button type="submit" class="search_submit"><span class="fa fa-search"></span></button>
            </form>
        </aside>

        @if (isset($recent_posts) && count($recent_posts))
            <aside class="side-widget">
                <h4 class="side-widget-title">Recent Posts</h4>
                <ul class="ps-0">
                    @foreach ($recent_posts as $pst)
                        <li>
                            <a href="{{ url('/blog/' . $pst->id) }}">{{ Str::limit($pst->title, 40) }}</a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        @endif
        @if (isset($upcoming_event) && count($upcoming_event))
            <aside class="side-widget">
                <h4 class="side-widget-title">Upcoming Event</h4>
                <ul class="ps-0">
                    @foreach ($upcoming_event as $pst)
                        <li>
                            <a href="{{ url('/event/' . $pst->slug) }}">{{ Str::limit($pst->title, 40) }}</a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        @endif
        @if (isset($current_event) && count($current_event))
            <aside class="side-widget">
                <h4 class="side-widget-title">Current Event</h4>
                <ul class="ps-0">
                    @foreach ($current_event as $pst)
                        <li>
                            <a href="{{ url('/event/' . $pst->slug) }}">{{ Str::limit($pst->title, 40) }}</a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        @endif
        @if (isset($past_event) && count($past_event))
            <aside class="side-widget">
                <h4 class="side-widget-title">Past Event</h4>
                <ul class="ps-0">
                    @foreach ($past_event as $pst)
                        <li>
                            <a href="{{ url('/event/' . $pst->slug) }}">{{ Str::limit($pst->title, 40) }}</a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        @endif
		@if (isset($photos) && count($photos))
		<aside class="side-widget">
			<h4 class="side-widget-title">EVENTS PHOTOS</h4>
			<div class="row mx-0">
				@foreach ($photos as $item)
				<div class="col-4 p-1">
					<a href="{{url('/')}}">
						<div class="img-content" style="padding-bottom: 100%;">
							<img class="cover" src="{{asset("dynamic-assets/photo_gallery/".$item->image)}}" alt="{{$item->title}}">
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</aside>
		@endif
		<aside class="side-widget donate_txt_wigt">
			<h4 class="side-widget-title mb-2">DONATE</h4>
			<p>We are working to provide all people with access to the means for good health. Help poor people overcome emergencies.</p>
			<a href="{{route("whatWeDo")}}" class="btn btn-yellow px-4">Donate Now!</a>
		</aside>
		
        {{-- <aside class="side-widget widget_recent_comments">
			<h4 class="side-widget-title">Recent Comments</h4>
			<ul class="ps-0 no-arrow-ul" id="recentcomments">
				<li class="recentcomments"><span class="comment-author-link">Chris Ames</span> on <a href="{{url('')}}">Dedicated Life for our Country</a></li>
				<li class="recentcomments"><span class="comment-author-link">Michael Novotny</span> on <a href="{{url('')}}">Dedicated Life for our Country</a></li>
				<li class="recentcomments"><span class="comment-author-link">Jared Erickson</span> on <a href="{{url('')}}">Climate Change Factor</a></li>
				<li class="recentcomments"><span class="comment-author-link">Tom McFarlin</span> on <a href="{{url('')}}">Light Shines on Poorer</a></li>
				<li class="recentcomments"><span class="comment-author-link">Michael Novotny</span> on <a href="h{{url('')}}">Light Shines on Poorer</a></li>
			</ul>
		</aside>

		<aside class="side-widget">
			<h4 class="side-widget-title">ARCHIVES</h4>
			<ul class="ps-0">
				<li>
					<a href="{{url('')}}">August 2017</a>
				</li>
			</ul>

		</aside>

		<aside class="side-widget">
			<h4 class="side-widget-title">CATEGORIES</h4>
			<ul class="ps-0">
				<li>
					<a href="{{url('/category/url')}}">Disaster</a>
				</li>
				<li>
					<a href="{{url('/category/url')}}">Event</a>
				</li>
				<li>
					<a href="{{url('/category/url')}}">Flood</a>
				</li>
				<li>
					<a href="{{url('/category/url')}}">Helping</a>
				</li>
			</ul>

		</aside>

		<aside class="side-widget">
			<h4 class="side-widget-title">META</h4>
			<ul class="ps-0">
				<li>
					<a href="{{url('')}}">Log in</a>
				</li>
				<li>
					<a href="{{url('')}}">Entries feed</a>
				</li>
				<li>
					<a href="{{url('')}}">Comments feed</a>
				</li>
				<li>
					<a href="{{url('')}}">WordPress.org</a>
				</li>
			</ul>

		</aside>


		<aside class="side-widget">
			<h4 class="side-widget-title">POST CATEGORIES</h4>
			<ul class="ps-0">
				<li>
					<a href="{{url('/category/url')}}">Disaster</a>
				</li>
				<li>
					<a href="{{url('/category/url')}}">Event</a>
				</li>
				<li>
					<a href="{{url('/category/url')}}">Flood</a>
				</li>
				<li>
					<a href="{{url('/category/url')}}">Helping</a>
				</li>
			</ul>

		</aside>

		<aside class="side-widget">
			<h4 class="side-widget-title">LATEST NEWS</h4>
			<ul class="ps-0 no-arrow-ul">
				<li>
					<h5>
						<a class="widget-btitle" href="{{url('/')}}">Education On Self Respect</a>
					</h5>
					<span class="widget-bdate">
						<i class="fa fa-clock-o"></i>
					07th Aug 2017    </span>
				</li>
				<li>
					<h5>
						<a class="widget-btitle" href="{{url('/')}}">Seeing the Brighter Light</a>
					</h5>
					<span class="widget-bdate">
						<i class="fa fa-clock-o"></i>
					08th Aug 2017    </span>
				</li>
			</ul>

		</aside>

		<aside class="side-widget donate_txt_wigt">
			<h4 class="side-widget-title mb-2">DONATE</h4>
			<p>We are working to provide all people with access to the means for good health. Help poor people overcome emergencies.</p>
			<a href="{{url('/')}}" class="btn btn-yellow px-4">Donate Now!</a>
		</aside>
		<aside class="side-widget">
			<h4 class="side-widget-title">TAGS</h4>
			<div class="tagcloud">
				<a href="{{url('/category/url')}}" class="btn tag-btn" aria-label="Color (6 items)">Color</a>
				<a href="{{url('/category/url')}}" class="btn tag-btn" aria-label="Food (6 items)">Food</a>
				<a href="{{url('/category/url')}}" class="btn tag-btn" aria-label="Nature (6 items)">Nature</a>
				<a href="{{url('/category/url')}}" class="btn tag-btn" aria-label="Recepie (6 items)">Recepie</a>
			</div>
		</aside>

		<aside class="side-widget">
			<h4 class="side-widget-title">SHOP CATEGORIES</h4>
			<ul class="ps-0">
				<li>
					<a href="{{url('')}}">Disaster</a>
				</li>
				<li>
					<a href="{{url('')}}">Event</a>
				</li>
				<li>
					<a href="{{url('')}}">Flood</a>
				</li>
				<li>
					<a href="{{url('')}}">Helping</a>
				</li>
			</ul>

		</aside> --}}
    </aside>
</div>
