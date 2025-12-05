<nav id="main-nav">
    <ul class="second-nav">
        <li>
            <a href="/"><i class="icofont-home mr-2"></i> Início</a>
        </li>

        <li>
            <a href="/paginas/sobre-nos/1">
                <i class="icofont-info-circle mr-2"></i> Sobre nós
            </a>
        </li>

        {{-- Kits --}}
        @if($menuKits->count())
            <li>
                <span><i class="icofont-box mr-2"></i> Kits</span>
                <ul>
                    @foreach($menuKits as $cat)
                        <li>
                            <a href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                                {{ $cat->nome }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                <a href="{{ route('kits.index') }}">
                    <i class="icofont-box mr-2"></i> Kits
                </a>
            </li>
        @endif

        {{-- Linhas --}}
        @if($menuLinhas->count())
            <li>
                <span><i class="icofont-tags mr-2"></i> Linhas</span>
                <ul>
                    @foreach($menuLinhas as $cat)
                        <li>
                            <a href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                                {{ $cat->nome }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                <a href="#"><i class="icofont-tags mr-2"></i> Linhas</a>
            </li>
        @endif

        {{-- Produtos --}}
        @if($menuProdutos->count())
            <li>
                <span><i class="icofont-basket mr-2"></i> Produtos</span>
                <ul>
                    @foreach($menuProdutos as $cat)
                        <li>
                            <a href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                                {{ $cat->nome }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                <a href="#"><i class="icofont-basket mr-2"></i> Produtos</a>
            </li>
        @endif

        {{-- Tipos de cabelo --}}
        @if($menuCabelos->count())
            <li>
                <span><i class="icofont-hair-curly mr-2"></i> Tipos de cabelo</span>
                <ul>
                    @foreach($menuCabelos as $cat)
                        <li>
                            <a href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                                {{ $cat->nome }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                <a href="#"><i class="icofont-hair-curly mr-2"></i> Tipos de cabelo</a>
            </li>
        @endif

        <li>
            <a href="#contato"><i class="icofont-email mr-2"></i> Contato</a>
        </li>

        <li>
            <a href="{{ route('promocoes') }}#slides" style="color:#620886">
                <i class="icofont-sale-discount mr-2"></i> Promoções
            </a>
        </li>

        @if (Auth::check())
            <li>
                <a href="{{ route('user.minha-conta') }}">
                    <i class="icofont-ui-user mr-2"></i> Minha Conta
                </a>
            </li>
            <li>
                <a href="/"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="icofont-logout mr-2"></i> Sair
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        @else
            <li>
                <a href="{{ route('login') }}">
                    <i class="icofont-login mr-2"></i> Entrar
                </a>
            </li>
        @endif
    </ul>
</nav>
