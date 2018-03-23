@extends('./layouts/app')

@section('header')
    <title>category management</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.min.css')}}">
@endsection

@section('content')
    <div class="product">
        <div class="product-images">

            <div class="signup">
                <div class="title-bar">
                    <h1 class="title-bar-title">
                        <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                        <span class="d-ib">Category</span>
                    </h1>
                </div>

                <div class="signup-body">
                    {{--<form id="demo-uploader" action="{{url('admin/category')}}" method="post" enctype="multipart/form-data" data-toggle="validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}'>--}}
                        {{csrf_field()}}
                        <div class="signup-form">
                            <div class="row gutter-xs">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input id="name" class="form-control" type="text" name="name" spellcheck="false" data-msg-required="Please enter category name." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutter-xs">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" id="add"><span class="icon icon-save"></span>  Create Category</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    {{--</form>--}}
                </div>
            </div>

        </div>
        <div class="product-details">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title-bar">
                        <h1 class="title-bar-title">
                            <span class="icon icon-navicon" style="color:#d9230f"></span>
                            <span class="d-ib">All Categories</span>
                        </h1>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-middle" id="table">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Created</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $category)
                                    <tr class="category{{$category->id}}">
                                        <td class="nowrap">
                                            <strong>{{$category->name}}</strong>
                                        </td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td data-order="1">
                                            <a class="edit-modal btn-xs btn-info btn-pill" data-id="{{$category->id}}" data-name="{{$category->name}}">Edit</a>
                                        </td>
                                        <td>
                                            <a class="delete-modal btn-xs btn-primary btn-pill" data-id="{{$category->id}}" data-name="{{$category->name}}">Delete</a>
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


        </div>
    </div>
@endsection

@section('modal')

    @include('user.shop.modal')

@endsection

@section('footer')
    <script src="{{ asset('js/ajax_pro_category.js') }}"></script>
@endsection