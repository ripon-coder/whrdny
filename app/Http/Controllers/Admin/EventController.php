<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Enums\Admin\EventEnum;
use App\Enums\Admin\SliderEnum;
use App\Http\Controllers\Controller;
use RiponCoder\FileUpload\FileUpload;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['event'] = Event::orderBy('id', 'DESC')->paginate(20);
        return view('admin.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['EventEnum'] = EventEnum::cases();
        return view('admin.event.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $start_date_time = Carbon::createFromFormat('Y-m-d H:i', $request->start_date . ' ' . $request->start_time);
        $end_date_time = Carbon::createFromFormat('Y-m-d H:i', $request->end_date . ' ' . $request->end_time);
        $request->merge(['start_date_time' => $start_date_time,'end_date_time'=>$end_date_time]);
        if ($request->file('file')) {
            $event = FileUpload::path("dynamic-assets/event")->uploadFile($request->file);
            $request->merge(['image' => $event]);
        }
        Event::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['event'] = Event::findOrFail($id);
        $data['EventEnum'] = EventEnum::cases();
        return view('admin.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $event =  Event::findOrFail($id);
        $event->fill($request->all());
        $event->start_date_time = Carbon::createFromFormat('Y-m-d H:i', $request->start_date . ' ' . $request->start_time);
        $event->end_date_time = Carbon::createFromFormat('Y-m-d H:i', $request->end_date . ' ' . $request->end_time);
        if ($request->file('file')) {
            $event->image = FileUpload::path("dynamic-assets/event")->removeFile($event->image ?? '')->uploadFile($request->file);
        }
        if ($request->has('upcoming_check')) {
            $event->upcoming = true;
        }else{
            $event->upcoming = null;
        }
        $event->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event =  Event::findOrFail($id);
        if($event->image){
            FileUpload::path("dynamic-assets/event")->deleteFile($event->image);
        }
        $event->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
