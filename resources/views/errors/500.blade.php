<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{asset('css/libs.css')}}">
    <link rel="stylesheet" href="{{asset('css/errors.min.css')}}">
  </head>
  <body>
    <div class="error">
      <div class="error-body">
        <h1 class="error-heading">Server Error</h1>
        <h4 class="error-subheading">Looks like something went wrong!</h4>
        <p>
          <small>We track these errors automatically, but if the problem persists feel free to <a href="#">contact us</a>.</small>
        </p>
        <p><a class="btn btn-primary btn-pill btn-thick" href="index-2.html">Return to homepage</a></p>
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
          <small>© 2016 Elephant, LLC</small>
        </p>
      </div>
    </div>
    <script src="{{asset('js/vendor.min.js')}}"></script>
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