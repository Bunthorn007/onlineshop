@extends('layouts.app')

@section('header')

    <title>Index - Onlineshop</title>
    <link rel="stylesheet" href="{{asset('css/store.min.css')}}">

@endsection

@section('content')
    <div class="title-bar">
        <div class="title-bar-actions">
            <div class="btn-group">
                <button class="btn btn-default btn-sm hidden-md hidden-lg" data-toggle="modal" data-target="#filters" type="button">
                    <span class="icon icon-shopping-bag icon-lg icon-fw"></span>
                    Shops
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

                                        <div id="app" >
                                            <div class="product-brands-search">
                                                <div class="form-group form-group-sm">
                                                    <div class="input-with-icon">
                                                        <input type="text" autocomplete="off" v-model="search" id="search"
                                                               class="form-control input-lg" placeholder="Enter Shop Name Here" />
                                                        <span class="icon icon-search input-icon"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Vue Search List Start-->
                                            <ul v-cloak v-if="posts" v-bind:style="{ width : width + 'px' }" class="messenger-list">
                                                <li v-for="(post,key) in posts" :id="key +1" v-bind:class="[(key + 1 == count) ? activeClass : '', messenger-list-item]">
                                                    <a v-bind:href="post.url" class="messenger-list-link">

                                                        <div class="messenger-list-avatar">
                                                            <img v-bind:src="post.image" class="rounded" width="40" height="40">
                                                        </div>
                                                        <div class="messenger-list-details">
                                                            <div class="messenger-list-name truncate">@{{ post.name  }}</div>
                                                            <div class="messenger-list-message">
                                                                <span>
                                                                    <span class="icon icon-user"> : </span>
                                                                    <small class="truncate">@{{ post.user  }}</small>
                                                                </span>
                                                            </div>
                                                        </div>

                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Vue Search List End-->

                                            <ul class="messenger-list">
                                                @foreach($shops as $shop)
                                                <li class="messenger-list-item">
                                                    <a class="messenger-list-link" href="{{url('/shop/'.$shop->id)}}">
                                                        <div class="messenger-list-avatar">
                                                            <img class="rounded" width="40" height="40" src="{{$shop->photo->file}}">
                                                        </div>
                                                        <div class="messenger-list-details">
                                                            <div class="messenger-list-name truncate">{{ $shop->name  }}</div>
                                                            <div class="messenger-list-message">
                                                                <span>
                                                                    <span class="icon icon-user"> : </span>
                                                                    <small class="truncate">{{ $shop->user->firstname.' '.$shop->user->lastname  }}</small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                @endforeach
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
                    <ul class="products" id="load-data">
                        @foreach($posts as $post)
                            <li>
                                @include('components.postlist')
                            </li>
                        @endforeach
                    </ul>

                </div>
                @if($posts->has(0))
                <div id="remove-row" style="padding-left: 5px; padding-right: 5px;">
                    <button id="btn-more" data-id="{{ $post->id }}" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn btn-primary"> Load More </button>
                </div>
                @endif
            </div>

        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/lodash.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $(document).on('click','#btn-more',function(){
                var id = $(this).data('id');
                $("#btn-more").html("Loading....");
                $.ajax({
                    url : '{{ url("/loaddata") }}',
                    method : "POST",
                    data : {id:id, _token:"{{csrf_token()}}"},
                    dataType : "text",
                    success : function (data)
                    {
                        if(data != '')
                        {
                            $('#remove-row').remove();
                            $('#load-data').append(data);
                        }
                        else
                        {
                            $('#btn-more').html("No Data");
                        }
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">

        var app = new Vue({
            el: '#app',
            data: {
                posts : '',
                search : '',
                count : 0,
                width: 0,

            },
            methods: {
                getPosts: _.debounce(function() {
                    this.posts = "";
                    this.count = 0;
                    self = this;

                    if (this.search.trim() != '') {
                        axios.post("{{ url('/') }}",{
                            search : self.search
                        })
                            .then(function (response) {
                                self.posts = response.data;
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    }

                }, 500),
                selectPost: function(keyCode) {
                    // If down arrow key is pressed
                    if (keyCode == 40 && this.count < this.posts.length) {
                        this.count++;
                    }
                    // If up arrow key is pressed
                    if (keyCode == 38 && this.count > 1) {
                        this.count--;
                    }
                    // If enter key is pressed
                    if (keyCode == 13) {
                        // Go to selected post
                        document.getElementById(this.count).childNodes[0].click();
                    }
                },
                clearData: function(e) {
                    if (e.target.id != 'search') {
                        this.posts = '',
                            this.count = 0
                    }
                }
            },
            mounted:function(){
                self = this;

                // get width of search input for vue search widget on initial load
                this.width = document.getElementById("search").offsetWidth;
                // get width of search input for vue search widget when page resize
                window.addEventListener('resize', function(event){
                    self.width = document.getElementById('search').offsetWidth;
                });

                // To clear vue search widget when click on body
                document.body.addEventListener('click',function (e) {
                    self.clearData(e);
                });

                document.getElementById('search').addEventListener('keydown', function(e) {
                    // check whether arrow keys are pressed
                    if(_.includes([37, 38, 39, 40, 13], e.keyCode) ) {
                        if (e.keyCode === 38 || e.keyCode === 40) {
                            // To prevent cursor from moving left or right in text input
                            e.preventDefault();
                        }

                        if (e.keyCode === 40 && self.posts == "") {
                            // If post list is cleared and search input is not empty
                            // then call ajax again on down arrow key press
                            self.getPosts();
                            return;
                        }

                        self.selectPost(e.keyCode);

                    } else {
                        self.getPosts();
                    }
                });
            },
        });
    </script>

    <script src="{{asset('js/messenger.min.js')}}"></script>
@endsection
