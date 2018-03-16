@extends('./layouts/admin')

@section('header')
    <title>Post Product</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.min.css')}}">
@endsection

@section('content')
    <div class="product">
        <div class="product-images">

            <div class="signup">
                <div class="title-bar">
                    <h1 class="title-bar-title">
                        <span class="icon icon-trash" style="color:#d9230f"></span>
                        <span class="d-ib"> Delete Category</span>
                    </h1>
                </div>

                <div class="signup-body">
                    <form id="demo-uploader" action="{{url('admin/post')}}" method="post" enctype="multipart/form-data" data-toggle="validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}'>
                        {{csrf_field()}}
                        <div class="signup-form">
                            <div class="row gutter-xs">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input id="name" class="form-control" type="text" name="name" value="{{$category->name}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutter-xs">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#delete"><span class="icon icon-trash"></span>  Delete Category</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
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
                                <table class="table table-middle">
                                    <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="nowrap">
                                                <strong>{{$category->name}}</strong>
                                            </td>
                                            <td>{{$category->created_at->diffForHumans()}}</td>
                                            <td data-order="1">
                                                <a href="{{ route('category.edit', $category->id) }}" class="btn-xs btn-info btn-pill">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/category/delete', $category->id) }}" class="btn-xs btn-primary btn-pill">Delete</a>
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
    <div id="delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this category?</p>

                </div>
                <form method="POST" action="{{route('category.destroy', $category->id)}}">
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
