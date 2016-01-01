<!DOCTYPE html>
<html lang="zh-cmn-Hans" prefix="og: http://ogp.me/ns#" class="han-init">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    @yield('header')

    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{ homeAsset('/vendor/primer-css/css/primer.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/vendor/primer-markdown/dist/user-content.min.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/vendor/octicons/octicons/octicons.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/components/collection.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/components/repo-card.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/sections/repo-list.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/sections/mini-repo-list.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/components/boxed-group.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/globals/common.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/vendor/share.js/dist/css/share.min.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/globals/responsive.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/pages/index.css') }}">

    <link rel="shortcut icon" href="{{ homeAsset('/images/ico/32.png') }}" sizes="32x32" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ homeAsset('/images/ico/72.png') }}" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ homeAsset('/images/ico/120.png') }}" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ homeAsset('/images/ico/152.png') }}" type="image/png"/>
    <meta property="og:type" content="article">
    <meta property="og:locale" content="zh_CN" />

    <script src="{{ homeAsset('/vendor/jquery/dist/jquery.min.js') }}"></script>

</head>
<body class="home">

@yield('content')

</body>
</html>
