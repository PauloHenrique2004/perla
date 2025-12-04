
<footer class="section-footer border-top bg-white">
    <!-- footer-top.// -->
    <section class="footer-main border-top pt-5 pb-4">
        <div class="container">
            <div class="row" id="contato">
                <aside class="col-md">
                    <h6 class="title">Contato</h6>
                    <ul class="list-unstyled list-padding">
                        <li class="footer-li">
                            <i class="fa fa-map-marker"></i>
                            {{ $configuracoes->rua }}, {{ $configuracoes->bairro }}<br>
                            {{ $configuracoes->cidade }} / {{ $configuracoes->estado }}
                        </li>

                        @if($configuracoes->telefone1)
                            <li class="footer-li mt-2">
                                <i class="fa fa-phone"></i>
                                <a href="tel://{{ $configuracoes->telefone1 }}" class="text-dark">
                                    {{ $configuracoes->telefone1 }}
                                </a>
                            </li>
                        @endif

                        @if($configuracoes->telefone2)
                            <li class="footer-li">
                                <i class="fa fa-phone"></i>
                                <a href="tel://{{ $configuracoes->telefone2 }}" class="text-dark">
                                    {{ $configuracoes->telefone2 }}
                                </a>
                            </li>
                        @endif

                        @if($configuracoes->email1)
                            <li class="footer-li mt-2">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto://{{ $configuracoes->email1 }}" class="text-dark">
                                    {{ $configuracoes->email1 }}
                                </a>
                            </li>
                        @endif

                        @if($configuracoes->email2)
                            <li class="footer-li">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto://{{ $configuracoes->email2 }}" class="text-dark">
                                    {{ $configuracoes->email2 }}
                                </a>
                            </li>
                        @endif
                        <li class="pb-2 footer-li">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                            <a href="{{ route('lgpd_termos') }}" style="color:black;">
                                Política de Privacidade
                            </a>
                        </li>
                    </ul>
                </aside>
                <aside class="col-md">
{{--                    <h6 class="title">Checkout Process</h6>--}}
{{--                    <ul class="list-unstyled list-padding">--}}
{{--                        <li><a href="cart.html" class="text-dark">Cart</a></li>--}}
{{--                        <li><a href="cart.html" class="text-dark">Order Address</a></li>--}}
{{--                        <li><a href="cart.html" class="text-dark">Delivery Time</a></li>--}}
{{--                        <li><a href="cart.html" class="text-dark">Order Payment</a></li>--}}
{{--                        <li><a href="checkout.html" class="text-dark">Checkout</a></li>--}}
{{--                        <li><a href="successful.html" class="text-dark">Successful</a></li>--}}
{{--                    </ul>--}}
                    <div class="g-maps">
                        {!! $configuracoes->maps_iframe !!}
                    </div>
                </aside>
            </div>
            <!-- row.// -->
        </div>
        <!-- //container -->
    </section>
    <!-- footer-top.// -->
    <section class="footer-bottom border-top py-4" id="horarioFuncionamento">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @if($configuracoes->horario_funcionamento)
                        <i class="fa fa-clock-o"></i> {{ $configuracoes->horario_funcionamento }} |
                    @endif
                    <span class="pr-2">© {{ config('app.name') }}</span>
                </div>
                <div class="col-md-6 text-md-right">
                    @if($configuracoes->facebook)
                        <a href="{{$configuracoes->facebook}}" target="_blank" class="btn btn-icon btn-light">
                            <i class="icofont-facebook"></i>
                        </a>
                    @endif

                    @if($configuracoes->twitter)
                        <a href="{{$configuracoes->twitter}}" target="_blank" class="btn btn-icon btn-light">
                            <i class="icofont-twitter"></i>
                        </a>
                    @endif

                    @if($configuracoes->instagram)
                        <a href="{{$configuracoes->instagram}}" target="_blank" class="btn btn-icon btn-light">
                            <i class="icofont-instagram"></i>
                        </a>
                    @endif
                </div>
            </div>
            <!-- row.// -->
        </div>
        <!-- //container -->
    </section>
    <livewire:site.lgpd-aceite />
</footer>

<style>
    .footer-li {
        display: flex;
    }

    .footer-li i {
        padding-top: 7px;
        padding-right: 5px;
    }

    .g-maps {
        height: 100%;
    }
    .g-maps iframe {
        width: 100%;
        height: inherit;
    }

    .place-card-medium {
        display: none !important;
    }
</style>
