@extends('master')

@section('title', "BOARD OF TRUSTEE")
@section('description', 'BOARD OF TRUSTEE')

@section('style')

@endsection

@section('content')
<div class="page objectives-page pb-0">
	<div class="container pb-5">
		<h2 class="page-title mb-2 text-uppercase">BOARD OF TRUSTEE</h2>
		<p class="mb-5" style="font-size: 16px;">Volunteering is an easy way to get involved in practical conservation. putting our faith into action to help the world’s poorest create lasting change. For people affected by poverty or disaster, health is essential to a better future.</p>
		<div class="row bm-row">
			@foreach ($board_trust as $item)
			<div class="col-12 bm-col mb-4">
				<div class="img-content" style="padding-bottom: 100%;">
					<img class="cover" src="{{asset('dynamic-assets/board-trust/'.$item->image)}}" alt="{{$item->name}}" />
				</div>
				<div class="tm_intro">
					<h4><a href="{{route('teamMember',$item)}}"> {{$item->name}} </a></h4>
					<h6>{{$item->designation}}</h6>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@include('include.volunteer')
</div>
@endsection



@section('script')

@endsection