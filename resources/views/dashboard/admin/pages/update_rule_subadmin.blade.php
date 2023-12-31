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
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
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

       
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if ($errors->any())

            @foreach ($errors->all() as $error)
            
            <span style="color: red;">{{ $error }}</span>
            
            @endforeach
            
            @endif
                <form name="subadminForm" id="subadminForm"  action="{{ url('update-rule-subadmin/'.$id) }}"  method="POST">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $id }}">


                    @if(!@empty($subAdminRoles))

                    @foreach ($subAdminRoles as $role) 
       
                        @if($role['module']=='cms_pages')
                         @if($role['view_access']==1)
                        @php $viewCmsPages="checked" @endphp
                          @else
                          @php $viewCmsPages="" @endphp

                          @endif
                          @if($role['edit_access']==1)
                        @php $editCmsPages="checked" @endphp
                          @else
                          @php $editCmsPages="" @endphp

                          @endif
                          @if($role['full_access']==1)
                        @php $fullCmsPages="checked" @endphp
                          @else
                          @php $fullCmsPages="" @endphp

                          @endif




                        @endif
                    @endforeach
                      @endif


                     

                      <div class="card-body">
                        <label for="url">CMS Pages:&nbsp </label>
                        <input type="checkbox"   name="cms_pages[view]" value="1" @if(isset($viewCmsPages)){{ $viewCmsPages }}@endif>
                      <label>   View Access &nbsp; &nbsp; &nbsp  </label>
                        <input type="checkbox" "  name="cms_pages[edit]" value="1"@if(isset($editCmsPages)){{ $editCmsPages }}@endif >
                        <label>   View/Edit Access &nbsp; &nbsp;</label>
                        <input type="checkbox"   name="cms_pages[full]" value="1"@if(isset($fullCmsPages)){{ $fullCmsPages }}@endif >
                        <label>    Full Access 'create and delete' &nbsp; &nbsp; &nbsp </label>

                      </div>
                      <div>

                        <input type="hidden" name="user_id" value="{{ $id }}">
    
    
                        @if(!@empty($subAdminRoles))
    
                        @foreach ($subAdminRoles as $role) 
           
                            @if($role['module']=='categories')
                             @if($role['view_access']==1)
                            @php $viewCategories="checked" @endphp
                              @else
                              @php $viewCategories="" @endphp
    
                              @endif
                              @if($role['edit_access']==1)
                            @php $editCategories="checked" @endphp
                              @else
                              @php $editCategories="" @endphp
    
                              @endif
                              @if($role['full_access']==1)
                            @php $fullCategories="checked" @endphp
                              @else
                              @php $fullCategories="" @endphp
    
                              @endif
    
    
    
    
                            @endif
                        @endforeach
                          @endif
    
    
                         
    
                          <div class="card-body">
                            <label for="url">Category:&nbsp </label>
                            <input type="checkbox"   name="categories[view]" value="1" @if(isset($viewCategories)){{ $viewCategories }}@endif>
                          <label>   View Access &nbsp; &nbsp; &nbsp  </label>
                            <input type="checkbox" "  name="categories[edit]" value="1"@if(isset($editCategories)){{ $editCategories }}@endif >
                            <label>   View/Edit Access &nbsp; &nbsp;</label>
                            <input type="checkbox"   name="categories[full]" value="1"@if(isset($fullCategories)){{ $fullCategories }}@endif >
                            <label>    Full Access 'create and delete' &nbsp; &nbsp; &nbsp </label>
    
                          </div>
    
                
                <!-- /.row -->
              </div>
              
              <!-- /.card-body -->
           
            </div>
    
          
        
          </div>
                    <div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            
            <!-- /.row -->
          </div>


  
  
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection