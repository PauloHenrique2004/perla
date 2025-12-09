<!-- Menu bar -->
<div class="bg-color-head">
    <div class="container menu-bar d-flex align-items-center">
        <ul class="list-unstyled form-inline mb-0">
            <li class="nav-item">
                <a class="nav-link text-white pl-0" href="/">
                    Início <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white pl-0" href="/paginas/sobre-nos/1">Sobre nós</a>
            </li>

{{--            @foreach($menuCategorias as $cat)--}}
{{--                @php $temSub = $cat->subcategorias->count() > 0; @endphp--}}

{{--                <li class="nav-item {{ $temSub ? 'dropdown' : '' }}">--}}
{{--                    @if($temSub)--}}
{{--                        <a class="nav-link text-white pl-0 dropdown-toggle"--}}
{{--                           href="#"--}}
{{--                           id="cat{{ $cat->id }}Dropdown"--}}
{{--                           role="button"--}}
{{--                           data-toggle="dropdown"--}}
{{--                           aria-haspopup="true"--}}
{{--                           aria-expanded="false">--}}
{{--                            {{ $cat->nome }}--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-menu" aria-labelledby="cat{{ $cat->id }}Dropdown">--}}
{{--                            @foreach($cat->subcategorias as $sub)--}}
{{--                                <a class="dropdown-item"--}}
{{--                                   href="{{ route('categoria', [$sub->slug ?? $cat->slug, $sub->id ?? $cat->id]) }}">--}}
{{--                                    {{ $sub->produto_subcategoria }}--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <a class="nav-link text-white pl-0"--}}
{{--                           href="{{ route('categoria', [$cat->slug, $cat->id]) }}">--}}
{{--                            {{ $cat->nome }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </li>--}}
{{--            @endforeach--}}

            @foreach($menuCategorias as $cat)
                @php $temSub = $cat->subcategorias->count() > 0; @endphp

                <li class="nav-item {{ $temSub ? 'dropdown' : '' }}">
                    @if($temSub)
                        <a class="nav-link text-white pl-0 dropdown-toggle"
                           href="{{ route('categoria', [$cat->slug, $cat->id]) }}"
                           id="cat{{ $cat->id }}Dropdown"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            {{ $cat->nome }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="cat{{ $cat->id }}Dropdown">
                            @foreach($cat->subcategorias as $sub)
                                <a class="dropdown-item"
                                   href="{{ route('subcategoria', [\Str::slug($sub->produto_subcategoria), $sub->id]) }}">
                                    {{ $sub->produto_subcategoria }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <a class="nav-link text-white pl-0"
                           href="{{ route('categoria', [$cat->slug, $cat->id]) }}">
                            {{ $cat->nome }}
                        </a>
                    @endif
                </li>
            @endforeach

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
