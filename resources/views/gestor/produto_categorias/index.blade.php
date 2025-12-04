@extends('layouts.gestor.gestor')

@section('title', 'Produto Categorias - ')
@section('header-title', 'Produto Categorias')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.produto_categoria') }}">
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
                    <th>Icone</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($produto_categorias as $produtoCategoria)
                    <tr>
                        <td>{{ $produtoCategoria->nome }}</td>
                        <td>
                            <img
                                style="width: 50px; height: 50px; cursor: pointer; object-fit: contain; border-radius: 10%;"
                                src="{{ $produtoCategoria->iconeUrl() }}">
                        </td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('gestor.produto_categoria', $produtoCategoria->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('produto-categoria-form-{{ $produtoCategoria->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="produto-categoria-form-{{ $produtoCategoria->id }}"
                                  action="{{ route('gestor.produto_categorias.destroy', $produtoCategoria->id) }}" method="POST"
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
        {{ $produto_categorias->links() }}
    </div>
@endsection
