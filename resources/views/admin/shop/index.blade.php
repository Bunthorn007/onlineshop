@extends('./layouts/app')

@section('header')
    <title>Admin Manage Shop - Onlineshop</title>
    <link rel="stylesheet" href="{{asset('css/store.min.css')}}">
@endsection

@section('content')

    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="icon icon-navicon" style="color:#d9230f"></span>
            <span class="d-ib">All Shops</span>
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
                                <th>Shop Name</th>
                                <th>Address</th>
                                <th>Message</th>
                                <th>Owner</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($shops)
                                @foreach($shops as $shop)
                                    <tr>
                                        <td>
                                            <label class="custom-control custom-control-primary custom-checkbox">
                                                <input class="custom-control-input" type="checkbox">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>
                                        <td data-order="{{$shop->name}}">
                                            <span class="icon-with-child m-r">
                                                <img class="circle" width="36" height="36" src="{{$shop->photo->file ?$shop->photo->file : '/images/profile.jpg'}}">
                                                <span class="icon-child bg-facebook circle sq-8"></span>
                                            </span>
                                            <strong>{{str_limit($shop->name, 25)}}</strong>
                                        </td>
                                        <td class="maw-320">
                                            <span class="truncate">{{str_limit($shop->address, 45)}}</span>
                                        </td>
                                        <td>{{$shop->message}}</td>
                                        <td>{{$shop->user->firstname.' '.$shop->user->lastname}}</td>
                                        <td data-order="1">{{$shop->status==1?'Active':'Not Active'}}</td>
                                        <td data-order="1">{{$shop->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
                                                    <span class="icon icon-th icon-fw"></span>
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" style="min-width: 100px;">
                                                    <li>
                                                        <a href="{{url('admin/shop', $shop->id)}}">
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
                                                        <a href="shop/{{$shop->id}}/edit">
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
                                                        <a href="shop/{{$shop->id}}/delete">
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
