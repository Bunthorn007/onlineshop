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
                        <span class="d-ib">Category</span>
                    </h1>
                </div>

                <div class="signup-body">
                    <form id="demo-uploader" action="{{url('admin/category')}}" method="post" enctype="multipart/form-data" data-toggle="validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}'>
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
                                        <button type="submit" class="btn btn-primary btn-block"><span class="icon icon-save"></span>  Create Category</button>
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
                                        <th>Category</th>
                                        <th>Created</th>
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
                                            <a href="category/{{$category->id}}/delete" class="btn-xs btn-primary btn-pill">Delete</a>
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
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="n">
                            </div>
                        </div>
                    </form>
                    <div class="deleteContent">
                        Are you Sure you want to delete <span class="dname"></span> ? <span
                                class="hidden did"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection