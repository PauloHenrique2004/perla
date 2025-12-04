<section class="secao-beneficios">
    <div class="container">
        <div class="row text-center">

            @if(!empty($configuracoes->beneficio1))
                <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                    <div class="beneficio-item">
                        <img
                            src="{{ Storage::disk('storage_configuracoes')->url($configuracoes->beneficio1) }}"
                            alt="Benefício 1"
                            class="img-fluid mx-auto d-block">
                    </div>
                </div>
            @endif

                @if(!empty($configuracoes->beneficio2))
                    <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                        <div class="beneficio-item">
                            <img
                                src="{{ Storage::disk('storage_configuracoes')->url($configuracoes->beneficio2) }}"
                                alt="Benefício 2"
                                class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                @endif

                @if(!empty($configuracoes->beneficio3))
                    <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                        <div class="beneficio-item">
                            <img
                                src="{{ Storage::disk('storage_configuracoes')->url($configuracoes->beneficio3) }}"
                                alt="Benefício 3"
                                class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                @endif

                @if(!empty($configuracoes->beneficio4))
                    <div class="col-lg-3 col-md-6">
                        <div class="beneficio-item">
                            <img
                                src="{{ Storage::disk('storage_configuracoes')->url($configuracoes->beneficio4) }}"
                                alt="Benefício 4"
                                class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                @endif

        </div>
    </div>
</section>
