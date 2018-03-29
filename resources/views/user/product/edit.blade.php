<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>User Edit Product - Onlineshop</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">

</head>
<body class="layout layout-header-fixed">
<div class="layout-header">

    @include('layouts.navbar-header')

</div>
<div class="layout-main">

    @include('layouts.sidebar')

    <div class="layout-content">
        <div class="layout-content-body">
            <div class="signup">
                <div class="title-bar">
                    <h1 class="title-bar-title">
                        <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                        <span class="d-ib">Edit Post</span>
                    </h1>
                </div>

                    <div class="signup-body">
                        <form id="demo-uploader" action="{{url('user/product/'.$product->id)}}" method="post" enctype="multipart/form-data" data-toggle="validator">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="signup-form">
                                <div class="row gutter-xs">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input id="name" value="{{$product->name}}" class="form-control" type="text" name="name" spellcheck="false" data-msg-required="Please enter product title." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutter-xs">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select id="category" class="custom-select" name="product_category_id" data-msg-required="Please select category." required>
                                                @foreach($proCategories as $category)
                                                    @if($category->id == $product->product_category_id)
                                                        <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                                                    @else
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label for="price">Price ($)</label>
                                            <input id="price" value="{{$product->price}}" class="form-control" type="text" name="price" data-msg-required="Please enter product price ($)." required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" class="custom-select" name="status" data-msg-required="Please indicate user status.">
                                                <option value="{{$product->status}}" selected="selected">{{$product->status==1?'Active':'Not active'}}</option>
                                                @if($product->status != 1)
                                                    <option value="1">Active</option>
                                                @else
                                                    <option value="2">Not Active</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutter-xs">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="detail">Product Detail</label>
                                            <textarea id="detail" rows="8" class="form-control" name="detail">{{$product->detail}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutter-xs">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block"><span class="icon icon-refresh"></span>  Update Post</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#addimages"><span class="icon icon-image"></span>  Add Images</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>
    <div id="addimages" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><span class="icon icon-image"></span> Upload Images</h4>
                </div>
                <div class="modal-body">
                    <form id="addImages" action="{{url('/user/product/doupload')}}" method="post" enctype="multipart/form-data" class="dropzone">
                        {{csrf_field()}}

                        <input type="hidden" value="{{$product->id}}" name="product_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
<script src="{{asset('js/dropzone.min.js')}}"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-83990101-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
