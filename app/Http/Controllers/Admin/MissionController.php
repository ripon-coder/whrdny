<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RiponCoder\FileUpload\FileUpload;

class MissionController extends Controller
{
    public function index(){
        $data['mission'] = Mission::first();
        return view('admin.mission.index',$data);
    }

    public function update(Request $request){
        $mission = Mission::first();
        $mission->fill($request->all());
        if ($request->file('file')) {
            $mission->image = FileUpload::path("dynamic-assets/mission")->removeFile($mission->image ?? '')->uploadFile($request->file);
        }
        $mission->save();
        return redirect()->back()->with('success', 'Saved!');
    }
}
