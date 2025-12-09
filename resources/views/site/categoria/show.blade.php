@extends('layouts.site.site')

@section('title', ($tituloPagina ?? $categoria->nome) . ' - ')

@section('content')
    <section class="py-4 osahan-main-body">
        <div class="container">
            <h1 class="h5 mb-4 titulo-paginas-internas ">
                {{ $tituloPagina ?? $categoria->nome }}
            </h1>

            @if($produtos->count())
                <div class="row">
                    @foreach($produtos as $produto)
                        <div class="col-6 col-md-3 mb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image produto">
                                    <a href="{{ route('produtos.show', [$produto->slug, $produto->id]) }}"
                                       class="marrom-texto">
                                        <img alt="{{ $produto->nome }}"
                                             src="{{ asset($produto->fotoUrl()) }}"
                                             class="img-fluid item-img w-100 mb-3">

                                        <h6 class="produto-nome marrom-texto">{{ $produto->nome }}</h6>

                                        <h6 class="produto-valor" style="font-size:17px;font-weight:800;color:#af9174;">
                                            @include('shared.produto._produto-preco', compact('produto'))
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    {{ $produtos->links() }}
                </div>
            @else
                <p>Não há produtos cadastrados nesta categoria.</p>
            @endif
        </div>
    </section>

    <style>
        .marrom-texto{ color: #af9174; }
        .produto img { margin-bottom: 10px !important; }
        .produto h6 { font-weight: 400; font-size: 14px; margin-left: 7px; }
        .produto-nome { height: 33px; width: 93%; overflow: hidden !important; }
        .produto-valor { color: #808080; }
        @media (max-width: 992px) {
            .osahan-main-body { margin-top: 5em !important; }
        }
    </style>
@endsection
