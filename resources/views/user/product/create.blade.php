@extends('./layouts/app')

@section('header')
    <title>User Create Product - Onlineshop</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                <span class="d-ib">Create Product</span>
            </h1>
        </div>

        <div class="signup-body">
            <form id="demo-uploader" action="{{url('user/product')}}" method="post" enctype="multipart/form-data" data-toggle="validator">
                {{csrf_field()}}

                <div class="signup-form">
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="first-name">Product Name</label>
                                <input id="first-name" class="form-control" type="text" name="name" spellcheck="false" data-msg-required="Please enter product title." required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" class="custom-select" name="product_category_id" data-msg-required="Please select category." required>
                                    <option value="" disabled="disabled" selected="selected">Select...</option>
                                    @foreach($proCategories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="col-xs-12 col-sm-12" style="padding: 0px;">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input id="price" class="form-control" type="number" min="0" step="1" data-bind="value:price" name="price" data-msg-required="Please enter product price." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="custom-select" name="status" data-msg-required="Please choose product status." required>
                                    <option value="" disabled="disabled" selected="selected">Select...</option>
                                    <option value="1">Active</option>
                                    <option value="2">Not Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="detail">Product Detail</label>
                                <textarea id="detail" rows="8" class="form-control" name="detail"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><span class="icon icon-save"></span>  Save Product & Upload Images</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
