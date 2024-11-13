@extends('master')

@section('title', 'Contact Us')
@section('description', 'Contact Us')

@section('style')

@endsection

@section('content')
    <div class="page contact-page pb-0">
        <div class="container">
            <div class="row">
                @if (session()->has('success'))
                    <div class="col-sm-12 mb-3 mb-md-0">
                        <div class="alert alert-info mb-4">{{ session()->get('success') }}</div>
                    </div>
                @endif


                <div class="col-md-6">
                    <div class="grop-cgettouch_txt">
                        <h3>GET IN TOUCH</h3>
                        <p>{{ $c_setting->get_in_touch }}</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-4 mb-sm-0">
                            <div class="grop-cgettouch_info ">
                                <h4>{{ $c_setting->address_one_title }}</h4>
                                <address class="grop-cgettouch_locn">
                                    <p>{!! $c_setting->address_one_address !!}</p>
                                    @php
                                        $num1 = $c_setting->address_one_mobile;
                                        $num2 = '';
                                        if (strpos($c_setting->address_one_mobile, ',') !== false) {
                                            $numbersArray = explode(',', $c_setting->address_one_mobile);
                                            $num1 = $numbersArray[0];
                                            $num2 = $numbersArray[1];
                                        }
                                    @endphp
                                    <span>Tell: <a href="tel: {{ $num1 }}">{{ $num1 }}</a></span>
                                    <span>Tell: <a href="tel: {{ $num2 }}">{{ $num2 }}</a></span>
                                    <span>Email: <a
                                            href="mailto: {{ $c_setting->address_one_email }}">{{ $c_setting->address_one_email }}</a></span>
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="grop-cgettouch_info ">
                                <h4>{{ $c_setting->address_two_title }}</h4>
                                <address class="grop-cgettouch_locn">
                                    <p>{!! $c_setting->address_two_address !!}</p>
                                    @php
                                        $num1 = $c_setting->address_two_mobile;
                                        $num2 = '';
                                        if (strpos($c_setting->address_two_mobile, ',') !== false) {
                                            $numbersArray = explode(',', $c_setting->address_two_mobile);
                                            $num1 = $numbersArray[0];
                                            $num2 = $numbersArray[1];
                                        }
                                    @endphp
                                    <span>Tell: <a href="tel: {{ $num1 }}">{{ $num1 }}</a></span>
                                    <span>Tell: <a href="tel: {{ $num2 }}">{{ $num2 }}</a></span>
                                    <span>Email: <a
                                            href="mailto: {{ $c_setting->address_two_email }}">{{ $c_setting->address_two_email }}</a></span>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-5 mt-md-0">
                    <form class="contact-form" action="{{ route('contact.save') }}" method="post">
                        @csrf


                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-md-0">
                                <input required class="form-control" type="text" name="name" value=""
                                    placeholder="Name">
                            </div>

                            <div class="col-sm-6">
                                <input required class="form-control" type="email" name="email" value=""
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-3 mb-md-0">
                                <input required class="form-control" type="text" name="phone_number" value=""
                                    placeholder="Phone Number">
                            </div>
                            <div class="col-sm-6 mb-3 mb-md-0">
                                <input required class="form-control" type="text" name="subject" value=""
                                    placeholder="Subject">
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea required class="form-control" name="body" placeholder="Enter your message...."></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn_overly btn-dark" type="submit"><span>Send Message</span></button>
                        </div>
                        <!-- <div class="response-output" aria-hidden="true">One or more fields have an error. Please check and try again.</div> -->
                    </form>
                </div>
            </div>
        </div>

        <!-- map -->
        <div class="row mx-0 map-row">
            <div class="col-md-6 px-0 pe-md-2">
                <div class="img-content">
                    <div class="img-content-in">
                        <iframe class="cover"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d755.6647640087004!2d-73.89221639325386!3d40.747527120536716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f06d6b9a73d%3A0xfc0f28eadaf24157!2s37-47%2073rd%20St%20Suite%20%23%20207!5e0!3m2!1sen!2sus!4v1731394015704!5m2!1sen!2sus"
                            width="600" height="530" style="border: 0px; pointer-events: none;" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-0 ps-md-2 mt-5 mt-md-0">
                <div class="img-content">
                    <div class="img-content-in">
                        <iframe class="cover"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6051.047931041717!2d-73.7895765!3d40.6844566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c266d472362f79%3A0x8f697ec0af31c8fc!2s155-14%20115th%20Dr%2C%20Jamaica%2C%20NY%2011434!5e0!3m2!1sen!2sus!4v1731394102202!5m2!1sen!2sus"
                            width="600" height="530" style="border: 0px; pointer-events: none;" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- map -->
        <div class="grop-contact_social_area">
            <div class="container">
                <div class="text-center grop-contact_social">
                    <h3>JOIN US</h3>
                    <p>Stay up-to-date on the latest news and updates and help us by spreading the word.</p>
                    <ul class="list-inline  grop-csol_list">
                        <li><a href="{{@$g_settings->facebook}}" target="_blank"><i class="fa fa-facebook-official"></i></a>
                        </li>
                        <li><a href="{{@$g_settings->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{@$g_settings->linkdin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="{{@$g_settings->instragram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{@$g_settings->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')

@endsection
