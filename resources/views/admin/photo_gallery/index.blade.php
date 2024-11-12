@extends('admin.app.app')

@section('title')
    Photo Gallery
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Photo Gallery'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="la la-server"></i> Photo Gallery</h4>
                    <div class="float-right mt-1 mr-2">
                        <a href="{{ route('admin.photo-gallery.create') }}"><button type="button"
                                class="btn btn-primary">Add New Photo</button></a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td><img width="50" class="img-thumbnail" src="{{ asset('dynamic-assets/photo_gallery/' . $item->image) }}"></td>
                                        <td>{{ $item->name }}</td>
                                        <form id="id_{{$item->id}}" action="{{route('admin.photo-gallery.destroy',$item)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                        <td>
                                            <a href="{{route('admin.photo-gallery.edit',$item)}}"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                                            <button onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) { document.getElementById('id_{{$item->id}}').submit(); }" type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!$photos->links("pagination::bootstrap-5")!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
