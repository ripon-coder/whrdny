<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HowWeWork;
use App\Models\Overview;
use RiponCoder\FileUpload\FileUpload;

class HowWeWorkController extends Controller
{
    public function index(){
        $data['howWork'] = HowWeWork::first();
        return view('admin.how-we-works.index',$data);
    }

    public function update(Request $request){
        $howWork = HowWeWork::first();
        $howWork->fill($request->all());
        $howWork->save();
        return redirect()->back()->with('success', 'Saved!');
    }
}
