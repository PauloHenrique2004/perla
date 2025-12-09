<!-- Nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white osahan-header py-0 container">
    <a class="navbar-brand mr-0" href="/">
        <img class="img-fluid logo-img animate__animated animate__pulse"
             src="{{ asset($configuracoes->logo) }}" alt="{{ config('app.name') }}">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="ml-3 d-flex align-items-center">
        <!-- search  -->
{{--        <form accept-charset="UTF-8" method="GET" action="/">--}}
{{--            <div class="input-group mr-sm-2 col-lg-12">--}}
{{--                <input type="text" class="form-control" id="inlineFormInputGroupUsername2"--}}
{{--                       placeholder="Buscar..." name="busca" value="{{ request()->query('busca') }}">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <button class="btn btn-success rounded-right"><i class="icofont-search"></i></button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
        <form method="GET" action="{{ route('home') }}" accept-charset="UTF-8">
            <div class="input-group mr-sm-2 col-lg-12">
                <input type="search"
                       class="form-control"
                       id="busca-produtos"
                       name="busca"
                       placeholder="Buscar..."
                       value="{{ request('busca') }}">
                <div class="input-group-prepend">
                    <button class="btn btn-success rounded-right" type="submit">
                        <i class="icofont-search"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <div class="ml-auto d-flex align-items-center">
        @if (Auth::check())
            <div class="dropdown mr-3">
                <a href="#" class="dropdown-toggle text-dark" id="dropdownMenuButton" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Olá {{ Auth::user()->firstName() }}
                </a>
                <div class="dropdown-menu dropdown-menu-right top-profile-drop" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('user.minha-conta') }}">Minha Conta</a>
                    <a class="dropdown-item" href="/"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
        <!-- login/signup -->
            <span style="padding-right: 5px; font-weight: bold">Entrar</span>
            <a href="{{ route('login') }}"
               class="mr-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
                <i class="icofont-login"></i>
            </a>
        @endif

        <livewire:site.carrinho-header />
    </div>
</nav>
