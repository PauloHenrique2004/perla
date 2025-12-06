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

        {{-- Categorias do topo + subcategorias --}}
        @foreach($menuCategorias as $cat)
            @php $temSub = $cat->subcategorias->count() > 0; @endphp

            @if($temSub)
                <li>
                    <span>
                        <i class="icofont-ui-folder mr-2"></i> {{ $cat->nome }}
                    </span>
                    <ul>
                        @foreach($cat->subcategorias as $sub)
                            <li>
                                <a href="{{ route('categoria', [$sub->slug ?? $cat->slug, $sub->id ?? $cat->id]) }}">
                                    {{ $sub->produto_subcategoria }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                        <i class="icofont-ui-folder mr-2"></i> {{ $cat->nome }}
                    </a>
                </li>
            @endif
        @endforeach

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
