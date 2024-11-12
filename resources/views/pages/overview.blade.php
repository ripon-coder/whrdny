@extends('master')

@section('title', "Overview")
@section('description', 'Overview')

@section('style')

@endsection

@section('content')
<div class="page objectives-page">
	<div class="container">
		{!!$overview->details!!}
	</div>
</div>
@endsection



@section('script')

@endsection