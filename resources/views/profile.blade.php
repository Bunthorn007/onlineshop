@extends('./layouts/app')

@section('header')
    <title>Profile - Onlineshop</title>
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
                    <div class="divider"><h4 class="pull-left" style="padding-left: 20px; margin: 0px;">All Posts</h4></div>
                    <div class="col-xs-12">
                        <div id="load-data">
                            @foreach($posts as $post)

                                    @include('components.postlist')

                            @endforeach
                        </div>
                        <div id="remove-row" style="padding-left: 5px; padding-right: 5px;">
                            <button id="btn-more" data-id="{{ $post->id }}" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn btn-primary"> Load More </button>
                        </div>
                    </div>
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
@endsection
