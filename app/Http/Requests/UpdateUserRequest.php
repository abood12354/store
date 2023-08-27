<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'id' => ['nullable', 'exists:users,id'],
            // 'username' => ['required_without:id'],
            // 'firstName' => ['required_without:id'],
            // 'lastName' => ['required_without:id'],
            // 'birthDate' => ['required_without:id'],
            // 'password' => ['required_without:id'],
            // 'email' => ['required_without:user', 'email',
            // Rule::unique('users', 'email')->ignore($this->id)],


            'id' => ['nullable', 'exists:users,id'],
        'username' => ['nullable'],
        'firstName' => ['nullable'],
        'lastName' => ['nullable'],
        'birthDate' => ['nullable'],
        'password' => ['nullable'],
        'email' =>['nullable',
        Rule::unique('users', 'email')->ignore($this->id)
        , function($attribute, $value, $fail) {
            if(isGmail($value)) {
              return "nice email";
            }else{
              return  $fail('Email cannot end in @email');
            }
          }],


        ];

        // 'id' => ['nullable', 'exists:users,id'],
        // 'username' => ['nullable'],
        // 'firstName' => ['nullable'],
        // 'lastName' => ['nullable'],
        // 'birthDate' => ['nullable'],
        // 'password' => ['nullable'],
        // 'email' =>['nullable',
        // Rule::unique('users', 'email')->ignore($this->id)],
    }
}
