@extends('master')

@section('title', "Objectives")
@section('description', 'Objectives')

@section('style')

@endsection

@section('content')
<div class="page objectives-page">
	<div class="container">
		<h2 class="page-title mb-2 pb-2 border-bottom text-uppercase">{{@$objective->title}}</h2>
		{!!@$objective->description!!}
	</div>
</div>
@endsection



@section('script')

@endsection