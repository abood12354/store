@extends('dashboard.admin.layout.layout')
@section('content')
  
 <!-- Content Wrapper. Contains page content -->
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="container-fluid">
        <div class="row mb-2">
         
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if ($errors->any())

            @foreach ($errors->all() as $error)
            
            <span style="color: red;">{{ $error }}</span>
            
            @endforeach
            
            @endif
                <form name="subadminForm" id="subadminForm" @if(empty($subadminData['id']))action="{{ url('add-edit-subadmin') }}" 
                @else action="{{ url('add-edit-subadmin/'.$subadminData['id']) }}" @endif method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="title">Username*</label>
                        <input type="text" class="form-control" id="username" name ="username"placeholder="Enter Username" @if(!empty($subadminData['username'])) value="{{$subadminData['username']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="url">First Name*</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Namel" @if(!empty($subadminData['firstName'])) value="{{$subadminData['firstName']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="url">Last Name*</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" @if(!empty($subadminData['lastName'])) value="{{$subadminData['lastName']  }}" @endif>
                      </div> 
                      <div class="form-group">
                        <label for="url">Gender*</label>
                        <input type="text" class="form-control" id="gendor" name="gendor" placeholder="Enter Gender" @if(!empty($subadminData['gendor'])) value="{{$subadminData['gendor']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="url">Birthdate*</label>
                        <input type="text" class="form-control" id="birthDate" name="birthDate" placeholder="Ex:2000-03-09" @if(!empty($subadminData['birthDate'])) value="{{$subadminData['birthDate']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="url">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" @if(!empty($subadminData['email'])) value="{{$subadminData['email']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="url">Password*</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                      </div>
                      
                     
                    </div>
                    <!-- /.card-body -->
    
                    <div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
           
          </div>
        </div>

      
    
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection