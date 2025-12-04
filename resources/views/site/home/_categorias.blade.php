<section class="py-4 osahan-main-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="osahan-home-page">
                    <div class="osahan-body">

                        <div class="pt-3 pb-2 osahan-categories">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="m-0 titulo-sessoes">O que você está procurando?</h5>
                            </div>

                            <div class="categories-slider">

                                @foreach($categorias as $key => $categoria)
                                    <div class="col-c">
                                        <a href="{{ route('categoria', [$categoria->slug, $categoria]) }}"
                                           class="categoria-card d-flex flex-column align-items-center text-center">
                                            <div class="categoria-thumb mb-2">
                                                <img src="{{ asset($categoria->iconeUrl()) }}"
                                                     alt="{{ $categoria->nome }}">
                                            </div>
                                            <span class="categoria-nome">
                                                {{ $categoria->nome }}
                                            </span>
                                        </a>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .slick-initialized .slick-slide {
        margin-bottom: 10px;
    }

    .osahan-categories {
        /*background: #f6f7fb;*/
        border-radius: 12px;
        padding: 20px 10px 12px;
    }

    .categoria-card {
        display: block;
        padding: 8px 4px; /* menos padding para a imagem ficar maior */
        border-radius: 12px;
        background: transparent;
        text-decoration: none;
    }

    .categoria-thumb {
        width: 120px;
        height: 120px;              /* define o círculo */
        border-radius: 50%;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.06);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .categoria-thumb img {
        width: 100%;
        height: 100%;
        object-fit: contain;        /* foco na arte do produto */
        border-radius: 50%;
    }

    .categoria-nome {
        display: block;
        margin-top: 8px;
        font-size: 0.85rem;
        color: #af9174;
    }

    .marrom-texto{
        color: #af9174;
    }
</style>
