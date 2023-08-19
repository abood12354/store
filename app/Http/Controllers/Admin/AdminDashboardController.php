<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        return view('dashboard.admin.dashboard');

    }
    public function login(){
        return view('dashboard.admin.adminlogin');
    }
}
