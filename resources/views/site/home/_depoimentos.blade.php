
@if($depoimentos->count())
    <section class="py-5" id="depoimentos">
        <div class="container">
{{--            <h2 class="text-center mb-4">Depoimentos</h2>--}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 titulo-sessoes">Depoimentos</h4>
            </div>


            <div id="depoimentosCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    @foreach($depoimentos->chunk(3) as $chunkIndex => $chunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">

                                @foreach($chunk as $dep)
                                    <div class="col-12 col-md-4 mb-3">
                                        <div class="depo-card text-center p-4 h-100">
                                            <div class="mb-3">
{{--                                                @php--}}
{{--                                                    $foto = $dep->foto--}}
{{--                                                        ? Storage::disk('storage_configuracoes')->url($dep->foto)--}}
{{--                                                        : asset('site/img/dep.png');--}}
{{--                                                @endphp--}}

                                                <img src="{{ Storage::disk('storage_configuracoes')->url($dep->foto) }}"
                                                     alt="{{ $dep->nome }}"
                                                     class="rounded-circle"
                                                     style="width:70px;height:70px;object-fit:cover;">

                                            </div>
                                            <h5 class="mb-1">{{ $dep->nome }}</h5>

                                            <div class="mb-2" style="color:#f5b400;">
                                                @for($i = 1; $i <= 5; $i++)
                                                    {{ $i <= $dep->estrelas ? '★' : '☆' }}
                                                @endfor
                                            </div>

                                            <p class="mb-0 text-muted small">
                                                {{ $dep->texto }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Controles estilo bolinha -->
                <button class="depo-control depo-control-prev"
                        type="button"
                        data-target="#depoimentosCarousel"
                        data-slide="prev">
                    ‹
                </button>

                <button class="depo-control depo-control-next"
                        type="button"
                        data-target="#depoimentosCarousel"
                        data-slide="next">
                    ›
                </button>

            </div>
        </div>
    </section>
@endif


<style>
    .depo-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    @media (max-width: 767.98px) {
        /* no mobile cada slide já vira 1 por linha pelo col-12,
           então mantém o layout, ocupando a tela inteira */
    }

    .depo-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
    }

    .depo-control-prev {
        left: 0;
    }

    .depo-control-next {
        right: 0;
    }

    .depo-control:hover {
        background: #f5f5f5;
    }

</style>
