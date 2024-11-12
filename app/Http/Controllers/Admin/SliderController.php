<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Enums\Admin\SliderEnum;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use RiponCoder\FileUpload\FileUpload;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sliders'] = Slider::orderBy('id', 'DESC')->paginate(20);
        return view('admin.slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['SliderEnum'] = SliderEnum::cases();
        return view('admin.slider.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('file')) {
            $slider = FileUpload::path("dynamic-assets/slider")->uploadFile($request->file);
            $request->merge(['image' => $slider]);
        }
        Slider::create($request->all());
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
        $data['slider'] = Slider::findOrFail($id);
        $data['SliderEnum'] = SliderEnum::cases();
        return view('admin.slider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider =  Slider::findOrFail($id);
        $slider->fill($request->all());
        if ($request->file('file')) {
            $slider->image = FileUpload::path("dynamic-assets/slider")->removeFile($slider->image ?? '')->uploadFile($request->file);
        }
        $slider->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider =  Slider::findOrFail($id);
        if($slider->image){
            FileUpload::path("dynamic-assets/slider")->deleteFile($slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
