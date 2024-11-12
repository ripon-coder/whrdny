<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Enums\Admin\BrandEnum;
use App\Http\Controllers\Controller;
use RiponCoder\FileUpload\FileUpload;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['brands'] = Brand::orderBy('id', 'DESC')->paginate(20);
        return view('admin.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['BrandEnum'] = BrandEnum::cases();
        return view('admin.brand.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('file')) {
            $slider = FileUpload::path("dynamic-assets/brand")->uploadFile($request->file);
            $request->merge(['image' => $slider]);
        }
        Brand::create($request->all());
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
        $data['brand'] = Brand::findOrFail($id);
        $data['BrandEnum'] = BrandEnum::cases();
        return view('admin.brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand =  Brand::findOrFail($id);
        $brand->fill($request->all());
        if ($request->file('file')) {
            $brand->image = FileUpload::path("dynamic-assets/brand")->removeFile($brand->image ?? '')->uploadFile($request->file);
        }
        $brand->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand =  Brand::findOrFail($id);
        if($brand->image){
            FileUpload::path("dynamic-assets/brand")->deleteFile($brand->image);
        }
        $brand->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
