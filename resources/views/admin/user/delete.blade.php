@extends('./layouts/admin')

@section('header')
    <title>Create User</title>
    <link rel="stylesheet" href="../../../css/signup-2.min.css">
    <link rel="stylesheet" href="../../../css/contacts.min.css">
    <link rel="stylesheet" href="../../../css/drive.min.css">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-user" style="color:#d9230f"></span>
                <span class="d-ib"> User Information</span>
            </h1>
        </div>
        <div class="signup-body">
            <div class="signup-divider">
                <div class="divider">
                    <div class="divider-content">USER INFORMATION</div>
                </div>
            </div>
                <div class="contact-avatar">
                    <label class="contact-avatar-btn">
                        <span class="icon icon-camera"></span>
                        <input class="file-upload-input" type="file" name="photo_id" disabled>
                    </label>
                    <img class="img-rounded" width="128" height="128" src="{{$user->photo ?$user->photo->file : '/images/profile.jpg'}}">
                </div>
                <div class="signup-form">

                    <input name="_method" type="hidden" value="PATCH">
                    <div class="row gutter-xs">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="first-name">First name</label>
                                <input id="first-name" class="form-control" type="text" name="firstname" value="{{$user->firstname}}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="last-name">Last name</label>
                                <input id="last-name" class="form-control" type="text" name="lastname" value="{{$user->lastname}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="birth-month">Birthdate</label>
                                <div class="row gutter-xs">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <select id="birth-month" class="custom-select" name="birth_month" disabled>

                                                @foreach($months as $month)
                                                    @if($month->id == $birthdate[1])
                                                        <option value="{{$birthdate[1]}}" selected="selected">{{$month->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input id="birth-day" class="form-control" type="number" name="birth_day" value="{{$birthdate[0]}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input id="birth-year" class="form-control" type="number" name="birth_year" value="{{$birthdate[2]}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" class="custom-select" name="gender" disabled>
                                    <option value="{{$user->gender}}" selected="selected">{{$user->gender==1?'Male':'Female'}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="gender">Role</label>
                                <select id="gender" class="custom-select" name="role_id" disabled>
                                    <option value="{{$user->role_id}}" selected="selected">{{$user->role_id==1?'Admin':'Guest'}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="gender">Status</label>
                                <select id="gender" class="custom-select" name="status" disabled>
                                    <option value="{{$user->status}}" selected="selected">{{$user->status==1?'Active':'Not active'}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="last-name">Phone</label>
                                <input id="last-name" class="form-control" type="text" name="phone" value="{{$user->phone}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="last-name">Address</label>
                                <input id="last-name" class="form-control" type="text" name="address" value="{{$user->address}}" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#delete">Delete</button>
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
                    <p>Do you want to delete this user?</p>

                </div>
                <form method="POST" action="/admin/user/{{$user->id}}">
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
@section('footer')

@endsection