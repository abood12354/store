<?php

namespace App\Http\Requests;

use App\Models\User; 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateAdminPasswordRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }

  public function rules()
  {//       $data = $request->validate([
    //         'current_pwd' => 'required',
    //         'new_pwd' => 'required|string|min:8|regex:/[a-z]/|regex:/[0-9]/', 
    //        'confirm_pwd' => 'required|same:new_pwd'
    //       ]);
    return [
         'current_pwd' => 'required',
         'new_pwd' => 'required|string|min:8|regex:/[a-z]/|regex:/[0-9]/', 
         'confirm_pwd' => 'required|same:new_pwd'
    ];
  }

  public function updatePassword($data, $user)
  {
    $this->validateRequest($data);
    
    if (Hash::check($data['current_pwd'], $user->password)) {
      User::where('id', $user->id)->update(['password' => bcrypt($data['new_pwd'])]);
      return true;
    }
    
    return false;
  }

  protected function validateRequest($data)
  {
    $this->validate($data, $this->rules());
  }

}