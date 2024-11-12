<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Overview;
use RiponCoder\FileUpload\FileUpload;

class OverviewController extends Controller
{
    public function index(){
        $data['overview'] = Overview::first();
        return view('admin.overview.index',$data);
    }

    public function update(Request $request){
        $overview = Overview::first();
        $overview->fill($request->all());
        $overview->save();
        return redirect()->back()->with('success', 'Saved!');
    }
}
