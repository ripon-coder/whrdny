@extends('master')

@section('title', "What We Do")
@section('description', 'What We Do')

@section('style')

@endsection

@section('content')
<div class="page">
	<div class="container">
		<div class="row">
			@foreach($fund_raises as $item)
			<div class="col-md-6 col-lg-4 mb-4 mb-md-4">
				@include('include.causes-card')
			</div>
			@endforeach
		</div>
		<div class="d-flex justify-content-center">
			{!!$fund_raises->links("pagination::bootstrap-4")!!}
		</div>
	</div>
</div>
@include('include.volunteer')
@endsection



@section('script')

@endsection