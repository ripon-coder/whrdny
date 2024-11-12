@extends('admin.app.app')

@section('title')
    Learning
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Learning'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="la la-server"></i> Learning</h4>
                    <div class="float-right mt-1 mr-2">
                        <a href="{{ route('admin.learning.create') }}"><button type="button"
                                class="btn btn-primary">Add New Learning</button></a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Button Text</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>

                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->button_text }}</td>
                                        <td>{{ Str::limit(strip_tags($item->description, 200)) }}</td>
                                        <form id="id_{{$item->id}}" action="{{route('admin.learning.destroy',$item)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                        <td>
                                            <a href="{{route('admin.learning.edit',$item)}}"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                                            <button onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) { document.getElementById('id_{{$item->id}}').submit(); }" type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!$posts->links("pagination::bootstrap-5")!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
