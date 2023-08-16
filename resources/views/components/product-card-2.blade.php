<div class="col-lg-6">
                    <div class="product-style-7 mt-30">
                        <div class="product-image">
                            <span class="icon-text text-style-1">{{$product->status}}</span>
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset('assets/images/product-4/product-11.jpg')}}" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{asset('assets/images/product-4/product-12.jpg')}}" alt="product">
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <ul class="product-meta">
                                <li>
                                    <a class="add-wishlist" href="javascript:void(0)">
                                        <i class="mdi mdi-heart-outline"></i>
                                        Add to Favorite
                                    </a>
                                </li>
                                <li>
                                    <span><i class="mdi mdi-star"></i> {{$product->Assess}}</span>
                                </li>
                            </ul>
                            <h4 class="title"><a href="product-details-page.html">{{$product->name}}</a></h4>
                            <p>{{$product->parent_id}}</p>
                            <span class="price">{{$product->price}}</span>
                            <a href="javascript:void(0)" class="main-btn primary-btn">
                                <img src="{{asset('assets/images/icon-svg/cart-4.svg')}}" alt="">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>