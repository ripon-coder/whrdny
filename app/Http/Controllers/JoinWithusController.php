<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinWithUsRequest;
use App\Models\JoinWithUs;
use Illuminate\Http\Request;

class JoinWithusController extends Controller
{
    public function index(JoinWithUsRequest $request)
    {
        JoinWithUs::create($request->all());
        return redirect()->back()->with('success','Request has been sent to admin');
    }
}
