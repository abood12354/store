@extends('Layouts.main')
@section('content')

@if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<br><br>
<div class="content-wrapper" >
<form  method="post" action="{{route('update_profile',$user->id)}}" enctype="multipart/form-data" >
@csrf
@method('PUT')
<input type="hidden" name="id" value="{{$user?->id}}" >
<div class="form-group">
<label for="" >UserName:::::</label>
<input type="text" name="username" value="{{$user?->username}}" class="form-control">
</div>
<div class="form-group">
<label for="" >FirstName:::::</label>
<input type="text" name="firstName" value="{{$user?->firstName}}" class="form-control">
</div>
<div class="form-group">
<label for="" >LastName:::::</label>
<input type="text" name="lastName" value="{{$user?->lastName}}" class="form-control">
</div>
<div class="form-group">
<label for="" >BirthDate:::::</label>
<input type="date" name="birthDate" value="{{$user?->birthDate}}" class="form-control">
</div>
<div class="form-group">
<label for="" >Email:::::</label>
<input type="email" name="email" value="{{$user?->email}}" class="form-control">
</div>
<div class="form-group">
<label for="" >New Password::::::</label>
<input type="password" name="password" value="{{$user?->password}}" class="form-control">
</div>
<!-- <div class="form-group">
<label for="" >Description</label>
<textarea name="description" class="form-control"></textarea>
</div>
<div class="form-group">
<label for="" >Image</label>
<input type="file" name="image" class="form-control" >
</div>
<div class="form-group">
<label for="" >Status</label>
        <div >
           <input  type="radio" name="status" value="active" />
           <label >active </label>
        </div> -->
<!-- <br>
        <div >
           <input  type="radio" name="status" value="archived" />
           <label >archived </label>
        </div>
</div> -->
<br>
<div class="form-group">
<button type="submit" class="btn btn-primary" >Update Profile</button>
</div>
</form>
</div>

@endsection
