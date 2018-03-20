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
                <li class="sidenav-item">
                    <a href="/admin/category">
                        <span class="sidenav-icon icon icon-tags"></span>
                        <span class="sidenav-label">Category</span>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/role">
                        <span class="sidenav-icon icon icon-registered"></span>
                        <span class="sidenav-label">Role Control</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>