<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Product Detail - Onlineshop</title>
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" sizes="16x16">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" >
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/shopping-cart.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.min.css')}}">

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
                </div>
                <div class="product-details">
                    <h1 class="product-name">{{$product->name}}</h1>
                    <div>
                        <span>
                            <span class="product-price-current"><span class="label label-primary label-pill" style="font-size: 18px;">$ {{$product->price}}</span></span>
                            <span class="pull-right"><span class="icon icon-eye icon-lg icon-fw"></span>{{$product->view}} views</span>

                        </span>
                    </div>

                    <div class="product-divider"></div>

                    <div class="product-description" style="padding-top: 10px;">
                        <?php echo $product->detail ?>
                    </div>

                    <p style="padding-top: 25px;">
                        <span class="label label-outline-primary label-pill"><strong><span class="icon icon-phone icon-lg icon-fw"></span>Phone: </strong>{{$product->shop->user->phone}}</span>
                    </p>

                    <div class="product-sku">
                        <span class="icon icon-tags icon-lg icon-fw"></span>{{$product->productCategory->name}}
                        <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>{{$product->created_at->diffForHumans()}}</span>
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
    <div class="layout-footer">
        <div class="layout-footer-body">
            <small class="version">Developer : Bunthorn-KH</small>
            <small class="copyright">2018 &copy; Onlineshop</small>
        </div>
    </div>
</div>
<script src="{{mix('js/libs.js')}}"></script>
<script src="{{asset('js/product.min.js')}}"></script>
</body>

</html>