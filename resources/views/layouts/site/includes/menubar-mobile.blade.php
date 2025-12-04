<nav id="main-nav">
    <ul class="second-nav">
        <li><a href="/"><i class="icofont-smart-phone mr-2"></i> Início</a></li>
        <li><a href="#contato"><i class="icofont-email"></i> Contato</a></li>
        <li>
            <a href="{{ route('promocoes') }}#slides" style="color: #620886">
                <i class="icofont-sale-discount h6"></i> Promoções
            </a>
        </li>
        <li>
            <a href="/paginas/sobre-nos/1">
                <i class="icofont-info-circle h6"></i> Sobre nós
            </a>
        </li>

        @if (Auth::check())
            <li><a href="{{ route('user.minha-conta') }}"><i class="icofont-ui-user mr-2"></i> Minha Conta</a></li>
            <li>
                <a href="/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="icofont-login mr-2"></i> Sair
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <li><a href="{{ route('login') }}"><i class="icofont-login mr-2"></i> Entrar</a></li>
        @endif
    </ul>
</nav>
