@extends('layouts.app')

@section('header')

    <title>Search - Onlineshop</title>
    <link rel="stylesheet" href="{{asset('css/store.min.css')}}">

@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="well well-sm">
                <div class="form-group">
                    <div class="input-group input-group-md">
                        <div class="icon-addon addon-md">
                            <input type="text" placeholder="What are you looking for?" class="form-control" v-model="query">
                        </div>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" @click="search()" v-if="!loading">Search!</button>
                            <button class="btn btn-primary" type="button" disabled="disabled" v-if="loading">Searching...</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" role="alert" v-if="error">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                @{{ error }}
            </div>
            <ul class="products">
                <li v-for="post in posts">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="media">
                                    <div class="media-middle media-left">
                                        <a href="/profile/@{{post.user_id}}">
                                            <img class="media-object img-circle" width="32" height="32" :src="post.photo">
                                        </a>
                                    </div>
                                    <div class="media-middle media-body">
                                        <a class="link-muted" href="/profile/@{{post.user_id}}">
                                            @{{post.user}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-image">
                                <a class="link-muted" v-bind:href="post.url">
                                    <img class="img-responsive" width="100%" height="50%" v-bind:src="post.image">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title fw-l">
                                    <strong><a class="link-muted" v-bind:href="post.url">@{{post.title}}</a></strong>
                                </h4>
                                <small>@{{post.content}}</small>
                            </div>
                            <div class="card-footer">
                                <small>
                                    <span class="icon icon-eye icon-lg icon-fw"></span>@{{post.view}} views
                                    <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>@{{post.time}}</span>
                                </small>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection

@section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
    <script src="{{asset('js/search.js')}}"></script>

@endsection
