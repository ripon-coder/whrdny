<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Admin\FoundRaiseEnum;
use Illuminate\Http\Request;
use App\Enums\Admin\SliderEnum;
use App\Http\Controllers\Controller;
use App\Models\FoundRaise;
use App\Models\Slider;
use RiponCoder\FileUpload\FileUpload;

class FoundRaiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['found_raise'] = FoundRaise::orderBy('id', 'DESC')->paginate(20);
        return view('admin.fund-raise.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['FoundRaiseEnum'] = FoundRaiseEnum::cases();
        return view('admin.fund-raise.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('file')) {
            $fund_raise = FileUpload::path("dynamic-assets/fund-raise")->uploadFile($request->file);
            $request->merge(['image' => $fund_raise]);
        }
        FoundRaise::create($request->all());
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
        $data['found_raise'] = FoundRaise::findOrFail($id);
        $data['FoundRaiseEnum'] = FoundRaiseEnum::cases();
        return view('admin.fund-raise.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $found_raise =  FoundRaise::findOrFail($id);
        $found_raise->fill($request->all());
        if ($request->file('file')) {
            $found_raise->image = FileUpload::path("dynamic-assets/fund-raise")->removeFile($found_raise->image ?? '')->uploadFile($request->file);
        }
        $found_raise->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $found_raise =  FoundRaise::findOrFail($id);
        if($found_raise->image){
            FileUpload::path("dynamic-assets/fund-raise")->deleteFile($found_raise->image);
        }
        $found_raise->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
