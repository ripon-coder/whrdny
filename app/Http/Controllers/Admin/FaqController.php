<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Enums\Admin\BoardTrustEnum;
use App\Enums\Admin\FaqEnum;
use App\Http\Controllers\Controller;
use App\Models\BoardTrust;
use App\Models\Faq;
use RiponCoder\FileUpload\FileUpload;

class FaqController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['faqs'] = Faq::orderBy('id', 'DESC')->paginate(20);
        return view('admin.faq.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['FaqEnum'] = FaqEnum::cases();
        return view('admin.faq.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Faq::create($request->all());
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
        $data['faq'] = Faq::findOrFail($id);
        $data['FaqEnum'] = FaqEnum::cases();
        return view('admin.faq.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq =  Faq::findOrFail($id);
        $faq->fill($request->all());
        $faq->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq =  Faq::findOrFail($id);
        $faq->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
