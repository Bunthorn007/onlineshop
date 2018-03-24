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

                                        <div id="app" >
                                        <div class="product-brands-results">
                                            <div class="custom-scrollbar">
                                                <div class="custom-controls-stacked">

                                                    {{--<input type="text" autocomplete="off" v-model="search" id="search" class="form-control input-lg" placeholder="Enter Blog Title Here" />--}}

                                                    {{--<!-- Vue Search List Start-->--}}
                                                    {{--<ul v-cloak v-if="posts" v-bind:style="{ width : width + 'px' }" class="widget messenger-list">--}}
                                                        {{--<li v-for="(post,key) in posts" :id="key +1" v-bind:class="[(key + 1 == count) ? activeClass : '', menuItem]">--}}
                                                            {{--<a v-bind:href="post.url" >--}}
                                                                {{--<div class="list_item_container" v-bind:title="post.title">--}}
                                                                    {{--<div class="image">--}}
                                                                        {{--<img v-bind:src="post.image" >--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="label">--}}
                                                                        {{--<h4>@{{ post.title  }}</h4>--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</a>--}}
                                                        {{--</li>--}}
                                                    {{--</ul>--}}

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
                <div id="remove-row" style="padding-left: 5px; padding-right: 5px;">
                    <button id="btn-more" data-id="{{ $post->id }}" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn btn-primary"> Load More </button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('footer')
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
                menuItem : 'menu-item',
                activeClass : 'active'

            },
            methods: {
                getPosts: _.debounce(function() {
                    this.posts = "";
                    this.count = 0;
                    self = this;

                    if (this.search.trim() != '') {
                        axios.post("{{ url('/vuesearch') }}",{
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
