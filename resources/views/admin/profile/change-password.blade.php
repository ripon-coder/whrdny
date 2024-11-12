@extends('admin.app.app')

@section('title')
    Change Password
@endsection

@section('pageHeading')
    @include('admin.app.page-heading', ['text'=>'Dashboard / Change Password'] )
@endsection

@section('content')
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic">Change Password</h4>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text"></div>
                        <form class="form form-horizontal" id="categoryForm" method="post" action="{{ route('admin.changePassword') }}">
                            @csrf
                            <div class="form-body">
                                @if(session()->has('error'))
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
                                    <label class="col-md-3 label-control" for="projectinput5">New Password</label>
                                    <div class="col-md-9 mx-auto">
                                        <input required type="password" id="projectinput5" class="form-control" placeholder="" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">Confirm New Password</label>
                                    <div class="col-md-9 mx-auto">
                                        <input required type="password" id="projectinput5" class="form-control" placeholder="" name="password_confirmation">
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


