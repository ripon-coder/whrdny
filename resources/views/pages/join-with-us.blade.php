@extends('master')

@section('title', 'How we work')
@section('description', 'How we work')

@section('style')

@endsection

@section('content')
    <div class="page how-page pb-0">
        <div class="container pb-5">
            @if (count($forms))
                <div class="row">
                    @foreach ($forms as $form)
                        <div class="col-12 col-md-6 mb-5 text-center pe-md-4">
                            <h2 class="page-title mb-3 text-capitalize" style="font-weight: 400;">{{ $form->name }}</h2>
                            <img class="img-fluid border" src="{{ asset('dynamic-assets/admission-form/' . $form->image) }}"
                                alt="Admission-Form-1" />
                            <div class="calout-btn mt-4 pt-2">
                                <a class="btn btn-orange1 px-4"
                                    href="{{ asset('dynamic-assets/admission-form/' . $form->image) }}" download><span><i
                                            class="fa fa-arrow-circle-down" aria-hidden="true"></i> Download</span></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row pt-5">
                <div class="col-12 col-md-6 mb-5 mb-md-0 pe-md-4">
                    <h2 class="page-title mb-3">NEED YOUR HEARTFUL HELP</h2>
                    <p class="mb-3" style="font-size: 17px;">The single funds allow you to advise a smaller number of
                        grants, on a schedule or as desired to charitable organization, cause, country, or region.</p>
                    <p class="mb-4">Bring to the table win-win survival strategies to ensure proactive domination. At the
                        end of the day, going forward, a new normal that has evolved from generation X is on the runway
                        heading towards a streamlined cloud solution. User generated content in real-time will have multiple
                        touch points for offshoring</p>

                    <div class="join-callout_box">
                        <div
                            class="callout_box d-flex d-md-block d-lg-flex align-items-center text-start text-md-center text-lg-start border-0 p-0">
                            <div class="callout_icon mb-0 mb-md-2 mb-lg-0 ms-0 ms-md-auto ms-lg-0"
                                style="background-color: #F2E36A;">
                                <img src="{{ asset('assets/images/logo-one.png') }}" alt="logo callout">
                            </div>
                            <div class="callout_txt">
                                <h4 class="mb-0">Positive Thoughts</h4>
                                <p class="mb-0">We aspire to be like hlpers. So we serve all people. No matter their
                                    religion, ethnicity, or gender.</p>
                            </div>
                        </div>
                        <div
                            class="callout_box d-flex d-md-block d-lg-flex align-items-center text-start text-md-center text-lg-start border-0 p-0">
                            <div class="callout_icon mb-0 mb-md-2 mb-lg-0 ms-0 ms-md-auto ms-lg-0"
                                style="background-color: #FFCD01;">
                                <img src="{{ asset('assets/images/logo-one.png') }}" alt="logo callout">
                            </div>
                            <div class="callout_txt">
                                <h4 class="mb-0">Heartful Help</h4>
                                <p class="mb-0">Going after poverty’s symptoms is temporary. Going after its causes is
                                    permanent for everyone.</p>
                            </div>
                        </div>
                        <div
                            class="callout_box d-flex d-md-block d-lg-flex align-items-center text-start text-md-center text-lg-start border-0 p-0">
                            <div class="callout_icon mb-0 mb-md-2 mb-lg-0 ms-0 ms-md-auto ms-lg-0"
                                style="background-color: #F3B45C;">
                                <img src="{{ asset('assets/images/logo-one.png') }}" alt="logo callout">
                            </div>
                            <div class="callout_txt">
                                <h4 class="mb-0">Spread To Everyone</h4>
                                <p class="mb-0">In an effort to ensure volunteering at Foundation events is fulfilling
                                    experience for you.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-6 ps-md-4">

                    <div class="contact_form">
                        @if (session()->has('success'))
                            <alert class="alert alert-success">{{ session()->get('success') }}</alert>
                        @endif
                        <h3 style="font-size: 24px;" class="page-title mb-3">JOIN WITH US</h3>
                        <form action="{{ url('join-with-us') }}" method="post" class="join-us-form">
                            @csrf

                            <div class="mb-4">
                                <label> Name* </label>
                                <input required type="text" name="name" value="" size="40"
                                    class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="mb-4">
                                <label> Email* </label>
                                <input required type="email" name="email" value="" size="40"
                                    class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="mb-4">
                                <label> Phone* </label>
                                <input required type="tel" name="phone" value="" size="40"
                                    class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="mb-4">
                                <label> Address </label>
                                <input required type="text" name="address" value="" size="40"
                                    class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="row">
                                <div class="mb-4 col">
                                    <label> City </label>
                                    <input required type="text" name="city" value="" size="40"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="mb-4 col">
                                    <label> State/Region </label>
                                    <input required type="text" name="state" value="" size="40"
                                        class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col">
                                    <label>Zip/Postal Code</label>
                                    <input required type="text" name="zip" value="" size="40"
                                        class="form-control" aria-required="true">
                                </div>
                                <div class="mb-4 col">
                                    <label>Country</label>
                                    <input required type="text" name="country" value="" size="40"
                                        class="form-control" aria-required="true">
                                </div>
                            </div>
                            <div class="pt-3">
                                <input type="submit" value="Submit" class="btn btn_overly btn-yellow w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="quick-ask-area text-center mt-5">
            <h2 class="page-title text-capitalize" style="font-weight: 400;">Any Queries? Give Us a Call At <b><a
                        href="tel:(718) 205-2360"><strong>(718) 205-2360</strong></a></b></h2>
            <p style="font-size: 16px;">We are always here to help the needy peoples any where in the world.</p>
            <div class="calout-btn mt-4 pt-2">
                <a style="height: 50px;line-height: 50px;" class="btn btn_overly btn-yellow px-4"
                    href="tel:(718) 205-2360"><span>Contact Now</span></a>
            </div>
        </div>
    </div>
@endsection



@section('script')

@endsection
