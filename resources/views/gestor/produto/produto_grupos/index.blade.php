@extends('layouts.gestor.gestor')

@section('title', $produto->nome.' - Grupos')
@section('header-title', $produto->nome.' - Grupos')

@section('card-tools')
    <a class="btn btn-default content animate__animated animate__flipInX"
       href="{{ route('gestor.produto.produto', $produto) }}">
        <i class="nav-icon fas fa-arrow-left"></i>
        Produto
    </a>

    <a class="btn btn-primary content animate__animated animate__flipInX"
       href="{{ route('gestor.produto.grupo', $produto) }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ordem</th>
                    <th>Tipo</th>
                    <th>Mínimo</th>
                    <th>Máximo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->nome }}</td>
                        <td>{{ $grupo->ordem }}</td>
                        <td>{{ $grupo->tipoNome() }}</td>
                        <td>{{ $grupo->quantidade_minima }}</td>
                        <td>{{ $grupo->quantidade_maxima }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.produto.grupo', [$produto, $grupo]) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="{{ route('gestor.produto.grupo.destroy', $grupo->id) }}">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>
                            <!-- / Remover -->

                        </td>
                        <!-- / Ações -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer clearfix">
        {{ $grupos->links() }}
    </div>
@endsection
