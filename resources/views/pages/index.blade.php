@extends('master')

@section('title', 'Home')
@section('description', 'Home Page')

@section('style')

@endsection

@section('content')
    <div class="home-wrapper">
        <section class="homeSlider-section">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($sliders as $index => $slider)
                        <div class="carousel-item @if ($index == 0) active @endif">
                            <div class="img-content">
                                <img class="cover" src="{{ asset('dynamic-assets/slider/' . $slider->image) }}" />
                            </div>
                            <div class="slider-cnt">
                                <div class="container">
                                    <div class="slider-txt-cnt">
                                        <div class="slider-logo">
                                            <img src="{{ asset('assets/images/slider-logo.png') }}" alt="logo slider">
                                        </div>
                                        <div class="slider-tlt">{{ $slider->title }}</div>
                                        <div class="slider-text">
                                            {{ $slider->description }}
                                        </div>
                                        <div class="slider-btn">
                                            <a class="btn btn_overly btn-yellow"
                                                href="{{ $slider->button_url }}"><span>Donate Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev hs-prev black-np" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next hs-next black-np" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section class="callout-section bg-yellow">
            <div class="container">
                <div class="row mx-0 justify-content-center">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="col-md-4 px-0">
                            <div
                                class="callout_box d-flex d-md-block d-lg-flex align-items-center text-start text-md-center text-lg-start">
                                <div class="callout_icon mb-0 mb-md-2 mb-lg-0 ms-0 ms-md-auto ms-lg-0">
                                    <img src="{{ asset('assets/images/logo-one.png') }}" alt="logo callout">
                                </div>
                                <div class="callout_txt">
                                    <h4 class="mb-0">Help Others</h4>
                                    <p class="mb-0">To change life</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        <section class="group-section">
            <div class="container">
                <div class="text-center position-relative">
                    <h2 class="h2-title pb-2">TOGETHER WE CAN <br> MAKE A DIFFERENCE</h2>
                    <p class="pfs-17">As a USA based, nonprofit organization, US Bangla Foundation Inc. helps<br>empower
                        people to live with greater independence and freedom from poverty,<br>disease, disaster, and hunger.
                    </p>
                    <a class="btn btn_overly btn-yellow" href="{{ url('/how-we-work') }}"><span>Know More</span></a>
                </div>
            </div>
        </section>
        @if(count($learnings) > 0)
        <section class="joinUs-section position-relative">
            <div class="container">
                <div class="row mx-0">
                    @foreach ($learnings as $learning)
                        <div class="col-md-6 col-lg-4 px-0">
                            <div class="joinUs_box d-flex align-items-center">
                                <div class="d-flex">
                                    <div class="joinUs_icon">
                                        <img src="{{ asset('assets/images/callout-icon.png') }}" alt="#">
                                    </div>
                                    <div class="joinUs_txt">
                                        <h4><a href="{{ url('/') }}">{{ $learning->title }}</a></h4>
                                        {!! $learning->description !!}
                                        <br>
                                        <a class="btn btn_overly bg-white mt-3" href="{{ url('/join-with-us') }}">
                                            <span>{{ $learning->button_text }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        <section class="mission-section bg-light1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mb-5 mb-md-0">
                        <div class="mission-text">
                            <h3>WHAT WE DO</h3>
                            <p>In developing countries, we focus on improving people’s health and wellbeing, helping
                                individuals lift themselves out of hunger and extreme poverty.</p>
                            <p>We ensure everyone can access the chance they need to succeed in school and life.</p>
                            <p>We partner with governments and the public and private sectors, and foster greater public
                                awareness of urgent global issues.</p>
                            <a class="btn btn_overly btn-dark mt-3" href="{{ url('/what-we-do') }}"><span>More
                                    details</span></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                                    <div class="mission-card">
                                        <div class="img-content">
                                            <img class="cover" src="{{ asset('assets/images/img-02.jpg') }}"
                                                alt="blog images" />
                                        </div>
                                        <h4>Family Welfare</h4>
                                        <p>Improving Lives of Women & Children in Innovative Ways.</p>
                                        <ul class="list-group list-group-flush mission_list">
                                            <li class="list-group-item border-0"><i class="fa fa-check"></i>Mother &amp;
                                                Child Health</li>
                                            <li class="list-group-item border-0"><i class="fa fa-check"></i>Education
                                                Support</li>
                                            <li class="list-group-item border-0"><i class="fa fa-check"></i>Youth
                                                Development</li>
                                            <li class="list-group-item border-0"><i class="fa fa-check"></i>Disability
                                                Services</li>
                                            <li class="list-group-item border-0"><i class="fa fa-check"></i>Food &amp;
                                                Supplies Help</li>
                                        </ul>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="causes-section text-center">
            <div class="container">
                <h2 class="h2-title">YOU CAN SAVE CHILDREN'S LIFE</h2>
                <p class="pfs-17">To give an underprivileged person a pair of clothes is as good as dressing him <br /> with
                    self-respect with this objective.</p>
                <div class="row">
                    @foreach ($fund_raises as $item)
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            @include('include.causes-card')
                        </div>
                    @endforeach
                </div>
                <div class="causes-all-btn text-center">
                    <a class="btn btn_overly btn-yellow" href="{{ url('/causes-list') }}"><span>See all Causes</span></a>
                </div>
            </div>
        </section>
        <section class="bg-section position-relative bg-property">
            <div class="bg-cnt text-center position-relative">
                <h2 class="bg-cnt_title">We believe in tomorrow! Support our campaign today.</h2>
                <p>Your gift today can help to change a any ones future life.</p>
                <a class="btn btn_overly btn-yellow mt-3" href="{{ url('/causes-list') }}"><span>Donate Now</span></a>
            </div>
        </section>
        <section class="event-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="mb-3 mb-md-4 d-flex justify-content-between upcoming_text">
                            <h3 style="font-family:'Dosis', sans-serif">UPCOMING EVENTS</h3>
                            <div class="slider-arrow">
                                <div class="pn-ar prev event-prev">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="pn-ar next event-next">
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="swiper eventSlider">
                            <div class="swiper-wrapper">
                                @foreach ($upcoming_events as $item)
                                    <div class="swiper-slide">
                                        @include('include.events-card')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="event-tb">
                            <ul class="nav nav-pills tab-light" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-smallStory-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-smallStory" type="button" role="tab"
                                        aria-controls="pills-smallStory" aria-selected="true">Small Story</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Profile</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane show active" id="pills-smallStory" role="tabpanel"
                                    aria-labelledby="pills-smallStory-tab" tabindex="0">
                                    <div class="event-tab-card">
                                        <div class="img-content sc-img">
                                            <img class="cover" src="{{ asset('assets/images/project-tabs.jpg') }}"
                                                alt="sc image" />
                                        </div>
                                        <h4 class="ucoming_evnt_title"><a href="{{ url('/') }}">Food For
                                                Education</a></h4>
                                        <p class="mb-3">The main objective was to open doors for quality education with
                                            the schools we work while providing hot nutritious meals to the children as we
                                            desire that the students stay and learn.</p>
                                        <a class="btn btn-light mt-2" href="{{ url('/') }}"><span>More
                                                About</span></a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div class="event-tab-card">
                                        <div class="img-content sc-img">
                                            <img class="cover" src="{{ asset('assets/images/tab-child-image.jpg') }}"
                                                alt="sc image" />
                                        </div>
                                        <h4 class="ucoming_evnt_title"><a href="{{ url('/') }}">The Health
                                                Foundation</a></h4>
                                        <p class="mb-3">Children’s Hospital Foundation is proud to support a wide variety
                                            of community fundraising events. The funds from these events enable Children’s
                                            Hospital Colorado</p>
                                        <a class="btn btn-light mt-2" href="{{ url('/') }}"><span>More
                                                About</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sc-section bg-light1">
            <div class="row mx-0 align-items-center">
                <div class="col-lg-6 px-0">
                    <div class="img-content sc-img">
                        <img class="cover" src="{{ asset('assets/images/home-image.jpg') }}" alt="sc image" />
                    </div>
                </div>
                @if($latest_found)
                <div class="col-lg-6 px-0 d-flex align-items-center">
                    <div class="grop-fetrd_cause_cont">
                        <h2 class="grop-fetrd_cause_title">{{ $latest_found->title }}</h2>
                        <div class="grop-fetrdcs_dnt_stats">
                            <p class="grop-donation_stats">Raised: <span class="grop-rasd_amount">$

                                {{$latest_found ? number_format($item->latest_found,2, '.', ',') : ''}}</span> / Goal:
                                ${{$latest_found ? $item->goal : ''}}</p>
                        </div>
                        <p><p class="cause-txt">{{$latest_found ? App\Helper\Help::str(strip_tags($latest_found->details),150) : ''}}</p></p>
                        <a class="btn btn_overly btn-yellow mt-3" href="{{route('donate',$latest_found->slug)}}"><span>Donate</span></a>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <section class="counter-section">
            <div class="container">
                <br>
                <br>
                <h2 class="text-uppercase text-center section_title" style="font-family:'Dosis', sans-serif">OUR HELPING IMPACTS WORLDWIDE</h2>
                <div class="row counter1 world-counter">
                    <div class="col-sm-6 col-md-3">
                        <div class="text-uppercase text-center grop-counter_cont">
                            <h2><span class="count" data-count="521">0</span></h2>
                            <p>MEMBERS WE HAVE</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-uppercase  text-center grop-counter_cont">
                            <h2><span class="count" data-count="8254">0</span></h2>
                            <p>PEOPLES IMPACTED</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-uppercase  text-center grop-counter_cont">
                            <h2>$<span class="count" data-count="7850.00">0</span>.00</h2>
                            <p>TOTAL AMOUNT RAISED</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="text-uppercase  text-center grop-counter_cont">
                            <h2><span class="count" data-count="110">0</span>+</h2>
                            <p>TOTAL VOLUNTEERS</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="news-section bg-light1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="news_single">
                            <h2>LATEST NEWS</h2>
                            <p>The news about recent activities for needed peoples</p>
                        </div>
                        <div class="slider-arrow news-slider-arrow">
                            <div class="pn-ar prev news-prev">
                                <i class="fa fa-angle-left"></i>
                            </div>
                            <div class="pn-ar next news-next">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="swiper newsSlider">
                            <div class="swiper-wrapper">
                                @foreach ($posts as $item)
                                    <div class="swiper-slide">
                                        <div class="card news-card">
                                            <div class="img-content">
                                                <img class="cover" src="{{ asset('dynamic-assets/posts/'.$item->image) }}"
                                                    alt="blog images" />
                                            </div>
                                            <div class="news_text_cnt">
                                                <div class="news_text">
                                                    <div class="news_ps_date">
                                                        <i class="fa fa-clock-o"></i>  {{$item->created_at->format('d-M-Y');}}
                                                    </div>
                                                    <h4 class="news_ps_title">
                                                        <a href="{{ route('blogDetails',$item->id) }}">{{$item->title}}</a>
                                                    </h4>
                                                </div>
                                                <div class="card-f d-flex justify-content-between">
                                                    <div>
                                                        By {{$item->author}}
                                                    </div>
                                                    <div class="news-cic">
                                                        <a href="{{ url('/') }}"><i
                                                                class="fa fa-comment-o me-1"></i>{{$item->comment_count}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="volunteer-section">
            <div class="v-list">
                <div class="container">
                    <div class="row mx-0 align-items-center">
                        @foreach ($brands as $brand)
                            <div class="col-6 col-md-2 px-1">
                                <img class="img-fluid" src="{{ asset('dynamic-assets/brand/'.$brand->image) }}"
                                    alt="{{$brand->title}}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @include('include.volunteer')
        </section>
    </div>
@endsection



@section('script')
    <script type="text/javascript">
        const carouselExampleFade = document.querySelector('#carouselExampleFade')
        const carousel = new bootstrap.Carousel(carouselExampleFade, {
            interval: 9000,
            touch: false
        })
    </script>
@endsection
