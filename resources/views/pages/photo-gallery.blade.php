@extends('master')

@section('title', "Photo Gallary")
@section('description', 'Photo Gallary')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />
<link href="
https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/css/justifiedGallery.min.css
" rel="stylesheet" />
@endsection

@section('content')
<div class="page photoG-page">
	<div class="container">
		<div id="justifiedGallery1" class="justified-gallery">
            @forelse ($photos as $key => $photo)
                <a href="{{asset('dynamic-assets/photo_gallery/'.$photo->image)}}" title="{{ $photo->name }}" data-fancybox="gallery" data-caption="{{ $photo->name }}">
                    <img alt="{{ $photo->name }}" src="{{asset('dynamic-assets/photo_gallery/'.$photo->image)}}"/>
                </a>
            @empty
                <alert class="alert alert-info">No Photo Found</alert>
            @endforelse
		</div>


		{{-- <div class="text-uppercase grop-sctn_title fw-semibold text-center">2nd Gallery</div>

		<div id="justifiedGallery2" class="justified-gallery">

			<a href="{{asset('assets/images/gallery-two.jpg')}}">
				<img alt="Caption Images 1" src="{{asset('assets/images/gallery-two.jpg')}}"/>
				<span class="plus-ovr">+</span>
			</a>
			<a href="{{asset('assets/images/bg-2.jpg')}}">
				<img alt="Caption Images 1" src="{{asset('assets/images/bg-2.jpg')}}"/>
				<span class="plus-ovr">+</span>
			</a>
			<a href="{{asset('assets/images/img-02.jpg')}}">
				<img alt="Caption Images 1" src="{{asset('assets/images/img-02.jpg')}}"/>
				<span class="plus-ovr">+</span>
			</a>
			<a href="{{asset('assets/images/Slider1.jpg')}}">
				<img alt="Caption Images 1" src="{{asset('assets/images/Banner-3-1.jpg')}}"/>
				<span class="plus-ovr">+</span>
			</a>
			<a href="{{asset('assets/images/about.jpg')}}">
				<img alt="Caption Images 1" src="{{asset('assets/images/about.jpg')}}"/>
				<span class="plus-ovr">+</span>
			</a>
			<a href="{{asset('assets/images/Slider2.jpg')}}">
				<img alt="Caption Images 1" src="{{asset('assets/images/Slider2.jpg')}}"/>
				<span class="plus-ovr">+</span>
			</a>
		</div> --}}
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/js/jquery.justifiedGallery.min.js
"></script>

<script type="text/javascript">

	$('[data-fancybox="gallery"]').fancybox({
		buttons: [
		"slideShow",
		"thumbs",
		"zoom",
		"fullScreen",
		"share",
		"close"
		],
		loop: false,
		protect: true
	});

	$('#justifiedGallery1').justifiedGallery({
		autoResize: true,
		rowHeight : 220,
		lastRow : 'nojustify',
		margins : 10,
	});

	$('#justifiedGallery2').justifiedGallery({
		autoResize: true,
		rowHeight : 220,
		lastRow : 'nojustify',
		margins : 15
	});
</script>

@endsection
