<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JoinWithUs;
use Illuminate\Http\Request;

class JoiningController extends Controller
{
    public function index()
    {
        $data['joining'] = JoinWithUs::latest()->paginate(20);
        return view('admin.joining.index', $data);
    }
}
