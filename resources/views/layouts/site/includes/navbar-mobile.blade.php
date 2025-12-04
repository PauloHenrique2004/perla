<div class="border-bottom p-3 d-none mobile-nav">
    <div class="title d-flex align-items-center">
        <a href="/" class="text-decoration-none text-dark d-flex align-items-center">
            <img class="osahan-logo mr-2" src="{{ asset('images/logo-site.png') }}" alt="{{ config('app.name') }}" style="height: 60px">
        </a>
        <p class="ml-auto m-0">
        </p>
        <a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
    </div>

    <div style="display: flex">
        <form accept-charset="UTF-8" style="width: 100%" method="GET" action="/">
            <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
                <div class="input-group-prepend">
                    <button class="border-0 btn btn-outline-secondary text-success bg-white"><i
                            class="icofont-search"></i>
                    </button>
                </div>

                <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Buscar..." name="busca"
                       value="{{ request()->query('busca') }}">
            </div>
        </form>

        <livewire:site.carrinho-header-mobile/>
    </div>

    @unless($lojaAberta)
        <div
            style=" width: 100%; background: #000; text-align: center; font-weight: bold; text-transform: uppercase; color: #fff; height: 30px; padding-top: 6px; margin-top: 5px; ">
            Loja Fechada
        </div>
    @endunless
</div>
