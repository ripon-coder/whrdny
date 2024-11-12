@extends('master')

@section('title', "Mission")
@section('description', 'Mission')

@section('style')

@endsection

@section('content')
<div class="page mission-page">
	<div class="container">
		<div class="page-cnt text-center mx-auto" style="max-width: 750px;">
			<h2 class="page-title mb-4">Our Mission</h2>
			<div class="grop-txt-blck mb-4 pb-3">{{@$mission->title}}</div>
			{!!@$mission->description!!}
			<div class="mt-5">
				<a href="{{@$mission->button_url}}"><button class="btn btn-orange my_button_donation">Give Donation</button></a>
			</div>
		</div>
	</div>
	<div>
		<img class="" style="width: 100%" src="{{asset('dynamic-assets/mission/'.@$mission->image)}}" alt="Mission image" />
	</div>
</div>
@endsection



@section('script')

@endsection