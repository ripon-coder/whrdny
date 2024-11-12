@extends('master')

@section('title', "Objectives")
@section('description', 'Objectives')

@section('style')

@endsection

@section('content')
<div class="page history-page">
	<div class="container">
		{!!@$history->description!!}
	</div>
</div>
@endsection



@section('script')

@endsection