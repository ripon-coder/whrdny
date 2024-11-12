<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Admin\DonationEnum;
use Illuminate\Http\Request;
use App\Enums\Admin\SliderEnum;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Slider;
use RiponCoder\FileUpload\FileUpload;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['donations'] = Donation::with("fund")->orderBy('id', 'DESC')->paginate(20);
        return view('admin.donation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
        $data['SliderEnum'] = SliderEnum::cases();
        return view('admin.slider.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return abort(404);
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
        $data['donation'] = Donation::with("fund")->findOrFail($id);
        $data['DonationEnum'] = DonationEnum::cases();
        return view('admin.donation.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donation =  Donation::findOrFail($id);
        $donation->status = $request->status;
        $donation->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
        $slider =  Slider::findOrFail($id);
        if($slider->image){
            FileUpload::path("dynamic-assets/slider")->deleteFile($slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
