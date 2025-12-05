<section class="py-4 osahan-main-body" style="margin-top: 5px;">
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
                                    <div class="categoria-item">
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
    .osahan-categories {
        border-radius: 12px;
        padding: 20px 10px 12px;
    }

    /* container das bolinhas */
    .categories-slider {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 16px; /* espaço entre as bolinhas – funciona nos navegadores modernos */
    }

    /* fallback caso gap não funcione em algum browser mais antigo */
    .categoria-item {
        margin: 8px;
    }

    .categoria-card {
        display: block;
        padding: 8px 4px;
        border-radius: 12px;
        background: transparent;
        text-decoration: none;
    }

    /* círculo */
    .categoria-thumb {
        width: 120px;
        height: 120px;
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
        object-fit: contain;
        border-radius: 50%;
    }

    .categoria-nome {
        display: block;
        margin-top: 8px;
        font-size: 0.85rem;
        color: #af9174;
    }

    /* ajuste mobile: bolinhas um pouco menores e mais respiro vertical */
    @media (max-width: 576px) {
        .categoria-thumb {
            width: 100px;
            height: 100px;
        }

        .categoria-item {
            margin: 10px 8px;
        }

        .categoria-nome {
            font-size: 0.8rem;
        }
    }

    @media (min-width: 577px) and (max-width: 768px){
        .categoria-thumb {
            width: 70px;
            height: 70px;
        }

        .categoria-item {
            margin: 10px 8px;
        }

        .categoria-nome {
            font-size: 0.8rem;
        }
    }


    .marrom-texto{
        color: #af9174;
    }
</style>
