<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{mix('css/libs.css')}}">
    <link rel="stylesheet" href="../css/login.min.css">
</head>
<body>
<div class="login">
    <div class="login-body">
        <a class="login-brand" href="/">
            <img class="img-responsive" src="../img/logo.png">
        </a>
        <div class="login-form">
            <form data-toggle="md-validator">
                <div class="md-form-group md-label-floating">
                    <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
                    <label class="md-control-label">Email address</label>
                    <span class="md-help-block">We'll send you an email to reset your password.</span>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Send password reset email</button>
            </form>
        </div>
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

<!-- Mirrored from demo.naksoid.com/elephant/flaming-red/password-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2016 20:11:19 GMT -->
</html>