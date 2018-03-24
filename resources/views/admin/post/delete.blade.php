@extends('./layouts/app')

@section('header')
    <title>Post Product</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/drive.min.css')}}">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-trash" style="color:#d9230f"></span>
                <span class="d-ib">Delete Post</span>
            </h1>
        </div>

        <div class="signup-body">

                <div class="signup-form">
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="first-name">Title</label>
                                <input id="first-name" value="{{$post->title}}" class="form-control" type="text" name="title" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" value="{{$post->price}}" class="form-control" type="text" name="price" readonly>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" class="custom-select" name="category_id" disabled>
                                    @foreach($categories as $category)
                                        @if($category->id == $post->category_id)
                                            <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input id="location" value="{{$post->location}}" class="form-control" type="text" name="location" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea id="content" rows="6" class="form-control" name="content" readonly>{{$post->content}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#delete"><span class="icon icon-trash"></span>  Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('modal')
    <div id="delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this post?</p>

                </div>
                <form method="POST" action="/admin/post/{{$post->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
