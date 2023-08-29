<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminPasswordRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\AdminsRule;
use App\Models\Product;
use App\Models\User;

//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function dashboard(){
        $products=  Product::all()->count();
        return view('dashboard.admin.dashboard',compact('products'));

    }


    public function login(Request $request){
      $message="you are banned or unactive please content the support";
      $data=$request->all();
      
    
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

                //remeber Admin and password with cookies
                if(isset($data['remember'])&&!empty($data['remember'])){
               
                  setcookie("email",$data['email'],time()+100000);
                  setcookie("password",$data['password'],time()+100000);
                }else{
                  setcookie("email","");
                  setcookie("password","");
                }

                if(Admin::where('user_id',User::where('email',$data['email'])->first()->id)->first()->status==1){
                 return redirect("dashboard");
                }else{
                  Auth::guard('admin')->logout();
                  Session::put('error_message',$message);
                     return redirect('adminlogin');
                    // return redirect("adminlogin")->withErrors(['email' => 'you are banned or unactive please content the support']);
                }
             } else {
              $message='not an admin';
              Session::put('error_message',$message);
              return redirect('adminlogin');
               
             }
           
            
            }else{
              $message='Invalid email or password';
              Session::put('error_message',$message);
              return redirect('adminlogin');
              
              }

        }
        return view('dashboard.admin.adminlogin');
    }

  
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
        $title="Edit Admin";
        $adminData = User::find(Auth::guard('admin')->user()->id);
        if($request->isMethod('post')){
       
    

          $data=$request->all();
          
          $rules = [
            'username' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'gendor' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email,' .  Auth::guard('admin')->user()->id,

          ];  
      
          
  
        //  echo "<pre>"; print_r($data);die;
           // dd( $data);
         //   Validator::make($request->all(), $rules);
        $this->validate($request,$rules);
          
          //  if($validator->fails()){
           
          //   return view('dashboard.admin.update_details');
          //  }
  
              $adminData->username=$data['username'];
              $adminData->firstName=$data['firstName'];
              $adminData->lastName=$data['lastName'];
              $adminData->birthDate=$data['birthDate'];
              $adminData->gendor=$data['gendor'];
              $adminData->email=$data['email'];

                
                $adminData->save();
              $message="Admin Updated Secessfully";
                
              Session::put('success_message',$message);
               return redirect('dashboard');
  
      }
      return view('dashboard.admin.update_details')->with(compact('title','adminData'));
      
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

    
    
    //subadmins
    public function subadmins(){
      $subadmins=Admin::where('type','subadmin')->get()->toArray();
      $user=[];

      $admin=Admin::where('user_id',Auth::guard('admin')->user()->id)->first();
      if($admin['type']=='superadmin'){
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
    }else{
      
      $message="Only Super Admins have premission to use this feature";
      Session::put('error',$message);
      return Redirect::back();
    }
  
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
        Session::put('success_message',$username['username'].' Has been deleted!');

        return redirect()->back();
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
            Session::put('success_message',$message);
             return redirect('subadmins');
              
    }
    return view('dashboard.admin.pages.add_edit_subadmin')->with(compact('title','subadminData'));
    }

    public function updateRule($id,Request $request){
      
     $subadmin= User::where('id', $id)->first();
      if($request->isMethod('post')){

          $data=$request->all();
        //  echo "<pre>"; print_r($data);die;
          //delete and update rules
         // dd($data['cms_pages']);
          AdminsRule::where('admin_id',$id)->delete();
        
     //   dd($data);
        foreach ($data as $key => $value) {
          if(isset($value['view'])){
              $view= $value['view'];
          }else{
            $view=0;
          }
          if(isset($value['edit'])){
            $edit= $value['edit'];
            }else{
               $edit=0;
               }
            if(isset($value['full'])){
                $full= $value['full'];
                }else{
                $full=0;
                }
              
        /* if(isset($data['cms_pages']['view'])){
            $cms_pages_view=$data['cms_pages']['view'];
          }else{

            $cms_pages_view=0;
          }
          if(isset($data['cms_pages']['edit'])){
            $cms_pages_edit=$data['cms_pages']['edit'];
          }else{

            $cms_pages_edit=0;
          }
          if(isset($data['cms_pages']['full'])){
            $cms_pages_full=$data['cms_pages']['full'];
          }else{

            $cms_pages_full=0;
          }*/
        $role =new AdminsRule;

            $role->admin_id=$id;
            $role->module=$key;
            $role->view_access= $view;
            $role->edit_access=$edit;
            $role->full_access= $full;
            $role->save();
        }
            $message="SubAdmin Roles Updated successfully for ".$subadmin['username'];
            Session::put('success_message',$message);

            return redirect('subadmins');
          }
          
          $title ="Update '" .$subadmin['username']."' Rules&Permission";
      $subAdminRoles=AdminsRule::where('admin_id',$id)->get()->toArray();

     //   dd( $subAdminRoles);
      return view('dashboard.admin.pages.update_rule_subadmin',compact('title','id','subadmin','subAdminRoles'));
    }
  }
  