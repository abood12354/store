<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class AdminController extends Controller
{

    public function dashboard(){
        return view('dashboard.admin.dashboard');

    }
    public function login(Request $request){
        if(Auth::guard('admin')->check()) {
            // Admin is already logged in
            return redirect()->intended();
          }
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
        
            if(Auth::guard('admin')->attempt($credentials)) {
            
              // Authentication passed...
        
              $user = Auth::guard('admin')->user(); 
        
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

    public function updatePassword(Request $request){

        if($request->isMethod('post')){
      
          $data = $request->validate([
            'current_pwd' => 'required',
            'new_pwd' => 'required|string|min:8|regex:/[a-z]/|regex:/[0-9]/', 
           // 'confirm_pwd' => 'required|same:new_pwd'
          ]);
      
          
          if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
      
            User::where('id',Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
      
            return redirect()->back()->with('success_message','Password updated successfully!');
      
          } else {
            return redirect()->back()->with('error_message','Current password is wrong');
          }
      
        }
      
        return view('dashboard.admin.update_password');
      
      }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('adminlogin');
    }

    public function checkPassword(Request $request){
        $data =$request->all();
        if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
            return "true";
        }else{
        return "false";
        }
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
