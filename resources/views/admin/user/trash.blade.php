@extends('layouts/app')

@section('header')
    <title>Admin User Trashed - Onlineshop</title>
@endsection

@section('content')
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="icon icon-trash" style="color:#d9230f"></span>
            <span class="d-ib">Trash</span>
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
                                <th>Restore</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
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
                                        <span class="icon-child bg-warning circle sq-8"></span>
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
                                        <a href="{{ url('admin/user/restore', $user->id) }}" class="btn-xs btn-danger btn-pill">Restore</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/user/forcedelete', $user->id) }}" class="btn-xs btn-primary btn-pill">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
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