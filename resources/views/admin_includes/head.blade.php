<!DOCTYPE html>

<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ env('ADMIN_TITLE') }} - @yield('title') </title>

        <meta name="description" content="Admin part of the ecommerce application">
        <meta name="author" content="tncedric">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <link rel="shortcut icon" href="/adminn/img/favicon.png">
