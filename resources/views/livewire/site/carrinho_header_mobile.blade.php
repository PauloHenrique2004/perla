<div class="btn btn-success mt-3 mobile-cart-total">
    <div onclick="window.location = '{{ route('carrinho') }}'" class="ml-2 mobile-cart-total-wrapper">
        <span style="font-size: 15px;">
            <i class="icofont-shopping-cart"></i>
        </span>
        R$ {{ number_format($total, 2, ',', '.') }}
    </div>

    <style>
        .mobile-cart-total {
            display: flex;
            float: right;
            max-height: 35px;
            min-width: 130px;
            margin-left: 10px;
        }

        .mobile-cart-total-wrapper {
            margin-left: 0 !important;
            width: 100%
        }
    </style>
</div>
