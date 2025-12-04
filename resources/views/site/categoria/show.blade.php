{{--@section('title', "{$produto->nome} - ")--}}
{{--@section('og:title', $produto->nome)--}}
{{--@section('og:image', asset($produto->thumbnailUrl()))--}}
{{--@section('description', $produto->nome)--}}


@extends('layouts.site.site')

@section('title', $categoria->nome . ' - ')

@section('content')
    <section class="py-4 osahan-main-body">
        <div class="container">
            <h1 class="h5 mb-4 titulo-paginas-internas ">{{ $categoria->nome }}</h1>

            <div class="row">

                @forelse($produtos as $produto)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('produtos.show', [$produto->slug, $produto->id]) }}" class="text-decoration-none text-dark">
                            <div class="bg-white rounded shadow-sm h-100 p-3">
                                <img src="{{ asset($produto->thumbnailUrl()) }}"
                                     alt="{{ $produto->nome }}"
                                     class="img-fluid mx-auto d-block mb-2"
                                     style="height:200px;object-fit:cover;">

                                <div class="small mb-1">
                                    {{ $produto->nome }}
                                </div>

                                <strong>
                                    R$ {{ number_format($produto->preco_promocional ?: $produto->preco, 2, ',', '.') }}
                                </strong>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <p>Não há produtos cadastrados nesta categoria.</p>
                    </div>
                @endforelse
            </div>

            {{ $produtos->links() }}
        </div>
    </section>
@endsection

