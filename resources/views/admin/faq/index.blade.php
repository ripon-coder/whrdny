@extends('admin.app.app')

@section('title')
    Faq
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Faq'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="la la-server"></i> Faq</h4>
                    <div class="float-right mt-1 mr-2">
                        <a href="{{ route('admin.faq-admin.create') }}"><button type="button"
                                class="btn btn-primary">Add New Faq</button></a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->question }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $item->status == \App\Enums\Admin\BoardTrustEnum::Unpublished->value  ? 'warning' : ($item->status == \App\Enums\Admin\BoardTrustEnum::Published->value  ? 'success' : 'danger') }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <form id="id_{{ $item->id }}"
                                            action="{{ route('admin.faq-admin.destroy', $item) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <td>
                                            <a href="{{ route('admin.faq-admin.edit', $item) }}"><button type="button"
                                                    class="btn btn-primary btn-sm">Edit</button></a>
                                            <button
                                                onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) { document.getElementById('id_{{ $item->id }}').submit(); }"
                                                type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $faqs->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
@endsection
