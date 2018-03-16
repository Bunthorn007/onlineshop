@extends('./layouts/admin')

@section('header')
    <title>Edit User</title>
    <link rel="stylesheet" href="../../../css/signup-2.min.css">
    <link rel="stylesheet" href="../../../css/profile.min.css">
@endsection

@section('content')
    <div class="profile">
        <div class="profile-header">
            <div class="profile-cover">
                <div class="profile-container">
                    <div class="profile-card">
                        <div class="profile-avetar">
                            <img class="profile-avetar-img" width="128" height="128" src="{{$user->photo ?$user->photo->file : 'No photo'}}">
                        </div>
                        <div class="profile-overview">
                            <h1 class="profile-name">{{$user->firstname.' '. $user->lastname}}</h1>
                            <button class="profile-follow-btn" type="button" style="color:#d9230f">Follow</button>
                            <p>Let's get starting!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-body">
            <div class="row gutter-xs">
                <div class="col-md-4">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-middle media-body">
                                    <h2 class="media-heading">
                                        <span class="fw-l">1,000</span>
                                        <span class="fw-b fz-sm">POSTS</span>
                                    </h2>
                                </div>
                                <div class="media-middle media-right">
                                    <div class="media-chart">
                                        <canvas data-chart="bar" data-animation="false" data-labels='["S", "M", "T", "W", "T", "F", "S"]' data-values='[{"backgroundColor": "#91170a", "borderColor": "transparent", "data": [676, 297, 479, 226, 979, 743, 572]}]' data-scales='{"xAxes": [{ "gridLines": {"color": "#91170a"}, "ticks": {"fontColor": "#fff"}} ]}' data-hide='["gridLinesX", "legend", "scalesY", "tooltips"]' height="66" width="132"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-middle media-left">
                                    <div class="media-chart">
                                        <canvas data-chart="doughnut" data-animation="false" data-labels='["New", "Returning"]' data-values='[{ "backgroundColor": ["#aeea00", "rgba(0, 0, 0, 0.15)"], "borderColor" : ["#029acf", "#029acf"], "data": [18422, 32594]}]' data-hide='["scalesX", "legend", "scalesY", "tooltips"]' height="66" width="66"></canvas>
                                    </div>
                                </div>
                                <div class="media-middle media-body">
                                    <h2 class="media-heading">
                                        <span class="fw-l">1,000</span>
                                        <span class="fw-b fz-sm">FOLLOWERS</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-middle media-left">
                      <span class="bg-warning-inverse circle sq-64">
                        <span class="icon icon-flag"></span>
                      </span>
                                </div>
                                <div class="media-middle media-body">
                                    <h2 class="media-heading">
                                        <span class="fw-l">1,000</span>
                                        <span class="fw-b fz-sm">FOLLOWING</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gutter-xs">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>User Information</strong>
                        </div>
                        <div class="card-body" data-toggle="match-height">
                            <ul class="list-group list-group-divided">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-middle media-body">
                                            <h4 class="media-heading"><small>User Name : {{$user->firstname.' '. $user->lastname}}</small></h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-middle media-body">
                                            <h4 class="media-heading"><small>Gender : {{$user->gender==1 ? 'Male' : 'Female'}}</small></h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-middle media-body">
                                            <h4 class="media-heading"><small>Date Of Birth : {{$user->birthdate}}</small></h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Contact Information</strong>
                        </div>
                        <div class="card-body" data-toggle="match-height">
                            <ul class="list-group list-group-divided">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-middle media-body">
                                            <h4 class="media-heading"><small>Phone Number : {{$user->phone}}</small></h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-middle media-body">
                                            <h4 class="media-heading"><small>Email : {{$user->email}}</small></h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-middle media-body">
                                            <h4 class="media-heading"><small>Status : {{$user->status == 1 ? 'Active':'Not Active'}}</small></h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gutter-xs">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Address</strong>
                        </div>
                        <div class="card-body" data-toggle="match-height">
                            <ul class="list-group list-group-divided">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-middle media-body">
                                            <h4 class="media-heading"><small>{{$user->address}}</small></h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection