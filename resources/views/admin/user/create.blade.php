@extends('./layouts/app')

@section('header')
    <title>Create User</title>
    <link rel="stylesheet" href="../../css/signup-2.min.css">
    <link rel="stylesheet" href="../../css/contacts.min.css">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                <span class="d-ib">Create User</span>
            </h1>
        </div>

        <div class="signup-body">
            <div class="signup-divider">
                <div class="divider">
                    <div class="divider-content">USER INFORMATION</div>
                </div>
            </div>
            <form action="{{url('admin/user')}}" method="post" enctype="multipart/form-data" data-toggle="validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}'>
                {{csrf_field()}}
                <div class="contact-avatar">
                    <label class="contact-avatar-btn">
                        <span class="icon icon-camera"></span>
                        <input class="file-upload-input" type="file" name="photo_id">
                    </label>
                    <img class="img-rounded" width="128" height="128" src="../../images/profile.jpg">
                </div>
                <div class="signup-form">
                    <div class="row gutter-xs">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="first-name">First name</label>
                                <input id="first-name" class="form-control" type="text" name="firstname" spellcheck="false" data-msg-required="Please enter your first name." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="last-name">Last name</label>
                                <input id="last-name" class="form-control" type="text" name="lastname" spellcheck="false" data-msg-required="Please enter your last name." required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                                <small class="help-block">6-character minimum; case sensitive.</small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input id="confirm_password" class="form-control" type="password" name="confirm_password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Confirm your password." required>
                                <small class="help-block">6-character minimum; case sensitive.</small>
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
                                                <option value="" disabled="disabled" selected="selected">Month</option>
                                                @foreach($months as $month)
                                                <option value="{{$month->id}}">{{$month->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input id="birth-day" class="form-control" type="number" name="birth_day" placeholder="Day" min="1" max="31" data-msg-min="Please enter a valid day of the month." data-msg-max="Please enter a valid day of the month." data-msg-required="Please enter your birthday." required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input id="birth-year" class="form-control" type="number" name="birth_year" placeholder="Year" min="1900" max="2016" data-msg-min="Please enter a valid year." data-msg-max="Please enter a valid year." data-msg-required="Please enter your birthday." required>
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
                                    <option value="" disabled="disabled" selected="selected">Select...</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="gender">Role</label>
                                <select id="gender" class="custom-select" name="role_id" data-msg-required="Please assign role to user." required>
                                    <option value="" disabled="disabled" selected="selected">Select...</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Guest</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="gender">Status</label>
                                <select id="gender" class="custom-select" name="status" data-msg-required="Please indicate user status." required>
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
                                <label for="last-name">Phone</label>
                                <input id="last-name" class="form-control" type="text" name="phone" spellcheck="false" data-msg-required="Please enter your phone number." required>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-xs">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="last-name">Address</label>
                                <input id="last-name" class="form-control" type="text" name="address" spellcheck="false" data-msg-required="Please enter your address." required>
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
                    <button class="btn btn-primary btn-block" type="submit"><span class="icon icon-save"></span>  Save User</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')

@endsection