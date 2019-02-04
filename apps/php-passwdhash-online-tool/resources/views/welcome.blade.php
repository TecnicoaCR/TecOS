@extends('app')

@section('title') Home @endsection

@section('content')
    <div class="jumbotron">
        <h1>Working with PHP Password Hashes has never been this easy!</h1>
        <p>
            This online tool includes all the tools you need if you have to work with the PHP password hashing functions
            introduced in PHP 5.5.
        </p>
        <ul class="list-unstyled row">
            <li class="col-md-6">
                <a href="/password_hash" class="btn btn-default btn-lg function">
                    password_hash
                </a>
            </li>
            <li class="col-md-6">
                <a href="/password_verify" class="btn btn-default btn-lg function">
                    password_verify
                </a>
            </li>
            <li class="col-md-6">
                <a href="/password_get_info" class="btn btn-default btn-lg function">
                    password_get_info
                </a>
            </li>
            <li class="col-md-6">
                <a href="/password_needs_rehash" class="btn btn-default btn-lg function">
                    password_needs_rehash
                </a>
            </li>
        </ul>
        <ul class="list-inline" style="margin-top: 50px;">
            <li>
                Further reading:
            </li>
            <li>
                <a href="http://www.phptherightway.com/#password_hashing" target="_blank">
                    “PHP - The Right Way” on password hashing
                </a>
            </li>
            <li class="text-muted">|</li>
            <li>
                <a href="https://wiki.php.net/rfc/password_hash" target="_blank">
                    RFC
                </a>
            </li>
            <li class="text-muted">|</li>
            <li>
                <a href="https://github.com/ircmaxell/password_compat" target="_blank">
                    <code class="code-reset-colors">password_compat</code>- if you're stuck with PHP >= 5.3.7
                </a>
            </li>
            <li class="text-muted">|</li>
            <li>
                <a href="https://xkcd.com/936/" target="_blank">
                    xkcd
                </a>
            </li>
        </ul>
    </div>
@endsection

