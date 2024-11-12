<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;

class EventAjaxController extends Controller
{
    public function index(Request $request)
    {
        $eventName = $request->event;
        $data['section'] = $eventName;
        if ($eventName == "current") {
            $data['events'] = Event::whereStatus("published")->where('end_date_time', '>=', Carbon::now())->get();
        }
        if ($eventName == "upcoming") {
            $data['events'] = Event::whereStatus("published")->where('upcoming', true)->get();
        }
        if ($eventName == "past") {
            $data['events'] = Event::whereStatus("published")->where('end_date_time', '<=', Carbon::now())->get();
        }
        return view("component.event-component",$data);
    }
}
