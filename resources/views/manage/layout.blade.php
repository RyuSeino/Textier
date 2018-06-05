<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <title>@yield('title')</title>

</head>

<body>

<div class="container">

    <nav class="navbar is-transparent">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                Textier
            </a>
            <div class="navbar-burger burger" data-target="menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="menu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="https://bulma.io/"></a>
                <a class="navbar-item {{$view or ''}}" {!! isset($view) ? '' : ' href="/diaries?user=' . $id . '""'!!}>日記閲覧</a>
                <a class="navbar-item {{$top or ''}}" {!! isset($top) ? '' : ' href="/manage"' !!}>日記管理</a>
                <a class="navbar-item {{$profile or ''}}" {!! isset($profile) ? '' : ' href="/user/' . $id .  '/edit"' !!}>プロフィール</a>
                <a class="navbar-item" href="#">設定</a>
            </div>
        </div>
    </nav>

    @yield('content')

</div>

</body>
</html>
