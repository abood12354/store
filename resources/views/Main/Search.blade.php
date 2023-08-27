                    <form action="{{route('Post_Search')}}" method="post">
                        @csrf
                    <div class="navbar-search search-style-5">
                                    <div class="search-select">
                                        <select>
                                            <option value="">All</option>
                                            <option value="1">option 01</option>
                                            <option value="2">option 02</option>
                                            <option value="3">option 03</option>
                                            <option value="4">option 04</option>
                                            <option value="5">option 05</option>
                                        </select>
                                    </div>
                                    <div class="search-input">
                                    <!-- value="{{ request()->input('search') }}" -->
                                        <input type="text"  placeholder="Search Of Name Product...." name="search" value="{{isset($search) ? $search:''}}" >
                                    </div>
                                    <div class="search-btn">
                                        <button><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                                </form>