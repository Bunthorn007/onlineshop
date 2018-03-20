<div class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand navbar-brand-center" href="/">
            <img class="navbar-brand-logo" src="{{ asset('img/logo-invers.png')}}">
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
            <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
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
                <li class="hidden-xs hidden-sm">
                    <form class="navbar-search navbar-search-collapsed">
                        <div class="navbar-search-group">
                            <input class="navbar-search-input" type="text" placeholder="Search for people, companies, and more&hellip;">
                            <button class="navbar-search-toggler" title="Expand search form ( S )" aria-expanded="false" type="submit">
                                <span class="icon icon-search icon-lg"></span>
                            </button>
                            <button class="navbar-search-adv-btn" type="button">Advanced</button>
                        </div>
                    </form>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                  <span class="icon-with-child hidden-xs">
                    <span class="icon icon-envelope-o icon-lg"></span>
                    <span class="badge badge-danger badge-above right">1</span>
                  </span>
                        <span class="visible-xs-block">
                    <span class="icon icon-envelope icon-lg icon-fw"></span>
                    <span class="badge badge-danger pull-right">1</span>
                    Messages
                  </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                        <div class="dropdown-header">
                            <a class="dropdown-link" href="compose.html">New Message</a>
                            <h5 class="dropdown-heading">Recent messages</h5>
                        </div>
                        <div class="dropdown-body">
                            <div class="list-group list-group-divided custom-scrollbar">
                                <a class="list-group-item" href="#">
                                    <div class="notification">
                                        <div class="notification-media">
                                            <img class="rounded" width="40" height="40" src="img/0299419341.jpg" alt="Harry Jones">
                                        </div>
                                        <div class="notification-content">
                                            <small class="notification-timestamp">16 min</small>
                                            <h5 class="notification-heading">Ly Bopha</h5>
                                            <p class="notification-text">
                                                <small class="truncate">Hi Teddy, Just wanted to let you know we got the project! We should be starting the planning next week. Harry</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown-footer">
                            <a class="dropdown-btn" href="#">See All</a>
                        </div>
                    </div>
                </li>
                @guest
                <li>
                    <a href="/login">
                        <span class="icon icon-sign-in icon-lg icon-fw"></span>
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
                        <a href="contacts.html">
                            <span class="icon icon-users icon-lg icon-fw"></span>
                            Contacts
                        </a>
                    </li>
                    <li class="visible-xs-block">
                        <a href="profile.html">
                            <span class="icon icon-user icon-lg icon-fw"></span>
                            Profile
                        </a>
                    </li>
                    <li class="visible-xs-block">
                        <a href="login-1.html">
                            <span class="icon icon-power-off icon-lg icon-fw"></span>
                            Sign out
                        </a>
                    </li>
                    @endguest
            </ul>
        </nav>
    </div>
</div>