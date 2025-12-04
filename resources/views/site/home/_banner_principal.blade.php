{{-- BANNER PRINCIPAL desktop (CARROSSEL FULLWIDTH) --}}
<section class="py-4 osahan-main-body c-desktop" style="padding-bottom: initial !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-principal-slider">
                    @foreach($topoBanners as $banner)
                        <div>
                            <a href="{{ $banner->link ?: '#' }}">
                                <img
                                    src="{{ Storage::disk('storage_topo_banners')->url($banner->imagem_desktop) }}"
                                    alt="{{ $banner->titulo }}"
                                    class="w-100 d-block rounded"
                                >
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CARROSSEL MOBILE --}}
<section class="py-4 osahan-main-body c-mobile">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-principal-slider">
                    @foreach($topoBanners as $banner)
                        <div>
                            <a href="{{ $banner->link ?: '#' }}">
                                <img
                                    src="{{ Storage::disk('storage_topo_banners')->url($banner->imagem_mobile ?: $banner->imagem_desktop) }}"
                                    alt="{{ $banner->titulo }}"
                                    class="w-100 d-block rounded"
                                >
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
