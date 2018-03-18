@extends('layouts.sticky')

@section('header')

    <title>index</title>
    <link rel="stylesheet" href="css/store.min.css">
    <link rel="stylesheet" href="css/messenger.min.css">

@endsection

@section('logo')
    <a class="navbar-brand navbar-brand-center" href="/admin/">
        <img class="navbar-brand-logo" src="img/logo-invers.png">
    </a>
@endsection

@section('content')

    <div class="title-bar">
        <div class="title-bar-actions">
            <div class="btn-group">
                <button class="btn btn-default btn-sm hidden-md hidden-lg" data-toggle="modal" data-target="#filters" type="button">
                    <span class="icon icon-filter icon-lg icon-fw"></span>
                    Filter
                </button>
            </div>
        </div>
        <h1 class="title-bar-title">
            <span class="d-ib">Online Shop</span>
        </h1>
        <p class="title-bar-description">
            <small>Improve your business performance with us!</small>
        </p>
    </div>
    <div class="store">
        <div class="store-sidebar">
            <div id="filters" class="modal" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="widget">
                                <div class="widget-product-brands">
                                    <div class="product-brands">
                                        <div class="product-brands-search">
                                            <div class="form-group form-group-sm">
                                                <div class="input-with-icon">
                                                    <input class="form-control thick" type="text" placeholder="Search available brands&hellip;">
                                                    <span class="icon icon-search input-icon"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-brands-results">
                                            <div class="custom-scrollbar">
                                                <div class="custom-controls-stacked">
                                                    <ul class="messenger-list">
                                                        <li class="messenger-list-item">
                                                            <a class="messenger-list-link" href="#0601274412" data-toggle="tab">
                                                                <div class="messenger-list-avatar">
                                                                    <img class="rounded" width="40" height="40" src="img/0601274412.jpg" alt="Sophia Evans">
                                                                </div>
                                                                <div class="messenger-list-details">
                                                                    <div class="messenger-list-date">Jun 22</div>
                                                                    <div class="messenger-list-name">Sophia Evans</div>
                                                                    <div class="messenger-list-message">
                                                                        <small class="truncate">Curabitur vel mi ante.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="messenger-list-item">
                                                            <a class="messenger-list-link" href="#0601274412" data-toggle="tab">
                                                                <div class="messenger-list-avatar">
                                                                    <img class="rounded" width="40" height="40" src="img/0601274412.jpg" alt="Sophia Evans">
                                                                </div>
                                                                <div class="messenger-list-details">
                                                                    <div class="messenger-list-date">Jun 22</div>
                                                                    <div class="messenger-list-name">Sophia Evans</div>
                                                                    <div class="messenger-list-message">
                                                                        <small class="truncate">Curabitur vel mi ante.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="store-content">

            <div class="row">
                <div class="divider"><h4 class="pull-left" style="padding-left: 30px;">Recommended</h4></div>
                <div class="col-xs-12">
                    @foreach($rmposts as $post)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-middle media-left">
                                        <a href="#">
                                            <img class="media-object img-circle" width="32" height="32" src="{{$post->user->photo->file}}">
                                        </a>
                                    </div>
                                    <div class="media-middle media-body">
                                        <a class="link-muted" href="#">
                                            {{$post->user->firstname . ' '. $post->user->lastname}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-image">
                                <a class="link-muted" href="/detail/{{$post->id}}">
                                    <img class="img-responsive" width="100%" height="50%" src="{{$post->photo->file}}">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title fw-l">
                                    <strong><a class="link-muted" href="/detail/{{$post->id}}">{{str_limit($post->title, 19)}}</a></strong>
                                </h4>
                                <small>{{str_limit($post->content, 29)}}</small>
                            </div>
                            <div class="card-footer">
                                <small>
                                    <span class="icon icon-eye icon-lg icon-fw"></span>{{$post->view}} views
                                    <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>{{$post-> created_at->diffForHumans()}}</span>
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="divider"><h4 class="pull-left" style="padding-left: 30px;">Recently</h4></div>
                <div class="col-xs-12">
                    @foreach($rcposts as $post)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="media">
                                        <div class="media-middle media-left">
                                            <a href="#">
                                                <img class="media-object img-circle" width="32" height="32" src="{{$post->user->photo->file}}">
                                            </a>
                                        </div>
                                        <div class="media-middle media-body">
                                            <a class="link-muted" href="#">
                                                {{$post->user->firstname . ' '. $post->user->lastname}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-image">
                                    <a class="link-muted" href="/detail/{{$post->id}}">
                                        <img class="img-responsive" width="100%" height="50%" src="{{$post->photo->file}}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title fw-l">
                                        <strong><a class="link-muted" href="/detail/{{$post->id}}">{{str_limit($post->title, 19)}}</a></strong>
                                    </h4>
                                    <small>{{str_limit($post->content, 29)}}</small>
                                </div>
                                <div class="card-footer">
                                    <small>
                                        <span class="icon icon-eye icon-lg icon-fw"></span>{{$post->view}} views
                                        <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>{{$post-> created_at->diffForHumans()}}</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="divider"><h4 class="pull-left" style="padding-left: 30px;">All Posts</h4></div>
                <div class="col-xs-12">
                    @foreach($posts as $post)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="media">
                                        <div class="media-middle media-left">
                                            <a href="#">
                                                <img class="media-object img-circle" width="32" height="32" src="{{$post->user->photo->file}}">
                                            </a>
                                        </div>
                                        <div class="media-middle media-body">
                                            <a class="link-muted" href="#">
                                                {{$post->user->firstname . ' '. $post->user->lastname}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-image">
                                    <a class="link-muted" href="/detail/{{$post->id}}">
                                        <img class="img-responsive" width="100%" height="50%" src="{{$post->photo->file}}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title fw-l">
                                        <strong><a class="link-muted" href="/detail/{{$post->id}}">{{str_limit($post->title, 19)}}</a></strong>
                                    </h4>
                                    <small>{{str_limit($post->content, 29)}}</small>
                                </div>
                                <div class="card-footer">
                                    <small>
                                        <span class="icon icon-eye icon-lg icon-fw"></span>{{$post->view}} views
                                        <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>{{$post-> created_at->diffForHumans()}}</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

@endsection

@section('footer')
    <script src="js/messenger.min.js"></script>
@endsection
