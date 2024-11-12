<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use RiponCoder\FileUpload\FileUpload;
class SettingsController extends Controller
{
    public function setting(){
        $data['setting'] = Setting::first();
        return view('admin.settings.settings',$data);
    }

    public function updateSetting(Request $request){
        $setting = Setting::first();
        $setting->fill($request->all());
        if($request->file('logo_')){
            $logo_name =FileUpload::path("dynamic-assets/logo")->removeFile($setting->logo ?? '')->uploadFile($request->logo_);
            $setting->logo = $logo_name;
        }
        if($request->file('footer_')){
            $footer_logo =FileUpload::path("dynamic-assets/footer_logo")->removeFile($setting->footer_logo ?? '')->uploadFile($request->footer_);
            $setting->footer_logo = $footer_logo;
        }
        if($request->file('fevicon_')){
            $fevicon_name = FileUpload::path("dynamic-assets/fevicon")->removeFile($setting->fevicon ?? '')->uploadFile($request->fevicon_);
            $setting->fevicon = $fevicon_name;
        }
        $setting->save();
        return redirect()->back()->with('success', 'Saved!');
    }
}
