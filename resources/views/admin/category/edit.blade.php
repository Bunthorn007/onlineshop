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
                        <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                        <span class="d-ib"> Edit Category</span>
                    </h1>
                </div>

                <div class="signup-body">
                    <form id="demo-uploader" action="{{url('admin/category/'.$category->id)}}" method="post" enctype="multipart/form-data" data-toggle="validator">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="signup-form">
                            <div class="row gutter-xs">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input id="name" class="form-control" type="text" name="name" value="{{$category->name}}" spellcheck="false" data-msg-required="Please enter category name." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutter-xs">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"><span class="icon icon-refresh"></span>  Update Category</button>
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
                                                <a href="{{url('admin/category/'.$category->id.'/delete')}}" class="btn-xs btn-primary btn-pill">Delete</a>
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

@section('footer')

@endsection