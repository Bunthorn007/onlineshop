@extends('./layouts/app')

@section('header')
    <title>User Shop Index - Onlineshop</title>
    <link rel="stylesheet" href="{{asset('css/store.min.css')}}">
@endsection

@section('content')

        <div class="title-bar">

            <h1 class="title-bar-title">
                <span class="d-ib">{{$shop->name}}</span>
            </h1>
            <p class="title-bar-description">
                <small>{{$shop->message}}</small>
            </p>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="products">
                        @foreach($products as $product)
                            <li class="product">
                                <div class="product-image">
                                    <a class="overlay" href="{{url('/user/product/'.$product->id)}}">
                                        <div class="overlay-image">
                                            <img class="img-responsive" src="{{asset($product->productImages->first()->file)}}">
                                        </div>
                                        <div class="overlay-content overlay-top">
                                            <span class="label label-success pull-right">SALE!</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-details">
                                    <h5 class="product-name">
                                        <a class="link-muted" href="product.html">{{str_limit($product->name, 25)}}</a>
                                    </h5>
                                    <span class="product-rating">
                                    <span class="divider">
                                        <span class="divider-content">
                                            <span class="icon icon-star active"></span>
                                            <span class="icon icon-star active"></span>
                                            <span class="icon icon-star active"></span>
                                        </span>
                                    </span>
                                </span>
                                    <span class="product-price">
                                    <span class="product-price-current"> $ {{$product->price}}</span>
                                </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

@endsection
