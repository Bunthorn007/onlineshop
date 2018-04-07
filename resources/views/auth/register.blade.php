<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Onlineshop</title>
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" sizes="16x16">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" >
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="css/signup.min.css">
</head>
<body>
<div class="signup">
    <div class="signup-body">
        <a class="signup-brand" href="/">
            <img class="img-responsive" src="images/logo.png" alt="Online Shop">
        </a>
        <p class="signup-heading">
            <em>Let's improve your business marketing with us!</em>
        </p>
        <h3 class="signup-heading">Sign up</h3>
        <div class="signup-form">
            <form method="POST" action="{{ route('register') }}" data-toggle="md-validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}'>
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="text" name="firstname" spellcheck="false" data-msg-required="Please enter your first name." required>
                            <label class="md-control-label">First name</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="text" name="lastname" spellcheck="false" data-msg-required="Please enter your last name." required>
                            <label class="md-control-label">Last name</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
                            <label class="md-control-label">Email</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                            <label class="md-control-label">Password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input id="password-confirm" class="md-form-control" type="password" name="password_confirmation" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please confirm your password." required>
                            <label class="md-control-label">Confirm Password</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="md-form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="md-form-group">
                                        <select class="md-form-control" name="birth_month" data-msg-required="Please enter your birthday." required>
                                            <option value="" disabled="disabled" selected="selected">Birth Month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <label class="md-control-label"></label>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="md-form-group">
                                        <select class="md-form-control" name="birth_day" data-msg-required="Please enter your birthday." required>
                                            <option value="" selected="selected" disabled="disabled">Day</option>
                                            @for($i = 1; $i < 32 ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        <label class="md-control-label"></label>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="md-form-group">
                                        <select class="md-form-control" name="birth_year" data-msg-required="Please enter your birthday." required>
                                            <option value="" selected="selected" disabled="disabled">Year</option>
                                            @for($i = 2018; $i > 1900; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        <label class="md-control-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="md-form-group">
                            <select class="md-form-control" name="gender" data-msg-required="Please indicate your gender." required>
                                <option value="" disabled="disabled" selected="selected">Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            <label class="md-control-label"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="text" name="phone" spellcheck="false" data-msg-required="Please enter your phone number." required>
                            <label class="md-control-label">Phone Number</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="text" name="address" spellcheck="false" data-msg-required="Please enter your address." required>
                            <label class="md-control-label">Address</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Sign up</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        Already have an account? <a href="/login">Log in</a>
    </div>
</div>
<script src="{{mix('js/libs-sticky.js')}}"></script>
</body>
</html>