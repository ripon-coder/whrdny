<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionFormRequest;
use App\Models\AdmissionForm;
use RiponCoder\FileUpload\FileUpload;

class AdmissionFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['photos'] = AdmissionForm::orderBy('id', 'DESC')->paginate(20);
        return view('admin.admission-form.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admission-form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdmissionFormRequest $request)
    {
        if ($request->file('file')) {
            $photo = FileUpload::path("dynamic-assets/admission-form")->uploadFile($request->file);
            $request->merge(['image' => $photo]);
        }
        AdmissionForm::create($request->all());
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
        $data['photo'] = AdmissionForm::findOrFail($id);
        return view('admin.admission-form.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdmissionFormRequest $request, string $id)
    {
        $photo =  AdmissionForm::findOrFail($id);
        $photo->fill($request->all());
        if ($request->file('file')) {
            $photo->image = FileUpload::path("dynamic-assets/admission-form")->removeFile($photo->image ?? '')->uploadFile($request->file);
        }
        $photo->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo =  AdmissionForm::findOrFail($id);
        if($photo->image){
            FileUpload::path("dynamic-assets/admission-form")->deleteFile($photo->image);
        }
        $photo->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
