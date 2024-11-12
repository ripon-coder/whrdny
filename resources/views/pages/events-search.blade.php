@extends('master')

@section('title', 'Events Search')
@section('description', 'Events')

@section('style')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div class="page events-page">
        <div class="container">

            <div class="form-wrapper">
                <form action="{{ route('eventSearch') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="date" name="key" class="form-control" value="{{ request()->input('key') }}">
                        <div class="input-group-append" style="height: 100%;">
                            <button class="btn btn-primary" type="submit" style="height: 50px">Search</button>
                        </div>
                    </div>
                </form>
            </div>


            @if ($search_result->isNotEmpty())
                <div class="event-list-section">
                    <div class="row filterRow">
                        @foreach ($search_result as $item)
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
                    There are no search results events.
                </div>
            @endif



        </div>

    </div>
    </div>
@endsection



@section('script')

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
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
