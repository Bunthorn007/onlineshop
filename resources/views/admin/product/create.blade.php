@extends('./layouts/app')

@section('header')
    <title>Admin Create Product - Onlineshop</title>
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
            <form id="demo-uploader" action="{{url('admin/product')}}" method="post" enctype="multipart/form-data" data-toggle="validator">
                {{csrf_field()}}

                <div class="signup-form">
                    <div class="row gutter-xs">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="shop_id">Shop Name:</label>
                                <select id="shop_id" class="custom-select" name="shop_id" data-msg-required="Please select shop name." required>
                                    <option value="" disabled="disabled" selected="selected">Select...</option>
                                    @foreach($shops as $shop)
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="product_category_id">Product Category</label>
                                <select id="product_category_id" class="custom-select" name="product_category_id" data-msg-required="Please choose product category." required>
                                    <option value="" disabled="disabled" selected="selected">Select...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input id="name" class="form-control" type="text" name="name" spellcheck="false" data-msg-required="Please enter product title." required>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="price">Price ($)</label>
                                <input id="price" class="form-control" type="number" min="0" step="1" data-bind="value:price" name="price" data-msg-required="Please enter product price ($)." required>
                            </div>
                        </div>
                        <div class="col-xs-3">
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

@section('footer')
    <script>
        jQuery(document).ready(function($){
            $('#shop_id').change(function(){
                $.get("{{ url('/categorieslist')}}",
                    { option: $(this).val() },
                    function(data) {

                        var item = $('#product_category_id');
                        item.empty();

                        $.each(data, function(key, value) {
                            item.append("<option value='"+ key +"'>" + value + "</option>");
                        });

                    });
            });
        });
    </script>

    @endsection
