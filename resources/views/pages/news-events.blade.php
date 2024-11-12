@extends('master')

@section('title', 'News & Events')
@section('description', 'Events')

@section('style')

@endsection

@section('content')
    <div class="page event-wrapper">
        <div class="container">
            {{-- <div class="filter-btn mb-4 pb-md-2">
                <button class="active btn" id="all">Show All</button>
                <button class="btn" id="awarness">Awarness</button>
                <button class="btn" id="education">Education</button>
            </div> --}}
            <div class="row filterRow">
                @foreach ($events as $item)
                    <div class="col-md-6 col-lg-4 mb-4 mb-md-5">
                        @include('include.events-card')
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {!!$events->links("pagination::bootstrap-4")!!}
            </div>
        </div>
    </div>
@endsection



@section('script')

@endsection
