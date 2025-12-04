<meta property="og:locale" content="pt_br"/>
<meta property='og:type' content='website'>
<meta property="og:site_name" content="{{ config('app.name') }}"/>

@hasSection('og:title')
    <meta property="og:title" content="@yield('og:title')"/>
@else
    <meta property="og:title" content="{{ config('app.name') }}"/>
@endif

@hasSection('og:image')
    <meta property="og:image" content="@yield('og:image')"/>
@else
    <meta property="og:image" content="{{ asset('images/logo.png') }}"/>
@endif

@hasSection('description')
    <meta property="og:description" content="@yield('description')"/>
@else
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endif
