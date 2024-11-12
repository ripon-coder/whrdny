@extends('master')

@section('title', "Video Gallary")
@section('description', 'Video Gallary')

@section('style')

@endsection

@section('content')
<div class="page videoG-page">
	<div class="container">
		<div class="row">
			@forelse ($videos as $video)
            <div class="col-md-6 mb-4">
				<div class="img-content">
					<div class="img-content-in">
						{!! $video->video !!}
					</div>
				</div>
			</div>
            @empty
                <alert class="alert alert-info">No Video Found</alert>
            @endforelse


		</div>
	</div>
</div>
@endsection



@section('script')

@endsection
