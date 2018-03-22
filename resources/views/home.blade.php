@extends('layouts.app')

@section('header')

    <title>index</title>
    <link rel="stylesheet" href="{{asset('css/store.min.css')}}">
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
                                        <div class="divider"><h4 class="pull-left">All Shops</h4></div>
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
                <div class="divider"><h4 class="pull-left" style="padding-left: 5px;">Most Views</h4></div>
                <div class="col-xs-12">
                    <ul class="products">
                    @foreach($rmposts as $post)
                        <li>
                            @include('components.postlist')
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="divider"><h4 class="pull-left" style="padding-left: 5px;">Recently</h4></div>
                <div class="col-xs-12">
                    <ul class="products">
                        @foreach($rcposts as $post)
                            <li>
                                @include('components.postlist')
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="divider"><h4 class="pull-left" style="padding-left: 5px;">All Posts</h4></div>
                <div class="col-xs-12">
                    <ul class="products">
                        @foreach($posts as $post)
                            <li>
                                @include('components.postlist')
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('footer')
    <script src="{{asset('js/messenger.min.js')}}"></script>
@endsection
