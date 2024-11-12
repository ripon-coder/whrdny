@extends('master')

@section('title', 'How we work')
@section('description', 'How we work')

@section('style')
    <style>
        .hw_section_count {
            background-image: url('{{ asset('assets/images/parallax-img.jpg') }}');
            background-repeat: no-repeat !important;
            background-color: #241917 !important;
            background-position: center center !important;
            background-size: cover;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white
        }

        .succesfully_facts {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-top: 4rem;
        }

        .succesfully_facts>p {
            max-width: 600px;
            font-weight: 400;
            font-size: 17px;
            color: rgb(0, 0, 0);
        }

        .successfull_image img {
            max-width: 100%;
            box-shadow: none;
            /* Remove the box-shadow */
        }

        .image-wrapper {
            position: relative;
        }

        .text-below {
            position: absolute;
            width: 100%;
            text-align: start;
            padding: 5px;
            color: white;
            padding: 19px 21px;
            font-size: 18px;
            font-weight: 400;
        }

        .text-below {
            bottom: 0;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 33px;
            text-align: center;
        }

        .button-container>a>button {
            padding: 12px 26px 10px 24px;
            font-size: 16px;
            border: 1px solid #d2d2d2;
            background: none;
        }

        .button-container>a>button:hover {
            background: rgb(240, 239, 239);
        }

        .become_r>p {
            font-weight: 500;
            font-size: 21px;
        }
    </style>
@endsection

@section('content')
    <div class="page how-page pb-0">
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 col-md-4 pe-md-4">
                    <div class="swiper howWork">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="position-relative">
                                    <img class="w-100" src="{{ asset('assets/images/child-edu.jpg') }}" alt="blog images" />
                                    <h5 class="slider-cap">Child Education</h5>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="position-relative">
                                    <img class="w-100" src="{{ asset('assets/images/child-water.jpg') }}"
                                        alt="blog images" />
                                    <h5 class="slider-cap">Clean Water</h5>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="position-relative">
                                    <img class="w-100" src="{{ asset('assets/images/gallery-two.jpg') }}"
                                        alt="blog images" />
                                    <h5 class="slider-cap">Food</h5>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-12 col-md-8 ps-md-4">
                    <h2 class="page-title">{{ $howWeWork->title }}</h2>
                    {!! $howWeWork->details !!}
                    <div class="calout-btn mt-4 pt-2">
                        <a style="height: 50px;line-height: 50px;" class="btn btn_overly btn-yellow px-4"
                            href="{{ $howWeWork->button_url }}"><span>Download Annual Report</span></a>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <br>
            <div class="mt-2 mb-4">
                <div class="row counter1 world-counter hw_section_count">
                    <div class="col-sm-6 col-md-3">
                        <div class="text-uppercase text-center grop-counter_cont">
                            <h2><span class="count text-white" data-count="521">0</span></h2>
                            <p>MEMBERS WE HAVE</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-uppercase  text-center grop-counter_cont">
                            <h2><span class="count text-white" data-count="8254">0</span></h2>
                            <p>PEOPLES IMPACTED</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-uppercase  text-center grop-counter_cont">
                            <h2 class="text-white">$<span class="count text-white" data-count="7850.00">0</span>.00</h2>
                            <p>TOTAL AMOUNT RAISED</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-uppercase  text-center grop-counter_cont">
                            <h2 class="text-white"><span class="count" data-count="110">0</span>+</h2>
                            <p>TOTAL VOLUNTEERS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="succesfully_facts pt-4">
                <h2 class="page-title">OUR MOST SUCCESSFUL FACTS</h2>
                <p>Establishing a donor advised fund is a convenient and simple way for you to
                    support and manage global philanthropic initiatives.</p>
            </div>
            <br>
            <br>
            <div class="successfull_image">
                <div class="row">
                    @foreach ($posts as $item)
                    <div class="col-md-4">
                        <div class="image-wrapper">
                            <img src="{{asset('dynamic-assets/posts/'.$item->image)}}">
                            <div class="text-below">{{$item->title}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="button-container">
                    <a href="{{route("blog")}}"><button type="button">See All Stories</button></a>
                </div>
            </div>
            <br>
            <div class="succesfully_facts pt-4">
                <h2 class="page-title">MAPPING OUR IMPACTS WORLDWIDE</h2>
                <p>The single funds allow you to advise a smaller number of grants, on a schedule or as
                    desired to charitable organization, cause, country, or region.</p>
                <br>
                <div class="pt-4">
                    <img src="{{ asset('assets/images/worldmap.webp') }}" alt="">
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="become-v py-5">
            <div class="container">
                <div class="d-lg-flex align-items-center justify-content-start">
                    <div class="become_r d-md-flex text-center text-md-start">
                        <p class="mb-0 me-0 me-lg-5">CONSERVING THE LANDS AND WATER ON WHICH ALL PEOPLE LIFE DEPENDS.</p>
                    </div>
                    <div class="text-center text-lg-start mt-4 mt-lg-0">
                        <a class="btn btn_overly bg-white callout_btn"
                            href="{{route('joinWithUs')}}"><span>Join Us Today</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')

@endsection
