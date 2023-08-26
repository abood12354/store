<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminPasswordRequest;
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
          $data=$request->all();
    
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

                //remeber Admin and password with cookies
                if(isset($data['remember'])&&!empty($data['remember'])){
               
                  setcookie("email",$data['email'],time()+100000);
                  setcookie("password",$data['password'],time()+100000);
                }else{
                  setcookie("email","");
                  setcookie("password","");
                }

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
    /* public function updatePassword(Request $request)
    {

        if($request->isMethod('post')) {
          $request=new UpdateAdminPasswordRequest;
            $user = auth()->guard('admin')->user();

           $data = $request->validated();

            if ($request->updatePassword($data, $user)) {
                return redirect()
                    ->back()
                    ->with('success_message', 'Password updated successfully!');

            } else {
                return redirect()
                    ->back()
                    ->with('error_message', 'Current password is wrong');
            }

        }

        return view('dashboard.admin.update_password');
        
    }
    */
  
    public function updatePassword(Request $request){

        if($request->isMethod('post')){
      
          $data = $request->validate([
            'current_pwd' => 'required',
            'new_pwd' => 'required|string|min:8|regex:/[a-z]/|regex:/[0-9]/', 
           'confirm_pwd' => 'required|same:new_pwd'
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
      public function updateDetails(Request $request){

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
      
        return view('dashboard.admin.update_details');
      
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
    //subadmins
    public function subadmins(){
      $subadmins=Admin::where('type','subadmin')->get()->toArray();
      $user=[];
      foreach($subadmins as $subadmin){
        $subuser = User::where('id',$subadmin['user_id'])->get()->toArray();
  
        foreach ($subuser as &$u) {
             $u['type'] = $subadmin['type'];
             $u['status'] = $subadmin['status'];
          }
  
        $user = array_merge($user, $subuser); 
      }
      $subadmins=$user;
  
      return view('dashboard.admin.pages.subadmins' , compact('subadmins'));
  
    }

    public function updateSubadmin(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();
            
            if($data['status']=="Active"){
                $status =0;
            }else{
                $status=1;
            }
           
            Admin::where('user_id',$data['subadmin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'subadmin_id'=>$data['subadmin_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroySubadmin($id)
    {
        //delete
        $username= User::where('id',$id)->first()->toArray();
  
        Admin::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return redirect()->back()->with('success_message',$username['username'].' Has been deleted!');
    }

    public function editSubadmin(Request $request,$id=null){
      if($id==""){
        $title="Add Sub Admin";
        $subadminData=new User();
        $message="Sub Admin Added Secessfully";
        $rules = [
          'username' => 'required|string|max:255',
          'firstName' => 'required|string|max:255',
          'lastName' => 'required|string|max:255',
          'gendor' => 'required|string|max:255',
          'birthDate' => 'required|date',
          'email' => 'required|email|max:255|unique:users', 
          'password' => 'required|string|min:6'
          
        ];
      
      }else{
        $title="Edit Sub Admin";
        $subadminData = User::find($id);
        $message="Sub Admin Updated Secessfully";
        $rules = [
          'username' => 'required|string|max:255',
          'firstName' => 'required|string|max:255',
          'lastName' => 'required|string|max:255',
          'gendor' => 'required|string|max:255',
          'birthDate' => 'required|date',
          'email' => 'required|email|max:255|unique:users,email,' . $id,
          'password' => 'nullable|sometimes|string|min:6'
        ];  
    }
    if($request->isMethod('post')){
        $data=$request->all();
        

      //  echo "<pre>"; print_r($data);die;
         // dd( $data);
              $this->validate($request,$rules);

            $subadminData->username=$data['username'];
            $subadminData->firstName=$data['firstName'];
            $subadminData->lastName=$data['lastName'];
            $subadminData->birthDate=$data['birthDate'];
            $subadminData->gendor=$data['gendor'];
            $subadminData->email=$data['email'];
            if($data['password'] !== null){    
                $subadminData->password=$data['password'];
              }
              
              
              $subadminData->save();
              if($id=="") {
                $user=User::where('username',$data['username'])->first();
                $admin = new Admin;
                    $admin->user()->associate($subadminData);
   
                      $admin->save();
                      $adminId = $admin->id;
                      User::where('email', $data['email'])
                                ->update([
                                     'userable_type' => Admin::class,
                                       'userable_id' => $adminId
                                 ]);
              }
              
             return redirect('subadmins')->with('success_message',$message);

    }
    return view('dashboard.admin.pages.add_edit_subadmin')->with(compact('title','subadminData'));
    }

  }
  