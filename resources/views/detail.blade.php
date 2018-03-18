<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>detail</title>
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/shopping-cart.min.css')}}">
</head>
<body class="layout layout-header-fixed">
<div class="layout-header">
    <div class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand navbar-brand-center" href="#">
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
                                <li><a href="contacts.html"><span class="icon icon-users icon-lg icon-fw"></span> Contacts</a></li>
                                <li><a href="profile.html"><span class="icon icon-user icon-lg icon-fw"></span> Profile</a></li>
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
</div>

<div class="layout-main">
    <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
            <nav id="sidenav" class="sidenav-collapse collapse">
                <ul class="sidenav">
                    <li class="sidenav-search hidden-md hidden-lg">
                        <form class="sidenav-form" action="http://demo.naksoid.com/">
                            <div class="form-group form-group-sm">
                                <div class="input-with-icon">
                                    <input class="form-control" type="text" placeholder="Search…">
                                    <span class="icon icon-search input-icon"></span>
                                </div>
                            </div>
                        </form>
                    </li>
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
                                <a href="/admin/user/create">
                                    <span class="sidenav-icon icon icon-pencil-square-o"></span>Create
                                </a>
                            </li>
                            <li>
                                <a href="/admin/user/">
                                    <span class="sidenav-icon icon icon-th-large"></span>Manage
                                </a>
                            </li>
                            <li>
                                <a href="/admin/user/trash">
                                    <span class="sidenav-icon icon icon-trash-o"></span>Trash
                                </a>
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
                                <a href="{{url('admin/post/create')}}">
                                    <span class="sidenav-icon icon icon-pencil-square-o"></span>Create
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin/post')}}">
                                    <span class="sidenav-icon icon icon-th-large"></span>All Posts
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="product">
                <div class="product-images">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{asset($post->photo->file)}}">
                                <img src="{{asset($post->photo->file)}}">
                            </li>
                            <li data-thumb="{{asset($post->photo->file)}}">
                                <img src="{{asset($post->photo->file)}}">
                            </li>
                        </ul>
                    </div>
                    @guest
                        <div class="product-divider"></div>
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="text" name="comment" placeholder="                 please login first..." readonly>
                            <label class="md-control-label">Comment:</label>
                        </div>
                    @else
                        <div class="product-divider"></div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-0 col-md-1">
                                    <div class="media-middle media-left" style="padding-top: 18px;">
                                        <img class="media-object img-circle" width="32" height="32" src="{{$post->user->photo->file}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-11">
                                    <form action="#">
                                        <div class="md-form-group md-label-floating">
                                            <input class="md-form-control" type="text" name="comment">
                                            <label class="md-control-label">Comment</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest

                        <div class="post-footer">
                            <div class="post-comments">
                                <div class="post-comment-more">
                                    <a class="link-muted" href="#">Show previous comments 167</a>
                                </div>
                                <div class="post-comment-list">
                                    <ul class="media-list">
                                        <li class="media">
                                            <a class="media-left" href="#">
                                                <img class="media-object" width="32" height="32" src="{{asset('img/1699893867.jpg')}}">
                                            </a>
                                            <div class="media-body">
                                                <span class="media-link">
                                                  <a href="#">Ruby Dixon</a>
                                                </span>
                                                <span class="media-content">Maecenas venenatis, enim quis volutpat ornare, risus mi elementum mi, sit amet tristique ligula massa vel diam.</span>
                                                <div class="media-actions">
                                                    <a href="#" title="Like this comment">Like</a>
                                                    <span aria-hidden="true"> · </span>
                                                    <a href="#" title="Reply on Ruby Dixon's comment">Reply</a>
                                                    <span aria-hidden="true"> · </span>
                                                    <a class="link-muted" href="#" data-container="body" data-trigger="hover" data-toggle="tooltip" data-original-title="Agatha Ford, John Miller, Daniel Taylor and 66 others like this.">
                                                        <span class="icon icon-thumbs-o-up"></span>
                                                        69
                                                    </a>
                                                    <span aria-hidden="true"> · </span>
                                                    <a class="link-muted" href="#">47 mins</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a class="media-left" href="#">
                                                <img class="media-object" width="32" height="32" src="{{asset('img/1699893867.jpg')}}">
                                            </a>
                                            <div class="media-body">
                                                <span class="media-link">
                                                  <a href="#">Agatha Ford</a>
                                                </span>
                                                <span class="media-content">Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</span>
                                                <div class="media-actions">
                                                    <a href="#" title="Like this comment">Like</a>
                                                    <span aria-hidden="true"> · </span>
                                                    <a href="#" title="Reply on Agatha Ford's comment">Reply</a>
                                                    <span aria-hidden="true"> · </span>
                                                    <a class="link-mutedal line endings in your working directory.
