<div class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand navbar-brand-center" href="/">
            <img class="navbar-brand-logo" src="{{ asset('images/logo-invers.png')}}">
        </a>
        <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
        </button>
        <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow-up"></span>
            <span class="ellipsis ellipsis-vertical">
                @if(session()->has('image'))
                    <img class="ellipsis-object" width="32" height="32" src="{{ asset(session('image'))}}">
                @else
                    <img class="ellipsis-object" width="32" height="32" src="{{ asset('images/profile.jpg')}}">
                @endif
            </span>
        </button>
    </div>
    <div class="navbar-toggleable">
        <nav id="navbar" class="navbar-collapse collapse">
            <button class="sidenav-toggler hidden-xs" title="Collapse Menu" aria-expanded="true" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
            </button>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="dropdown-toggle" href="/search" role="button">
                        <span class="icon-with-child hidden-xs">
                            <span class="icon icon-search icon-lg"></span>
                        </span>
                        <span class="visible-xs-block">
                            <span class="icon icon-search icon-lg icon-fw"></span>
                             Search
                        </span>
                    </a>
                </li>

                @guest
                <li>
                    <a href="/login">
                        <span class="icon icon-sign-in icon-lg icon-fw" style="color:#d9230f"></span>
                        Sign in
                    </a>
                </li>
                @else
                    <li class="dropdown hidden-xs">
                        <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">

                            @if(session()->has('image'))
                                <img class="rounded" width="36" height="36" src="{{ asset(session('image'))}}">
                            @else
                                <img class="rounded" width="36" height="36" src="{{ asset('images/profile.jpg')}}">
                            @endif
                            @if(session()->has('username'))
                                {{session('username')}}
                            @endif

                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="navbar-upgrade-version">www.onlineshop.com</li>
                            <li class="divider"></li>
                            <li><a href="/user/edit/{{auth::id()}}"><span class="icon icon-edit icon-lg icon-fw"></span> Edit</a></li>
                            <li><a href="/profile/{{auth::id()}}"><span class="icon icon-user icon-lg icon-fw"></span> Profile</a></li>
                            @if(session('shop')== '')
                                <li><a href="/user/shop/create"><span class="icon icon-cart-plus icon-lg icon-fw"></span> My Shop</a></li>
                            @else
                                <li><a href="{{url('user/shop/'.session('shop'))}}"><span class="icon icon-cart-plus icon-lg icon-fw"></span> My Shop</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="icon icon-power-off icon-lg icon-fw"></span>
                                    Sign out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        </ul>
                    </li>
                    <li class="visible-xs-block">
                        <a href="/user/edit/{{auth::id()}}"><span class="icon icon-edit icon-lg icon-fw"></span> Edit</a>
                    </li>
                    <li class="visible-xs-block">
                        <a href="/profile/{{auth::id()}}"><span class="icon icon-user icon-lg icon-fw"></span> Profile</a>
                    </li>
                    @if(session('shop')== '')
                        <li class="visible-xs-block"><a href="/user/shop/create"><span class="icon icon-cart-plus icon-lg icon-fw"></span> My Shop</a></li>
                    @else
                        <li class="visible-xs-block"><a href="{{url('user/shop/'.session('shop'))}}"><span class="icon icon-cart-plus icon-lg icon-fw"></span> My Shop</a></li>
                    @endif
                    <li class="visible-xs-block">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="icon icon-power-off icon-lg icon-fw"></span>
                            Sign out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
            </ul>
        </nav>
    </div>
</div>