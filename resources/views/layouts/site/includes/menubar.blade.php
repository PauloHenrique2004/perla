<!-- Menu bar -->
<div class="bg-color-head">
    <div class="container menu-bar d-flex align-items-center">
        <ul class="list-unstyled form-inline mb-0">
            <li class="nav-item">
                <a class="nav-link text-white pl-0" href="/">Início <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white pl-0" href="/paginas/sobre-nos/1">Sobre nós</a>
            </li>

            {{-- Kits --}}
            <li class="nav-item {{ $menuKits->count() ? 'dropdown' : '' }}">
                @if($menuKits->count())
                    <a class="nav-link text-white pl-0 dropdown-toggle" href="#" id="kitsDropdown"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kits
                    </a>
                    <div class="dropdown-menu" aria-labelledby="kitsDropdown">
                        @foreach($menuKits as $cat)
                            <a class="dropdown-item" href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                                {{ $cat->nome }}
                            </a>
                        @endforeach
                    </div>
                @else
{{--                    <a class="nav-link text-white pl-0" href="#">Kits</a>--}}
                    <a class="nav-link text-white pl-0" href="{{ route('kits.index') }}">
                        Kits
                    </a>

                @endif
            </li>

            {{-- Linhas --}}
            <li class="nav-item {{ $menuLinhas->count() ? 'dropdown' : '' }}">
                @if($menuLinhas->count())
                    <a class="nav-link text-white pl-0 dropdown-toggle" href="#" id="linhasDropdown"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Linhas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="linhasDropdown">
                        @foreach($menuLinhas as $cat)
                            <a class="dropdown-item" href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                                {{ $cat->nome }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <a class="nav-link text-white pl-0" href="#">Linhas</a>
                @endif
            </li>

            {{-- Produtos --}}
            <li class="nav-item {{ $menuProdutos->count() ? 'dropdown' : '' }}">
                @if($menuProdutos->count())
                    <a class="nav-link text-white pl-0 dropdown-toggle" href="#" id="produtosDropdown"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="produtosDropdown">
                        @foreach($menuProdutos as $cat)
                            <a class="dropdown-item" href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                                {{ $cat->nome }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <a class="nav-link text-white pl-0" href="#">Produtos</a>
                @endif
            </li>

            {{-- Tipos de Cabelo --}}
            <li class="nav-item {{ $menuCabelos->count() ? 'dropdown' : '' }}">
                @if($menuCabelos->count())
                    <a class="nav-link text-white pl-0 dropdown-toggle" href="#" id="cabelosDropdown"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tipos de cabelo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="cabelosDropdown">
                        @foreach($menuCabelos as $cat)
                            <a class="dropdown-item" href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                                {{ $cat->nome }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <a class="nav-link text-white pl-0" href="#">Tipos de cabelo</a>
                @endif
            </li>
        </ul>

        <div class="list-unstyled form-inline mb-0 ml-auto">
            <a href="#contato" class="text-white px-3 py-2">
                Contato
            </a>
            <a href="{{ route('promocoes') }}" class="text-white bg-offer px-3 py-2">
                <i class="icofont-sale-discount h6"></i> Promoções
            </a>
        </div>
    </div>
</div>
