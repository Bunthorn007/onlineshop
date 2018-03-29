@extends('./layouts/app')

@section('header')
    <title>User Create Shop - Onlineshop</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/contacts.min.css')}}">
@endsection

@section('content')

    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                <span class="d-ib">Create Shop</span>
            </h1>
        </div>

        <div class="signup-body">
            <div class="signup-divider">
                <div class="divider">
                    <div class="divider-content">Upload Logo (420 X 90)</div>
                </div>
            </div>
            <form action="{{url('user/shop')}}" method="post" enctype="multipart/form-data" data-toggle="validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}'>
                {{csrf_field()}}
                <div class="contact-avatar">
                    <label class="contact-avatar-btn">
                        <span class="icon icon-camera"></span>
                        <input class="file-upload-input" type="file" name="photo_id">
                    </label>
                    <img class="img-rounded" width="128" height="70" src="{{asset('images/logo.jpg')}}">
                </div>
                <div class="signup-form">
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Shop Name :</label>
                                <input id="name" class="form-control" type="text" name="name" spellcheck="false" data-msg-required="Please enter your shop name." required>
                                <input id="user_id" class="form-control" type="hidden" value="{{auth::id()}}" name="user_id">
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="custom-select" name="status" data-msg-required="Please select shop status." required>
                                    <option value="" disabled="disabled" selected="selected">Select...</option>
                                    <option value="1">Active</option>
                                    <option value="2">Not Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="content" rows="3" class="form-control" name="address" data-msg-required="Please enter your address." required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="content" rows="3" class="form-control" name="message" data-msg-required="Please enter your message to customer." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="custom-control custom-control-primary custom-checkbox">
                                    <input id="agree" class="custom-control-input" type="checkbox" name="agree" data-msg-required="In order to use our services, you must agree to the Terms of Service." required>
                                    <span class="custom-control-indicator"></span>
                                    <small class="custom-control-label">I agree to the Terms of Service.</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit"><span class="icon icon-save"></span>  Create Shop</button>
                </div>
            </form>
        </div>
    </div>

@endsection
