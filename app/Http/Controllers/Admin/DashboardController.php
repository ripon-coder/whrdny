<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Admin\DashboardService;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

}

