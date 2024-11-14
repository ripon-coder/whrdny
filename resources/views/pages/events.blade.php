@extends('master')

@section('title', 'Events')
@section('description', 'Events')

@section('style')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div class="page events-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group" role="group" id="event_button">
                        <button data-event="current" type="button" class="btn btn-default m-1"><span></span> Current
                            Event</button>
                        <button data-event="upcoming" type="button" class="btn btn-yellow m-1"><span></span> Upcoming
                            Event</button>
                        <button data-event="past" type="button" class="btn btn-yellow m-1"><span></span> Past
                            Event</button>
                    </div>
                </div>
                <div class="col-md-6">
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
            <div id="event_append_here" class="mt-3"></div>
        </div>

    </div>
    </div>
@endsection



@section('script')

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        // Function to handle button click action
        $(document).ready(function() {
            // Check if the "event" parameter exists in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const eventParam = urlParams.get('event');

            // If there's an event in the URL, trigger the corresponding event, otherwise follow the button click logic
            if (eventParam) {
                handleEventFromURL(eventParam); // Call a function to handle the event from the URL
            } else {
                // Call the function to handle the button click for the first button
                handleButtonClick($('#event_button button:first'));
            }

            // Attach click event handler to all buttons
            $('#event_button button').click(function() {
                handleButtonClick(this);
            });
        });

        // Function to handle event from URL
        function handleEventFromURL(eventParam) {
            // Find the button with the data-event attribute that matches the eventParam
            var select = $('#event_button button[data-event="' + eventParam + '"]');
            if (select.length) {
                handleButtonClick(select); // Trigger the button click logic for this event
            } else {
                console.log('No button found for event:', eventParam);
            }
        }

        // Function to handle button click
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
