@extends('dashboard.admin.layout.layout')
@section('content')
  @php
      use App\Models\Category;
  @endphp
 <!-- Content Wrapper. Contains page content -->
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
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
                <form name="productForm" id="productForm" @if(empty($product['id']))action="{{ url('add-edit-product') }}" 
                @else action="{{ url('add-edit-product/'.$product['id']) }}" @endif method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">product Name*</label>
                        <input type="text" class="form-control" id="name" name ="name"placeholder="Enter Product Name" @if(!empty($product['name'])) value="{{$product['name']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="name">product Price*</label>
                        <input type="number" class="form-control" id="price" name ="price"placeholder="Enter Product Price" @if(!empty($product['price'])) value="{{$product['price']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="name">product Discount*</label>
                        <input type="number" class="form-control" id="sell" name ="sell"placeholder="Enter Product Discount" @if(!empty($product['sell'])) value="{{$product['sell']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="name">product Quantity*</label>
                        <input type="noumber" class="form-control" id="quantity" name ="quantity"placeholder="Enter Product Quantity" @if(!empty($product['quantity'])) value="{{$product['quantity']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="catagory_id" >Category Id*</label>
                        <select name="catagory_id" class="form-control" >

                            @if (!empty($product['catagory_id']))
                            <option selected="selected" value="{{ $product['catagory_id'] }}" >
                              
                                    {{  Category::where('id',$product['catagory_id'])->first()->category_name;}}
                            </option>
                                
                            @endif

                            @foreach ($getCategories as $cat )
               
                                <option value="{{ $cat['id'] }}"> {{ $cat['category_name'] }}   </option>
                              
                             @if(!empty($cat['subcategories']))
                             @foreach ($cat['subcategories'] as $subcategory ) 

                                       <option value="{{ $subcategory['id'] }}"> &nbsp;&nbsp;&raquo;{{ $subcategory['category_name'] }} </option>
                                    
                                @if(!empty($subcategory['subcategories']))
                                @foreach ($subcategory['subcategories'] as $subsubcat ) 

                                       <option value="{{ $subsubcat['id'] }}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;{{ $subsubcat['category_name'] }}   </option>
                                    
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </select>
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