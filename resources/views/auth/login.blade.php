<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="css/login.min.css">
</head>
<body>
<div class="login">
    <div class="login-body">
        <a class="login-brand" href="index-2.html">
            <img class="img-responsive" src="img/logo.png" alt="Elephant">
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
                </div>
                <div class="md-form-group md-label-floating">
                    <input class="md-form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                    <label class="md-control-label">Password</label>
                </div>
                <div class="md-form-group md-custom-controls">
                    <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" checked="checked">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-label">Keep me signed in</span>
                    </label>
                    <span aria-hidden="true"> · </span>
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>
    <div class="login-footer">
        Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
    </div>
</div>
<script src="{{mix('js/libs-sticky.js')}}"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-83990101-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>