@extends('admin.app.app')

@section('title')
    Edit Event
@endsection
@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection
@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Event / Edit Event'])
@endsection

@section('content')
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Edit Event</h4>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            <form class="form form-horizontal" id="sliderform" method="post"
                                action="{{ route('admin.event-admin.update', $event) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                            <input required type="text" value="{{ $event->title }}" class="form-control"
                                                name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Start Date & Time</label>
                                        <div class="col-md-9 mx-auto">
                                            <input required type="date" value="{{ date('Y-m-d', strtotime($event->start_date_time)) }}"
                                                class="form-control" name="start_date">
                                            <input required type="time" value="{{ \Carbon\Carbon::parse($event->start_date_time)->format('H:i') }}"
                                                class="form-control" name="start_time">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">End Date & Time</label>
                                        <div class="col-md-9 mx-auto">
                                            <input required type="date" value="{{ date('Y-m-d', strtotime($event->end_date_time)) }}"
                                                class="form-control" name="end_date">
                                            <input required type="time" value="{{ \Carbon\Carbon::parse($event->end_date_time)->format('H:i') }}"
                                                class="form-control" name="end_time">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Event Image</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="form-control" name="file">
                                            <img class="mt-1" width="50"
                                                src="{{ asset('dynamic-assets/event/' . $event->image) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Description</label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea class="form-control summernote" name="description">{!! $event->description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Location</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ $event->location }}" class="form-control"
                                                name="location">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Cost</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" step="any" value="{{ $event->cost }}"
                                                class="form-control" name="cost">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Map Location</label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea class="form-control" name="map_location">{{ $event->map_location }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Category</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ $event->category }}" class="form-control"
                                                name="category">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Venu</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ $event->venu }}" class="form-control"
                                                name="venu">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Time</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ $event->time }}" class="form-control"
                                                name="time" placeholder="8:00 am - 10:00 am">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="upcoming">Upcoming</label>
                                        <div class="col-md-9 mx-auto" style="padding-left: 35px">
                                            <input type="checkbox" @checked($event->upcoming) id="upcoming"  class="form-check-input" name="upcoming_check" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Published</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control" name="status">
                                                @foreach ($EventEnum as $value)
                                                    <option @selected($value == $event->status) value="{{ $value }}">
                                                        {{ $value }}</option>
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
