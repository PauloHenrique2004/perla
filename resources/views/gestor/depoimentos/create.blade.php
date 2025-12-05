@extends('layouts.gestor.gestor')

@section('title', 'Cadastrar - Depoimento - ')
@section('header-title', 'Cadastrar - Depoimento')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Depoimento</h3>
                </div>
                @include('gestor.depoimentos._form', [
                    'action' => route('gestor.depoimentos.store'),
                    'method' => 'POST'
                ])
            </div>
        </div>
    </div>
@endsection
