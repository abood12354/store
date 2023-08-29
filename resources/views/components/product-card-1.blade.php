
@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
<div class="col-lg-4 col-sm-6">
                    <div class="product-style-1 mt-30">
                        <div class="product-image" id="div_1">
                        <span class="icon-text text-style-1">{{$product->status}}</span>
                            <div class="product-active">                            
                            <?php

use Spatie\MediaLibrary\MediaCollections\Models\Media;

$media=$product->Media()->first();
                            // $mediaItem=$product->getFirstMedia()->id;
                        //    $mediaId=$media->id;
                        //     $mediaFile_name=$media->file_name;
                            // dd($mediaId);
                        //$path=  "{{asset('storage/$media->id/$media->file_name')}}";
                        // dd($path);
                            ?>
                           
                            <div class="product-item active">  
                             <img src="{{$product->getFirstMediaUrl()}}"> 
                                </div>
                                <div class="product-item">
                                    <img src="{{$product->getFirstMediaUrl()}}" alt="product">
                                </div>
                                
                            </div>
                            <form  method="post" action="{{route('favorite_product',$product->id)}}" id="add_favorite">
                                @csrf
                            <button class="add-wishlist">
                                <i class="mdi mdi-heart-outline"></i>
                            </button>
                            </form>  
                            
                        </div>
                        <div id="div_add_cart" class="product-content text-center">
                            <h4 class="title"><a href="{{route('product_page',$product->id)}}">{{$product->name}}</a></h4>
                            <p>Reference {{$product->subcategories_id}}</p>
                            <form method="POST" action="{{route('add_cart',$product->id)}}" id="add_cart">
                                @csrf
                            <!-- <a href="javascript:void(0)" class="main-btn secondary-1-btn"> -->
                                <input  type="hidden" name="id" value="{{$product->id}}"/>
                                <input  type="hidden" name="name" value="{{$product->name}}"/>
                                <input  type="hidden" name="price" value="{{$product->price}}"/>
                                <input  type="hidden" name="status" value="{{$product->status}}"/>
                                <!-- <input class="main-btn secondary-1-btn" type="number" name="quantity"> -->
                                <button type="submit"  class="main-btn secondary-1-btn">
                                <img src="{{asset('assets/images/icon-svg/cart-7.svg')}}" alt="">
                                {{$product->price}}

                            <!-- </a> -->
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
   <script>
    $(document).ready(function () {

        $('#add_favorite').on('submit',function(event){

            event.preventDefault();
            jQuery.ajax({
                route:"{{route('add_cart',$product->id)}}",
                data:jQuery('#add_favorite').serialize(),
                type:'post',
                success:function(result)
                {
                $('#div_1').css('display','block');
                jQuery('#div_1').html(result.message);
                jQuery('#add_favorite')[0].reset();
                }
            });

        });
      });


/////////////////////////////////////////


      $(document).ready(function () {

        
$('#add_cart').on('submit',function(event){

    event.preventDefault();
    jQuery.ajax({
        route:"{{route('favorite_product',$product->id)}}",
        data:jQuery('#add_cart').serialize(),
        type:'post',
        success:function(result)
        {
        $('#div_add_cart').css('display','block');
        jQuery('#div_add_cart').html(result.message);
        jQuery('#add_cart')[0].reset();
        }
    });

});
});
   </script>
