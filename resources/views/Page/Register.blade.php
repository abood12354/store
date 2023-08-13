@extends('Layouts.main')
    @section('title','Register-form')
    @section('style')
    
<link rel="stylesheet" href="style.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
}
.bg-img{
  background: url("{{asset('assets/images/bg.jpg')}}");
  height: 100vh;
  background-size: cover;
  background-position: center;
}
.bg-img:after{
  position: absolute;
  content: '';
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0,0,0,0.7);
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 999;
  text-align: center;
  padding: 60px 32px;
  width: 370px;
  transform: translate(-50%,-50%);
  background: rgba(255,255,255,0.04);
  box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
}
.content header{
  color: white;
  font-size: 33px;
  font-weight: 600;
  margin: 0 0 35px 0;
  font-family: 'Montserrat',sans-serif;
}
.field{
  position: relative;
  height: 35px;
  width: 100%;
  display: flex;
  background: rgba(255,255,255,0.94);
}
.field span{
  color: #222;
  width: 40px;
  line-height: 45px;
}
.field input{
  height: 100%;
  width: 100%;
  background: transparent;
  border: none;
  outline: none;
  color: #222;
  font-size: 16px;
  font-family: 'Poppins',sans-serif;
}
.space{
  margin-top: 16px;
}
.show{
  position: absolute;
  right: 13px;
  font-size: 13px;
  font-weight: 700;
  color: #222;
  display: none;
  cursor: pointer;
  font-family: 'Montserrat',sans-serif;
}
.pass-key:valid ~ .show{
  display: block;
}
.pass{
  text-align: left;
  margin: 10px 0;
}
.pass a{
  color: white;
  text-decoration: none;
  font-family: 'Poppins',sans-serif;
}
.pass:hover a{
  text-decoration: underline;
}
form .spany{
    color: white;
    margin-top: 6px;
    margin-bottom: 0px;
}
.field input[type="submit"]{
  background: #3498db;
  border: 1px solid #2691d9;
  color: white;
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer;
  font-family: 'Montserrat',sans-serif;
}
.field input[type="submit"]:hover{
  background: #2691d9;
}
.login{
  color: white;
  margin: 20px 0;
  font-family: 'Poppins',sans-serif;
}
.links{
  display: flex;
  cursor: pointer;
  color: white;
  margin: 0 0 20px 0;
}
.facebook,.instagram{
  width: 100%;
  height: 45px;
  line-height: 45px;
  margin-left: 10px;
}
.facebook{
  margin-left: 0;
  background: #4267B2;
  border: 1px solid #3e61a8;
}
.instagram{
  background: #E1306C;
  border: 1px solid #df2060;
}
.facebook:hover{
  background: #3e61a8;
}
.instagram:hover{
  background: #df2060;
}
.links i{
  font-size: 17px;
}
i span{
  margin-left: 8px;
  font-weight: 500;
  letter-spacing: 1px;
  font-size: 16px;
  font-family: 'Poppins',sans-serif;
}
.signup{
  font-size: 15px;
  color: white;
  font-family: 'Poppins',sans-serif;
}
.signup a{
  color: #3498db;
  text-decoration: none;
}
.signup a:hover{
  text-decoration: underline;
}

</style>
    @endsection

@section('content')

@if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<div class="bg-img">
     <div class="content">
        <header>Register Form</header>
        <form action="{{ route('register-store') }}" method="POST">
          @csrf
          <span class="fa fa-user spany">username</span>
          <div class="field">
            <span class="fa fa-user"></span>
            <x-input-label for="username" />
            <x-text-input id="username"  type="text" name="username" :value="old('username')" required autofocus autocomplete="name" />
            <!-- <x-input-error :messages="$errors->get('username')"  /> -->
          </div>
          <span class="fa fa-user spany">first_name</span>
          <div class="field ">
          <span class="fa fa-user"></span>
            <x-input-label for="firstName"  />
            <x-text-input id="firstName"  type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="name" />
            <!-- <x-input-error :messages="$errors->get('firstName')"  /> -->
          </div>
          <span class="fa fa-user spany">last_name</span>
          <div class="field ">
          <span class="fa fa-user"></span>
            <x-input-label for="lastName"  />
            <x-text-input id="lastName"  type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="name" />
            <!-- <x-input-error :messages="$errors->get('lastName')"  /> -->
          </div>
          <span class="fa fa-user spany">gendor</span>
          <div class="field ">
          <span class="fa fa-user"></span>
            <x-input-label for="gendor"  />
            <x-text-input id="gendor"  type="text" name="gendor" :value="old('gendor')" required autofocus autocomplete="name" />
            <!-- <x-input-error :messages="$errors->get('gendor')"  /> -->
          </div>
          <span class="fa fa-user spany">birthdate</span>
          <div class="field ">
          <span class="fa fa-user"></span>
            <x-input-label for="birthDate"  />
            <x-text-input id="birthDate"  type="date" name="birthDate" :value="old('birthDate')" required autofocus autocomplete="birthDate" />
            <!-- <x-input-error :messages="$errors->get('birthDate')"  /> -->
          </div>
          <span class="fa fa-user spany">email</span>
          <div class="field ">
          <span class="fa fa-user"></span>
          <x-input-label for="email" />
            <x-text-input id="email"  type="email" name="email" :value="old('email')" required autocomplete="username" />
            <!-- <x-input-error :messages="$errors->get('email')"  /> -->
            </div>
            <span class="fa fa-user spany">password</span>
          <div class="field ">
            <!-- <x-input-label for="password" :value="__('')" /> -->
<x-text-input id="password" 
                type="password"
                name="password"
                required autocomplete="new-password" :value="old('password')"/>

<!-- <x-input-error :messages="$errors->get('password')" /> -->
          </div>
          <span class="fa fa-user spany">confirm_password</span>
          <div class="field ">
          <x-input-label for="password_confirmation" :value="__('')" />

<x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />

<!-- <x-input-error :messages="$errors->get('password_confirmation')"  /> -->
          </div>
          <div class="field space">
            <input type="submit" value="Register" >
          </div>
        </form>
        <!-- <div class="login">or login with</div>
        <div class="links">
          <div class="facebook">
            <i class="fab fa-facebook-f"><span>Facebook</span></i>
          </div>
          <div class="instagram">
            <i class="fab fa-instagram"><span>Instagram</span></i>
          </div>
        </div>
        <div class="signup">Don't have account?
          <a href="#">Signup Now</a>
        </div> -->
     </div>
</div>
@endsection


@section('script')

@endsection
