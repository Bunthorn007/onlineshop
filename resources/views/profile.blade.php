@extends('./layouts/app')

@section('header')
    <title>profile</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.min.css')}}">
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
                            <button class="profile-follow-btn" type="button" >Follow</button>
                            <p>Let's get starting!</p>
                        </div>
                    </div>

                    <div class="profile-tabs">
                        <ul class="profile-nav">
                            <li class="active">
                                <a data-toggle="tab" href="#post">Posts</a>
                            </li>
                            <li><a data-toggle="tab" href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="contact" class="tab-pane fade">
                <div class="profile-body">
                <div class="row gutter-xs">
                    <div class="col-md-4">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-middle media-left">
                                      <span class="bg-primary-inverse circle sq-64">
                                        <span class="icon icon-share-alt"></span>
                                      </span>
                                    </div>
                                    <div class="media-middle media-body">
                                        <h2 class="media-heading">
                                            <span class="fw-l">1,000</span>
                                            <span class="fw-b fz-sm">POSTS</span>
                                        </h2>
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
                                      <span class="bg-primary-inverse circle sq-64">
                                        <span class="icon icon-check"></span>
                                      </span>
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
                        <div class="card bg-danger">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-middle media-left">
                                      <span class="bg-primary-inverse circle sq-64">
                                        <span class="icon icon-search"></span>
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
                                                <h4 class="media-heading"><small><strong>User Name : </strong>{{$user->firstname.' '. $user->lastname}}</small></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-middle media-body">
                                                <h4 class="media-heading"><small><strong>Gender : </strong>{{$user->gender==1 ? 'Male' : 'Female'}}</small></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-middle media-body">
                                                <h4 class="media-heading"><small><strong>Date Of Birth : </strong>{{$user->birthdate}}</small></h4>
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
                                                <h4 class="media-heading"><small><strong>Phone Number : </strong>{{$user->phone}}</small></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-middle media-body">
                                                <h4 class="media-heading"><small><strong>Email : </strong>{{$user->email}}</small></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-middle media-body">
                                                <h4 class="media-heading"><small><strong>Status : </strong>{{$user->status == 1 ? 'Active':'Not Active'}}</small></h4>
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
            <div id="post" class="tab-pane fade in active">
                <div class="row">
                    <div class="divider"><h4 class="pull-left" style="padding-left: 30px; margin: 0px;">All Posts</h4></div>
                    <div class="col-xs-12">
                        @foreach($posts as $post)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media">
                                            <div class="media-middle media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" width="32" height="32" src="{{$post->user->photo->file}}">
                                                </a>
                                            </div>
                                            <div class="media-middle media-body">
                                                <a class="link-muted" href="#">
                                                    {{$post->user->firstname . ' '. $post->user->lastname}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-image">
                                        <a class="link-muted" href="/detail/{{$post->id}}">
                                            <img class="img-responsive" width="100%" height="50%" src="{{$post->photo->file}}">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title fw-l">
                                            <strong><a class="link-muted" href="/detail/{{$post->id}}">{{str_limit($post->title, 19)}}</a></strong>
                                        </h4>
                                        <small>{{str_limit($post->content, 29)}}</small>
                                    </div>
                                    <div class="card-footer">
                                        <small>
                                            <span class="icon icon-eye icon-lg icon-fw"></span>{{$post->view}} views
                                            <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>{{$post-> created_at->diffForHumans()}}</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
