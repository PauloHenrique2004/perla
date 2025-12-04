@extends('layouts.gestor.gestor')

@section('title', 'Municípios Atendidos - ')
@section('header-title', 'Municípios Atendidos')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX"
       href="{{ route('gestor.endereco.municipio_atendido') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>UF</th>
                    <th>Nome</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($municipiosAtendidos as $municipioAtendido)
                    <tr>
                        <td>{{ $municipioAtendido->uf }}</td>
                        <td>{{ $municipioAtendido->nome }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.endereco.municipio_atendido', $municipioAtendido->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $municipioAtendido->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $municipioAtendido->id }}"
                                  action="{{ route('gestor.endereco.municipios_atendidos.destroy', $municipioAtendido->id) }}"
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
        {{ $municipiosAtendidos->links() }}
    </div>
@endsection
