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
                                <p class="sale-price">///</p>
                                <p class="regular-price">$ 179 USD</p>
                            </div>
    
                            <div class="product-btn">
                                <a href="javascript:void(0)" class="main-btn primary-btn">
                                    <img src="assets/images/icon-svg/cart-4.svg" alt="">
                                    Add to cart
                                </a>
                                <a href="javascript:void(0)" class="main-btn secondary-1-btn">
                                    <img src="assets/images/icon-svg/cart-8.svg" alt="">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Product Details Style 1 Part Ends ======-->
    <!--====== Reviews Part Start ======-->
   


    <section class="reviews-wrapper pt-100 pb-100 ">
        <div class="container">
            <div class="reviews-style">
                <div class="reviews-menu">

                    <ul class="breadcrumb-list-grid nav nav-tabs border-0" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                Details
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                aria-selected="false">
                                Reviews
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="specifications-tab" data-toggle="tab" href="#specifications" role="tab" aria-controls="specifications"
                                aria-selected="false">
                                specifications
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="details-wrapper">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="reviews-title">
                                        <h4 class="title">Oculus VR</h4>
                                    </div>
                                    <p class="mb-15 pt-30">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime quod sequi vitae atque
                                        perspiciatis voluptas recusandae explicabo ea dolores numquam ratione, obcaecati ullam, ipsam minima vero nostrum
                                        nesciunt facere laudantium? Facere animi rem veniam quibusdam nam sed ex maxime laboriosam a vero nesciunt tenetur,
                                        eius autem fugiat quod expedita dignissimos.</p>
                                    <p class="mb-30">Repellendus, doloribus illum expedita, dolorem voluptas doloremque voluptatibus, magni tempora
                                        laboriosam deserunt suscipit labore dolorum aperiam cum veniam accusamus? Consequatur dolore facere perferendis
                                        repellat, modi in consectetur ipsum atque quos natus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="review-wrapper">
                            <div class="reviews-title">
                                <h4 class="title">Customer Reviews (38)</h4>
                            </div>
                        
                            <div class="reviews-rating-wrapper flex-wrap">
                                <div class="reviews-rating-star">
                                    <p class="rating-review"><i class="mdi mdi-star"></i> <span>4.5</span> of 5</p>
                        
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">5 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 60%;"></div>
                                            </div>
                                            <p class="percent">60%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">4 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 20%;"></div>
                                            </div>
                                            <p class="percent">20%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">3 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 10%;"></div>
                                            </div>
                                            <p class="percent">10%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">2 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 5%;"></div>
                                            </div>
                                            <p class="percent">05%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">1 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 0;"></div>
                                            </div>
                                            <p class="percent">0%</p>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="reviews-rating-form">
                                    <div class="rating-star">
                                        <p>Click on star to review</p>
                                        <ul id="stars" class="stars">
                                            <li class="star" data-value='1'><i class="mdi mdi-star"></i></li>
                                            <li class="star" data-value='2'><i class="mdi mdi-star"></i></li>
                                            <li class="star" data-value='3'><i class="mdi mdi-star"></i></li>
                                            <li class="star" data-value='4'><i class="mdi mdi-star"></i></li>
                                            <li class="star" data-value='5'><i class="mdi mdi-star"></i></li>
                                        </ul>
                                    </div>
                                    <div id="div_add_comment" class="rating-form">
                                        <form action="{{route('add_review')}}" id="add_comment" method="post">
                                            @csrf
                                            <div class="single-form form-default">
                                                <label>Write your Review</label>
                                                <div class="form-input">
                                                    <input type="hidden" id="idd" value="{{$product->id}}" />
                                                    <textarea placeholder="Your review here" name="body"></textarea>
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </div>
                                            </div>
                                            <div class="single-rating-form flex-wrap">
                                                <div class="rating-form-file">
                                                    <div class="file">
                                                        <input type="file" id="file-1">
                                                        <label for="file-1"><i class="mdi mdi-camera"></i></label>
                                                    </div>
                                                    <div class="file">
                                                        <input type="file" id="file-1">
                                                        <label for="file-1"><i class="mdi mdi-attachment"></i></label>
                                                    </div>
                                                </div>
                                                <div class="rating-form-btn">
                                                    <button class="main-btn primary-btn">write a Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="reviews-btn flex-wrap">
                                <div class="reviews-btn-left">
                                    <div class="dropdown-style">
                                        <div class="dropdown dropdown-white">
                                            <button class="main-btn primary-btn" type="button" id="dropdownMenu-1" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> All Stars (213) <i
                                                    class="mdi mdi-chevron-down"></i></button>
                        
                                            <ul class="dropdown-menu sub-menu-bar" aria-labelledby="dropdownMenu-1">
                                                <li><a href="#">Dropped Menu 1</a></li>
                                                <li><a href="#">Dropped Menu 2</a></li>
                                                <li><a href="#">Dropped Menu 3</a></li>
                                                <li><a href="#">Dropped Menu 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dropdown-style">
                                        <div class="dropdown dropdown-white">
                                            <button class="main-btn primary-btn-border" type="button" id="dropdownMenu-1" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true"> Sort by Latest <i
                                                    class="mdi mdi-chevron-down"></i></button>
                        
                                            <ul class="dropdown-menu sub-menu-bar" aria-labelledby="dropdownMenu-1">
                                                <li><a href="#">Dropped Menu 1</a></li>
                                                <li><a href="#">Dropped Menu 2</a></li>
                                                <li><a href="#">Dropped Menu 3</a></li>
                                                <li><a href="#">Dropped Menu 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="reviews-btn-right">
                                    <a href="#" class="main-btn">with photo (18)</a>
                                    <a href="#" class="main-btn">additional feedback (23)</a>
                                </div>
                            </div>
                        
                            <div class="reviews-comment">
                                <ul class="comment-items">
                                    <li>
                                        <div class="single-review-comment">
                                            <div class="comment-user-info">
                                                <div class="comment-author">
                                                    <img src="assets/images/review/author-1.jpg" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <h6 class="name">User Name</h6>
                        
                                                    <p>
                                                        <i class="mdi mdi-star"></i>
                                                        <span class="rating"><strong>4</strong> of 5</span>
                                                        <span class="date">20 Nov 2019 22:01</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="comment-user-text">
                                                <p>Good headphones. The sound is clear. AND the bottoms repyat and top ring. Currently
                                                    are really not taken. For me quiet. With my Beats of course can not be compared. But
                                                    for the money and definitely recommend. The one who took happy as an elephant.
                                                    Product as advertised, looks good Quality, sound is not the best but because of
                                                    cost-benefit ratio it seems very good to me, recommended the seller .</p>
                                                <ul class="comment-meta">
                                                    <li><i class="mdi mdi-thumb-up"></i> <span>31</span></li>
                                                    <li><a href="#">Like</a></li>
                                                    <li><a href="#">Replay</a></li>
                                                </ul>
                                            </div>
                                        </div>
                        
                                        <ul class="comment-replay">
                                            <li>
                                                <div class="single-review-comment">
                                                    <div class="comment-user-info">
                                                        <div class="comment-author">
                                                            <img src="assets/images/review/author-2.jpg" alt="">
                                                        </div>
                                                        <div class="comment-content">
                                                            <h6 class="name">User Name</h6>
                        
                                                            <p>
                                                                <i class="mdi mdi-star"></i>
                                                                <span class="rating"><strong>4</strong> of 5</span>
                                                                <span class="date">20 Nov 2019 22:01</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment-user-text">
                                                        <p>Good headphones. The sound is clear. AND the bottoms repyat and top ring.
                                                            Currently are really not taken.</p>
                                                        <div class="comment-image flex-wrap">
                                                            <div class="image">
                                                                <img src="assets/images/review/attachment-1.jpg" alt="">
                                                            </div>
                                                            <div class="image">
                                                                <img src="assets/images/review/attachment-2.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <ul class="comment-meta">
                                                            <li><i class="mdi mdi-thumb-up"></i> <span>31</span></li>
                                                            <li><a href="#">Like</a></li>
                                                            <li><a href="#">Replay</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-review-comment">
                                                    <div class="comment-user-info">
                                                        <div class="comment-author">
                                                            <img src="assets/images/review/author-3.jpg" alt="">
                                                        </div>
                                                        <div class="comment-content">
                                                            <h6 class="name">User Name</h6>
                        
                                                            <p>
                                                                <i class="mdi mdi-star"></i>
                                                                <span class="rating"><strong>4</strong> of 5</span>
                                                                <span class="date">20 Nov 2019 22:01</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment-user-text">
                                                        <p>Good headphones. The sound is clear. AND the bottoms repyat and top ring.
                                                            Currently are really not taken.</p>
                                                        <ul class="comment-meta">
                                                            <li><i class="mdi mdi-thumb-up"></i> <span>31</span></li>
                                                            <li><a href="#">Like</a></li>
                                                            <li><a href="#">Replay</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="single-review-comment">
                                            <div class="comment-user-info">
                                                <div class="comment-author">
                                                    <img src="assets/images/review/author-4.jpg" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <h6 class="name">User Name</h6>
                        
                                                    <p>
                                                        <i class="mdi mdi-star"></i>
                                                        <span class="rating"><strong>4</strong> of 5</span>
                                                        <span class="date">20 Nov 2019 22:01</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="comment-user-text">
                                                <p>Good headphones. The sound is clear. AND the bottoms repyat and top ring. Currently
                                                    are really not taken. For me quiet. With my Beats of course can not be compared. But
                                                    for the money and definitely recommend. The one who took happy as an elephant.
                                                    Product as advertised, looks good Quality, sound is not the best but because of
                                                    cost-benefit ratio it seems very good to me, recommended the seller .</p>
                                                <ul class="comment-meta">
                                                    <li><i class="mdi mdi-thumb-up"></i> <span>31</span></li>
                                                    <li><a href="#">Like</a></li>
                                                    <li><a href="#">Replay</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                        <div class="specifications-wrapper">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="reviews-title">
                                        <h4 class="title">Oculus VR</h4>
                                    </div>
                                    <p class="mb-15 pt-30">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime quod sequi vitae
                                        atque
                                        perspiciatis voluptas recusandae explicabo ea dolores numquam ratione, obcaecati ullam, ipsam minima
                                        vero nostrum
                                        nesciunt facere laudantium? Facere animi rem veniam quibusdam nam sed ex maxime laboriosam a vero
                                        nesciunt tenetur,
                                        eius autem fugiat quod expedita dignissimos.</p>
                                    <p class="mb-30">Repellendus, doloribus illum expedita, dolorem voluptas doloremque voluptatibus, magni
                                        tempora
                                        laboriosam deserunt suscipit labore dolorum aperiam cum veniam accusamus? Consequatur dolore facere
                                        perferendis
                                        repellat, modi in consectetur ipsum atque quos natus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section>


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







<script>
$(document).ready(function () {

    $('#add_comment').on('submit',function(event){

        event.preventDefault();
        jQuery.ajax({
            route:"{{route('add_review')}}",
            data:jQuery('#add_comment').serialize(),
            type:'post',
            success:function(result)
            {
            $('#div_add_comment').css('display','block');
            jQuery('#div_add_comment').html(result.message);
            jQuery('#add_comment')[0].reset();
            }
        });

    });
  });
</script>






@endsection


