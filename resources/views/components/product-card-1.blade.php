       <div class="col-lg-4 col-sm-6">
                    <div class="product-style-1 mt-30">
                        <div class="product-image">
                        <span class="icon-text text-style-1">{{$product->status}}</span>
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset('assets/images/product-1/product-9.jpg')}}" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{asset('assets/images/product-1/product-10.jpg')}}" alt="product">
                                </div>
                            </div>
                            <a class="add-wishlist" href="javascript:void(0)">
                                <i class="mdi mdi-heart-outline"></i>
                            </a>
                        </div>
                        <div class="product-content text-center">
                            <h4 class="title"><a href="{{route('product_page',$product->id)}}">{{$product->name}}</a></h4>
                            <p>Reference {{$product->subcategories_id}}</p>
                            <form method="POST" action="{{route('add_cart',$product->id)}}">
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
   
