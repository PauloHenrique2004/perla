@extends('layouts.gestor.gestor')

@section('title', 'Cupom Descontos - ')
@section('header-title', 'Cupom Descontos')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX"
       href="{{ route('gestor.cupom_desconto') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Qtd de Uso Máxima</th>
                    <th>Qtd de Utilização</th>
                    <th>Validade</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cupomDescontos as $cupomDesconto)
                    <tr>
                        <td>{{ $cupomDesconto->codigo }}</td>
                        <td>{{ $cupomDesconto->qtd_uso_maxima }}</td>
                        <td>{{ $cupomDesconto->qtd_utilizado }}</td>
                        <td>{{ $cupomDesconto->validade->format('d/m/Y') }}</td>
                        <td>R$ {{ number_format($cupomDesconto->valor, 2, ',', '.') }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.cupom_desconto', $cupomDesconto->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $cupomDesconto->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $cupomDesconto->id }}"
                                  action="{{ route('gestor.cupom_descontos.destroy', $cupomDesconto->id) }}"
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
        {{ $cupomDescontos->links() }}
    </div>
@endsection
