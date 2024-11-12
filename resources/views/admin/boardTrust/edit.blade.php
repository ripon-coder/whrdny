@extends('admin.app.app')

@section('title')
    Edit Board
@endsection
@section('vendorCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/editors/summernote.css') }}">
@endsection
@section('pageCss')
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Board Of Trust / Edit Board'])
@endsection

@section('content')
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Edit Board</h4>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            <form class="form form-horizontal" id="sliderform" method="post"
                                action="{{ route('admin.board-trust-admin.update', $board) }}" enctype="multipart/form-data">
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
                                        <label class="col-md-3 label-control">Name</label>
                                        <div class="col-md-9 mx-auto">
                                            <input required type="text" value="{{ $board->name }}" class="form-control"
                                                name="name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Designation</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{ $board->designation }}" class="form-control"
                                                name="designation">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Photo</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="form-control" name="file">
                                            <img class="mt-1" width="80" src="{{asset('dynamic-assets/board-trust/'.$board->image)}}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Details</label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea class="form-control summernote" name="details">{{$board->details}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Phone</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{$board->phone}}" class="form-control" name="phone">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Email</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{$board->email}}" class="form-control" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Facebook</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{$board->facebook}}" class="form-control"
                                                name="facebook">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Twitter</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{$board->twitter}}" class="form-control"
                                                name="twitter">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Linkdin</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" value="{{$board->linkdin}}" class="form-control"
                                                name="linkdin">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Published</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control" name="status">
                                                @foreach ($BoardEnum as $value)
                                                    <option @selected($value == $board->status) value="{{ $value }}">
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