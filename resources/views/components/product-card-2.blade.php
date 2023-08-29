@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
<div class="col-lg-6">
@php
                           $url=$product->getFirstMediaUrl();
                                    $newUrl = str_replace(
                                    'http://localhost', 
                                    'http://127.0.0.1:8000',
                                            $url
                                        );
                           @endphp  
                    <div class="product-style-7 mt-30">
                        <div class="product-image">
                            <span class="icon-text text-style-1">{{$product->status}}</span>
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{$newUrl}}" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{$newUrl}}" alt="product">
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <ul class="product-meta">
                                <li>
                                <form  method="post" action="{{route('favorite_product',$product->id)}}" id="add_favorite">
                                    @csrf
                                <button class="add-wishlist">    
                                <!-- <a class="add-wishlist" href="javascript:void(0)"> -->
                                        <i class="mdi mdi-heart-outline"></i>
                                        Add to Favorite
                                    <!-- </a> -->
                                    </button>
                                </form>
                                </li>
                                <li>
                                    <span><i class="mdi mdi-star"></i> {{$product->Assess}}</span>
                                </li>
                            </ul>
                            <h4 class="title"><a href="{{route('product_page',$product->id)}}">{{$product->name}}</a></h4>
                            <p>{{$product->parent_id}}</p>
                            <span class="price">{{$product->price}}</span>
                            <form method="POST" action="{{route('add_cart',$product->id)}}" id="add_cart">
                                @csrf
                            <!-- <a href="javascript:void(0)" class="main-btn secondary-1-btn"> -->
                                <input  type="hidden" name="id" value="{{$product->id}}"/>
                                <input  type="hidden" name="name" value="{{$product->name}}"/>
                                <input  type="hidden" name="price" value="{{$product->price}}"/>
                                <input  type="hidden" name="status" value="{{$product->status}}"/>
                                <!-- <input class="main-btn secondary-1-btn" type="number" name="quantity"> -->
                                <button  class="main-btn primary-btn">
                                <img src="{{asset('assets/images/icon-svg/cart-4.svg')}}" alt="">
                                Add to Cart
                                </button>
                             </form>
                        </div>
                    </div>
                </div>



                <!-- <script>
    $(document).ready(function () {

        $('#add_favorite').on('submit',function(event){

            event.preventDefault();
            jQuery.ajax({
                route:"{{route('favorite_product',$product->id)}}",
                data:jQuery('#add_favorite').serialize(),
                type:'post',
                success:function(result)
                {
jQuery('#add_favorite')[0].reset();
                }
            });

        });
      });
   </script> -->
