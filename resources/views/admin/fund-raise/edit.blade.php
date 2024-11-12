@extends('admin.app.app')

@section('title')
    Edit Fund Raise
@endsection
@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection
@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Fund Raise / Edit Fund Raise'])
@endsection

@section('content')
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Edit Fund Raise</h4>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            <form class="form form-horizontal" id="sliderform" method="post"
                                action="{{ route('admin.fund-raise-admin.update',$found_raise) }}" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-body">
                                    @if (session()->has('error') || $errors->has('file'))
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput5"></label>
                                            <div class="col-md-9 mx-auto">
                                                <div class="alert alert-danger mb-2" role="alert">
                                                    <strong>Oh snap!</strong> {{ session()->get('error') }}
                                                    {{ $errors->first('file') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Title</label>
                                        <div class="col-md-9 mx-auto">
                                            <input required type="text" value="{{ $found_raise->title }}" class="form-control"
                                                name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Goal</label>
                                        <div class="col-md-9 mx-auto">
                                            <input required type="number" step="any" value="{{$found_raise->goal}}"
                                                class="form-control" name="goal">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Image</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="form-control" name="file">
                                            <img class="mt-1" width="80" src="{{ asset('dynamic-assets/fund-raise/' . $found_raise->image) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Details</label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea class="form-control summernote" name="details">{{ $found_raise->details }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">End Date</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="date" value="{{ $found_raise->end_date }}" class="form-control"
                                                name="end_date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Published</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control" name="status">
                                                @foreach ($FoundRaiseEnum as $value)
                                                    <option @selected($value->value == $found_raise->status) value="{{$value}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <a href="{{ url()->previous() }}">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="la la-angle-left"></i> Back
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('vendorJs')
    <script src="{{ asset('admin/app-assets/vendors/js/editors/summernote/summernote.js') }}"></script>
@endsection
