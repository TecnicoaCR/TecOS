<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PHP password_hash online tool | @yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <link href="/css/app.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">PHP <code>password_hash</code> online tool</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @if (Route::currentRouteName() == 'password_hash') class="active" @endif >
                    <a href="/password_hash"><code>password_hash</code></a>
                </li>
                <li @if (Route::currentRouteName() == 'password_verify') class="active" @endif >
                    <a href="/password_verify"><code>password_verify</code></a>
                </li>
                <li @if (Route::currentRouteName() == 'password_get_info') class="active" @endif >
                    <a href="/password_get_info"><code>password_get_info</code></a>
                </li>
                <li @if (Route::currentRouteName() == 'password_needs_rehash') class="active" @endif >
                    <a href="/password_needs_rehash"><code>password_needs_rehash</code></a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<main class="container">

    @yield('content')

</main>

<footer>
    <div class="container">
        <p class="text-muted">
            Developed by Jonas Schürmann. <br class="visible-xs"/>Source code available on
            <a href="https://gitlab.com/MazeChaZer/password_hash-tool" target="_blank">GitLab</a>.
        </p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
