@extends('layouts.gestor.gestor')

@section('title', 'Produtos - ')
@section('header-title', 'Produtos')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX"
       href="{{ route('gestor.produto.produto') }}">
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
                    <th>Preço</th>
                    <th>Ativo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>
                            {{ $produto->nome }}
                        </td>

                        <td>
                            @include('shared.produto._produto-preco', compact('produto'))
                        </td>

                        <td>{{ $produto->ativo ? 'Sim' : 'Não' }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.produto.produto', $produto->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $produto->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $produto->id }}"
                                  action="{{ route('gestor.produto.produtos.destroy', $produto->id) }}"
                                  method="POST"
                                  style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
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
        {{ $produtos->links() }}
    </div>
@endsection
