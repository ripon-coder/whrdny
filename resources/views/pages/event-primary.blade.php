@extends('master')

@section('title', 'Events')
@section('description', 'Events')

@section('style')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        .title_Section {
            display: flex;
            align-items: center;
        }

        .title_Section h2 {
            margin: 0;
            padding-right: 10px;
            /* Spacing between text and line */
            font-size: 19px;
            color: #646464;
        }
        .title_Section h2:hover{
            color: #009FE0
        }

        .title_Section .line {
            flex-grow: 1;
            height: 2px;
            background-color: #646464;
            /* Line color */
        }
    </style>
@endsection

@section('content')
    <div class="page events-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-wrapper">
                        <form action="{{ route('eventSearch') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="date" name="key" class="form-control"
                                    value="{{ request()->input('key') }}">
                                <div class="input-group-append" style="height: 100%;">
                                    <button class="btn btn-primary" type="submit" style="height: 50px">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="title_Section">
                    <a href="{{route('more-evnts')}}?event=current"><h2>Current Event</h2></a>
                    <div class="line"></div>
                </div>
                <div class="mt-3">
                    @if ($current_event->isNotEmpty())
                        <div class="event-list-section">
                            <div class="row filterRow">
                                @foreach ($current_event as $item)
                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-5">
                                        @include('include.events-card')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="no-ev-msg d-flex align-items-center justify-content-center" role="alert">
                            <svg class="custom-svg me-2" viewBox="0 0 21 23" xmlns="http://www.w3.org/2000/svg">
                                <g fill-rule="evenodd">
                                    <path d="M.5 2.5h20v20H.5z"></path>
                                    <path stroke-linecap="round" d="M7.583 11.583l5.834 5.834m0-5.834l-5.834 5.834"
                                        class="xm-stroke">
                                    </path>
                                    <path stroke-linecap="round" d="M4.5.5v4m12-4v4"></path>
                                    <path stroke-linecap="square" d="M.5 7.5h20"></path>
                                </g>
                            </svg>
                            There are no events.
                        </div>
                    @endif
                </div>

            </div>
            <div class="mt-3">
                <div class="title_Section">
                    <a href="{{route('more-evnts')}}?event=upcoming"><h2>Upcoming Event</h2></a>
                    <div class="line"></div>
                </div>
                <div class="mt-3">
                    @if ($upcoming_event->isNotEmpty())
                        <div class="event-list-section">
                            <div class="row filterRow">
                                @foreach ($upcoming_event as $item)
                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-5">
                                        @include('include.events-card')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="no-ev-msg d-flex align-items-center justify-content-center" role="alert">
                            <svg class="custom-svg me-2" viewBox="0 0 21 23" xmlns="http://www.w3.org/2000/svg">
                                <g fill-rule="evenodd">
                                    <path d="M.5 2.5h20v20H.5z"></path>
                                    <path stroke-linecap="round" d="M7.583 11.583l5.834 5.834m0-5.834l-5.834 5.834"
                                        class="xm-stroke">
                                    </path>
                                    <path stroke-linecap="round" d="M4.5.5v4m12-4v4"></path>
                                    <path stroke-linecap="square" d="M.5 7.5h20"></path>
                                </g>
                            </svg>
                            There are no events.
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-3">
                <div class="title_Section">
                    <a href="{{route('more-evnts')}}?event=past"><h2>Past Event</h2></a>
                    <div class="line"></div>
                </div>
                <div class="mt-3">
                    @if ($past_event->isNotEmpty())
                        <div class="event-list-section">
                            <div class="row filterRow">
                                @foreach ($past_event as $item)
                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-5">
                                        @include('include.events-card')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="no-ev-msg d-flex align-items-center justify-content-center" role="alert">
                            <svg class="custom-svg me-2" viewBox="0 0 21 23" xmlns="http://www.w3.org/2000/svg">
                                <g fill-rule="evenodd">
                                    <path d="M.5 2.5h20v20H.5z"></path>
                                    <path stroke-linecap="round" d="M7.583 11.583l5.834 5.834m0-5.834l-5.834 5.834"
                                        class="xm-stroke">
                                    </path>
                                    <path stroke-linecap="round" d="M4.5.5v4m12-4v4"></path>
                                    <path stroke-linecap="square" d="M.5 7.5h20"></path>
                                </g>
                            </svg>
                            There are no events.
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection



@section('script')

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        // Function to handle button click action
        function handleButtonClick(button) {
            var select = $(button);
            $('#event_button button').removeClass("btn-default").addClass('btn-yellow');
            $('#event_button button span').empty();

            select.removeClass("btn-yellow").addClass('btn-default');
            // spinner
            select.find("span").html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
            // end spinner
            var eventData = select.data('event');
            $.ajax({
                url: "{{ route('event_ajax') }}",
                type: "GET",
                data: {
                    "event": eventData
                },
                success: function(response) {
                    $("#event_append_here").html(response);
                    select.find("span").empty();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    select.find("span").empty();
                }
            });
        }

        // Call the function to handle the button click for the first button
        $(document).ready(function() {
            handleButtonClick($('#event_button button:first'));
        });

        // Attach click event handler to all buttons
        $('#event_button button').click(function() {
            handleButtonClick(this);
        });


        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'dd-mm-yy',
                onSelect: function(dateText, inst) {
                    var dateAsObject = $(this).val();
                    $("#date-fill").html(dateAsObject)
                }
            });
        });
    </script>
@endsection
