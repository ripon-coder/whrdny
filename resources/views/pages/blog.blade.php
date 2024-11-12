@extends('master')

@section('title', "Blog")
@section('description', 'Blog')

@section('style')

@endsection

@section('content')
<div class="page blog-page">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9 pe-lg-4">
				@forelse ($posts as $post)
                    <article class="blog_post">
                        <header class="post_header">
                            <div class="img-content">
                                <img class="cover" src="{{ asset('dynamic-assets/posts/'.$post->image) }}" alt="Seeing the Brighter Light">
                            </div>
                            <p class="post_meta">
                                <span class="post_date"><i class="fa fa-clock-o"></i>{{ date('M d, Y', strtotime($post->publish_date)) }}</span>
                                <span class="post_by">
                                    <i class="fa fa-pencil"></i><span> <a href="javascript:;" rel="author">{{ $post->author }}</a></span>
                                </span>
                            </p>
                            <h2 class="post_title"><a href="{{url('/blog/'.$post->id)}}">{{ $post->title }}</a></h2>
                        </header>
                        <div class="post_content">
                            {{ Str::limit(strip_tags($post->description), 300) }}

                        </div>
                        <footer class="row post_footer">
                            <div class="text-start col-sm-6">
                                <a class="btn btn_overly btn-yellow" href="{{url('/blog/'. $post->id)}}">
                                    <span>Read More</span>
                                </a>
                            </div>
                            <div class="text-end col-sm-6">
                                <a href="{{url('/blog/'.$post->id)}}"><span class="post_comnt"><i class="fa fa-comment-o"></i><span>{{ $post->comment_count }}</span></span></a>
                            </div>
                        </footer>

                    </article>
                @empty
                    <div class="alert alert-info">No Posts Found</div>
                @endforelse


			</div>
			@include('include.sidebar')
		</div>
	</div>
</div>
@endsection



@section('script')

@endsection
