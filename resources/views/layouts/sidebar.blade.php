<div class="layout-sidebar">
    <div class="layout-sidebar-backdrop"></div>
    <div class="layout-sidebar-body">
        <nav id="sidenav" class="sidenav-collapse collapse">
            @if(Auth::check())
                @if(Auth::user()->role_id == 1)
                    <ul class="sidenav">

                        <li class="sidenav-heading">Navigation</li>
                        <li class="sidenav-item">
                            <a href="/admin/">
                                <span class="sidenav-icon icon icon-dashboard"></span>
                                <span class="sidenav-label">Dashboards</span>
                            </a>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-group"></span>
                                <span class="sidenav-label">User Control</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">User Control</li>
                                <li>
                                    <a href="/admin/user/create">Create User</a>
                                </li>
                                <li>
                                    <a href="/admin/user/">Manage User</a>
                                </li>
                                <li>
                                    <a href="/admin/usertrash">User Trash</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-share-alt"></span>
                                <span class="sidenav-label">Post Control</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Post Control</li>
                                <li>
                                    <a href="{{url('admin/post/create')}}">Create Post</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/post')}}">Manage Posts</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-shopping-bag"></span>
                                <span class="sidenav-label">Shop Control</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Shop Control</li>
                                <li>
                                    <a href="{{url('admin/shop/create')}}">Create Shop</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/shop/')}}">Manage Shops</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-cart-plus"></span>
                                <span class="sidenav-label">Product</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Product Control</li>
                                <li>
                                    <a href="{{url('admin/product/create')}}">Create Product</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/product/')}}">Manage Products</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidenav-item">
                            <a href="/admin/category">
                                <span class="sidenav-icon icon icon-tags"></span>
                                <span class="sidenav-label">Category</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="/admin/role">
                                <span class="sidenav-icon icon icon-registered"></span>
                                <span class="sidenav-label">Roles </span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="/search">
                                <span class="sidenav-icon icon icon-search"></span>
                                <span class="sidenav-label">Search</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="sidenav-icon icon icon-power-off"></span>
                                <span class="sidenav-label">Sign out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>
                    </ul>
                @else
                    <ul class="sidenav">
                        <li class="sidenav-heading">Navigation</li>
                        <li class="sidenav-item">
                            <a href="/">
                                <span class="sidenav-icon icon icon-home"></span>
                                <span class="sidenav-label">Home</span>
                            </a>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-navicon"></span>
                                <span class="sidenav-label">Categories</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Categories</li>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{url('admin/post')}}"> {{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-share-alt"></span>
                                <span class="sidenav-label">Post Control</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Post Control</li>
                                <li>
                                    <a href="{{url('user/post/create')}}">Create Post</a>
                                </li>
                                <li>
                                    <a href="{{url('user/post')}}">Manage Posts</a>
                                </li>
                            </ul>
                        </li>
                        @if(session('shop') != '')
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-shopping-bag"></span>
                                <span class="sidenav-label">Shop Control</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Shop Control</li>
                                <li>
                                    <a href="{{url('user/shop/'.session('shop'))}}">My Shop</a>
                                </li>
                                <li>
                                    <a href="{{url('user/shop/'.session('shop').'/edit')}}">Edit Shop</a>
                                </li>
                                <li>
                                    <a href="{{url('user/shop/'.session('shop').'/category')}}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{url('user/product/create')}}">Create Product</a>
                                </li>
                                <li>
                                    <a href="{{url('user/product')}}">Manage Products</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="sidenav-item">
                            <a href="/user/myprofile">
                                <span class="sidenav-icon icon icon-user"></span>
                                <span class="sidenav-label">Profile</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="/search">
                                <span class="sidenav-icon icon icon-search"></span>
                                <span class="sidenav-label">Search</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="sidenav-icon icon icon-power-off"></span>
                                <span class="sidenav-label">Sign out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>
                    </ul>
                @endif
            @else
            <ul class="sidenav">
                <li class="sidenav-heading">Navigation</li>
                <li class="sidenav-item">
                    <a href="/">
                        <span class="sidenav-icon icon icon-home"></span>
                        <span class="sidenav-label">Home</span>
                    </a>
                </li>
                <li class="sidenav-item has-subnav">
                    <a href="#" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-navicon"></span>
                        <span class="sidenav-label">Categories</span>
                    </a>
                    <ul class="sidenav-subnav collapse">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{url('search/'.$category->id)}}">{{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="sidenav-item">
                    <a href="/search">
                        <span class="sidenav-icon icon icon-search"></span>
                        <span class="sidenav-label">Searching</span>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/register" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-registered"></span>
                        <span class="sidenav-label">Register</span>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/login" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-sign-in"></span>
                        <span class="sidenav-label">Sign in</span>
                    </a>
                </li>
            </ul>
            @endif
        </nav>
    </div>
</div>