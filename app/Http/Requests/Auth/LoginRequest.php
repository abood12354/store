<?php

namespace App\Http\Requests\Auth;

use App\Models\Client;
use App\Models\Vendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\isNull;

class LoginRequest extends FormRequest {

  public $user;
  
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'email' => ['required', 'string', 'email','max:255'],
      'password' => ['required', 'string','min:8','max:30'], 
    ];
  }

  public function authenticate():void
  {
    $this->ensureIsNotRateLimited();

    if (Auth::guard('user')->attempt($this->only('email', 'password'), $this->boolean('remember'))) {
    $this->user = Auth::guard('user')->user(); 
       RateLimiter::clear($this->throttleKey());
       return; 
    }
    RateLimiter::hit($this->throttleKey());
    throw ValidationException::withMessages([
      'email' => trans('auth.failed'),  
    ]);
    // Set as property
}


  public function type()
  
  {
    // dd(isNull($this->user->userable_type));
    // if (isNull($this->user)) {
    //   // Use property
    //   return redirect("login"); 
    // }
   // dd($this->user->userable_type);
    //dd( Admin::class);
    if ($this->user->userable_type === "App\Models\Admin") {
      return redirect("dashboard");

    } else if ($this->user->userable_type === "App\Models\Client") {  
       // return redirect()->intended(RouteServiceProvider::HOME);
      return redirect("index");
    } else if ($this->user->userable_type === "App\Models\Vendor") {
      return redirect("vendorpage");
    }
    return redirect("login"); 
  }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
