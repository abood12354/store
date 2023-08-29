@extends('Layouts.main')
@section('title','eStorihhijne Template')
@section('style')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@endsection

@section('content')


@include('Main.navigation')
    
    <!--====== Breadcrumbs Part Start ======-->
    <section class="breadcrumbs-wrapper pt-50 pb-50 bg-primary-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-style breadcrumbs-style-1 d-md-flex justify-content-between align-items-center">
                        <div class="breadcrumb-left">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                            </ol>
                        </div>
                        <div class="breadcrumb-right">
                            <h5 class="heading-5 font-weight-500">Product Details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Breadcrumbs Part Ends ======-->

    <!--====== Product Details Style 1 Part Start ======-->
    <section class="product-details-wrapper pt-50 pb-100">
        <div class="container">
            <div class="product-details-style-1">
                <div class="row flex-lg-row-reverse align-items-center">
                    <div class="col-lg-6">
                        <div class="product-details-image mt-50">
                            <div class="product-image">
                                <div class="product-image-active-1">
                                    <div class="single-image">
                                        <img src="{{asset('assets/images/product-details-1/product-1.jpg')}}" alt="">
                                    </div>
                                    <div class="single-image">
                                        <img src="assets/images/product-details-1/product-2.jpg" alt="">
                                    </div>
                                    <div class="single-image">
                                        <img src="{{asset('assets/images/product-details-1/product-3.jpg')}}" alt="">
                                    </div>
                                    <div class="single-image">
                                        <img src="{{asset('assets/images/product-details-1/product-4.jpg')}}" alt="">
                                    </div>
                                    <div class="single-image">
                                        <img src="{{asset('assets/images/product-details-1/product-5.jpg')}}" alt="">
                                    </div>
                                    <div class="single-image">
                                        <img src="{{asset('assets/images/product-details-1/product-3.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb-image">
                                <div class="product-thumb-image-active-1">
                                    <div class="single-thumb">
                                        <img src="{{asset('assets/images/product-details-1/thunb-1.jpg')}}" alt="">
                                    </div>
                                    <div class="single-thumb">
                                        <img src="{{asset('assets/images/product-details-1/thunb-2.jpg')}}" alt="">
                                    </div>
                                    <div class="single-thumb">
                                        <img src="{{asset('assets/images/product-details-1/thunb-3.jpg')}}" alt="">
                                    </div>
                                    <div class="single-thumb">
                                        <img src="{{asset('assets/images/product-details-1/thunb-4.jpg')}}" alt="">
                                    </div>
                                    <div class="single-thumb">
                                        <img src="{{asset('assets/images/product-details-1/thunb-5.jpg')}}" alt="">
                                    </div>
                                    <div class="single-thumb">
                                        <img src="{{asset('assets/images/product-details-1/thunb-3.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content mt-45">
                            <p class="sub-title">{{$product?->subcategories_id}}</p>
                            <h2 class="title">{{$product?->name}}</h2>
    
                            <div class="product-items flex-wrap">
                                <h6 class="item-title">Select Your Oculus: </h6>
                                <div class="items-wrapper">
                                    <div class="single-item active">
                                        <div class="items-image">
                                            <img src="{{asset('assets/images/product-details-1/product-items-1.jpg')}}" alt="product">
                                        </div>
                                        <p class="text">Oculus Go</p>
                                    </div>
                                    <div class="single-item">
                                        <div class="items-image">
                                            <img src="{{asset('assets/images/product-details-1/product-items-2.jpg')}}" alt="product">
                                        </div>
                                        <p class="text">Oculus Quest</p>
                                    </div>
                                    <div class="single-item">
                                        <div class="items-image">
                                            <img src="{{asset('assets/images/product-details-1/product-items-3.jpg')}}" alt="product">
                                        </div>
                                        <p class="text">Oculus Rift S</p>
                                    </div>
                                </div>
                            </div>
    
                            <div class="product-select-wrapper flex-wrap">
                                <div class="select-item">
                                    <h6 class="select-title">Select Color: <span>Grey</span></h6>
                                    <ul class="color-select">
                                        <li class="active" data-color="#EFEFEF"></li>
                                        <li data-color="#FAE5EC"></li>
                                        <li data-color="#4C4C4C"></li>
                                    </ul>
                                </div>
                                <div class="select-item">
                                    <h6 class="select-title">Memory (GB): </h6>
                                    <div class="size-select">
                                        <select>
                                            <option value="">32gb</option>
                                            <option value="">64gb</option>
                                            <option value="">128 gb</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="select-item">
                                    <h6 class="select-title">Select Quantity: </h6>
    
                                    <div class="select-quantity">
                                        <button type="button" id="sub" class="sub"><i class="mdi mdi-minus"></i></button>
                                        <input type="text" value="1" />
                                        <button type="button" id="add" class="add"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                                <div class="select-item">
                                    <h6 class="select-title">Select Shipping Country: </h6>
                                    <div class="country-select">
                                        <select>
                                            <option value="0">-- Select Country --</option>
                                            <option value="1">Bangladesh</option>
                                            <option value="2">india</option>
                                            <option value="3">Pakistan</option>
                                            <option value="4">Australia</option>
                                            <option value="5">Canada</option>
                                            <option value="6">Spain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
    
                            <div class="product-price">
                                <h6 class="price-title">Price: </h6>
                    
                                <p class="sale-price">${{$product?->sell}}</p>
                                <p class="regular-price">${{$product?->price}}</p>

                            </div>
    
                            <div class="product-btn">
             
                                <!-- <a href="" class="main-btn secondary-1-btn"> -->
                                    <form action="{{route('buy',$product->id)}}" method="post">
                                        @csrf
                                    <button type="submit"  class="main-btn secondary-1-btn">
                                    <img src="assets/images/icon-svg/cart-8.svg" alt="">
                                    Buy Now
                                    </button>
                                    </form>
                                <!-- </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Product Details Style 1 Part Ends ======-->
    <!--====== Reviews Part Start ======-->
    @include('Sections.Second_Page.Reviews')

    <!--====== Reviews Part Ends ======-->
        <!--====== Subscribe Part Start ======-->
        @include('Sections.Index.subscribe-part')
    <!--====== Subscribe Part Ends ======-->

    <!--====== Clients Logo Part Start ======-->

    <!--====== Clients Logo Part Ends ======-->
    @include('Sections.Index.client-logo-part')
    <!--====== Subscribe Part Start ======-->
    <section class="subscribe-section pt-70 pb-70 bg-primary-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="heading text-center">
                        <h1 class="heading-1 font-weight-700 text-white mb-10">Subscribe Newsletter</h1>
                        <p class="gray-3">Be the first to know when new products drop and get behind-the-scenes content
                            straight.</p>
                    </div>
                    <div class="subscribe-form">
                        <form action="#">
                            <div class="single-form form-default">
                                <label class="text-white-50">Enter your email address</label>
                                <div class="form-input">
                                    <input type="text" placeholder="user@email.com">
                                    <i class="mdi mdi-account"></i>
                                    <button class="main-btn primary-btn"><span class="mdi mdi-send"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Subscribe Part Ends ======-->

    <!--====== Footer Style 3 Part Start ======-->
    @include('Sections.Index.footer-style-3')
    <!--====== Footer Style 3 Part Ends ======-->












@endsection


@section('script')




@endsection