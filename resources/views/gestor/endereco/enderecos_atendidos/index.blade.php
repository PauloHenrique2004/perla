@extends('layouts.gestor.gestor')

@section('title', 'Endereços Atendidos - ')
@section('header-title', 'Endereços Atendidos')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX"
       href="{{ route('gestor.endereco.endereco_atendido') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Estado</th>
                    <th>Município</th>
                    <th>Bairro</th>
                    <th>Valor</th>
                    <th>Ativo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($enderecosAtendidos as $enderecoAtendido)
                    <tr>
                        <td>{{ $enderecoAtendido->municipio->uf }}</td>
                        <td>{{ $enderecoAtendido->municipio->nome }}</td>
                        <td>{{ $enderecoAtendido->bairro }}</td>
                        <td>R$ {{ number_format($enderecoAtendido->valor, 2, ',', '.') }}</td>
                        <td>{{  $enderecoAtendido->ativo ? 'Ativo' : 'Não' }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.endereco.endereco_atendido', $enderecoAtendido->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $enderecoAtendido->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $enderecoAtendido->id }}"
                                  action="{{ route('gestor.endereco.enderecos_atendidos.destroy', $enderecoAtendido->id) }}"
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
        {{ $enderecosAtendidos->links() }}
    </div>
@endsection
