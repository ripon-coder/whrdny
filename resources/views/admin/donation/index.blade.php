@extends('admin.app.app')

@section('title')
Donations
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection

@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Donations'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="la la-server"></i> Donations</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Donate ID</th>
                                    <th scope="col">Fund ID</th>
                                    <th scope="col">Fund Title</th>
                                    <th scope="col">Raise Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donations as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->fund->id }}</td>
                                        <td>{{ $item->fund->title }}</td>
                                        <td>${{ $item->raise }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $item->status === \App\Enums\Admin\DonationEnum::Pending->value ? 'warning' : ($item->status === \App\Enums\Admin\DonationEnum::Approve->value ? 'success' : 'danger') }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <form id="id_{{$item->id}}" action="{{route('admin.donation-admin.destroy',$item)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                        <td>
                                            <a href="{{route('admin.donation-admin.edit',$item)}}"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                                            {{-- <button onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) { document.getElementById('id_{{$item->id}}').submit(); }" type="button" class="btn btn-danger btn-sm">Delete</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!!$donations->links("pagination::bootstrap-5")!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
