@foreach($pedidoProdutoGrupoCargas as $key => $pedidoProdutoGrupoCarga)
    <livewire:site.produto.pedido-produto-grupo :carga="$pedidoProdutoGrupoCarga"
                                                :index="$key" :key="'produtoGrupo'.$key"/>
@endforeach

<link rel="stylesheet" href="{{ asset('site/css/produto-complemento.css') }}">
