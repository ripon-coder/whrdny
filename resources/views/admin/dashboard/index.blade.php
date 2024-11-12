@extends('admin.app.app')

@section('title')
    Dashborard
@endsection

@section('vendorCss')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('pageCss')
@endsection


@section('content')
    <h3>Dashboard</h3>

    <div class="row">
        <div class="col-12">
            <div class="card-content p-2 text-center">
                <img class="img-fluid" src="{{ asset('dynamic-assets/logo/' . $g_settings->logo) }}" alt="logo" />
            </div>
        </div>
    </div>
@endsection
