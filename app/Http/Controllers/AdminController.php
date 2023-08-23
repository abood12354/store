<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class AdminController extends Controller
{

    public function dashboard(){
        return view('dashboard.admin.dashboard');

    }
    public function login(Request $request){
        if($request->isMethod('post')) {

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|string|max:30' 
              ];

                $customMessages =[
                    'email.required'=> 'email is requierd',
                    'email.email'=>'valid Email is requierd',
                    'password.required' => 'password is required'
                ];

                $this->validate($request,$rules,$customMessages);
                
                // $validator = Validator::make($request->all(), $rules, $customMessages);
                // $validator->validateRequired();
            // Define credentials from request
            $credentials = [
              'email' => $request->input('email'), 
              'password' => $request->input('password')
            ];
        
            if(Auth::guard('user')->attempt($credentials)) {
            
              // Authentication passed...
        
              $user = Auth::guard('user')->user(); 
        
             //$admin = $user->admin;
             if ($user->userable_type ===Admin::class) {
                 // Allow admin login
                 return redirect("dashboard");
             } else {
                return redirect()->back()->withErrors(['email' => 'not an admin']);
             }
           
            
            }else{
                return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
              }

        }
        return view('dashboard.admin.adminlogin');
    }

    public function updatePassword(){

        return view('dashboard.admin.update_password');
    }

    public function logout(){
        Auth::guard('user')->logout();
        return redirect('login');
    }

    // public function updatePassword(){
    //     return view('dashboard.admin.adminlogin');
    // }
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
