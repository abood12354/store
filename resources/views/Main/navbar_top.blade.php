 <!-- navbar top Start -->

 <div class="navbar-top-wrapper">
                    <div class="container-lg">
                        <div class="navbar-top d-lg-flex justify-content-between">
                            <!-- navbar top left Start -->
                            <div class="navbar-top-left">
                                <ul class="navbar-top-link">
                                    <li><a href="about-page.html">About</a></li>
                                    <li><a href="contact-page.html">Contact</a></li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="mdi mdi-phone-in-talk"></i>
                                            +8801234567890
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar top left Ends -->
                            <!-- navbar top right Start -->
                            <div class="navbar-top-right">
                                <ul class="navbar-top-link">
                                    <li>
                                        <select>
                                            <option value="0">$ USD</option>
                                            <option value="1">€ EURO</option>
                                            <option value="2">$ CAD</option>
                                            <option value="3">₹ INR</option>
                                            <option value="4">¥ CNY</option>
                                            <option value="5">৳ BDT</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select>
                                            <option value="0">English</option>
                                            <option value="1">Español</option>
                                            <option value="2">Filipino</option>
                                            <option value="3">Français</option>
                                            <option value="4">العربية</option>
                                            <option value="5">हिन्दी</option>
                                            <option value="6">বাংলা</option>
                                        </select>
                                    </li>
                                    @if (Auth::check())
                                    <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="d-block ">Loge Out</button>
          </form>                                    
          @endif
                                    
                                    
                                    
                                </ul>
                            </div>
                            <!-- navbar top right Ends -->
                        </div>
                    </div>
                </div>

                  <!-- navbar top Ends -->