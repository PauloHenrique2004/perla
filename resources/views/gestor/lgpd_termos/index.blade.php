@extends('layouts.gestor.gestor')

@section('title', 'LGPD Termos - ')
@section('header-title', 'LGPD Termos')

@section('card-tools')
    <a class="btn btn-primary content animate__animated animate__flipInX" href="{{ route('gestor.lgpd_termo') }}">
        <i class="fas fa-plus" aria-hidden="true"></i> Atualizar versão atual
    </a>
@endsection

@section('content')
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Versão</th>
                    <th>Aceite de clientes</th>
                    <th>Aceite de cookies</th>
                    <th><i class="fas fa-calendar-alt"></i> Cadastrado em</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($lgpdTermos as $lgpdtermo)
                    <tr>
                        <td>
                            Versão {{ $lgpdtermo->id }}
                            @if($lgpdTermoAtual && $lgpdTermoAtual->id == $lgpdtermo->id)
                                <b>(Termo atual)</b>
                            @endif
                        </td>
                        <td>{{ $lgpdtermo->contasAceites->count() }}</td>
                        <td>{{ $lgpdtermo->cookieAceites->count() }}</td>
                        <td>{{ $lgpdtermo->created_at->format('d/m/Y H:i') }}</td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('gestor.lgpd_termo', $lgpdtermo->id) }}">
                                <i class="fas fa-eye" aria-hidden="true"></i> Visualizar
                            </a>
                        </td>
                        <!-- / Ações -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer clearfix">
        {{ $lgpdTermos->links() }}
    </div>
@endsection