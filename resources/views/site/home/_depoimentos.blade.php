
<section class="py-5" id="depoimentos">
    <div class="container">
        <h2 class="text-center mb-4">Depoimentos</h2>

        <div id="depoimentosCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <!-- SLIDE 1 -->
                <div class="carousel-item active">
                    <div class="row justify-content-center">

                        <div class="col-12 col-md-4 mb-3">
                            <div class="depo-card text-center p-4 h-100">
                                <div class="mb-3">
                                    <img src="{{ asset('site/img/dep.png') }}"
                                         alt="Nome 1"
                                         class="rounded-circle"
                                         style="width:70px;height:70px;object-fit:cover;">
                                </div>
                                <h5 class="mb-1">Nome 1</h5>
                                <div class="mb-2" style="color:#f5b400;">
                                    ★★★★★
                                </div>
                                <p class="mb-0 text-muted small">
                                    Texto do depoimento 1, uma frase curta falando bem da empresa.
                                </p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 mb-3">
                            <div class="depo-card text-center p-4 h-100">
                                <div class="mb-3">
                                    <img src="{{ asset('site/img/dep.png') }}"
                                         alt="Nome 2"
                                         class="rounded-circle"
                                         style="width:70px;height:70px;object-fit:cover;">
                                </div>
                                <h5 class="mb-1">Nome 2</h5>
                                <div class="mb-2" style="color:#f5b400;">
                                    ★★★★★
                                </div>
                                <p class="mb-0 text-muted small">
                                    Texto do depoimento 2, mais um comentário de cliente satisfeito.
                                </p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 mb-3">
                            <div class="depo-card text-center p-4 h-100">
                                <div class="mb-3">
                                    <img src="{{ asset('site/img/dep.png') }}"
                                         alt="Nome 3"
                                         class="rounded-circle"
                                         style="width:70px;height:70px;object-fit:cover;">
                                </div>
                                <h5 class="mb-1">Nome 3</h5>
                                <div class="mb-2" style="color:#f5b400;">
                                    ★★★★★
                                </div>
                                <p class="mb-0 text-muted small">
                                    Texto do depoimento 3, reforçando a qualidade do serviço.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- SLIDE 2 (exemplo) -->
                <div class="carousel-item">
                    <div class="row justify-content-center">

                        <div class="col-12 col-md-4 mb-3">
                            <div class="depo-card text-center p-4 h-100">
                                <div class="mb-3">
                                    <img src="{{ asset('site/img/dep.png') }}"
                                         alt="Nome 4"
                                         class="rounded-circle"
                                         style="width:70px;height:70px;object-fit:cover;">
                                </div>
                                <h5 class="mb-1">Nome 4</h5>
                                <div class="mb-2" style="color:#f5b400;">
                                    ★★★★★
                                </div>
                                <p class="mb-0 text-muted small">
                                    Outro depoimento aqui, para preencher o segundo slide.
                                </p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 mb-3">
                            <div class="depo-card text-center p-4 h-100">
                                <div class="mb-3">
                                    <img src="{{ asset('site/img/dep.png') }}"
                                         alt="Nome 5"
                                         class="rounded-circle"
                                         style="width:70px;height:70px;object-fit:cover;">
                                </div>
                                <h5 class="mb-1">Nome 5</h5>
                                <div class="mb-2" style="color:#f5b400;">
                                    ★★★★★
                                </div>
                                <p class="mb-0 text-muted small">
                                    Depoimento 5, com mais uma opinião positiva.
                                </p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 mb-3">
                            <div class="depo-card text-center p-4 h-100">
                                <div class="mb-3">
                                    <img src="{{ asset('site/img/dep.png') }}"
                                         alt="Nome 6"
                                         class="rounded-circle"
                                         style="width:70px;height:70px;object-fit:cover;">
                                </div>
                                <h5 class="mb-1">Nome 6</h5>
                                <div class="mb-2" style="color:#f5b400;">
                                    ★★★★★
                                </div>
                                <p class="mb-0 text-muted small">
                                    Depoimento 6, completando este segundo slide.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Controles -->
{{--            <a class="carousel-control-prev" href="#depoimentosCarousel" role="button" data-slide="prev">--}}
{{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Anterior</span>--}}
{{--            </a>--}}
{{--            <a class="carousel-control-next" href="#depoimentosCarousel" role="button" data-slide="next">--}}
{{--                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Próximo</span>--}}
{{--            </a>--}}

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
