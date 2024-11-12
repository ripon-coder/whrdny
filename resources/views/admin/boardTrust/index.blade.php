@extends('admin.app.app')

@section('title')
    Board Of Trust
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Board Of Trust'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="la la-server"></i> Board Of Trust</h4>
                    <div class="float-right mt-1 mr-2">
                        <a href="{{ route('admin.board-trust-admin.create') }}"><button type="button"
                                class="btn btn-primary">Add New Board</button></a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($board_trust as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->designation }}</td>
                                        <td><img width="50" class="rounded-circle"
                                                src="{{ asset('dynamic-assets/board-trust/' . $item->image) }}"></td>
                                        <td>

                                            <span
                                                class="badge badge-{{ $item->status == \App\Enums\Admin\BoardTrustEnum::Unpublished->value  ? 'warning' : ($item->status == \App\Enums\Admin\BoardTrustEnum::Published->value  ? 'success' : 'danger') }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <form id="id_{{ $item->id }}"
                                            action="{{ route('admin.board-trust-admin.destroy', $item) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <td>
                                            <a href="{{ route('admin.board-trust-admin.edit', $item) }}"><button type="button"
                                                    class="btn btn-primary btn-sm">Edit</button></a>
                                            <button
                                                onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) { document.getElementById('id_{{ $item->id }}').submit(); }"
                                                type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $board_trust->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
@endsection
