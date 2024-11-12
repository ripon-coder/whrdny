@extends('admin.app.app')

@section('title')
    Video Gallery
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Video Gallery'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="la la-server"></i> Video Gallery</h4>
                    <div class="float-right mt-1 mr-2">
                        <a href="{{ route('admin.video-gallery.create') }}"><button type="button"
                                class="btn btn-primary">Add New Video</button></a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{!! $item->video !!}</td>
                                        <form id="id_{{$item->id}}" action="{{route('admin.video-gallery.destroy',$item)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                        <td>
                                            <button onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) { document.getElementById('id_{{$item->id}}').submit(); }" type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!$videos->links("pagination::bootstrap-5")!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
