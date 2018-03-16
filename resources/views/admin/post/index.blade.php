@extends('./layouts/admin')

@section('header')
    <title>All Post</title>
@endsection

@section('content')
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="icon icon-th-large" style="color:#d9230f"></span>
            <span class="d-ib">All Post</span>
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
                                <th>Title</th>
                                <th>Content</th>
                                <th>Price</th>
                                <th>Owner</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($posts)
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            <label class="custom-control custom-control-primary custom-checkbox">
                                                <input class="custom-control-input" type="checkbox">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>
                                        <td data-order="{{$post->title}}">
                                            <span class="icon-with-child m-r">
                                                <img class="circle" width="36" height="36" src="{{$post->user->photo->file ?$post->user->photo->file : '/images/profile.jpg'}}">
                                                <span class="icon-child bg-facebook circle sq-8"></span>
                                            </span>
                                            <strong>{{$post->title}}</strong>
                                        </td>
                                        <td class="maw-320">
                                            <span class="truncate">{{$post->content}}</span>
                                        </td>
                                        <td>{{$post->price}}</td>
                                        <td>{{$post->user->firstname.' '.$post->user->lastname}}</td>
                                        <td data-order="1">{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                                        <td data-order="1">{{$post->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
                                                    <span class="icon icon-th icon-fw"></span>
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" style="min-width: 100px;">
                                                    <li>
                                                        <a href="{{url('admin/post', $post->id)}}">
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
                                                        <a href="post/{{$post->id}}/edit">
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
                                                        <a href="#">
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