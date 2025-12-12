@extends('layouts.site.site')

@section('title', 'Resultado da busca - ')

@section('content')
    <section class="py-4 osahan-main-body">
        <div class="container">
            <h1 class="h5 mb-4 titulo-paginas-internas">
                Resultado da busca por: "{{ $busca }}"
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
            @else
                <p>Nenhum produto encontrado para esta busca.</p>
            @endif
        </div>
    </section>
@endsection

<style>
    .marrom-texto {
        color: #af9174;
    }

    .produto h6 {
        font-weight: 400;
        font-size: 14px;
        margin-left: 7px;
    }
</style>
