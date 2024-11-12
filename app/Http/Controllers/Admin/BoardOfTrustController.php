<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Enums\Admin\BoardTrustEnum;
use App\Http\Controllers\Controller;
use App\Models\BoardTrust;
use RiponCoder\FileUpload\FileUpload;

class BoardOfTrustController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['board_trust'] = BoardTrust::orderBy('id', 'DESC')->paginate(20);
        return view('admin.boardTrust.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['BoardEnum'] = BoardTrustEnum::cases();
        return view('admin.boardTrust.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('file')) {
            $image = FileUpload::path("dynamic-assets/board-trust")->uploadFile($request->file);
            $request->merge(['image' => $image]);
        }
        BoardTrust::create($request->all());
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
        $data['board'] = BoardTrust::findOrFail($id);
        $data['BoardEnum'] = BoardTrustEnum::cases();
        return view('admin.boardTrust.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $board =  BoardTrust::findOrFail($id);
        $board->fill($request->all());
        if ($request->file('file')) {
            $board->image = FileUpload::path("dynamic-assets/board-trust")->removeFile($board->image ?? '')->uploadFile($request->file);
        }
        $board->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $board =  BoardTrust::findOrFail($id);
        if($board->image){
            FileUpload::path("dynamic-assets/board-trust")->deleteFile($board->image);
        }
        $board->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
