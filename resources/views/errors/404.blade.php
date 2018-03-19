<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{mix('css/libs-sticky.css')}}">
    <link rel="stylesheet" href="{{asset('css/errors.min.css')}}">
</head>
<body>
<div class="error">
    <div class="error-body">
        <h1 class="error-heading">Page Not Found</h1>
        <h4 class="error-subheading">We are sorry, the page you requested cannot be found.</h4>
        <p>
            <small>The URL may be misspelled or the page you're looking for is no longer available. If you think you have arrived here by our mistake, please <a href="#">contact us</a>.</small>
        </p>
        <p><a class="btn btn-primary btn-pill btn-thick" href="/">Return to homepage</a></p>
    </div>
    <div class="error-footer">
        <ul class="list-inline">
            <li>
                <a class="link-muted" href="#">
                    <span class="icon icon-twitter icon-2x"></span>
                </a>
            </li>
            <li>
                <a class="link-muted" href="#">
                    <span class="icon icon-facebook-official icon-2x"></span>
                </a>
            </li>
            <li>
                <a class="link-muted" href="#">
                    <span class="icon icon-linkedin icon-2x"></span>
                </a>
            </li>
        </ul>
        <p>
            <small>© 2018 Online Shop</small>
        </p>
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