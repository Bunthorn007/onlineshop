@extends('./layouts/app')

@section('header')
    <title>Create User</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/contacts.min.css')}}">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                <span class="d-ib"> Edit User</span>
            </h1>
        </div>
        <div class="signup-body">
            <div class="signup-divider">
                <div class="divider">
                    <div class="divider-content">USER INFORMATION</div>
                </div>
            </div>
            <form method="post" action="{{url('admin/user/'.$user->id)}}" enctype="multipart/form-data" data-toggle="validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}'>
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PUT">

                <div class="contact-avatar">
                    <label class="contact-avatar-btn">
                        <span class="icon icon-camera"></span>
                        <input class="file-upload-input" type="file" name="photo_id">
                    </label>
                    <img class="img-rounded" width="128" height="128" src="{{$user->photo ?$user->photo->file : '/images/profile.jpg'}}">
                </div>
                <div class="signup-form">

                        <input name="_method" type="hidden" value="PATCH">
                        <div class="row gutter-xs">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first-name">First name</label>
                                    <input id="first-name" class="form-control" type="text" name="firstname" value="{{$user->firstname}}" spellcheck="false" data-msg-required="Please enter your first name." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last-name">Last name</label>
                                    <input id="last-name" class="form-control" type="text" name="lastname" value="{{$user->lastname}}" spellcheck="false" data-msg-required="Please enter your last name." required>
                                </div>
                            </div>
                        </div>
                        <div class="row gutter-xs">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" value="{{$user->email}}" spellcheck="false" autocomplete="off" readonly>
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
                                                <select id="birth-month" class="custom-select" name="birth_month" data-msg-required="Please enter your birthday." required>

                                                    @foreach($months as $month)
                                                        @if($month->id == $birthdate[1])
                                                            <option value="{{$birthdate[1]}}" selected="selected">{{$month->name}}</option>
                                                        @else
                                                        <option value="{{$month->id}}">{{$month->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <input id="birth-day" class="form-control" type="number" name="birth_day" value="{{$birthdate[0]}}" placeholder="Day" min="1" max="31" data-msg-min="Please enter a valid day of the month." data-msg-max="Please enter a valid day of the month." data-msg-required="Please enter your birthday." required>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <input id="birth-year" class="form-control" type="number" name="birth_year" value="{{$birthdate[2]}}" placeholder="Year" min="1900" max="2016" data-msg-min="Please enter a valid year." data-msg-max="Please enter a valid year." data-msg-required="Please enter your birthday." required>
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
                                    <select id="gender" class="custom-select" name="gender" data-msg-required="Please indicate your gender." required>
                                        <option value="{{$user->gender}}" selected="selected">{{$user->gender==1?'Male':'Female'}}</option>
                                        @if($user->gender != 1)
                                            <option value="1">Male</option>
                                        @else
                                            <option value="2">Female</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="gender">Role</label>
                                    <select id="gender" class="custom-select" name="role_id" data-msg-required="Please assign role to user." required>
                                        <option value="{{$user->role_id}}" selected="selected">{{$user->role_id==1?'Admin':'Guest'}}</option>
                                        @if($user->role_id != 1)
                                        <option value="1">Admin</option>
                                        @else
                                        <option value="2">Guest</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="gender">Status</label>
                                    <select id="gender" class="custom-select" name="status" data-msg-required="Please indicate user status." required>
                                        <option value="{{$user->status}}" selected="selected">{{$user->status==1?'Active':'Not active'}}</option>
                                        @if($user->status != 1)
                                        <option value="1">Active</option>
                                        @else
                                        <option value="2">Not Active</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row gutter-xs">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="last-name">Phone</label>
                                    <input id="last-name" class="form-control" type="text" name="phone" value="{{$user->phone}}" spellcheck="false" data-msg-required="Please enter your phone number." required>
                                </div>
                            </div>
                        </div>
                        <div class="row gutter-xs">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="last-name">Address</label>
                                    <input id="last-name" class="form-control" type="text" name="address" value="{{$user->address}}" spellcheck="false" data-msg-required="Please enter your address." required>
                                </div>
                            </div>
                        </div>
                    <button class="btn btn-primary btn-block" type="submit"><span class="icon icon-refresh"></span>  Update User</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')

@endsection