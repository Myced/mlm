<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ env('ADMIN_TITLE') }} - @yield('title') </title>

        <meta name="description" content="Admin part of the ecommerce application">
        <meta name="author" content="tncedric">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="/adminn/img/favicon.png">
        <link rel="apple-touch-icon" href="/adminn/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="/adminn/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="/adminn/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="/adminn/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="/adminn/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="/adminn/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="/adminn/img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="/adminn/img/icon180.png" sizes="180x180">
        <!-- END Icons -->
