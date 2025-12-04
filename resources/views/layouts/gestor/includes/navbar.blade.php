<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link">Olá, {{ Auth::user()->name }}.</span>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-cogs"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <i class="fas fa-cogs"></i> Minha Conta--}}
{{--                </a>--}}

{{--                <div class="dropdown-divider"></div>--}}

                <a class="dropdown-item" href="{{ route('gestor.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-arrow-right"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('gestor.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
