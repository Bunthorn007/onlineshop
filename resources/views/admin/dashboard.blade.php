@extends('./layouts.app')

@section('header')

    <title>Admin Dashboard - Onlineshop</title>

@endsection

@section('content')
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="icon icon-dashboard" style="color:#d9230f"></span>
            <span class="d-ib">Dashboard</span>
        </h1>
    </div>
    <div class="row gutter-xs">
        <div class="col-md-6 col-lg-3 col-lg-push-0">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-primary-inverse circle sq-48">
                        <span class="icon icon-user"></span>
                      </span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Visitors</h6>
                            <h3 class="media-heading">
                                <span class="fw-l">10</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-push-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-primary-inverse circle sq-48">
                        <span class="icon icon-share-alt"></span>
                      </span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total Posts</h6>
                            <h3 class="media-heading">
                                <span class="fw-l">{{$posts}}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-pull-3">
            <div class="card bg-danger">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-primary-inverse circle sq-48">
                        <span class="icon icon-group"></span>
                      </span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total Users</h6>
                            <h3 class="media-heading">
                                <span class="fw-l">{{$users}}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-pull-0">
            <div class="card bg-danger">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-primary-inverse circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total Shops</h6>
                            <h3 class="media-heading">
                                <span class="fw-l">{{$shops}}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gutter-xs">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Visitors</h4>
                </div>
                <div class="card-body">
                    <div class="card-chart">
                        <canvas id="demo-visitors" data-chart="bar" data-animation="false" data-labels='["March 24", "March 25", "March 26", "March 27", "March 28", "March 29"]' data-values='[{"label": "Visitors", "backgroundColor": "#d9230f", "borderColor": "#d9230f",  "data": [0, 100, 150, 200, 300, 220]}]' data-hide='["legend", "scalesX"]' height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Posts</h4>
                </div>
                <div class="card-body">
                    <div class="card-chart">
                        <canvas id="demo-sales" data-chart="bar" data-animation="false" data-labels='["Aug 1", "Aug 2", "Aug 3", "Aug 4", "Aug 5"]' data-values='[{"label": "Sales", "backgroundColor": "#d9831f", "borderColor": "#d9831f",  "data": [10, 70, 150, 80, 95]}]' data-hide='["legend", "scalesX"]' height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')


@endsection