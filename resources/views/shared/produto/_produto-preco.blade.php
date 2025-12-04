{{--@if($produto->preco_promocional)--}}
{{--    @if($produto->preco_a_partir_de && $produto->preco_a_partir_de > 0)--}}
{{--        <small>A partir de</small><br>--}}
{{--    @endif--}}

{{--    <span style="color: #af9174">--}}
{{--        R$ {{ number_format($produto->preco_promocional, 2, ',', '.') }}--}}
{{--    </span>--}}

{{--    <span style="font-size: 12px">--}}
{{--        @if($produto->preco_a_partir_de && $produto->preco_a_partir_de > 0)--}}
{{--            <s>{{ number_format($produto->preco_a_partir_de, 2, ',', '.') }}</s>--}}
{{--        @else--}}
{{--            <s>{{ number_format($produto->preco, 2, ',', '.') }}</s>--}}
{{--        @endif--}}
{{--    </span>--}}
{{--@else--}}
{{--    @if($produto->preco_a_partir_de && $produto->preco_a_partir_de > 0)--}}
{{--        A partir de--}}
{{--    @endif--}}

{{--    R$--}}
{{--    @if($produto->preco_a_partir_de && $produto->preco_a_partir_de > 0)--}}
{{--        {{ number_format($produto->preco_a_partir_de, 2, ',', '.') }}--}}
{{--    @else--}}
{{--        {{ number_format($produto->preco, 2, ',', '.') }}--}}
{{--    @endif--}}
{{--@endif--}}

@if($produto->preco_promocional)
    @if($produto->preco_a_partir_de && $produto->preco_a_partir_de > 0)
        <small>A partir de</small><br>
    @endif

    {{-- preço antigo riscado, menor e antes --}}
    <span style="font-size: 12px; color: #af9174;">
        @if($produto->preco_a_partir_de && $produto->preco_a_partir_de > 0)
            <s>R$ {{ number_format($produto->preco_a_partir_de, 2, ',', '.') }}</s>
        @else
            <s>R$ {{ number_format($produto->preco, 2, ',', '.') }}</s>
        @endif
    </span>

    {{-- preço promocional em destaque --}}
    <span style="color: #af9174; font-weight: 700; margin-left: 4px;">
        R$ {{ number_format($produto->preco_promocional, 2, ',', '.') }}
    </span>
@else
    @if($produto->preco_a_partir_de && $produto->preco_a_partir_de > 0)
        A partir de
        R$ {{ number_format($produto->preco_a_partir_de, 2, ',', '.') }}
    @else
        R$ {{ number_format($produto->preco, 2, ',', '.') }}
    @endif
@endif
