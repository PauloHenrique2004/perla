<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="author" content="wetech.com.br">
    <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png"/>

    <title>@yield('title'){{ config('app.name') }}</title>

    @include('layouts.site.includes.share-tags')
    @include('layouts.site.includes.style')
</head>
<body class="fixed-bottom-padding">

@unless($lojaAberta)
    <div
        style=" width: 100%; background: #000; text-align: center; font-weight: bold; text-transform: uppercase; color: #fff; height: 30px; padding-top: 6px; ">
        Loja Fechada
    </div>
@endunless

@include('layouts.site.includes.navbar-mobile')

<div class="bg-white shadow-sm osahan-main-nav">
    @include('layouts.site.includes.navbar')
    @include('layouts.site.includes.menubar')
</div>

@yield('before-content')

@hasSection('content')
    <section class="py-4 osahan-main-body osahan-master-body">
        <div class="container">
            @yield('content')
        </div>

        @yield('content-out')
    </section>
@endif

@include('layouts.site.includes.menubar-mobile')
@include('layouts.site.includes.footer')
@include('layouts.site.includes.js')
</body>
</html>
