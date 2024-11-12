<?php

namespace App\Http\Controllers\Admin;

use App\Models\Objective;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RiponCoder\FileUpload\FileUpload;

class ObjectiveController extends Controller
{
    public function index(){
        $data['objective'] = Objective::first();
        return view('admin.objective.index',$data);
    }

    public function update(Request $request){
        $objective = Objective::first();
        $objective->fill($request->all());
        $objective->save();
        return redirect()->back()->with('success', 'Saved!');
    }
}
