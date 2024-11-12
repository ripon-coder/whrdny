@extends('master')

@section('title', $post->title)
@section('description', $post->title)

@section('style')

@endsection

@section('content')
<div class="page blog-de-page">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9 pe-lg-4">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
				<article>
					<header class="post_header sigl_header">
						<div class="img-content">
							<img class="" src="{{ asset('dynamic-assets/posts/'.$post->image) }}" alt="Seeing the Brighter Light">
						</div>
						<p class="post_meta">
							<span class="post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($post->publish_date)) }}</span>
							<span class="post_by">
								<i class="fa fa-pencil"></i>By<span> <a href="javascript:;" rel="author">{{ $post->author }}</a></span>
							</span>
						</p>
						<h2 class="post_title">{{ $post->title }}</h2>
					</header>

					<div class="blog_content" style="overflow: hidden">
						{!! $post->description !!}
					</div>
					{{-- <div class="tags_warp d-flex align-items-center mt-4 mt-md-5">
						<h6>TAGS:</h6>
						<div class="tagcloud">
							<a href="{{url('/')}}" class="btn tag-btn" aria-label="Color (6 items)">Color</a>
							<a href="{{url('/')}}" class="btn tag-btn" aria-label="Food (6 items)">Food</a>
							<a href="{{url('/')}}" class="btn tag-btn" aria-label="Nature (6 items)">Nature</a>
							<a href="{{url('/')}}" class="btn tag-btn" aria-label="Recepie (6 items)">Recepie</a>
						</div>
					</div> --}}

					@include('include.share')
					<div class="blog-nav my-4 my-md-5">
						<ul class="next-prev-nav d-flex justify-content-between">
                            @if($prevPost)
                                <li class="nav-previous">
                                    <a class="btn btn_overly" href="{{url('/blog/'.$prevPost->id)}}"><span class="np-ar">«</span>  <span>Prev Post</span></a>
                                </li>
                            @endif
                            @if($nextPost)
                                <li class="nav-next">
                                    <a class="btn btn_overly" href="{{url('/blog/'.$nextPost->id)}}"> <span>Next Post</span> <span class="np-ar">»</span></a>
                                </li>
                            @endif
						</ul>
					</div>
					<div class="comments-area">
						<h3 class="comments-title"><i class="fa fa-comment-o"></i>{{ $post->comment_count }} Comments</h3>
						<div class="all-comments">
							@if(count($post->comment))
                                @foreach ($post->comment as $comment)
                                    <div class="comment">
                                        <div class="comment-image">
                                            <img alt="" src="{{asset('assets/images/user.jpg')}}" class="cover" />
                                        </div>
                                        <div class="comment-main-area">
                                            <div class="grop-comments-meta">
                                                <h4>{{ $comment->name }}</h4>
                                                <span class="says">Says</span>
                                                <span class="comments-date"> {{ date('M d, Y', strtotime($comment->created_at)) }} at {{ date('h:i a', strtotime($comment->created_at)) }}
                                                </span>
                                            </div>
                                            <div class="comment-content">
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                            {{-- <div class="comments-reply">
                                                <button class="btn tag-btn comment-reply-link" onclick="selectReply(event,2,'Michael Novotny')"><span class="">Reply</span></button>
                                            </div> --}}
                                        </div>
                                    </div>
                                @endforeach
							@endif
						</div>
					</div>
					<div id="respond" class="comment-respond">
						<h3 class="comment-reply-title blog-comment-tlt">Leave your comments</h3>
						<div class="blog-reply-tlt">
							<h3 class="comment-reply-title align-items-center justify-content-between d-flex">
								<span>REPLY TO <span class="reply-name">JASON BRADLEY</span></span>
								<button type="button" class="cancel-comment-reply-link p-0 border-0" style="background: transparent;"><i class="fa fa-times-circle"></i></button>
							</h3>
						</div>
						<form action="{{ url('/blog/comment/'.$post->id) }}" method="post" id="commentform" class="comment-form">
							@csrf
                            <div class="mb-4">
								<textarea required class="form-control" id="comment" name="comment" placeholder="Write your comment..."></textarea>
							</div>
							<div class="mb-4">
								<input type="tel" id="url" name="website" value="" placeholder="Website" class="form-control mb-4" >
								<div class="row">
									<div class="col-sm-6 mb-4 mb-sm-0">
										<input required class="form-control" type="text" id="author" name="name" value=""  placeholder="Name">
									</div>
									<div class="col-sm-6">
										<input class="form-control" type="text" id="email" name="email" value="" placeholder="Email">
									</div>
								</div>
							</div>
							{{-- <div class="form-check mb-4 br_save_section">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label save_browser" for="defaultCheck1">
									Save my name, email, and website in this browser for the next time I comment.
								</label>
							</div> --}}
							<p class="form-submit">
								<input name="submit" type="submit" id="submit" class="btn btn_comment_submit btn_overly btn-yellow" value="Submit">
							</p>
						</form>
					</div>
				</article>
			</div>
			@include('include.sidebar')
		</div>
	</div>
</div>
@endsection



@section('script')

@endsection
