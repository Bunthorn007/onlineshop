@extends('./layouts/app')

@section('header')
    <title>User Shop Index - Onlineshop</title>
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
        <h1 class="title-bar-title">
            <span class="d-ib">{{$shop->name}}</span>
        </h1>
        <p class="title-bar-description">
            <small>{{$shop->message}}</small>
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
                                                    @foreach($procategories as $category)
                                                        <h5 class="product-name">
                                                            <a class="link-muted" href="#">{{$category->name}}</a>
                                                        </h5>
                                                    @endforeach
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
    </div>

@endsection
