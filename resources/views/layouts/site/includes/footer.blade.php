
{{--<footer class="section-footer border-top bg-white">--}}
{{--    <!-- footer-top.// -->--}}
{{--    <section class="footer-main border-top pt-5 pb-4">--}}
{{--        <div class="container">--}}
{{--            <div class="row" id="contato">--}}
{{--                <aside class="col-md">--}}
{{--                    <h6 class="title">Contato</h6>--}}
{{--                    <ul class="list-unstyled list-padding">--}}
{{--                        <li class="footer-li">--}}
{{--                            <i class="fa fa-map-marker"></i>--}}
{{--                            {{ $configuracoes->rua }}, {{ $configuracoes->bairro }}<br>--}}
{{--                            {{ $configuracoes->cidade }} / {{ $configuracoes->estado }}--}}
{{--                        </li>--}}

{{--                        @if($configuracoes->telefone1)--}}
{{--                            <li class="footer-li mt-2">--}}
{{--                                <i class="fa fa-phone"></i>--}}
{{--                                <a href="tel://{{ $configuracoes->telefone1 }}" class="text-dark">--}}
{{--                                    {{ $configuracoes->telefone1 }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}

{{--                        @if($configuracoes->telefone2)--}}
{{--                            <li class="footer-li">--}}
{{--                                <i class="fa fa-phone"></i>--}}
{{--                                <a href="tel://{{ $configuracoes->telefone2 }}" class="text-dark">--}}
{{--                                    {{ $configuracoes->telefone2 }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}

{{--                        @if($configuracoes->email1)--}}
{{--                            <li class="footer-li mt-2">--}}
{{--                                <i class="fa fa-envelope"></i>--}}
{{--                                <a href="mailto://{{ $configuracoes->email1 }}" class="text-dark">--}}
{{--                                    {{ $configuracoes->email1 }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}

{{--                        @if($configuracoes->email2)--}}
{{--                            <li class="footer-li">--}}
{{--                                <i class="fa fa-envelope"></i>--}}
{{--                                <a href="mailto://{{ $configuracoes->email2 }}" class="text-dark">--}}
{{--                                    {{ $configuracoes->email2 }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        <li class="pb-2 footer-li">--}}
{{--                        <i class="fa fa-file-text" aria-hidden="true"></i>--}}
{{--                            <a href="{{ route('lgpd_termos') }}" style="color:black;">--}}
{{--                                Política de Privacidade--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </aside>--}}
{{--                <aside class="col-md">--}}
{{--                    <h6 class="title">Checkout Process</h6>--}}
{{--                    <ul class="list-unstyled list-padding">--}}
{{--                        <li><a href="cart.html" class="text-dark">Cart</a></li>--}}
{{--                        <li><a href="cart.html" class="text-dark">Order Address</a></li>--}}
{{--                        <li><a href="cart.html" class="text-dark">Delivery Time</a></li>--}}
{{--                        <li><a href="cart.html" class="text-dark">Order Payment</a></li>--}}
{{--                        <li><a href="checkout.html" class="text-dark">Checkout</a></li>--}}
{{--                        <li><a href="successful.html" class="text-dark">Successful</a></li>--}}
{{--                    </ul>--}}
{{--                    <div class="g-maps">--}}
{{--                        {!! $configuracoes->maps_iframe !!}--}}
{{--                    </div>--}}
{{--                </aside>--}}
{{--            </div>--}}
{{--            <!-- row.// -->--}}
{{--        </div>--}}
{{--        <!-- //container -->--}}
{{--    </section>--}}
{{--    <!-- footer-top.// -->--}}
{{--    <section class="footer-bottom border-top py-4" id="horarioFuncionamento">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    @if($configuracoes->horario_funcionamento)--}}
{{--                        <i class="fa fa-clock-o"></i> {{ $configuracoes->horario_funcionamento }} |--}}
{{--                    @endif--}}
{{--                    <span class="pr-2">© {{ config('app.name') }}</span>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 text-md-right">--}}
{{--                    @if($configuracoes->facebook)--}}
{{--                        <a href="{{$configuracoes->facebook}}" target="_blank" class="btn btn-icon btn-light">--}}
{{--                            <i class="icofont-facebook"></i>--}}
{{--                        </a>--}}
{{--                    @endif--}}

{{--                    @if($configuracoes->twitter)--}}
{{--                        <a href="{{$configuracoes->twitter}}" target="_blank" class="btn btn-icon btn-light">--}}
{{--                            <i class="icofont-twitter"></i>--}}
{{--                        </a>--}}
{{--                    @endif--}}

{{--                    @if($configuracoes->instagram)--}}
{{--                        <a href="{{$configuracoes->instagram}}" target="_blank" class="btn btn-icon btn-light">--}}
{{--                            <i class="icofont-instagram"></i>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- row.// -->--}}
{{--        </div>--}}
{{--        <!-- //container -->--}}
{{--    </section>--}}
{{--    <livewire:site.lgpd-aceite />--}}
{{--</footer>--}}

{{--<style>--}}
{{--    .footer-li {--}}
{{--        display: flex;--}}
{{--    }--}}

{{--    .footer-li i {--}}
{{--        padding-top: 7px;--}}
{{--        padding-right: 5px;--}}
{{--    }--}}

{{--    .g-maps {--}}
{{--        height: 100%;--}}
{{--    }--}}
{{--    .g-maps iframe {--}}
{{--        width: 100%;--}}
{{--        height: inherit;--}}
{{--    }--}}

{{--    .place-card-medium {--}}
{{--        display: none !important;--}}
{{--    }--}}
{{--</style>--}}
<footer class="section-footer border-top bg-white">
    <section class="footer-main border-top pt-5 pb-4">
        <div class="container">
            <div class="row" id="contato">

                {{-- Coluna 1: Precisa de ajuda? / Links úteis --}}
                <aside class="col-md-4 mb-4">
                    <h6 class="title mb-3">Precisa de ajuda?</h6>
                    <ul class="list-unstyled list-padding">
                        @if($configuracoes->telefone1 || $configuracoes->telefone2)
                            <li class="footer-li mb-2">
                                <i class="fa fa-question-circle"></i>
                                <span>Atendimento de segunda a sábado.</span>
                            </li>
                        @endif

                        <li class="footer-li mb-2">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            <a href="{{ route('lgpd_termos') }}" class="text-dark">
                                Política de Privacidade
                            </a>
                        </li>
                        {{-- se tiver outras páginas de ajuda, adiciona aqui --}}
                    </ul>
                </aside>

                {{-- Coluna 2: Fale com a gente (contato + WhatsApp em destaque) --}}
                <aside class="col-md-4 mb-4">
                    <h6 class="title mb-3">Quer falar com a gente?</h6>
                    <ul class="list-unstyled list-padding">
                        <li class="footer-li mb-2">
                            <i class="fa fa-map-marker"></i>
                            <span>
                                {{ $configuracoes->rua }}, {{ $configuracoes->bairro }}<br>
                                {{ $configuracoes->cidade }} / {{ $configuracoes->estado }}
                            </span>
                        </li>

                        @if($configuracoes->telefone1)
                            <li class="footer-li mb-2">
                                <i class="fa fa-whatsapp"></i>
                                <a href="https://wa.me/{{ preg_replace('/\D/','',$configuracoes->telefone1) }}"
                                   target="_blank"
                                   class="text-dark">
                                    {{ $configuracoes->telefone1 }}
                                    <small class="text-muted">(WhatsApp)</small>
                                </a>
                            </li>
                        @endif

                        @if($configuracoes->telefone2)
                            <li class="footer-li mb-2">
                                <i class="fa fa-phone"></i>
                                <a href="tel://{{ $configuracoes->telefone2 }}" class="text-dark">
                                    {{ $configuracoes->telefone2 }}
                                </a>
                            </li>
                        @endif

                        @if($configuracoes->email1)
                            <li class="footer-li mb-2">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{ $configuracoes->email1 }}" class="text-dark">
                                    {{ $configuracoes->email1 }}
                                </a>
                            </li>
                        @endif
                    </ul>

                    {{-- botão Fale conosco / WhatsApp --}}
                    @if($configuracoes->telefone1)
                        <a href="https://wa.me/{{ preg_replace('/\D/','',$configuracoes->telefone1) }}"
                           target="_blank"
                           class="btn btn-sm text-white mt-2"
                           style="background:#25d366; border-radius:20px; padding:6px 18px;">
                            <i class="fa fa-whatsapp"></i> Fale conosco pelo WhatsApp
                        </a>
                    @endif
                </aside>

                {{-- Coluna 3: Mapa --}}
                <aside class="col-md-4 mb-4">
                    <h6 class="title mb-3">Como chegar</h6>
                    <div class="g-maps">
                        {!! $configuracoes->maps_iframe !!}
                    </div>
                </aside>

            </div>
        </div>
    </section>

    <section class="footer-bottom py-3" id="horarioFuncionamento" style="background:#af9174; color:#fff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-2 mb-md-0">
                    @if($configuracoes->horario_funcionamento)
                        <i class="fa fa-clock-o"></i>
                        {{ $configuracoes->horario_funcionamento }} |
                    @endif
                    <span class="pr-2">© {{ config('app.name') }}</span>
                </div>
                <div class="col-md-6 text-md-right">
                    @if($configuracoes->facebook)
                        <a href="{{ $configuracoes->facebook }}" target="_blank"
                           class="btn btn-icon btn-sm rounded-circle social-facebook">
                            <i class="icofont-facebook"></i>
                        </a>
                    @endif

                    @if($configuracoes->instagram)
                        <a href="{{ $configuracoes->instagram }}" target="_blank"
                           class="btn btn-icon btn-sm rounded-circle social-instagram">
                            <i class="icofont-instagram"></i>
                        </a>
                    @endif

                    @if($configuracoes->twitter)
                        <a href="{{ $configuracoes->twitter }}" target="_blank"
                           class="btn btn-icon btn-sm rounded-circle social-twitter">
                            <i class="icofont-twitter"></i>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <livewire:site.lgpd-aceite />
</footer>

<style>
    .footer-li {
        display: flex;
        align-items: flex-start;
    }

    .footer-li i {
        padding-top: 3px;
        padding-right: 6px;
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

    .social-facebook {
        background: #1877F2;   /* azul Facebook */
        color: #fff;
    }

    .social-instagram {
        background: #E4405F;   /* rosa Instagram */
        color: #fff;
    }

    .social-twitter {
        background: #1DA1F2;   /* azul Twitter/X (ajuste se usar outro) */
        color: #fff;
    }

    .social-facebook i,
    .social-instagram i,
    .social-twitter i {
        color: #fff;
    }

</style>
