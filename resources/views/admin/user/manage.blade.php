@extends('./layouts/admin')

@section('header')
    <title>User Info</title>
    <link rel="stylesheet" href="../css/drive.min.css">
@endsection

@section('content')
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="icon icon-th-large" style="color:#d9230f"></span>
            <span class="d-ib">User Management</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                            <thead>
                            <tr>
                                <th>
                                    <label class="custom-control custom-control-primary custom-checkbox">
                                        <input class="custom-control-input" type="checkbox">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Date Of Birth</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users)
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <label class="custom-control custom-control-primary custom-checkbox">
                                            <input class="custom-control-input" type="checkbox">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td data-order="{{$user->firstname .' '. $user->lastname}}">
                                    <span class="icon-with-child m-r">
                                        <img class="circle" width="36" height="36" src="{{$user->photo ?$user->photo->file : '/images/profile.jpg'}}">
                                        <span class="icon-child bg-facebook circle sq-8"></span>
                                    </span>
                                        <strong>{{$user->firstname .' '. $user->lastname}}</strong>
                                    </td>
                                    <td class="maw-320">
                                        <span class="truncate">{{$user->email}}</span>
                                    </td>
                                    <td>{{$user->gender==1 ? 'Male' : 'Female'}}</td>
                                    <td>{{$user->birthdate}}</td>
                                    <td data-order="1">
                                        <span class="label label-default label-pill">{{$user->role->name}}</span>
                                    </td>
                                    <td data-order="1">
                                        <span class="label label-info label-pill">{{$user->status==1 ? 'Active' : 'Not Active'}}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group dropdown">
                                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
                                                <span class="icon icon-th icon-fw"></span>
                                                Action
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" style="min-width: 100px;">
                                                <li>
                                                    <a href="{{url('admin/user', $user->id)}}">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <span class="icon icon-user-plus icon-lg icon-fw"></span>
                                                            </div>
                                                            <div class="media-body">
                                                                <span class="d-b">View</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="user/{{$user->id}}/edit">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <span class="icon icon-edit icon-lg icon-fw"></span>
                                                            </div>
                                                            <div class="media-body">
                                                                <span class="d-b">Edit</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="user/{{$user->id}}/delete">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <span class="icon icon-trash icon-lg icon-fw"></span>
                                                            </div>
                                                            <div class="media-body">
                                                                <span class="d-b">Delete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection