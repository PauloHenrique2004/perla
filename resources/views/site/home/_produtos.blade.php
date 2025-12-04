@foreach($secoes as $bloco)
    @if($bloco['produtos']->isNotEmpty())
        <section class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 titulo-sessoes">{{ $bloco['secao']->nome }}</h4>
            </div>

            <div class="pick_today">
                <div class="row">
                    @foreach($bloco['produtos'] as $produto)
                        <div class="col-6 col-md-3 mb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image produto">
                                    <a href="{{ route('produtos.show', [$produto->slug, $produto]) }}"
                                       class="marrom-texto">
                                        <img alt="{{ $produto->nome }}"
                                             src="{{ asset($produto->fotoUrl()) }}"
                                             class="img-fluid item-img w-100 mb-3">

                                        <h6 class="produto-nome ">{{ $produto->nome }}</h6>

                                        <h6 class="produto-valor" style="font-size: 17px;font-weight: 800; color: #af9174;">
                                            @include('shared.produto._produto-preco', compact('produto'))
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endforeach

<style>
    .produto img {
        margin-bottom: 10px !important;
        height: 220px;
        width: 220px;
        object-fit: cover;
    }

    .produto h6 {
        font-weight: 400;
        font-size: 14px;
        margin-left: 7px;
    }

    .produto-nome {
        height: 33px;
        width: 93%;
        overflow: hidden !important;
    }

    .produto-valor {
        color: #808080;
    }
</style>
