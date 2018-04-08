<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign in - Onlineshop</title>
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" sizes="16x16">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}" >
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="css/login.min.css">
</head>
<body>
<div class="login">
    <div class="login-body">
        <a class="login-brand" href="/">
            <img class="img-responsive" src="images/logo.png">
        </a>
        <p class="signup-heading">
            <em>Please improve your business performance with us!</em>
        </p>
        <h3 class="login-heading">Sign in</h3>
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}" data-toggle="md-validator">
                {{ csrf_field() }}
                <div class="md-form-group md-label-floating">
                    <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
                    <label class="md-control-label">Email</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="md-form-group md-label-floating">
                    <input class="md-form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                    <label class="md-control-label">Password</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="md-form-group md-custom-controls">
                    <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" checked="checked">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-label">Keep me signed in</span>
                    </label>
                    {{--<span aria-hidden="true"> · </span>--}}
                    {{--<a href="{{ route('password.request') }}">Forgot password?</a>--}}
                </div>
                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>
    <div class="login-footer">
        Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
    </div>
</div>
<script src="{{mix('js/libs.js')}}"></script>
</body>
</html>