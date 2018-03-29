<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Show Post Detail - Onlineshop</title>
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" sizes="16x16">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" >
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/shopping-cart.min.css')}}">
</head>
<body class="layout layout-header-fixed">
<div class="layout-header">

    @include('layouts.navbar-header')

</div>

<div class="layout-main">

    @include('layouts.sidebar')

    <div class="layout-content">
        <div class="layout-content-body">
            <div class="product">
                <div class="product-images">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($images as $image)
                                <li data-thumb="{{asset($image->file)}}">
                                    <img src="{{asset($image->file)}}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @guest
                    <div class="product-divider"></div>
                    <div class="md-form-group md-label-floating">
                        <input class="md-form-control" type="text" name="comment"readonly>
                        <label class="md-control-label">Please login first.</label>
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
                                    {{--<form action="/comment" method="post" data-toggle="validator">--}}

                                    <div class="md-form-group md-label-floating" style="margin-bottom: 0px;">
                                        <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                                        <input class="md-form-control" type="text" id="content" name="content" data-msg-required="Please enter your comment." required>
                                        <label class="md-control-label">Comment</label>
                                    </div>
                                    <div class="cart-actions">
                                        <button class="btn btn-primary" type="submit" id="add">Comment</button>
                                    </div>
                                    {{ csrf_field() }}
                                    {{--</form>--}}
                                </div>
                            </div>
                        </div>
                        @endguest
                        <div class="post-footer">
                            <div class="post-comments">
                                <div class="post-comment-more">
                                    <a class="link-muted" href="#">{{count($comments)}} Comments </a>
                                </div>
                                <div class="post-comment-list">
                                    <ul class="media-list" id="commentlist">
                                        @foreach($comments as $comment)
                                            <li class="media comment{{$comment->id}}">
                                                <a class="media-left" href="/profile/{{$comment->user_id}}">
                                                    @if($comment->user->photo_id)
                                                        <img class="rounded" width="36" height="36" src="{{ asset($comment->user->photo->file)}}">
                                                    @else
                                                        <img class="rounded" width="36" height="36" src="{{ asset('images/profile.jpg')}}">
                                                    @endif
                                                </a>
                                                <div class="media-body">
                                                <span class="media-link">
                                                  <a href="/profile/{{$comment->user_id}}">{{$comment->user->firstname. ' '. $comment->user->lastname.' '}}</a>
                                                </span>
                                                    <span class="media-content">{{$comment->content}}</span>
                                                    <div class="media-actions">
                                                        <span aria-hidden="true">{{$comment->created_at->diffForHumans()}} · </span>
                                                        @if(Auth::id()==$comment->user_id)
                                                            <a class="delete-modal" data-id="{{$comment->id}}" data-name="{{$comment->content}}">Delete</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
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

                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="deleteContent">
                        Are you Sure you want to delete this comment? <span
                                class="hidden did"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
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
<script src="{{ asset('js/ajax_comment.js') }}"></script>
</body>

</html>