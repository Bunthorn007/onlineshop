@extends('./layouts/app')

@section('header')
    <title>Post Product</title>
    <link rel="stylesheet" href="../../../css/signup-2.min.css">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                <span class="d-ib">Edit Post</span>
            </h1>
        </div>

        <div class="signup-body">
            <form id="demo-uploader" action="{{url('admin/post/'.$post->id)}}" method="post" enctype="multipart/form-data" data-toggle="validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}'>
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PUT">
                <div class="title-bar">
                    <label for="first-name">Upload Images</label>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="file-upload-btn btn btn-primary">
                                Upload files
                                <input class="file-upload-input" type="file" name="files[]" multiple>
                            </label>
                        </div>
                        <div class="form-group">
                            <ul class="file-list">
                                <li class="file template-download">
                                    <a class="file-link" href="#">
                                        <div class="file-thumbnail" style="background-image: url({{asset($post->photo->file)}});">
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <input type="file" name="photo_id">
                    </div>
                </div>

                <div class="signup-form">
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="first-name">Title</label>
                                <input id="first-name" value="{{$post->title}}" class="form-control" type="text" name="title" spellcheck="false" data-msg-required="Please enter title." required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" value="{{$post->price}}" class="form-control" type="text" name="price" data-msg-required="Please enter price or just put Not specify" required>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" class="custom-select" name="category_id" data-msg-required="Please select category." required>
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
                                <input id="location" value="{{$post->location}}" class="form-control" type="text" name="location" spellcheck="false" data-msg-required="Please enter your location." required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea id="content" rows="6" class="form-control" name="content">{{$post->content}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><span class="icon icon-refresh"></span>  Update Post</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    {{--<script id="template-upload" type="text/x-tmpl">--}}
    {{--{% for (var i=0, file; file=o.files[i]; i++) { %}--}}
    {{--<li class="file template-upload fade">--}}
    {{--<div class="file-thumbnail">--}}
    {{--<div class="spinner spinner-default spinner-sm"></div>--}}
    {{--</div>--}}
    {{--<div class="file-info">--}}
    {{--<span class="file-ext">{%= file.ext %}</span>--}}
    {{--<span class="file-name">{%= file.name %}</span>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--{% } %}--}}
    {{--</script>--}}
    {{--<script id="template-download" type="text/x-tmpl">--}}
    {{--{% for (var i=0, file; file=o.files[i]; i++) { %}--}}
    {{--<li class="file template-download fade">--}}
    {{--<a class="file-link" href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}">--}}
    {{--{% if (file.thumbnailUrl) { %}--}}
    {{--<div class="file-thumbnail" style="background-image: url({%=file.thumbnailUrl%});"></div>--}}
    {{--{% } else { %}--}}
    {{--<div class="file-thumbnail {%=file.thumbnail%}"></div>--}}
    {{--{% } %}--}}
    {{--<div class="file-info">--}}
    {{--<span class="file-ext">{%=file.extension%}</span>--}}
    {{--<span class="file-name">{%=file.filename%}.</span>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--<button class="file-delete-btn delete" title="Delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" type="button">--}}
    {{--<span class="icon icon-remove"></span>--}}
    {{--</button>--}}
    {{--</li>--}}
    {{--{% } %}--}}
    {{--</script>--}}
@endsection