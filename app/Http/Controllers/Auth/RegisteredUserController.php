<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use App\Models\Vendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('Page.Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'gendor' => ['required', 'string', 'max:255'],
            'birthDate'=> ['required', 'date'],
            'phoneNumber'=>['required','string', 'max:11'],
            'address'=>['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class
            , function($attribute, $value, $fail) {
                if(isGmail($value)) {
                  return "nice email";
                }else{
                  return  $fail('Email cannot end in @email');
                }
              }],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'gendor' => $request->gendor,
            'birthDate'=>$request->birthDate,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);


        $client = new Client([
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,  
        ]);
$client->user_id = $user->id;
$client->save();

$user->userable_type="client";
$user->userable_id=$client->id;
$user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
