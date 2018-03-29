@extends('./layouts/app')

@section('header')
    <title>Admin Delete Shop - Onlineshop</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/contacts.min.css')}}">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-trash" style="color:#d9230f"></span>
                <span class="d-ib">Delete Shop</span>
            </h1>
        </div>

        <div class="signup-body">
            <div class="signup-divider">
                <div class="divider">
                    <div class="divider-content">Upload Logo (420 X 90)</div>
                </div>
            </div>

                <div class="contact-avatar">
                    <label class="contact-avatar-btn">
                        <span class="icon icon-camera"></span>
                        <input class="file-upload-input" type="file" name="photo_id" disabled>
                    </label>
                    <img class="img-rounded" width="128" height="70" src="{{$shop->photo ?$shop->photo->file : '/images/profile.jpg'}}">
                </div>
                <div class="signup-form">
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Shop Name :</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{$shop->name}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="user_id">User Name</label>
                                <select id="user_id" class="custom-select" name="user_id" disabled>
                                    <option value="{{$shop->user_id}}">{{$shop->user->firstname.' '.$shop->user->lastname}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="custom-select" name="status" disabled>
                                    <option value="{{$shop->status}}" selected="selected">{{$shop->status==1?'Active':'Not active'}}</option>
                                    @if($shop->status != 1)
                                        <option value="1">Active</option>
                                    @else
                                        <option value="2">Not Active</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="content" rows="5" class="form-control" name="address" readonly>{{$shop->address}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="content" rows="5" class="form-control" name="message" readonly>{{$shop->message}}</textarea>
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
                <form method="POST" action="/admin/shop/{{$shop->id}}">
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
