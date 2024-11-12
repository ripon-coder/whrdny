@if ($events->isNotEmpty())
<div class="event-list-section">
    {{-- <div class="list__month-separator d-flex align-items-center">
        <time class="list__month-separator-text">Current Event</time>
    </div> --}}
    <div class="row filterRow">
        @foreach ($events as $item)
            <div class="col-md-6 col-lg-4 mb-4 mb-md-5">
                @include('include.events-card')
            </div>
        @endforeach
    </div>
</div>
@else
<div class="no-ev-msg d-flex align-items-center justify-content-center mt-4" role="alert">
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
    There are no {{ucfirst($section)}} events.
</div>
@endif