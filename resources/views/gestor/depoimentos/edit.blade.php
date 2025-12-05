@extends('layouts.gestor.gestor')

@section('title', 'Editar - Depoimento - ')
@section('header-title', 'Editar - Depoimento')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Depoimento</h3>
                </div>
                @include('gestor.depoimentos._form', [
                    'action' => route('gestor.depoimentos.update', $depoimento),
                    'method' => 'PUT'
                ])
            </div>
        </div>
    </div>
@endsection
