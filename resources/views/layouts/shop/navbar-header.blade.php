<div class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand navbar-brand-center" href="/shop/{{$shop->id}}">
            <img class="navbar-brand-logo" src="{{ asset($shop->photo->file)}}">
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
                            <input class="navbar-search-input" id="name" name="name" type="text" placeholder="Search for products name...">
                            <button id="btnsearch" name="btnsearch" class="navbar-search-toggler" title="Expand search form" aria-expanded="false" type="submit">
                                <span class="icon icon-search icon-lg"></span>
                            </button>
                            <button data-id="{{ $shop->id }}" id="btn-more" class="navbar-search-adv-btn" type="button">Search</button>
                        </div>
                    </form>
                </li>
                <li>
                    <a href="/">
                        <span class="icon icon-shopping-cart icon-lg icon-fw"></span>
                        Online Shop
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>