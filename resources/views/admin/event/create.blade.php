@extends('admin.app.app')

@section('title')
    Create Event
@endsection
@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection
@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Event / Create Event'])
@endsection

@section('content')
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Create Event</h4>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            <form class="form form-horizontal" id="sliderform" method="post"
                                action="{{ route('admin.event-admin.store') }}" enctype="multipart/form-data">
                                @csrf
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
                                            <input required type="text" value="{{ old('title') }}" class="form-control"
                                                name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Start Date & Time</label>
                                        <div class="col-md-9 mx-auto">
                                            <input required type="date" value="{{ old('start_date') }}"
                                                class="form-control" name="start_date">
                                            <input required type="time" value="{{ old('start_time') }}"
                                                class="form-control" name="start_time">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">End Date & Time</label>
                                        <div class="col-md-9 mx-auto">
                                            <input required type="date" value="{{ old('end_date') }}"
                                                class="form-control" name="end_date">
                                            <input required type="time" value="{{ old('end_time') }}"
                                                class="form-control" name="end_time">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Event Image</label>
                                        <div class="col-md-9 mx-auto">
                                            <input required type="file" class="form-control" name="file">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Description</label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea class="form-control summernote" name="description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Location</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ old('location') }}" class="form-control"
                                                name="location">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Cost</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" step="any" value="{{ old('cost') }}"
                                                class="form-control" name="cost">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Map Location</label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea class="form-control" name="map_location">{{ old('map_location') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Category</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ old('category') }}" class="form-control"
                                                name="category">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Venu</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ old('venu') }}" class="form-control"
                                                name="venu">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Time</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ old('time') }}" class="form-control"
                                                name="time" placeholder="8:00 am - 10:00 am">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="upcoming">Upcoming</label>
                                        <div class="col-md-9 mx-auto" style="padding-left: 35px">
                                            <input type="checkbox" id="upcoming"  class="form-check-input" name="upcoming" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Published</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control" name="status">
                                                @foreach ($EventEnum as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
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
