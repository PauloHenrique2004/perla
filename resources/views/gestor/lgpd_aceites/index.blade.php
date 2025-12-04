@extends('layouts.gestor.gestor')

@section('title', 'LGPD Aceites - ')
@section('header-title', 'LGPD Aceites')

@section('content')
    <div class="card-body">
        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get"
              action="{{ route('gestor.lgpd_aceites.index') }}">
            <div class="row">
                <div class="col-md-2">
                    <div class="input-group mb-3">
                        <input name="versao" placeholder="Número da versão" class="form-control"
                               style="min-width: 120px" type="number" value="{{ request()->query('versao') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group mb-3">
                        <input name="email" placeholder="Pesquisa por e-mail" class="form-control"
                               style="min-width: 120px" type="text" value="{{ request()->query('email') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group mb-3">
                        <input name="cookie" placeholder="Pesquisa por cookie" class="form-control"
                               style="min-width: 120px" type="text" value="{{ request()->query('cookie') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group mb-3">
                        <input name="ip" placeholder="Pesquisa por IP" class="form-control"
                               style="min-width: 120px" type="text" value="{{ request()->query('ip') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fa fa-search"></i> </button>
                        <a class="btn btn-default ml-1" href="{{ route('gestor.lgpd_aceites.index') }}">Limpar</a>
                    </div>
                </div>

            </div>
        </form>
        <!---------------- / Busca ---------------->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Versão</th>
                    <th>E-mail</th>
                    <th>Cookie</th>
                    <th>IP</th>
                    <th>Aceito em</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lgpdAceites as $lgpdAceite)
                    <tr>
                        <td>{{ $lgpdAceite->lgpd_termo_id }}</td>
                        <td>{{ $lgpdAceite->user ? $lgpdAceite->user->email : '' }}</td>
                        <td>{{ $lgpdAceite->cookie }}</td>
                        <td>{{ $lgpdAceite->ip }}</td>
                        <td>{{ $lgpdAceite->aceito_em->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer clearfix">
        {{ $lgpdAceites->links() }}
    </div>
@endsection