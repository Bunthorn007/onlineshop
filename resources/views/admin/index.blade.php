@extends('./layouts/admin')

@section('header')

@endsection

@section('logo')
    <a class="navbar-brand navbar-brand-center" href="index-2.html">
        <img class="navbar-brand-logo" src="img/logo-inverse.svg" alt="Elephant">
    </a>
@endsection

@section('user_icon')
    <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
        <img class="rounded" width="36" height="36" src="img/0180441436.jpg" alt="Teddy Wilson"> Teddy Wilson
        <span class="caret"></span>
    </button>
@endsection

@section('sidebar')
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
                    <li class="sidenav-item active">
                        <a href="dashboard-1.html">
                            <span class="sidenav-icon icon icon-home"></span>
                            <span class="sidenav-label">Dashboards</span>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="widgets.html">
                            <span class="badge badge-success">26</span>
                            <span class="sidenav-icon icon icon-th"></span>
                            <span class="sidenav-label">Widgets</span>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="page-layouts.html">
                            <span class="sidenav-icon icon icon-columns"></span>
                            <span class="sidenav-label">Page layouts</span>
                        </a>
                    </li>
                    <li class="sidenav-item has-subnav">
                        <a href="#" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-list"></span>
                            <span class="sidenav-label">Tables</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Tables</li>
                            <li><a href="static-tables.html">Static tables</a></li>
                            <li><a href="dynamic-tables.html">Dynamic tables</a></li>
                        </ul>
                    </li>
                    <li class="sidenav-item">
                        <a href="charts.html">
                            <span class="sidenav-icon icon icon-pie-chart"></span>
                            <span class="sidenav-label">Charts</span>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="messenger.html">
                            <span class="sidenav-icon icon icon-comments"></span>
                            <span class="sidenav-label">Messenger</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection


@section('content')

@endsection


@section('footer')

@endsection
