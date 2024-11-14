<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;

class EventAjaxController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $eventName = $request->event;
        $data['section'] = $eventName;
        if ($eventName == "current") {
            $data['events'] = Event::whereStatus("published")->where('start_date_time', '<=', $now)->where('end_date_time', '>=', $now)
            ->orderBy('start_date_time', 'asc')->limit(3)->get();
        }
        if ($eventName == "upcoming") {
            $data['events'] = Event::whereStatus("published")->where('start_date_time', '>', $now)
            ->orderBy('start_date_time', 'asc')->limit(3)->get();
        }
        if ($eventName == "past") {
            $data['events'] = Event::whereStatus("published")->where('end_date_time', '<', $now)
            ->orderBy('end_date_time', 'desc')->limit(3)->get();
        }
        return view("component.event-component",$data);
    }
}
