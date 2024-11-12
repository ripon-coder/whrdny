@extends('admin.app.app')

@section('title')
    Fund Raise
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Fund Raise'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="la la-server"></i> Fund Raise</h4>
                    <div class="float-right mt-1 mr-2">
                        <a href="{{ route('admin.fund-raise-admin.create') }}"><button type="button"
                                class="btn btn-primary">Add New Fund Raise</button></a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($found_raise as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td><img width="50" class="img-thumbnail" src="{{ asset('dynamic-assets/fund-raise/' . $item->image) }}"></td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $item->status === \App\Enums\Admin\FoundRaiseEnum::Unpublished->value ? 'warning' : ($item->status === \App\Enums\Admin\FoundRaiseEnum::Published->value ? 'success' : 'danger') }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <form id="id_{{$item->id}}" action="{{route('admin.fund-raise-admin.destroy',$item)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                        <td>
                                            <a href="{{route('admin.fund-raise-admin.edit',$item)}}"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                                            <button onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) { document.getElementById('id_{{$item->id}}').submit(); }" type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!$found_raise->links("pagination::bootstrap-5")!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
