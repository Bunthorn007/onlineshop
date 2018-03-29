<div class="layout-sidebar">
    <div class="layout-sidebar-backdrop"></div>
    <div class="layout-sidebar-body">
        <nav id="sidenav" class="sidenav-collapse collapse">

            <ul class="sidenav">
                <li class="sidenav-heading">Navigation</li>
                <li class="sidenav-item">
                    <a href="/shop/{{$shop->id}}">
                        <span class="sidenav-icon icon icon-home"></span>
                        <span class="sidenav-label">Shop Home</span>
                    </a>
                </li>
                <li class="sidenav-item has-subnav">
                    <a href="#" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-navicon"></span>
                        <span class="sidenav-label">Categories</span>
                    </a>
                    <ul class="sidenav-subnav collapse">
                        <li class="sidenav-subheading">Product Categories</li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{url('shop/search/'.$category->id)}}">{{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="sidenav-item">
                    <a href="/profile/{{$shop->user->id}}" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-user"></span>
                        <span class="sidenav-label">Shop Owner</span>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href='#btnsearch' onclick='document.getElementById("btnsearch").click();'>
                        <span class="sidenav-icon icon icon-search"></span>
                        <span class="sidenav-label">Searching</span>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/shop/contact/{{$shop->id}}" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-group"></span>
                        <span class="sidenav-label">Contact</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>