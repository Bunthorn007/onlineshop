@extends('./layouts/app')

@section('header')
    <title>create post</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                <span class="d-ib">Create Post</span>
            </h1>
        </div>

        <div class="signup-body">
            <form id="demo-uploader" action="{{url('user/post')}}" method="post" enctype="multipart/form-data" data-toggle="validator">
                {{csrf_field()}}

                <div class="signup-form">
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="first-name">Title</label>
                                <input id="first-name" class="form-control" type="text" name="title" spellcheck="false" data-msg-required="Please enter title." required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" class="form-control" type="text" name="price" data-msg-required="Please enter price or just put Not specify" required>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" class="custom-select" name="category_id" data-msg-required="Please select category." required>
                                    <option value="" disabled="disabled" selected="selected">Select...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input id="location" class="form-control" type="text" name="location" spellcheck="false" data-msg-required="Please enter your location." required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea id="content" rows="6" class="form-control" name="content"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><span class="icon icon-save"></span>  Save Post & Upload Images</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
