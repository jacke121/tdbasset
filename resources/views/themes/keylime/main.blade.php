@extends('themes.default.layouts')

@section('header')
    <title>{{systemConfig('title','Enda Blog') }} -lbg{{ systemConfig('subheading','Enda Blog') }}</title>
    <meta name="keywords" content="{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ systemConfig('seo_desc') }}">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/index.js"></script>
