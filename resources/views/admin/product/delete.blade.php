@extends('./layouts/app')

@section('header')
    <title>Post Product</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                <span class="d-ib">Delete Product</span>
            </h1>
        </div>
        <div class="signup-body">

            <div class="signup-form">
                <div class="row gutter-xs">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="shop_id">Shop Name:</label>
                            <select id="shop_id" class="custom-select" name="shop_id" disabled>
                                <option value="{{$product->shop->id}}" selected="selected">{{$product->shop->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="product_category_id">Product Category</label>
                            <select id="product_category_id" class="custom-select" name="product_category_id" disabled>
                                <option value="{{$product->productCategory->id}}" selected="selected">{{$product->productCategory->name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row gutter-xs">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input id="name" class="form-control" type="text" value="{{$product->name}}" name="name" required>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="price">Price ($)</label>
                            <input id="price" class="form-control" type="number" value="{{$product->price}}" min="0" step="1" data-bind="value:price" name="price" readonly>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="custom-select" name="status" disabled>
                                <option value="{{$product->status}}" selected="selected">{{$product->status==1?'Active':'Not active'}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row gutter-xs">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="detail">Product Detail</label>
                            <textarea id="detail" rows="8" class="form-control" name="detail" readonly>{{$product->detail}}</textarea>
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
                <form method="POST" action="/admin/product/{{$product->id}}">
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
