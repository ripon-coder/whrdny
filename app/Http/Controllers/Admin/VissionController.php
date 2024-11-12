<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vission;
use RiponCoder\FileUpload\FileUpload;

class VissionController extends Controller
{
    public function index(){
        $data['vission'] = Vission::first();
        return view('admin.vission.index',$data);
    }

    public function update(Request $request){
        $vission = Vission::first();
        $vission->fill($request->all());
        if ($request->file('file')) {
            $vission->image = FileUpload::path("dynamic-assets/vission")->removeFile($vission->image ?? '')->uploadFile($request->file);
        }
        $vission->save();
        return redirect()->back()->with('success', 'Saved!');
    }
}
