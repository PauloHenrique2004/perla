@extends('layouts.gestor.gestor')

@section('title', 'Horários - ')
@section('header-title', 'Horários')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.horario') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
@endsection

@section('content')
    <div class="card-body">

        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get"
              action="{{ route('gestor.horarios.index') }}">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input name="nome" placeholder="Pesquisa por nome" class="form-control"
                           style="min-width: 120px" type="text" value="{{ request()->query('nome') }}">

                    <div class="input-group-append">
                        <button class="btn btn-default ml-2 table-search"><i class="fa fa-search"></i></button>
                        <a class="btn btn-default ml-1" href="{{ route('gestor.horarios.index') }}">Limpar</a>
                    </div>
                </div>
            </div>
        </form>
        <!---------------- / Busca ---------------->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Dias</th>
                    <th>De</th>
                    <th>Até</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($horarios as $horario)
                    <tr>
                        <td>
                            {{ $horario->seg ? 'Segunda ' : '' }}
                            {{ $horario->ter ? 'Terça ' : '' }}
                            {{ $horario->qua ? 'Quarta ' : '' }}
                            {{ $horario->qui ? 'Quinta ' : '' }}
                            {{ $horario->sex ? 'Sexta ' : '' }}
                            {{ $horario->sab ? 'Sábado ' : '' }}
                            {{ $horario->dom ? 'Domingo ' : '' }}
                        </td>
                        <td>{{ $horario->de }}</td>
                        <td>{{ $horario->ate }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="{{ route('gestor.horario', $horario->id) }}">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $horario->id }}').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-{{ $horario->id }}"
                                  action="{{ route('gestor.horarios.destroy', $horario->id) }}"
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
        {{ $horarios->links() }}
    </div>
@endsection
