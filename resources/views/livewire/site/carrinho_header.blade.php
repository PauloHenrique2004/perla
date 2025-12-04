<div style="display: contents">
    <a href="{{ route('carrinho') }}" class="ml-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
        <i class="icofont-shopping-cart"></i>
    </a>

    <div class="ml-2">
        R$ {{ number_format($total, 2, ',', '.') }}
    </div>
</div>
