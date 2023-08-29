    <!--====== Footer Style 3 Part Start ======-->
    <section class="footer-style-3 pt-100 pb-100">
        <div class="container">
            <div class="footer-top">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7 col-sm-10">
                        <div class="footer-logo text-center">
                            <a href="index.html">
                                <img src="assets/images/logo.svg" alt="">
                            </a>
                        </div>
                        <h5 class="heading-5 text-center mt-30">Follow Us</h5>
                        <ul class="footer-follow text-center">
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-instagram-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
    
            <div class="footer-widget-wrapper text-center pt-20">
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-widget">
                           
                            <h5 class="footer-title">ADDED BY THE ADMINS</h5>
                           
  

                            <ul class="footer-link">
                                @foreach ($cmsPages as $page )

                                <li><a href="{{ url('/'.$page['url']) }}"> {{ $page['title'] }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
    
            <div class="footer-copyright text-center">
                <p>Developed by <a href="https://graygrids.com/" rel="nofollow" target="_blank">GrayGrids</a>. Basesd on <a href="https://ecommercehtml.com/" rel="nofollow" target="_blank">eCommerceHTML</a>
                </p>
        </div>
    </section>
    <!--====== Footer Style 3 Part Ends ======-->