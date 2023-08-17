<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard(){
        return view('dashboard.admin.dashboard');

    }
    public function login(Request $request){
        if($request->isMethod('post')) {

            // Define credentials from request
            $credentials = [
              'email' => $request->input('email'), 
              'password' => $request->input('password')
            ];
        
            if(Auth::guard('admin')->attempt($credentials)) {
            
              // Authentication passed...
        
              $user = Auth::guard('admin')->user(); 
        
              $admin = $user->admin;
                return redirect("dashboard");
            
            }else{
                return redirect()->back()->with("error_message","Invalid email or password");
            }

        }
        return view('dashboard.admin.adminlogin');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('adminlogin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
