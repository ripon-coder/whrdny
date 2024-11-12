<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoGalleryRequest;
use App\Models\VideoGallery;


class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['videos'] = VideoGallery::orderBy('id', 'DESC')->paginate(20);
        return view('admin.video_gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video_gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoGalleryRequest $request)
    {
        VideoGallery::create($request->all());
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
        $data['video'] = VideoGallery::findOrFail($id);
        return view('admin.video_gallery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoGalleryRequest $request, string $id)
    {
        $video =  VideoGallery::findOrFail($id);
        $video->fill($request->all());
        $video->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video =  VideoGallery::findOrFail($id);
        $video->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
