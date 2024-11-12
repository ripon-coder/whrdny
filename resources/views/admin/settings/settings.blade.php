@extends('admin.app.app')

@section('title')
    Settings
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text' => 'Dashboard / Settings'])
@endsection

@section('content')
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Settings</h4>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="card-text"></div>
                            <form class="form form-horizontal" id="settings" method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    @if (session()->has('error'))
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="projectinput5"></label>
                                            <div class="col-md-9 mx-auto">
                                                <div class="alert alert-danger mb-2" role="alert">
                                                    <strong>Oh snap!</strong> {{ session()->get('error') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Logo</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="form-control" name="logo_" accept="image/*">
                                            @if($setting->logo)
                                            <img class="mt-1 img-thumbnail" width="150" height="100" src="{{asset('dynamic-assets/logo/'.$setting->logo)}}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Footer Logo</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="form-control" name="footer_" accept="image/*">
                                            @if($setting->footer_logo)
                                            <img class="mt-1 img-thumbnail" width="150" height="100" src="{{asset('dynamic-assets/footer_logo/'.$setting->footer_logo)}}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Fevicon</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="form-control" name="fevicon_" accept="image/*">
                                            @if($setting->fevicon)
                                            <img class="mt-1" width="150" height="100" src="{{asset('dynamic-assets/fevicon/'.$setting->fevicon)}}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Email</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" class="form-control" name="email" value="{{$setting->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Facebook</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" class="form-control" name="facebook" value="{{$setting->facebook}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Twitter</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" class="form-control" name="twitter" value="{{$setting->twitter}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Linkdin</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" class="form-control" name="linkdin" value="{{$setting->linkdin}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Instragram</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" class="form-control" name="instragram" value="{{$setting->instragram}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Youtube</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" class="form-control" name="youtube" value="{{$setting->youtube}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Get In Touch</label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea class="form-control" name="get_in_touch">{{ $setting->get_in_touch }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">About Us</label>
                                        <div class="col-md-9 mx-auto">
                                            <textarea class="form-control" name="about_us">{{ $setting->about_us }}</textarea>
                                        </div>
                                    </div>

                                    <div class="border pt-2 pr-1">
                                        <div class="mb-2">
                                            <h4 class="text-center">Address 1</h4>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Title</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" class="form-control" name="address_one_title" value="{{$setting->address_one_title}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Mobile</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" class="form-control" name="address_one_mobile" value="{{$setting->address_one_mobile}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Email</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" class="form-control" name="address_one_email" value="{{$setting->address_one_email}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Address</label>
                                            <div class="col-md-9 mx-auto">
                                                <textarea class="form-control" name="address_one_address">{{$setting->address_one_address}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border pt-2 pr-1 mt-1">
                                        <div class="mb-2">
                                            <h4 class="text-center">Address 2</h4>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Title</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" class="form-control" name="address_two_title" value="{{$setting->address_two_title}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Mobile</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" class="form-control" name="address_two_mobile" value="{{$setting->address_two_mobile}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Email</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" class="form-control" name="address_two_email" value="{{$setting->address_two_email}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control">Address</label>
                                            <div class="col-md-9 mx-auto">
                                                <textarea class="form-control" name="address_two_address">{{$setting->address_two_address}}</textarea>
                                            </div>
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
                                        <i class="la la-check-square-o"></i> Update
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
