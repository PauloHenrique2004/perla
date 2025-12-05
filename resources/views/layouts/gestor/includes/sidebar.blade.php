<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
{{--    <a href="{{ route('gestor.home')  }}" class="brand-link">--}}
{{--        <img src="{{ asset($configuracoes->logo) }}" alt="Logo" class="animate__animated animate__headShake"--}}
{{--             style="width: 150px; display: block; margin: 0 auto;">--}}

        {{--        <span class="brand-text font-weight-light" style="text-align: center; display: block">--}}
        {{--            {{ config('app.name') }}--}}
        {{--        </span>--}}
{{--    </a>--}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <!-- Painel de Controle -->
                <li class="nav-item mb-3">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Painel de Controle
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('gestor.configuracoes.edit', 1) }}" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Site - Configurações</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gestor.pagina', 1) }}" class="nav-link">
                                <i class="nav-icon fas fa-file-word"></i>
                                <p>Site - Sobre nós</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gestor.endereco.dne') }}" class="nav-link">
                                <i class="nav-icon fas fa-map-marked"></i>
                                <p>Endereços Atendidos</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('gestor.endereco.enderecos_atendidos.index') }}" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-globe-americas"></i>--}}
{{--                                <p>Endereços Atendidos</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a href="{{ route('gestor.gestores.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Gestores</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('gestor.lgpd_termos.index') }}" class="dropdown-item nav-link">
                                <i class="nav-icon fas fa-file-word"></i> LGPD Termos
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{ route('gestor.lgpd_aceites.index') }}" class="dropdown-item nav-link">
                                <i class="nav-icon fas fa-check"></i> LGPD Aceites
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- / Painel de Controle -->

                <li class="nav-item">
                    <a href="{{ route('gestor.topo_banners.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Banner principal</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gestor.slides.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>Banner</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('gestor.usuarios.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Clientes</p>
                    </a>
                </li>

                <li class="nav-item mt-2">
                    <a href="{{ route('gestor.forma_entregas.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>Formas de Entrega</p>
                    </a>
                </li>

                <li class="nav-item mt-2">
                    <a href="{{ route('gestor.cupom_descontos.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>Cupom Descontos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gestor.horarios.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>Horários</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gestor.forma_pagamentos.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>Formas de Pagamento</p>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <a href="{{ route('gestor.produto_categorias.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-align-left"></i>
                        <p>Categorias</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gestor.produtos_destaque.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Destaques de produtos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gestor.produto.produtos.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Produtos</p>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <a href="{{ route('gestor.pedidos.index') }}" class="nav-link">
                        <i class="nav-icon  fas fa-book"></i>
                        <p>Pedidos</p>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <a href="{{ route('gestor.depoimentos.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>Depoimentos</p>
                    </a>
                </li>


                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('gestor.pagina', $pagina->id) }}" class="nav-link">--}}
                {{--                        <i class="nav-icon fas fa-file-word"></i>--}}
                {{--                        <p>Páginas</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
