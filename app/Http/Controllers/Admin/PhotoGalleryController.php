<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoGalleryRequest;
use App\Models\PhotoGallery;
use RiponCoder\FileUpload\FileUpload;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['photos'] = PhotoGallery::orderBy('id', 'DESC')->paginate(20);
        return view('admin.photo_gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.photo_gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoGalleryRequest $request)
    {
        if ($request->file('file')) {
            $photo = FileUpload::path("dynamic-assets/photo_gallery")->uploadFile($request->file);
            $request->merge(['image' => $photo]);
        }
        PhotoGallery::create($request->all());
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
        $data['photo'] = PhotoGallery::findOrFail($id);
        return view('admin.photo_gallery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoGalleryRequest $request, string $id)
    {
        $photo =  PhotoGallery::findOrFail($id);
        $photo->fill($request->all());
        if ($request->file('file')) {
            $photo->image = FileUpload::path("dynamic-assets/photo_gallery")->removeFile($photo->image ?? '')->uploadFile($request->file);
        }
        $photo->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo =  PhotoGallery::findOrFail($id);
        if($photo->image){
            FileUpload::path("dynamic-assets/photo_gallery")->deleteFile($photo->image);
        }
        $photo->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
