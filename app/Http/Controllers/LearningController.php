<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearningRequest;
use App\Models\Learning;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Learning::orderBy('id', 'DESC')->paginate(20);
        return view('admin.learning.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.learning.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LearningRequest $request)
    {
        Learning::create($request->all());
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
        $data['learning'] = Learning::findOrFail($id);
        return view('admin.learning.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LearningRequest $request, string $id)
    {
        $post =  Learning::findOrFail($id);
        $post->fill($request->all());
        $post->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post =  Learning::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
