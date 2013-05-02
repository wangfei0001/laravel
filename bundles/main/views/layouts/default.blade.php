<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    {{ HTML::style('foundation/stylesheets/foundation.css'); }}
    {{ HTML::style('foundation/stylesheets/app.css'); }}
    {{ HTML::style('css/style.css'); }}
    {{Asset::container('header')->styles()}}
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
@render('main::partials.topnav')
<div class="container">
    {{$content}}
</div>
{{Asset::container('footer')->scripts()}}


@render('main::partials.footer')

</body>
</html>