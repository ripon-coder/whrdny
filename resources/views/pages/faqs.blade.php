@extends('master')

@section('title', "Faqs")
@section('description', 'Faqs')

@section('style')

@endsection

@section('content')
<div class="page faqs-page pb-0">
	<div class="container pb-5">
		<h2 class="page-title mb-5 text-capitalize text-center">You need any help? <span class="fw-semibold">FAQ below</span></h2>
		<div class="row">
			<div class="col-12 col-md-6 pe-md-4">
				<div class="accordion" id="faqs">
					@foreach($left_faqs as $left_item)
					<div class="accordion-item">
						<h2 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{$left_item->id}}" aria-expanded="false" aria-controls="faq{{$left_item->id}}">
								{{$left_item->question}}
							</button>
						</h2>
						<div id="faq{{$left_item->id}}" class="accordion-collapse collapse" data-bs-parent="#faqs">
							<div class="accordion-body">
								<p>{{$left_item->answer}}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-12 col-md-6 ps-md-4">
				<div class="accordion" id="faqsT">
					@foreach($right_faqs as $right_item)
					<div class="accordion-item">
						<h2 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqsT{{$right_item->id}}" aria-expanded="false" aria-controls="faqsT{{$right_item->id}}">
								{{$right_item->question}}
							</button>
						</h2>
						<div id="faqsT{{$right_item->id}}" class="accordion-collapse collapse" data-bs-parent="#faqsT">
							<div class="accordion-body">
								<p>{{$right_item->answer}}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="quick-ask-area text-center mt-5">
		<h2 class="page-title text-capitalize" style="font-weight: 400;">Wanna Quick Support? <b>Ask Us</b></h2>
		<p style="font-size: 16px;">Simply dummy text of the printing and typesetting industry standard since.</p>
		<div class="calout-btn mt-4 pt-2">
			<a style="height: 50px;line-height: 50px;" class="btn btn_overly btn-yellow px-4" href="{{url('/contact')}}"><span>Email Your Questions</span></a>
		</div>
	</div>
</div>
@endsection



@section('script')

@endsection