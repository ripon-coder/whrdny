<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use RiponCoder\FileUpload\FileUpload;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::orderBy('id', 'DESC')->paginate(20);
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request)
    {
        if ($request->file('file')) {
            $fund_raise = FileUpload::path("dynamic-assets/posts")->uploadFile($request->file);
            $request->merge(['image' => $fund_raise]);
        }
        Post::create($request->all());
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
        $data['post'] = Post::findOrFail($id);
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, string $id)
    {
        $post =  Post::findOrFail($id);
        $post->fill($request->all());
        if ($request->file('file')) {
            $post->image = FileUpload::path("dynamic-assets/posts")->removeFile($post->image ?? '')->uploadFile($request->file);
        }
        $post->save();
        return redirect()->back()->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post =  Post::findOrFail($id);
        if($post->image){
            FileUpload::path("dynamic-assets/fund-raise")->deleteFile($post->image);
        }
        $post->delete();
        return redirect()->back()->with('success', 'Delete Successfully!');
    }
}
