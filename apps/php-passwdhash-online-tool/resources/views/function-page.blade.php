@extends('app')

@section('content')

    <div class="page-header"><h1>@yield('header') <small>@yield('header-small')</small></h1></div>
    <blockquote>
        <div class="row">
            <div class="col-sm-10">
                <code>@yield('function')</code>
            </div>
            <div class="col-sm-2">
                <a href="@yield('url')" target="_blank" class="pull-right">
                    php.net <span class="glyphicon glyphicon-new-window"></span>
                </a>
            </div>
        </div>
    </blockquote>
    <hr/>

    @yield('sub-content')

@endsection