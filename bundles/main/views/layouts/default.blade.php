<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    {{ HTML::style('foundation/stylesheets/foundation.css'); }}
    {{ HTML::style('foundation/stylesheets/app.css'); }}
    {{ HTML::style('css/style.css'); }}
    {{ HTML::style('css/pin.css'); }}
    {{Asset::container('header')->styles()}}

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.6/angular.min.js"></script>

    <script type="text/javascript" src="/js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/js/jquery.simplemodal.1.4.2.min.js"></script>
    <script type="text/javascript" src="/js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="/js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="/js/add-pin.js"></script>
    <script type="text/javascript" src="/js/re-pin.js"></script>
    <script type="text/javascript" src="/js/pin-bar.js"></script>
    <script type="text/javascript" src="/js/pins.js"></script>
    <script type="text/javascript" src="/js/waterfall.js"></script>
    <script type="text/javascript" src="/js/jquery.lazyload.min.js"></script>
    <script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="/js/slideshow.js"></script>
    <script type="text/javascript" src="/js/mapshow.js"></script>


    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
@render('main::partials.topnav')

@if ( isset($toolbar) && $toolbar == true )
    {{$toolbarView}}
@endif


<!-- check for flash notification message -->
@if(Session::has('flash_error'))
<div id="flash_error">{{ Session::get('flash_error') }}</div>
@elseif(Session::has('flash_success'))
<div id="flash_success">{{ Session::get('flash_success') }}</div>
@else
<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
@endif

<div class="container">
    {{$content}}
</div>
{{Asset::container('footer')->scripts()}}


@render('main::partials.footer')



@render('main::partials.addpin')

@render('main::partials.repin')

</body>
</html>