<div class="py-3 osahan-promos banner-secundario" id="slides">
    <div class="promo-slider pb-0 mb-0">
        @foreach($slides as $key => $slide)
            <div class="osahan-slider-item mx-2">
                <a href="{{ $slide->promocional ? route('promocoes') : $slide->link }}">
                    <img src="{{ asset($slide->fotoUrl()) }}" class="img-fluid mx-auto rounded"
                         alt="{{ $slide->titulo  }}">
                </a>
            </div>
        @endforeach
    </div>
</div>



