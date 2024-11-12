@extends('master')

@section('title', 'Event')
@section('description', 'Event')

@section('style')

@endsection

@section('content')
    <div class="page event-page">
        <div class="container">
            <div class="ev-btn">
                <a class="btn btn-dark text-capitalize" href="{{ url('/events') }}"><span> « All events</span></a>
            </div>
            @if ($event->end_date_time < now())
                <div class="tribe-event-notices">
                    <ul>
                        <li>This event has passed.</li>
                    </ul>
                </div>
            @endif
            <h1 class="event-title">{{ $event->title }}</h1>
            <div class="event-schedule d-md-flex justify-content-between">
                <h2><span class="event-date-start">{{ date('d-M-Y @ h:i A', strtotime($event->start_date_time)) }}</span> -
                    <span class="event-date-end">{{ date('d-M-Y @ h:i A', strtotime($event->end_date_time)) }}
                    </span></h2>
                <div class="text-end">
                    <span class="event-cost">${{ $event->cost }}</span>
                </div>
            </div>
            <div class=" mb-4">
                <img width="70%" class="" src="{{ asset('dynamic-assets/event/' . $event->image) }}" alt="blog images" />
            </div>
            <div class="event-des">
                {!! $event->description !!}
            </div>
            <div class="event-cal-links">
                <a class="tribe-event-gcal tribe-event-button" href="{{ url('/') }}" title="Add to Google Calendar">+
                    Google Calendar</a>
            </div>
            <div class="tribe-events-single-section tribe-events-event-meta primary tribe-clearfix">
                <div class="tribe-events-meta-group tribe-events-meta-group-details">
                    <h2 class="tribe-events-single-section-title"> Details : </h2>
                    <table class="w-100">
                        <tr>
                            <td class="tribe-events-start-datetime-label"> Start: </td>
                            <td class="td-value">
                                <abbr class="tribe-events-abbr tribe-events-start-datetime updated published dtstart"
                                    title="{{ date('F d, Y @ h:i A', strtotime($event->start_date_time)) }}">
                                    {{ date('F d, Y @ h:i A', strtotime($event->start_date_time)) }} </abbr>
                            </td>
                        </tr>

                        <tr>
                            <td class="tribe-events-start-datetime-label"> End: </td>
                            <td class="td-value">
                                <abbr class="tribe-events-abbr tribe-events-end-datetime dtend"
                                    title="{{ date('F d, Y @ h:i A', strtotime($event->end_date_time)) }}">
                                    {{ date('F d, Y @ h:i A', strtotime($event->end_date_time)) }} </abbr>
                            </td>
                        </tr>
                        <tr>
                            <td class="tribe-events-start-datetime-label">Cost: </td>
                            <td class="td-value tribe-events-event-cost">
                                ${{ $event->cost }}
                            </td>
                        </tr>
                        <tr>
                            <td class="tribe-events-start-datetime-label"> Event Categories: </td>
                            <td class="td-value">
                                {{ $event->category }}
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="tribe-events-meta-group tribe-events-meta-group-venue">
                    <h2 class="tribe-events-single-section-title"> Venue :</h2>
                    <dl>

                        <dd class="tribe-venue"> New York, NY, United States </dd>

                        <dd class="tribe-venue-location">
                            <address class="tribe-events-address">
                                <span class="tribe-address">
                                    {{ $event->venu }}
                                </span>

                                <a class="tribe-events-gmap"
                                    href="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=649+W+249th+St%2C+Bronx%2C+NY+10471%2C+USA+Newyork+NY+10471+United+States"
                                    title="Click to view a Google Map" target="_blank">+ Google Map</a>
                            </address>
                        </dd>



                    </dl>
                </div>
                <div class="tribe-events-meta-group tribe-events-meta-group-gmap">
                    <div class="tribe-events-venue-map">
                        <div id="tribe-events-gmap-0" style="height: 350px; width: 100%" aria-hidden="true"></div>
                    </div>
                </div>
            </div>
            @include('include.share')
            <div class="events-footer">
                <ul class="next-prev-nav d-flex justify-content-between">
                    <li class="nav-previous">
                        <a href="@if($previous_post){{ route('event',$previous_post->slug) }} @else # @endif"><span class="np-ar">«</span> {{@$previous_post->title}}</a>
                    </li>

                    <li class="nav-next">
                        <a href="@if($next_post) {{ route('event',$next_post->slug) }} @else # @endif">{{@$next_post->title}} <span class="np-ar">»</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection



@section('script')

@endsection
