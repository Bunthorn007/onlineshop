@extends('layouts.sticky')

@section('header')

    <title>Index</title>
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
                <div class="col-xs-12">
                    <ul class="products">
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="product.html">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                                </h5>
                                <span class="product-price">
                                    <span class="product-price-current">$33.00</span>
                                    <span class="product-price-old">$46.00</span>
                                </span>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="product.html">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                                </h5>
                                <span class="product-price">
                                    <span class="product-price-current">$33.00</span>
                                    <span class="product-price-old">$46.00</span>
                                </span>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="product.html">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                                </h5>
                                <span class="product-price">
                                    <span class="product-price-current">$33.00</span>
                                    <span class="product-price-old">$46.00</span>
                                </span>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="product.html">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                                </h5>
                                <span class="product-price">
                                    <span class="product-price-current">$33.00</span>
                                    <span class="product-price-old">$46.00</span>
                                </span>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="product.html">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                                </h5>
                                <span class="product-price">
                                    <span class="product-price-current">$33.00</span>
                                    <span class="product-price-old">$46.00</span>
                                </span>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="product.html">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                                </h5>
                                <span class="product-price">
                                    <span class="product-price-current">$33.00</span>
                                    <span class="product-price-old">$46.00</span>
                                </span>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="product.html">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                                </h5>
                                <span class="product-price">
                                    <span class="product-price-current">$33.00</span>
                                    <span class="product-price-old">$46.00</span>
                                </span>
                            </div>
                        </li>
                        <li class="product">
                            <div class="product-image">
                                <a class="overlay" href="product.html">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                                </h5>
                                <span class="product-price">
                                    <span class="product-price-current">$33.00</span>
                                    <span class="product-price-old">$46.00</span>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="js/messenger.min.js"></script>
@endsection
