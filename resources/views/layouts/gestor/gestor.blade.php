<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="{{ asset('images/favicon.ico') }}" rel="apple-touch-icon" type="image/png"/>

    <title>@yield('title')Gestor - {{ config('app.name') }}</title>

    @include('layouts.gestor.includes.style')

    <livewire:styles/>
</head>
<body class="sidebar-mini control-sidebar-slide-open accent-info">

<div class="wrapper">
    @include('layouts.gestor.includes.navbar')
    @include('layouts.gestor.includes.sidebar')

    <div class="content-wrapper" style="min-height: 1244.06px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <section class="content animate__animated animate__fadeIn">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    @if(View::hasSection('header-title'))
                                        <div class="card-header">
                                            <h1 class="card-title">@yield('header-title')</h1>

                                            <div class="card-tools">
                                                <div class="float-right">
                                                    @yield('card-tools')
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @yield('content')

                                    <!-- Slot usado para Livewire Route Binding -->
                                    {{ $slot?? '' }}
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
            </div><!-- /.container-fluid -->
        </section>
    </div>

    @include('layouts.gestor.includes.footer')
</div>

<livewire:scripts/>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js?"></script>

@include('layouts.gestor.includes.js')
</body>
</html>