warning: LF will be replaced by CRLF in routes/web.php.
The file will have its original line endings in your working directory.

C:\xampp\htdocs\onbizz>git commit -m "18-03-2018-complete-some-interface
                                                       href="#" data-container="body" data-trigger="hover" data-toggle="tooltip" data-original-title="Daniel Taylor, Sophia Evans, Ethan Walker and 118 others like this.">
                                                        <span class="icon icon-thumbs-o-up"></span>
                                                        121
                                                    </a>
                                                    <span aria-hidden="true"> · </span>
                                                    <a class="link-muted" href="#">41 mins</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="product-details">
                    <h1 class="product-name">{{$post->title}}</h1>
                    <p style="padding-top: 15px;">
                        <span class="icon icon-tags icon-lg icon-fw"></span>{{$post->category->name}}
                        <span class="pull-right"><span class="icon icon-eye icon-lg icon-fw"></span>{{$post->view}} views</span>
                    </p>
                    <div class="product-divider"></div>
                    <div class="product-price">
                        <span class="product-price-current"><span class="label label-info label-pill">{{$post->price}}</span></span>
                    </div>
                    <div class="product-description" style="padding-top: 10px;">
                        <?php echo $post->content ?>
                    </div>

                    <p style="padding-top: 15px;">
                        <span class="icon icon-location-arrow icon-lg icon-fw"></span>{{$post->location}}
                    </p>

                    <div class="product-sku">
                        <span><strong><span class="icon icon-user icon-lg icon-fw"></span> Posted By :  </strong>{{$post->user->firstname.' '.$post->user->lastname}}</span>
                        <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>{{$post->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="product-share">
                        <div class="social-list">
                            <a class="social-list-item" href="#" data-toggle="tooltip" title="Share on Facebook">
                                <span class="icon icon-facebook"></span>
                            </a>
                            <a class="social-list-item" href="#" data-toggle="tooltip" title="Share on Twitter">
                                <span class="icon icon-twitter"></span>
                            </a>
                            <a class="social-list-item" href="#" data-toggle="tooltip" title="Pin on Pinterest">
                                <span class="icon icon-pinterest"></span>
                            </a>
                            <a class="social-list-item" href="#" data-toggle="tooltip" title="Share on Google+">
                                <span class="icon icon-google-plus"></span>
                            </a>
                        </div>
                    </div>

                    <h4>Recommended</h4>
                    <div class="cart">
                        <ul class="cart-list">
                            @foreach($posts as $rmpost)
                            <li class="cart-list-item">
                                <div class="cart-list-image">
                                    <a href="/detail/{{$rmpost->id}}">
                                        <img class="cart-list-thumbnail" src="{{$rmpost->photo->file}}">
                                    </a>
                                </div>
                                <div class="cart-list-details" >
                                    <h4 class="cart-list-name">
                                        <a href="/detail/{{$rmpost->id}}">{{str_limit(title_case($rmpost->title), 43)}}</a>
                                    </h4>
                                    <p class="cart-list-description">
                                        <small><span class="icon icon-user icon-lg icon-fw"></span> Posted By : {{$rmpost->user->firstname.' '. $rmpost->user->lastname}}</small>
                                        <span class="pull-right"><span class="icon icon-eye icon-lg icon-fw"></span>{{$rmpost->view}} views</span>
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="layout-footer">
        <div class="layout-footer-body">
            <small class="version">Developer : Bunthorn-KH</small>
            <small class="copyright">2018 &copy; Onlineshop</small>
        </div>
    </div>
</div>
<script src="{{mix('js/libs.js')}}"></script>
<script src="{{asset('js/product.min.js')}}"></script>
</body>

</html>