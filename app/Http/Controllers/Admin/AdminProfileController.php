<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\ProfileRequest;
use RiponCoder\FileUpload\FileUpload;
class AdminProfileController extends Controller
{
    public function profile()
    {
        $data['profile'] = User::find(Auth::user()->id);
        return view('admin.profile.profile', $data);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $admin = User::find(Auth()->user()->id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->hasFile('file')){
            $admin->image  =  FileUpload::path("dynamic-assets/admin-avatar")->removeFile($admin->image ?? '')->uploadFile($request->file);
        }
        $admin->save();
        return redirect()->back()->with('success', 'Saved!');
    }
    public function changePasswordPage()
    {
        return view('admin.profile.change-password');
    }

    public function changePassword(Request $request)
    {
        if ($request->password != $request->password_confirmation)
            return redirect()->back()->with('error', 'Password not match with confirm password');
        if (strlen($request->password) < 8)
            return redirect()->back()->with('error', 'Password should be at least 8 charecter');

        $admin = Admin::find(Auth::user()->id);
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with('success', 'Saved!');
    }
}
