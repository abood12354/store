    @extends('Layouts.main')
    @section('title','eStore Template')
    @section('style')

    @endsection

    @section('content')

    @include('Main.navigation')
    
    @include('Sections.Index.header_style_1')
    @include('Sections.Index.content-card-style-4')
    @include('Sections.Index.Product-Style-part-one')
    @include('Sections.Index.Product-style-part-two')
    @include('Sections.Index.Features-part-start')
    @include('Sections.Index.client-logo-part')
    @include('Sections.Index.subscribe-part')
    @include('Sections.Index.footer-style-3')

    @endsection

    @section('script')
    <!-- <script>
        $('.latest-product-area .pagination .page-link').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    console.log(response);

                    $('.latest-product-area').html(response);
                    //products.forEach(function(product) {
                    //    $('.all-products').append(`
                //    <div class="col-xl-3 col-lg-6 col-md-6">
                //        <div class="single-product">
                //            <div class="product-img">
                //                <a href="product-details.html">
                //                    <img src="" alt="">
                //                </a>
                //                <div class="product-action">
                //                    <a href="javascript:void(0)"><i class="lni lni-heart"></i></a>
                //                    <a href="javascript:void(0)" class="share"><i class="lni lni-share"></i></a>
                //                </div>
                //            </div>
                //            <div class="product-content">
                //                <h3 class="name"><a href="product-details.html">${product.name}</a></h3>
                //                <span class="update">Last Update: ${product.updated_at} 5 hours ago</span>
                //                <ul class="address">
                //                    <li>
                //                        <a href="javascript:void(0)"><i class="lni lni-calendar"></i>${product.created_at} 20 June,
                //                            2023</a>
                //                    </li>
                //                    <li>
                //                        <a href="javascript:void(0)"><i class="lni lni-map-marker"></i> </a>
                //                    </li>
                //                    <li>
                //                        <a href="javascript:void(0)"><i class="lni lni-user"></i> ${product.user.name}</a>
                //                    </li>
                //                    <li>
                //                        <a href="javascript:void(0)"><i class="lni lni-package"></i>
                //                            ${product.is_user ? 'User':'New'}</a>
                //                    </li>
                //                </ul>
                //                <div class="product-bottom">
                //                    <h3 class="price">${product.}$120.99</h3>
                //                </div>
                //            </div>
                //       // </div>
                //</div>
                //
                //                        `)
                    //})
                    console.log(response);
                },
                onFinishing: function(event, currentIndex) {},
                error: function(xhr) {
                    console.log(xhr);
                },
                beforeSend: function() {},
                complete: function() {}
            });

        })
        console.log()
    </script> -->
    @endsection




  













