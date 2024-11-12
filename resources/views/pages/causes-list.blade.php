@extends('master')

@section('title', 'Causes List')
@section('description', 'Causes List')

@section('style')

@endsection

@section('content')
    <div class="page causes-list-page">
        <div class="container">
            <div class="row">
                @foreach ($fund_raises as $item)
                    <div class="col-md-12 col-lg-9">
                        @include('include.causes-card')
                    </div>
                @endforeach
            </div>
			<div class="d-flex justify-content-center">
			{!!$fund_raises->links("pagination::bootstrap-4")!!}
			</div>
        </div>
    </div>
@endsection



@section('script')

@endsection
